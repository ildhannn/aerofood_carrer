<?php

namespace App\Http\Controllers;

use App\Helpers\Converts;
use App\Mail\Invite;
use App\Models\Candidate;
use App\Models\InterviewForm;
use App\Models\Job;
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
        $result = JobInterviewResult::updateOrCreate([
            'job_interview_id' => $request->job_interview_id,
            'job_id' => $job->id,
            'candidate_id' => $candidate->id,
        ], [
            'result' => $request->result,
            'remark' => $request->remark,
        ]);

        foreach ($request->interview_form_id as $key => $form_id) {
            $result->details()->updateOrCreate([
                'job_interview_result_id' => $result->id,
                'interview_form_id' => $form_id,
            ], [
                'rating' => $request->rating[$key],
                'description' => $request->description[$key],
            ]);
        }

        return redirect()->back();
    }

    public function invite(Request $request)
    {
        // dd($request);
        // $job = Job::whereJobId($request->job_id)->first();
        // $candidate = Candidate::whereCandidateId($request->candidate_id)->first();
        $waktubaru = Converts::formatYmdToDmy($request->date_interview);
        $job = DB::table('jobs')->find($request->job_id);
        $candidate = DB::table('candidates')->find($request->candidate_id);
        $user = DB::table('users')->find($candidate->user_id);
        $info = array('date_interview' => $waktubaru, 'time_interview' => $request->time_interview, 'place_interview' => $request->place_interview, 'interviewer' => $request->interviewer);
        Mail::to($user->email)->send(new Invite($candidate, $job, $user, $info));
        return back()->with('message', 'Undangan sudah dikirimkan ke email Kandidat');
    }
}
