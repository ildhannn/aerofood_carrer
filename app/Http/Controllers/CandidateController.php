<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Auth;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateSkill;
use App\Models\City;
use App\Models\Field;
use App\Models\Job;
use App\Models\Province;
use App\Models\Skill;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\Converts;
use Illuminate\Support\Facades\Hash;


class CandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function apply(Request $request)
    {
        $id = 1;
        return;
    }

    public function index()
    {
        $candidate = Auth::user()->candidate;
        return view('candidate.index', compact('candidate'));
    }

    function cmp_obj($a, $b)
    {
        if ($a['tanggal'] < $b['tanggal']) {
            return -1;
        } else {
            return 1;
        }
    }

    public function beranda()
    {
        $candidate = Auth::user()->candidate;

        $jobs = $candidate->jobs;

        $jadwal = [];
        foreach ($jobs as $job) {
            $candidate_job = $job->jobCandidate($candidate->candidate_id);
            $job_step = $job->jobStep($candidate_job->pivot->progress);
            // dd($job_step);

            $obj = [];
            $obj['aktivitas'] = $candidate_job->pivot->progress > 0 ? $candidate_job->progress() : ('Seleksi dokumen' . ($candidate_job->pivot->progress == 1 ? ' Prescreening Video Interview' : ''));

            $obj['aktivitas'] = $candidate_job->progress();

            if (isset($job_step['pivot'])) {
                $obj['tanggal'] = $job_step['pivot']['due_date'] ? $job_step['pivot']['due_date'] : "";
            } else {
                $obj['tanggal'] = "";
            }

            // dd($obj);

            if ($obj['tanggal']) {
                $date = date_create($obj['tanggal']);
                $obj['tanggal'] = $date;
                $obj['dateMonth'] = date_format($date, 'd');
                $obj['month'] = strtoupper(date_format($date, 'M'));
                $obj['job'] = $job->title;

                array_push($jadwal, $obj);
            }

            // dd($jadwal);
        }
        usort($jadwal, array($this, "cmp_obj"));

        return view('candidate.beranda', compact('candidate', 'jadwal'));
    }

    public function deleteSaved($job_id)
    {
        $candidate = Auth::user()->candidate;
        $job = Job::where('job_id', $job_id)->first();
        $candidate->savedJobs()->detach($job->id);
        return redirect()->back();
    }

    public function getDataCandidate($candidate_id)
    {
        $candidate = Candidate::where('candidate_id', $candidate_id)->first();
        return view('dashboard._candidate', compact('candidate'));
    }

    public function summary()
    {
        $candidate = Auth::user()->candidate;
        return view('candidate.summary', compact('candidate'));
    }

    public function summaryEdit()
    {
        $candidate = Auth::user()->candidate;
        $provinces = Province::all();
        $cities = City::all();

        return view('candidate.summary-edit', compact('candidate', 'provinces', 'cities'));
    }

    public function summaryUpdate(Request $request)
    {
        $candidate = Auth::user()->candidate;
        $inputs = $request->all();
        $user = $candidate->user;
        $user->email = $request->email;
        $user->save();

        $chekKtp = Candidate::where('ktp', $request->ktp)->first();
        if ($chekKtp && $chekKtp->id !== $candidate->id) {
            Alert::error('Opps', 'Nomor KTP sudah digunakan.');
            return redirect()->back();
        }

        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $size = $request->file('photo')->getSize() / 1024;
                // if ($size > 500) {
                //     $request->session()->flash('size', 'ukuran file maks 500KB');
                //     return redirect()->back();
                // }
                if ($size > 500) {
                    Alert::error('Opps', 'Ukuran file maks 2MB');
                    return redirect()->back();
                } else {
                    $folder = md5($candidate->candidate_id . 'folder');
                    $extension = $request->photo->getClientOriginalExtension();
                    $filename = 'foto_' . Auth::user()->name . '.' . $extension;
                    // if ($candidate->photo) {
                    //     unlink(public_path('upload/candidates/'.$folder).'/'.$filename);
                    // }
                    $file_path = public_path('upload/candidates/' . $folder) . '/' . $filename;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                    $request->photo->move(public_path('upload/candidates/' . $folder) . '/', $filename);
                    $inputs['photo'] = $filename;
                    Alert::success('Berhasl', 'Photo Telah di Upload');
                }
            }
        } else {
            if ($candidate->photo) {
                $inputs['photo'] = $candidate->photo;
            }
        }
        $candidate->update($inputs);

        return redirect()->route('candidate-summary');
    }

    public function education()
    {
        $candidate = Auth::user()->candidate;
        return view('candidate.education', compact('candidate'));

    }

    public function createEducation()
    {
        $candidate = Auth::user()->candidate;
        $fields = Field::all();

        return view('candidate.education-create', compact('candidate', 'fields'));
    }

    public function storeEducation(Request $request)
    {
        $candidate = Auth::user()->candidate;
        $inputs = $request->all();
        $inputs['candidate_id'] = $candidate->id;

        $candidate->educations()->save(CandidateEducation::create($inputs));
        return redirect()->route('candidate-education');
    }

    public function editEducation($id)
    {
        $candidate = Auth::user()->candidate;
        $education = CandidateEducation::findorfail($id);
        $fields = Field::all();

        return view('candidate.education-edit', compact('candidate', 'education', 'fields'));
    }

    public function updateEducation(Request $request)
    {
        $inputs = $request->all();
        $education = CandidateEducation::findorfail($request->id);

        if (Auth::user()->candidate->id == $education->candidate->id) {
            $education->update($inputs);
        }
        return redirect()->route('candidate-education');
    }
    public function deleteEducation($id)
    {
        $education = CandidateEducation::findorfail($id);

        if (Auth::user()->candidate->id == $education->candidate->id) {
            $education->delete();
        }

        return redirect()->route('candidate-education');
    }

    public function experience()
    {
        $candidate = Auth::user()->candidate;
        $provinces = Province::all();
        $cities = City::all();
        $fields = Field::all();

        return view('candidate.experience', compact('candidate', 'provinces', 'cities', 'fields'));
    }

    public function createExperience()
    {
        $candidate = Auth::user()->candidate;
        $provinces = Province::all();
        $cities = City::all();
        $fields = Field::all();

        return view('candidate.experience-create', compact('candidate', 'provinces', 'cities', 'fields'));
    }

    public function storeExperience(Request $request)
    {
        $candidate = Auth::user()->candidate;
        $inputs = $request->all();
        $inputs['candidate_id'] = $candidate->id;

        if ($request->still_work === null) {
            $candidate->experiences()->save(CandidateExperience::create($inputs, $request->still_work = ''));
        } else {
            $candidate->experiences()->save(
                CandidateExperience::create(
                    $inputs,
                    $request->end_date,
                    $request->start_date,
                )
            );
        }

        $candidate->updateExperience();
        return redirect()->route('candidate-experience');
    }

    public function editExperience($id)
    {
        $candidate = Auth::user()->candidate;
        $experience = CandidateExperience::findorfail($id);
        $provinces = Province::all();
        $cities = City::all();
        $fields = Field::all();

        return view('candidate.experience-edit', compact('experience', 'candidate', 'provinces', 'cities', 'fields'));

    }

    public function updateExperience(Request $request)
    {
        $experience = CandidateExperience::findOrFail($request->id);

        $validator = Validator::make($request->all(), [
            'start_date' => 'date',
            'end_date' => 'date|after_or_equal:start_date',
        ]);

        if ($validator->fails() || Auth::user()->candidate->id != $experience->candidate->id) {
            return redirect()->route('candidate-experience');
        }

        if ($request->still_work == 'on') {
            $experience->update([
                'still_work' => 'on',
                'end_date' => null,
                'start_date' => null,
            ] + $request->except('start_date', 'end_date'));
        } else {
            $experience->update([
                'still_work' => null,
                'end_date' => $request->end_date,
                'start_date' => $request->start_date,
            ]);
        }

        $candidate = Auth::user()->candidate;
        $candidate->updateExperience();

        return redirect()->route('candidate-experience');

    }

    public function deleteExperience($id)
    {
        $experience = CandidateExperience::findorfail($id);

        if (Auth::user()->candidate->id == $experience->candidate->id) {
            $experience->delete();
        }

        $candidate = Auth::user()->candidate;
        $candidate->updateExperience();
        return redirect()->route('candidate-experience');
    }

    public function skill()
    {
        $candidate = Auth::user()->candidate;

        return view('candidate.skill', compact('candidate'));
    }

    public function createSkill()
    {
        $candidate = Auth::user()->candidate;
        $skills = Skill::all();

        return view('candidate.skill-create', compact('candidate', 'skills'));
    }

    public function storeSkill(Request $request)
    {
        $candidate = Auth::user()->candidate;
        $inputs = $request->all();
        $inputs['candidate_id'] = $candidate->id;

        $candidate->skills()->sync($request->skill);

        if ($request->filled('skill_lainnya')) {
            $newSkill = Skill::create(['name' => $request->input('skill_lainnya')]);
            $candidate->skills()->attach($newSkill->id);
        }

        return view('candidate.skill', compact('candidate'));
    }

    public function editSkill($id)
    {
        $candidate = Auth::user()->candidate;
        $fields = Field::all();
        $skill = CandidateSkill::findorfail($id);

        return view('candidate.skill-edit', compact('candidate', 'skill', 'fields'));
    }

    public function updateSkill(Request $request)
    {
        $skill = CandidateSkill::findorfail($request->id);
        $inputs = $request->all();
        if (Auth::user()->candidate->id == $skill->candidate->id) {
            $skill->update($inputs);
        }

        return redirect()->route('candidate-skill');
    }

    public function deleteSkill($id)
    {
        $skill = CandidateSkill::findorfail($id);

        if (Auth::user()->candidate->id == $skill->candidate->id) {
            $skill->delete();
        }

        return redirect()->route('candidate-skill');
    }

    public function info()
    {
        $candidate = Auth::user()->candidate;
        $sosmed = Auth::user()->candidate->sosmed;

        return view('candidate.other-info', compact('candidate', 'sosmed'));
    }

    public function editInfo()
    {
        $candidate = Auth::user()->candidate;
        $sosmed = Auth::user()->candidate->sosmed;

        return view('candidate.other-info-edit', compact('candidate', 'sosmed'));

    }

    public function updateInfo(Request $request)
    {
        // info lain
        $candidate = Auth::user()->candidate;
        $candidate->update(['other_info' => $request->other_info]);

        // sosmed
        $sosmed = Auth::user()->candidate->sosmed;
        $instagram = $request->input('instagram');
        $x = $request->input('x');
        $tiktok = $request->input('tiktok');
        $linkedin = $request->input('linkedin');

        if (!$sosmed) {
            Sosmed::create([
                'candidate_id' => $candidate->id,
                'instagram' => $instagram,
                'x' => $x,
                'tiktok' => $tiktok,
                'linkedin' => $linkedin,
            ]);
        } else {
            $sosmed->update([
                'candidate_id' => $candidate->id,
                'instagram' => $instagram,
                'x' => $x,
                'tiktok' => $tiktok,
                'linkedin' => $linkedin,
            ]);
        }

        return redirect()->route('candidate-info', compact('candidate'));
    }

    public function cv()
    {
        $candidate = Auth::user()->candidate;

        return view('candidate.cv', compact('candidate'));

    }

    public function updateCV(Request $request)
    {
        $candidate = Auth::user()->candidate;
        $inputs = $request->all();
        if ($request->hasFile('cv')) {
            if ($request->file('cv')->isValid()) {
                $size = $request->file('cv')->getSize() / 1024;
                if ($size > 2000) {
                    Alert::error('Opps', 'Ukuran file maks 2Mb');
                } else {
                    $folder = md5($candidate->candidate_id . 'folder');
                    $extension = $request->cv->getClientOriginalExtension();
                    $filename = 'cv_' . Auth::user()->name . '.' . $extension;
                    if ($candidate->cv) {
                        unlink(public_path('upload/candidates/' . $folder) . '/' . $filename);
                    }
                    $request->cv->move(public_path('upload/candidates/' . $folder) . '/', $filename);
                    $inputs['cv'] = $filename;
                    Alert::success('Berhasl', 'CV Telah di Upload');
                }
            }
        } else {
            if ($candidate->cv) {
                $inputs['cv'] = $candidate->cv;
            }
        }
        $candidate->update($inputs);

        return redirect()->route('candidate-cv');
    }

    public function isHasCV()
    {
        $candidate = Auth::user()->candidate;
        if ($candidate->cv) {
            return json_encode(1);
        }
        return json_encode(0);
    }
}
