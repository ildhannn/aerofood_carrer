<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Pvi;
use App\Models\PviAnswer;

class PviController extends Controller
{
    public function getDetailPvi($job_id, $candidate_id) {
    	$job = Job::where('job_id', $job_id)->first();
    	$pvis = $job->pvis;
    	$candidate = $job->jobCandidate($candidate_id);
    	return view('dashboard.pvi-report', compact('pvis', 'job', 'candidate'));
    }

    public function take($job_id) {
    	$job = Job::where('job_id', $job_id)->first();

    	$candidate = $job->candidates->where('id', Auth::user()->candidate->id);
    	if ($candidate->count() == 0) {
    		return redirect()->route('candidate-job');
    	} elseif ($candidate->first()->pivot->progress != 1) {
    		return redirect()->route('candidate-job');
    	} elseif ($candidate->first()->pivot->progress == 1 && $candidate->first()->pivot->status == 33) {
    		return redirect()->route('candidate-job');
    	} else {
    		return view('test.pvi', compact('job'));
    	}
    }

    public function answer(Request $request, $job_id) {
        $job = Job::where('job_id', $job_id)->first();
        $inputs = $request->all();
        $pvi = Pvi::findorfail($request->pvi_id);
        if ($request->hasFile('answer')) {
            if ($request->file('answer')->isValid()) {
                $folder = md5($job->job_id.'folder');
                $extension = $request->answer->getClientOriginalExtension();
                $filename = 'pvi_'.$request->number.Auth::user()->name.'.'.$extension;
                $request->answer->move(public_path('upload/jobs/'.$folder).'/', $filename);
                $inputs['answer'] = $filename;
                $inputs['job_id'] = $job->id;
                $inputs['candidate_id'] = Auth::user()->candidate->id;
                $inputs['pvi_id'] = $pvi->id;
                unset($inputs['number']);
                unset($inputs['_token']);

                $pvi->answers()->updateOrCreate($inputs);

                return 'success';
            }
        }
    }
}
