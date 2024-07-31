<?php

namespace App\Http\Controllers;

use App\Helpers\Converts;
use App\Mail\Invite;
use App\Models\Candidate;
use App\Models\InterviewForm;
use App\Models\Job;
use App\Models\JobInterview;
use App\Models\JobInterviewResult;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InterviewController extends Controller
{
    public function formInterview($job_id, $candidate_id)
    {
        $job = Job::where('job_id', $job_id)->first();
        $candidate = Candidate::where('candidate_id', $candidate_id)->first();
        $forms = InterviewForm::all();
        
        return view('dashboard.interview-report', compact('job', 'candidate', 'forms'));
    }

    public function evaluate(Request $request, $job_id, $candidate_id)
    {
        $job = Job::where('job_id', $job_id)->first();
        $candidate = candidate::where('candidate_id', $candidate_id)->first();
        $result = JobInterviewResult::where('job_interview_id', $request->job_interview_id)->first();

        JobInterviewResult::where('job_interview_id', $request->job_interview_id)->update(['result' => $request->result, 'remark' => $request->remark]);
        // $result = JobInterviewResult::updateOrCreate([
        //     'job_interview_id' => $request->job_interview_id,
        //     'job_id' => $job->id,
        //     'candidate_id' => $candidate->id,
        // ], [
        //     'result' => $request->result,
        //     'remark' => $request->remark,
        // ]);
        
        foreach ($request->interview_form_id as $key => $form_id) {
            DB::table('job_interview_result_details')
                ->where('job_interview_result_id', $result->id)
                ->where('interview_form_id', $form_id)
                ->update([
                        'rating' => $request->rating[$key], 
                        'description' => $request->description[$key],
                    ]);
            // $result->details()->updateOrCreate([
            //     'job_interview_result_id' => $result->id,
            //     'interview_form_id' => $form_id,
            // ], [
            //     'rating' => $request->rating[$key],
            //     'description' => $request->description[$key],
            // ]);
        }

        return redirect()->back();
    }

    public function invite(Request $request)
    {
        // dd($request);
        // $job = Job::whereJobId($request->job_id)->first();
        // $candidate = Candidate::whereCandidateId($request->candidate_id)->first();
        
        $candidate = DB::table('candidates')->find($request->candidate_id);
       
        $update_job_int = JobInterview::where('interviewer', $request->interviewer)
                            ->where('candidate_id', $candidate->id)
                            ->update([
                                'interviewer_name' => $request->interviewer_name,
                                'interviewer_backup' => $request->interviewer_backup
                            ]);
        
        $waktubaru = Converts::formatYmdToDmy($request->date_interview);
        $job = DB::table('jobs')->find($request->job_id);
        $user = DB::table('users')->find($candidate->user_id);
        $info = array('date_interview' => $waktubaru, 'time_interview' => $request->time_interview, 'place_interview' => $request->place_interview, 'interviewer' => $request->interviewer);
        if ($request->jenis_interview == 'offline') {
            $jenis_interview = 'offline';
            $platform = '';
        } elseif($request->jenis_interview == 'online') {
            $jenis_interview = 'online';
            if ($request->platform == 'gm') {
                $platform = 'Google Meet';
            } else {
                $platform = 'Zoom';
            }
        }
        $interviewer = $request->interviewer_name;
        $backupinterviewer = $request->interviewer_backup;

        Mail::to($user->email)->send(new Invite($candidate, $job, $user, $info, $platform, $jenis_interview, $interviewer, $backupinterviewer));
        return back()->with('message', 'Undangan sudah dikirimkan ke email Kandidat');
    }
}
