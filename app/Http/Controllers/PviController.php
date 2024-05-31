<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Pvi;
use Auth;
use App\Models\PviAnswer;
use App\Models\Job;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PviController extends Controller
{
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
        $answer = PviAnswer::select('answer', 'candidate_id')->where('pvi_id', $request->id)->get();
        
        for ($i = 0; $i < $answer->count(); $i++) {
            $candidate_id = Candidate::where('id', $answer[$i]->candidate_id)->first();
            $folder = md5($candidate_id->candidate_id . 'folder');
            if (file_exists(public_path('upload/candidates/' . $folder) . '/' . $answer[$i]->answer)) {
                unlink(public_path('upload/candidates/' . $folder) . '/' . $answer[$i]->answer);
            }
        }
        DB::table('pvi_answers')->where('pvi_id', $request->id)->delete();
        DB::table('pvis')->where('id', $request->id)->delete();

        return redirect()->route('dashboard-pvi');
    }
  
    public function getDetailPvi(Request $request) {
        $job = Job::where('job_id', $request->job_id)->first();
        $can_id = DB::table('candidates')->where('candidate_id', $request->candidate_id)->first();
    	$pvis = DB::table('pvi_answers')->where('candidate_id', $can_id->id)->join('pvis', 'pvis.id', '=', 'pvi_answers.pvi_id')->get();
        $candidate = $job->jobCandidate($request->candidate_id);
    	return view('dashboard.pvi-report', compact('pvis', 'job', 'candidate'));
    }
}
