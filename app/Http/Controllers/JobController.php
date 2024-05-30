<?php

namespace App\Http\Controllers;

use App\Mail\Applied;
use App\Mail\Rejected;
use App\Mail\Status;
use App\Models\Benefit;
use App\Models\Candidate;
use App\Models\City;
use App\Models\EmploymentType;
use App\Models\Field;
use App\Models\FieldSpecialization;
use App\Models\Job;
use App\Models\Step;
use App\Models\JobInterview;
use App\Models\Province;
use App\Models\Pvi;
use Auth;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class JobController extends Controller
{
    public function testemail(Request $request)
    {
        $candidate = Auth::user()->candidate;
        $job = Job::where('job_id', 42337869)->first();

        return view('email.applied', compact('job', 'candidate'));
    }

    public function apply(Request $request)
    {
        $job = Job::whereJobId($request->job_id)->first();
        $candidate = Candidate::whereCandidateId($request->candidate_id)->first();

        $status = 0;
        if ($candidate->match($job->id) >= 65) {
            $status = 1;
        }

        if (!$candidate->isJobApplied($job->id)) {
            $candidate->jobs()->attach($job->id, ['progress' => 0, 'status' => $status]);
            Mail::to($candidate->user->email)->send(new Applied($candidate, $job));
        }
        return back()->with('message', 'Anda berhasil telah melamar lowongan ini, untuk informasi selanjutnya akan ada diberitahu melalui  <a href="' . route('candidate-job') . '">beranda</a> Anda dan email Anda');
    }

    public function saveJob(Request $request)
    {
        $job = Job::whereJobId($request->job_id)->first();
        $candidate = Candidate::whereCandidateId($request->candidate_id)->first();

        if (!$candidate->isJobSaved($job->id)) {
            $candidate->savedJobs()->attach($job->id);
        }

        return back()->with('message', 'Anda berhasil menyimpan lowongan ini, untuk lowongan tersimpan lainnya dapat dilihat di <a href="' . route('candidate-job') . '">beranda</a> Anda');
    }

    public function createJob()
    {
        $provinces = Province::all();
        $cities = City::all();
        $fields = Field::all();
        $specializations = FieldSpecialization::all();
        $benefits = Benefit::all();
        $empTypes = EmploymentType::all();
        return view('dashboard/admin/create-job', compact('provinces', 'cities', 'fields', 'specializations', 'benefits', 'empTypes'));
    }

    public function storeJob(Request $request)
    {
        $job_id = md5($request->title . date('Y-m-d h-m-s'));
        $user = Auth::user();

        $status = $request->draft ? JOB::STATUS_DRAFT : JOB::STATUS_PUBLISHED;

        $end_date = $request->end_date;

        $job = new Job([
            'job_id' => $job_id,
            'preq' => $request->preq,
            'need' => $request->need,
            'title' => $request->title,
            'description' => $request->description,
            'requirement' => $request->requirement,
            'min_education' => $request->min_education,
            'min_age' => $request->min_age,
            'max_age' => $request->max_age,
            'min_experience' => $request->min_experience,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'start_date' => $request->start_date,
            'end_date' => $end_date,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'field_id' => (!empty($request->field_id) ? $request->field_id : 999),
            'field_specialization_id' => (!empty($request->field_specialization_id) ? $request->field_specialization_id : 999),
            'created_by' => $user->id,
            'status' => $status,
            // 'has_intelligence_test' => $request->has_intelligence_test,
            'has_intelligence_test' => "on",
            // 'due_date' => $end_date
        ]);

        // if ($request->hasFile('file')) {
        //     if ($request->file('file')->isValid()) {
        //         $folder = md5($job->job_id.'folder');
        //         $extension = $request->file->getClientOriginalExtension();
        //         $filename = 'preq_'.$job->title.'.'.$extension;
        //         if ($job->preq_file) {
        //             unlink(public_path('upload/jobs/'.$folder).'/'.$filename);
        //         }
        //         $request->file->move(public_path('upload/jobs/'.$folder).'/', $filename);
        //         $job->preq_file = $filename;
        //     }
        // }

        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $size = $request->file('file')->getSize() / 1024;
                if ($size > 2000) {
                    Alert::error('Opps', 'Ukuran file maks 2Mb');
                } else {
                    $folder = md5($job->job_id . 'folder');
                    $extension = $request->file->getClientOriginalExtension();
                    $filename = 'preq_' . $job->title . '.' . $extension;
                    if ($job->preq_file) {
                        unlink(public_path('upload/jobs/' . $folder) . '/' . $filename);
                    }
                    $request->file->move(public_path('upload/jobs/' . $folder) . '/', $filename);
                    $job->preq_file = $filename;
                    Alert::success('Berhasl', 'P.Req Telah di Upload');
                }
            }
        }

        $job->save();

        if ($request->benefit) {
            foreach ($request->benefit as $benefit) {
                $job->benefits()->attach($benefit);
            }
        }

        if ($request->employment_type) {
            foreach ($request->employment_type as $type) {
                $job->employmentTypes()->attach($type);
            }
        }

        $stepp = Step::get();
        
        foreach ($stepp as $key => $step) {
            $job->steps()->attach($step, ['due_date' => null]);
        }

        // $job->steps()->attach(['due_date' => $end_date]);


        // $step_id = 3;
        // foreach ($request->interviewer as $interviewer) {
        //     $job->interviews()->save(JobInterview::create([
        //         'job_id' => $job->id,
        //         'interviewer' => $interviewer,
        //         'step_id' => $step_id
        //     ]));
        //     $step_id++;
        // }

        // foreach ($request->pvi as $pvi) {
        //     $job->pvis()->save(Pvi::create([
        //         'job_id' => $job->id,
        //         'question' => $pvi
        //     ]));
        // }

        if ($job->status == 1) {
            return redirect()->route('detail-job', $job->id);
        } else {
            return redirect()->route('edit-job', $job->job_id);
        }
    }

    public function copyLowongan(Request $request, $id)
    {
        $currentJob = Job::findOrFail($id);

        $job_id = md5($currentJob->title . date('Y-m-d h-m-s'));
        
        $user = Auth::user();
        $status = $request->draft ? JOB::STATUS_DRAFT : JOB::STATUS_PUBLISHED;
        $job = new Job([
            'job_id' => $job_id,
            'preq' => $currentJob->preq,
            'need' => $currentJob->need,
            'title' => $currentJob->title,
            'description' => $currentJob->description,
            'requirement' => $currentJob->requirement,
            'min_education' => $currentJob->min_education,
            'min_age' => $currentJob->min_age,
            'max_age' => $currentJob->max_age,
            'min_experience' => $currentJob->min_experience,
            'min_salary' => $currentJob->min_salary,
            'max_salary' => $currentJob->max_salary,
            'start_date' => $currentJob->start_date,
            'end_date' => $currentJob->end_date,
            'province_id' => $currentJob->province_id,
            'city_id' => $currentJob->city_id,
            'field_id' => (!empty($currentJob->field_id) ? $currentJob->field_id : 999),
            'field_specialization_id' => (!empty($currentJob->field_specialization_id) ? $currentJob->field_specialization_id : 999),
            'created_by' => $user->id,
            'status' => $status,
            'has_intelligence_test' => $currentJob->has_intelligence_test,
            // 'due_date' => null
        ]);

        $newJob = $job->replicate();
        $newJob->save();

        if ($newJob->benefit) {
            foreach ($newJob->benefit as $benefit) {
                $newJob->benefits()->attach($benefit);
            }
        }

        if ($newJob->start_date <= $newJob->end_date) {
            $status = JOB::STATUS_CLOSED;
        }

        if ($newJob->employment_type) {
            foreach ($newJob->employment_type as $type) {
                $newJob->employmentTypes()->attach($type);
            }
        }

        $stepp = Step::get();
        foreach ($stepp as $key => $step) {
            $newJob->steps()->attach($step, ['due_date' => null]);
        }

         // foreach ($newJob->step as $key => $step) {
        //     $job->steps()->attach($step, ['due_date' => $currentJob->due_date[$key]]);
        // }

        return redirect()->route('dashboard-jobs')->with(compact('id', 'currentJob'));
    }

    public function editJob($job_id)
    {
        $job = Job::where('job_id', $job_id)->first();

        $provinces = Province::all();
        $cities = City::all();
        $fields = Field::all();
        $specializations = FieldSpecialization::all();
        $benefits = Benefit::all();
        $empTypes = EmploymentType::all();

        return view('dashboard/admin/edit-job', compact('provinces', 'cities', 'fields', 'specializations', 'benefits', 'empTypes', 'job'));
    }

    public function updateJob(Request $request, $job_id)
    {
        $job = Job::where('job_id', $job_id)->first();

        $status = $request->draft ? JOB::STATUS_DRAFT : JOB::STATUS_PUBLISHED;
        $inputs = $request->all();

        $inputs['status'] = $status;
        $inputs['field_id'] = (!empty($inputs['field_id']) ? $inputs['field_id'] : 999);
        $inputs['field_specialization_id'] = (!empty($inputs['field_specialization_id']) ? $inputs['field_specialization_id'] : 999);

        if (!isset($inputs['has_intelligence_test'])) {
            $inputs['has_intelligence_test'] = null;
        }

        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $folder = md5($job->job_id . 'folder');
                $extension = $request->file->getClientOriginalExtension();
                $filename = 'preq_' . $job->title . '.' . $extension;
                if ($job->preq_file) {
                    unlink(public_path('upload/jobs/' . $folder) . '/' . $filename);
                }
                $request->file->move(public_path('upload/jobs/' . $folder) . '/', $filename);
                $inputs['preq_file'] = $filename;
            }
        } else {
            if ($job->preq_file) {
                $inputs['preq_file'] = $job->preq_file;
            }
        }

        $job->update($inputs);

        $job->benefits()->sync($request->benefit);
        $job->employmentTypes()->sync($request->employment_type);

        foreach ($job->steps as $key => $step) {
            $job->steps()->updateExistingPivot($step->id, ['due_date' => null]);
        }

        foreach ($job->interviews as $key => $interview) {
            $interview->interviewer = $request->interviewer[$key];
            $interview->save();
        }

        foreach ($job->pvis as $key => $pvi) {
            $pvi->question = $request->pvi[$key];
            $pvi->save();
        }

        return redirect()->route('detail-job', $job->id);
    }

    public function closeJob(Request $request, $job_id)
    {
        $job = Job::where('id', $job_id)->first();
        $inputs = $request->all();

        $inputs['status'] = JOB::STATUS_CLOSED;

        $job->update($inputs);
        return redirect()->route('detail-job', $job->id);
    }

    public function preview(Request $request)
    {
        $inputs = $request->all();
        $job = new Job($inputs);

        return view('job-detail', compact('job', 'request'));
    }

    public function pass(Request $request)
    {
        $job = Job::findorfail($request->job_id);
        $candidate = Candidate::findorfail($request->candidate_id);
        if ($request->matched == 1) {
            $job->candidates()->updateExistingPivot($candidate->id, ['progress' => $request->step_id, 'status' => 2]);
        } elseif ($request->step_id == 3) {
            $job->candidates()->updateExistingPivot($candidate->id, ['progress' => 8, 'status' => 0]);
        } else {
            if ($request->step_id == 2) {
                DB::table('job_interviews')->insert([
                    'job_id' => $request->job_id,
                    'step_id' => 3,
                    'interviewer' => null,
                ]);
                DB::table('job_interviews')->insert([
                    'job_id' => $request->job_id,
                    'step_id' => 4,
                    'interviewer' => null,
                ]);
                DB::table('job_interviews')->insert([
                    'job_id' => $request->job_id,
                    'step_id' => 5,
                    'interviewer' => null,
                ]);
                DB::table('job_interviews')->insert([
                    'job_id' => $request->job_id,
                    'step_id' => 6,
                    'interviewer' => null,
                ]);
                DB::table('job_interviews')->insert([
                    'job_id' => $request->job_id,
                    'step_id' => 7,
                    'interviewer' => null,
                ]);
            }
            $job->candidates()->updateExistingPivot($candidate->id, ['progress' => $request->step_id + 1, 'status' => 0]);
        }

        if (($request->step_id == 0 && $request->matched != 1) || $request->step_id == 1) {
            Mail::to($candidate->user->email)->send(new Status($candidate, $job));
        }

        return view('dashboard/admin/_list-tab-content', compact('job'));
    }

    public function passCandites(Request $request)
    {
        $job = Job::findorfail($request->job_id);
        $candidate = Candidate::findorfail($request->candidate_id);
        if ($request->matched == 1) {
            $job->candidates()->updateExistingPivot($candidate->id, ['progress' => $request->step_id, 'status' => 2]);
        } elseif ($request->step_id == 3) {
            $job->candidates()->updateExistingPivot($candidate->id, ['progress' => 8, 'status' => 0]);
        } else {
            if ($request->step_id == 2) {
                DB::table('job_interviews')->insert([
                    'job_id' => $request->job_id,
                    'step_id' => 3,
                    'interviewer' => "HC 1",
                ]);
                DB::table('job_interviews')->insert([
                    'job_id' => $request->job_id,
                    'step_id' => 4,
                    'interviewer' => "HC 2",
                ]);
                DB::table('job_interviews')->insert([
                    'job_id' => $request->job_id,
                    'step_id' => 5,
                    'interviewer' => "User 1",
                ]);
                DB::table('job_interviews')->insert([
                    'job_id' => $request->job_id,
                    'step_id' => 6,
                    'interviewer' => "User 2",
                ]);
                DB::table('job_interviews')->insert([
                    'job_id' => $request->job_id,
                    'step_id' => 7,
                    'interviewer' => null,
                ]);
            }
            $job->candidates()->updateExistingPivot($candidate->id, ['progress' => $request->step_id + 1, 'status' => 0]);
        }

        if (($request->step_id == 0 && $request->matched != 1) || $request->step_id == 1) {
            Mail::to($candidate->user->email)->send(new Status($candidate, $job));
        }

        return redirect()->back()->with(compact('job'));
    }

    public function fail(Request $request)
    {
        $job = Job::findorfail($request->job_id);
        $candidate = Candidate::findorfail($request->candidate_id);

        if ($request->shortlisted == 1) {
            $job->candidates()->updateExistingPivot($candidate->id, ['status' => 55, 'progress' => $request->step_id]);
        } elseif ($request->matched == 1) {
            $job->candidates()->updateExistingPivot($candidate->id, ['status' => 44, 'progress' => $request->step_id]);
        } else {
            $job->candidates()->updateExistingPivot($candidate->id, ['status' => 33, 'progress' => $request->step_id]);
        }

        Mail::to($candidate->user->email)->send(new Rejected($candidate, $job));

        return redirect()->back()->with(compact('job'));
    }

    public function failCandidates(Request $request)
    {
        $job = Job::findorfail($request->job_id);
        $candidate = Candidate::findorfail($request->candidate_id);

        if ($request->shortlisted == 1) {
            $job->candidates()->updateExistingPivot($candidate->id, ['status' => 55, 'progress' => $request->step_id]);
        } elseif ($request->matched == 1) {
            $job->candidates()->updateExistingPivot($candidate->id, ['status' => 44, 'progress' => $request->step_id]);
        } else {
            $job->candidates()->updateExistingPivot($candidate->id, ['status' => 33, 'progress' => $request->step_id]);
        }

        Mail::to($candidate->user->email)->send(new Rejected($candidate, $job));

        return view('dashboard/admin/_list-tab-content', compact('job'));
    }

    public function close(Request $request)
    {
        $job = Job::findorfail($request->job_id);

        $job->update(['status' => 2]);
        return back();
    }

    public function delete($job_id)
    {
        $job = Job::where('job_id', $job_id)->first();
        if ($job->created_by == Auth::user()->id || Auth::user()->id == 1) {
            $job->status = 99;
            $job->save();
        }

        return redirect()->route('dashboard-jobs');
    }
}