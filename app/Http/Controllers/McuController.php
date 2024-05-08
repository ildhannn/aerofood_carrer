<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Auth;
use App\Mail\Rejected;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Mcu;

use App\Mail\McuLetter;

class McuController extends Controller
{
    public function upload(Request $request){
    	$job = Job::findorfail($request->job_id);
    	$candidate = Candidate::findorfail($request->candidate_id);
    	$mcu = $candidate->mcu($job->id);

    	if ($request->hasFile('mcu')) {
            if ($request->file('mcu')->isValid()) {
                $folder = md5($candidate->candidate_id.'folder');
                $extension = $request->mcu->getClientOriginalExtension();
                $filename = 'mcu_'.$candidate->user->name.'.'.$extension;
                if ($mcu) {
                    unlink(public_path('upload/candidates/'.$folder).'/'.$mcu->mcu);
                    $mcu->mcu = $filename;
	                $request->mcu->move(public_path('upload/candidates/'.$folder).'/', $filename);
	                $mcu->save();
                } else {
	                $request->mcu->move(public_path('upload/candidates/'.$folder).'/', $filename);
                	MCU::create([
		    			'job_id' => $job->id,
		    			'candidate_id' => $candidate->id,
		    			'mcu' => $filename
		    		]);
                }
            }
        }

    	return redirect()->back();
    }

    public function sentLetter(Request $request){
        $job = Job::findorfail($request->job_id);
        $candidates = $job->candidateProgress('=', 8);

        foreach ($candidates as $candidate) {
            Mail::to($candidate->user->email)->send(new McuLetter($candidate, $job));
        }

        return redirect()->back();
    }
}
