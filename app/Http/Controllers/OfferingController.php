<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Offering;

class OfferingController extends Controller
{
    public function upload(Request $request){
    	$job = Job::findorfail($request->job_id);
    	$candidate = Candidate::findorfail($request->candidate_id);
    	$offering = $candidate->offering($job->id);

    	if ($request->hasFile('offering')) {
            if ($request->file('offering')->isValid()) {
                $folder = md5($candidate->candidate_id.'folder');
                $extension = $request->offering->getClientOriginalExtension();
                $filename = 'offering_'.$candidate->user->name.'.'.$extension;
                if ($offering) {
                    unlink(public_path('upload/candidates/'.$folder).'/'.$offering->offering);
                    $offering->offering = $filename;
	                $request->offering->move(public_path('upload/candidates/'.$folder).'/', $filename);
	                $offering->save();
                } else {
	                $request->offering->move(public_path('upload/candidates/'.$folder).'/', $filename);
                	Offering::create([
		    			'job_id' => $job->id,
		    			'candidate_id' => $candidate->id,
		    			'offering' => $filename
		    		]);
                }
            }
        }

        return redirect()->back();
    }
}
