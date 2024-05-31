<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Offering;

class OfferingController extends Controller
{
    public function upload(Request $request)
{
    $job = Job::findOrFail($request->job_id);
    $candidate = Candidate::findOrFail($request->candidate_id);

    $offering = $candidate->offering($job->id);

    if ($request->hasFile('offering') && $request->file('offering')->isValid()) {
        $folder = md5($candidate->candidate_id . 'folder');
        $extension = $request->offering->getClientOriginalExtension();
        $filename = 'offering_' . $candidate->user->name . '.' . $extension;

        if ($offering) {
            if (file_exists(public_path('upload/candidates/' . $folder) . '/' . $offering->offering)) {
                unlink(public_path('upload/candidates/' . $folder) . '/' . $offering->offering);
            }
            $offering->offering = $filename;
            $offering->join_date = $request->join_date ?? $offering->join_date;
            $offering->offering_date = $request->offering_date ?? $offering->offering_date;
            $offering->position = $request->position;
            $offering->unit = $request->unit ?? $offering->unit;
            $request->offering->move(public_path('upload/candidates/' . $folder) . '/', $filename);
            $offering->save();
        } else {
            $request->offering->move(public_path('upload/candidates/' . $folder) . '/', $filename);
            Offering::create([
                'job_id' => $job->id,
                'candidate_id' => $candidate->id,
                'offering' => $filename,
                'join_date' => $request->join_date,
                'offering_date' => $request->offering_date,
                'position' => $request->position,
                'unit' => $request->unit,
            ]);
        }
    } else {
        if ($offering) {
            $offering->join_date = $request->join_date ?? $offering->join_date;
            $offering->offering_date = $request->offering_date ?? $offering->offering_date;
            $offering->position = $request->position ?? $offering->position;
            $offering->unit = $request->unit ?? $offering->unit;
            $offering->save();
        } else {
            Offering::create([
                'job_id' => $job->id,
                'candidate_id' => $candidate->id,
                'join_date' => $request->join_date,
                'offering_date' => $request->offering_date,
                'position' => $request->position,
                'unit' => $request->unit,
            ]);
        }
    }

    return redirect()->back();
}

    
    
}
