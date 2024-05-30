<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Job;
use App\Models\Pvi;

use App\Models\PviAnswer;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PviController extends Controller
{
    public function getDetailPvi($job_id, $candidate_id)
    {
        $job = Job::where('job_id', $job_id)->first();
        $can_id = DB::table('candidates')->where('candidate_id', $candidate_id)->first();
        $pvis = DB::table('pvi_answers')->where('candidate_id', $can_id->id)->join('pvis', 'pvis.id', '=', 'pvi_answers.pvi_id')->get();
        $candidate = $job->jobCandidate($candidate_id);
        return view('dashboard.pvi-report', compact('pvis', 'job', 'candidate'));
    }

    // public function take($job_id) {
    // 	$job = Job::where('job_id', $job_id)->first();

    // 	$candidate = $job->candidates->where('id', Auth::user()->candidate->id);
    // 	if ($candidate->count() == 0) {
    // 		return redirect()->route('candidate-job');
    // 	} elseif ($candidate->first()->pivot->progress != 1) {
    // 		return redirect()->route('candidate-job');
    // 	} elseif ($candidate->first()->pivot->progress == 1 && $candidate->first()->pivot->status == 33) {
    // 		return redirect()->route('candidate-job');
    // 	} else {
    // 		return view('test.pvi', compact('job'));
    // 	}
    // }

    // public function answer(Request $request, $job_id) {
    //     $job = Job::where('job_id', $job_id)->first();
    //     $inputs = $request->all();
    //     $pvi = Pvi::findorfail($request->pvi_id);
    //     if ($request->hasFile('answer')) {
    //         if ($request->file('answer')->isValid()) {
    //             $folder = md5($job->job_id.'folder');
    //             $extension = $request->answer->getClientOriginalExtension();
    //             $filename = 'pvi_'.$request->number.Auth::user()->name.'.'.$extension;
    //             $request->answer->move(public_path('upload/jobs/'.$folder).'/', $filename);
    //             $inputs['answer'] = $filename;
    //             $inputs['job_id'] = $job->id;
    //             $inputs['candidate_id'] = Auth::user()->candidate->id;
    //             $inputs['pvi_id'] = $pvi->id;
    //             unset($inputs['number']);
    //             unset($inputs['_token']);

    //             $pvi->answers()->updateOrCreate($inputs);

    //             return 'success';
    //         }
    //     }
    // }

    public function pvi(Request $request)
    {
        $pvis = Pvi::orderBy('created_at', 'DESC')->get();

        return view('dashboard/admin/pvi', compact('pvis'));
    }

    public function createPvi()
    {
        return view('dashboard/admin/create-pvi');
    }

    public function storePvi(Request $request)
    {
        DB::table('pvis')->insert([
            'question' => $request->question,
            'status' => 1
        ]);

        return redirect()->route('dashboard-pvi');
    }

    public function editPvi($id)
    {
        $pvi = DB::table('pvis')->find($id);

        return view('dashboard/admin/edit-pvi', compact('pvi'));
    }

    public function changePvi(Request $request)
    {
        DB::table('pvis')
            ->where('id', $request->id)
            ->update(
                [
                    'question' => $request->question,
                    'status' => $request->status
                ]
            );

        return redirect()->route('dashboard-pvi', $request->id);
    }

    public function deletePvi(Request $request)
    {
        DB::table('pvis')->where('id', $request->id)->delete();

        return redirect()->route('dashboard-pvi');
    }
}
