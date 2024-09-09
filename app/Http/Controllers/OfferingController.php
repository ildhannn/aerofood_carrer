<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Candidate;
use App\Models\Job;
use App\Mail\Offering;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use DB;

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
            $filename = 'offering_' . md5($candidate->candidate_id) . '.' . $extension;
    
            if ($offering) {
                if (file_exists(public_path('upload/candidates/' . $folder) . '/' . $offering->offering)) {
                    unlink(public_path('upload/candidates/' . $folder) . '/' . $offering->offering);
                }
                
                $offering->offering = $filename;
                $offering->join_date = $request->join_date ?? $offering->join_date;
                $offering->offering_date = $request->offering_date ?? $offering->offering_date;
                $offering->position = $request->position ?? $offering->position;
                $offering->unit = $request->unit ?? $offering->unit;
                $request->offering->move(public_path('upload/candidates/' . $folder) . '/', $filename);
                $offering->save();
            } else {
                $request->offering->move(public_path('upload/candidates/' . $folder) . '/', $filename);
                DB::table('offerings')->insert([
                    'candidate_id' => $candidate->id,
                    'job_id' => $job->id,
                    'unit' => $request->unit,
                    'position' => $request->position,
                    'join_date' => $request->join_date,
                    'offering_date' => $request->offering_date,
                    'offering' => $filename,
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
                DB::table('offerings')->insert([
                    'candidate_id' => $candidate->id,
                    'job_id' => $job->id,
                    'unit' => $request->unit,
                    'position' => $request->position,
                    'join_date' => $request->join_date,
                    'offering_date' => $request->offering_date,
                ]);
            }
        }
        // Mail::to($candidate->user->email)->send(new Offering($candidate, $job));
        return redirect()->back();
    }

    public function uploadOfferingCandidate(Request $request)
    {
        $jobs = Job::findOrFail($request->job_id);
        $candidate = Candidate::findOrFail($request->candidate_id);
    
        $offering = $candidate->offering($jobs->id);
    
        if ($request->hasFile('offering') && $request->file('offering')->isValid()) {
            $folder = md5($candidate->candidate_id . 'folder');
            $extension = $request->offering->getClientOriginalExtension();
            $filename = 'offering_can_' . md5($offering->updated_at) . '.' . $extension;
            if ($offering->offering_can == null) {
                $request->offering->move(public_path('upload/candidates/' . $folder) . '/', $filename);
                DB::table('offerings')->where('candidate_id', $candidate->id)->where('job_id', $jobs->id)->update([
                    'offering_can' => $filename,
                ]);
            } else {
                if (file_exists(public_path('upload/candidates/' . $folder) . '/' . $offering->offering_can)) {
                    unlink(public_path('upload/candidates/' . $folder) . '/' . $offering->offering_can);
                }
                
                $request->offering->move(public_path('upload/candidates/' . $folder) . '/', $filename);
                DB::table('offerings')->where('candidate_id', $candidate->id)->where('job_id', $jobs->id)->update([
                    'offering_can' => $filename,
                ]);
            }
            // if ($offering) {
            //     if (file_exists(public_path('upload/candidates/' . $folder) . '/' . $offering->offering_can)) {
            //         unlink(public_path('upload/candidates/' . $folder) . '/' . $offering->offering_can);
            //     }
                
            //     $offering->offering_can = $filename;
            //     $request->offering->move(public_path('upload/candidates/' . $folder) . '/', $filename);
            //     $offering->save();
            // } else {
            //     $request->offering->move(public_path('upload/candidates/' . $folder) . '/', $filename);
            //     DB::table('offerings')->update([
            //         'candidate_id' => $candidate->id,
            //         'job_id' => $jobs->id,
            //         'offering_can' => $filename,
            //     ]);
            // }
        } else {
            if ($offering) {
                $offering->save();
            } else {
                DB::table('offerings')->update([
                    'candidate_id' => $candidate->id,
                    'job_id' => $jobs->id,
                ]);
            }
        }

        Alert::success('Berhasil', 'Offering telah di Upload');

        return redirect()->route('candidate-job');
    }

}