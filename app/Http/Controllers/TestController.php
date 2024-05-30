<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Mbti;
use App\Models\Papi;
use App\Models\QUestion;
use App\Models\QUestionChoice;
use App\Models\Test;
use DB;

class TestController extends Controller
{

    public function take($job_id){
        $tests = Test::all();
        $job = Job::where('job_id', $job_id)->first();
        $candidate = $job->jobCandidate(Auth::user()->candidate->candidate_id);
        if ($candidate->count() == 0) {
            return redirect()->route('candidate-job');
        } elseif ($candidate->pivot->progress != 2) {
            return redirect()->route('candidate-job');
        } elseif ($candidate->pivot->progress == 2 && $candidate->pivot->status == 33) {
            return redirect()->route('candidate-job');
        } else {
            return view('test.take-test', compact('tests', 'job'));
        }
    }

    public function answer(Request $request, $job_id){
        $candidate = Auth::user()->candidate;
        $job = Job::where('job_id', $job_id)->first();
        $inputs = $request->all();
        $answers = [];
        foreach ($inputs as $key => $value) {
            if($key != '_token' && $key != 'test_id' && $key != 'test' && $key != 'finished_time'){
                $answers[$value] = ['test_id' => $inputs['test_id'], 'job_id' => $job->id, 'finished_time' => $inputs['finished_time']];
            }
        }
        $candidate->answers()->syncWithoutDetaching($answers);
        return back()->with('next', $request->test);
    }

    public function result($job_id, $candidate_id){
        $job = Job::where('job_id', $job_id)->first();
        $candidate = $job->jobCandidate($candidate_id);
        $mbti_answers = $candidate->jobTestAnswers($job->id, 1);
        $inputs = [];

        foreach ($mbti_answers as $key => $answer) {
            $inputs['question_'.$answer->question_id] = $answer->pivot->answer;
        }

        $mbti = Mbti::where('type', $this->mbtiResult($inputs, $candidate))->first();

        $disc_answers = $candidate->jobTestAnswers($job->id, 2);
        $inputs = [];

        foreach ($disc_answers as $key => $answer) {
            $inputs['question_'.$answer->question_id] = $answer->pivot->answer;
        }

        $disc = $this->discResult($inputs, $candidate);

        $papi_answers = $candidate->jobTestAnswers($job->id, 3);
        $inputs = [];

        foreach ($papi_answers as $key => $answer) {
            $inputs['question_'.$answer->question_id] = $answer->pivot->answer;
        }

        $papi = $this->papiResult($inputs, $candidate);

        return view('dashboard.test-report', compact('job', 'candidate', 'mbti', 'disc', 'papi'));
        // return redirect()->back()->with(compact('job', 'candidate', 'mbti', 'disc', 'papi'));
    }
    public function mbti() {
    	$test = Test::findorfail(1);

    	$questions = $test->questions;

    	return view('test.mbti', compact('questions'));
    }

    public function mbtiResult($request, $candidate) {
    	$introvert = $candidate->mbtiAnswers('I')->count() / 15 * 100;
    	$extrovert = $candidate->mbtiAnswers('E')->count() / 15 * 100;
    	$sensing = $candidate->mbtiAnswers('S')->count() / 15 * 100;
    	$intuition = $candidate->mbtiAnswers('N')->count() / 15 * 100;
    	$thinking = $candidate->mbtiAnswers('T')->count() / 15 * 100;
    	$feeling = $candidate->mbtiAnswers('F')->count() / 15 * 100;
    	$judging = $candidate->mbtiAnswers('J')->count() / 15 * 100;
    	$perceiving = $candidate->mbtiAnswers('P')->count() / 15 * 100;

    	$mbti = '';
    	$mbti .= $introvert > $extrovert ? 'I' : 'E';
    	$mbti .= $sensing > $intuition ? 'S' : 'N';
    	$mbti .= $thinking > $feeling ? 'T' : 'F';
    	$mbti .= $judging > $perceiving ? 'J' : 'P';

        return $mbti;
    }

    public function discResult($request, $candidate) {
        $data = [];
        $data['dm'] = $candidate->discAnswers('D', 'm')->count();
        $data['dl'] = $candidate->discAnswers('D', 'l')->count();
        $data['im'] = $candidate->discAnswers('I', 'm')->count();
        $data['il'] = $candidate->discAnswers('I', 'l')->count();
        $data['sm'] = $candidate->discAnswers('S', 'm')->count();
        $data['sl'] = $candidate->discAnswers('S', 'l')->count();
        $data['cm'] = $candidate->discAnswers('C', 'm')->count();
        $data['cl'] = $candidate->discAnswers('C', 'l')->count();
        $data['bm'] = $candidate->discAnswers('B', 'm')->count();
        $data['bl'] = $candidate->discAnswers('B', 'l')->count();

        return $data;

    }

    public function papiResult($request, $candidate){
        
        $data = [];
        $labels = ['N', 'G', 'A', 'L', 'P', 'I', 'T', 'V', 'X', 'S', 'B', 'O', 'R', 'D', 'C', 'Z', 'E', 'K', 'F', 'W'];

        foreach ($labels as $key => $label) {
            $score = $candidate->papiAnswers($label)->count();
            $data[$label] = ['score' => $score, 'papi' => Papi::where('max_score', '>=', $score)->where('type', $label)->first(), 'analisis' => $this->analysis($score)];
        }

        return $data;
    }

    public function analysis($score){
        if($score < 2) {
            return 'Sangat Rendah';
        } elseif($score < 4) {
            return 'Rendah';
        } elseif($score < 6) {
            return 'Sedang';
        } elseif ($score < 8) {
            return 'Tinggi';
        } else{
            return 'Sangat Tinggi';
        }
    }

    public function take_intel($job_id){
        $tests = Test::all();
        $job = Job::where('job_id', $job_id)->first();
        $candidate = $job->jobCandidate(Auth::user()->candidate->candidate_id);
        if ($candidate->count() == 0) {
            return redirect()->route('candidate-job');
        } elseif ($candidate->pivot->progress != 2) {
            return redirect()->route('candidate-job');
        } elseif ($candidate->pivot->progress == 2 && $candidate->pivot->status == 33) {
            return redirect()->route('candidate-job');
        } else {
            return view('test.take-intel-test', compact('tests', 'job'));
        }
    }

    // public function get_test_intel(Request $request){
    //     $end = 20 * $request->id;

    //     $data['questions'] = DB::table('questions_intel')
    //         ->where('id', '>=', $end - 19)
    //         ->where('id', '<=', $end)
    //         ->get()->shuffle();
    //     $data['job_id'] = $request->job_id;

    //     return view('test._intel_'.$request->id, $data);
    // }

    public function get_test_intel(Request $request)
    {
        if ($request->id == 6) {
            $data['questions'] = DB::table('questions_intel')
            ->get()->random(20);
            $data['job_id'] = $request->job_id;
        
            return view('test._intel_' . $request->id, $data);
        } else {
            $data['questions'] = DB::table('questions_intel')
            ->where('jenis_soal', $request->id)
            ->get()->random(20);
            $data['job_id'] = $request->job_id;
        
            return view('test._intel_' . $request->id, $data);
        }
    }

    // public function submit_test_intel(Request $request){
    //     $start = $request->subtest * 20 - 19;
        
        
    //     for($n = $start; $n < $start + 20; $n++){
            
    //         $question_intel = DB::table('questions_intel')->where('id', '=', $n)->first();

    //         $element = ['candidate_id' => Auth::user()->candidate->id,
    //             'job_id' => $request->job_id,
    //             'question_number' => $n,
    //             'key_answer' => $question_intel->answer,
    //             'answer' => $request[$n],
    //             'finished_time' => $request['finished_time']
    //         ];
    //         DB::table('test_intel_answers')->insert($element);
    //     }
    //     return "success";
    // }

    public function submit_test_intel(Request $request)
    {
        for ($n = 0; $n < $request->jumsoal; $n++) {
            if ($request->kunci[$n] === $request->answer[$n]) {
                $point = 1;
            } else {
                $point = 0;
            }
            $element = ['candidate_id' => Auth::user()->candidate->id,
                'job_id' => $request->job_id,
                'question_number' => $request->soal[$n],
                'jenis_soal' => $request->subtest,
                'key_answer' => $request->kunci[$n],
                'answer' => $request->answer[$n],
                'point' => $point,
                'finished_time' => $request['finished_time'],
            ];
            DB::table('test_intel_answers')->insert($element);
        }
        return "success";
    }

    public function soal(Request $request)
    {
        $soalintel = DB::table('questions_intel')->get();
        return view('dashboard/admin/soal', compact('soalintel'));
    }
    public function createSoal()
    {
        return view('dashboard/admin/create-soal');
    }
    public function storeSoal(Request $request)
    {
        DB::table('questions_intel')->insert([
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'option_e' => $request->option_e,
            'answer' => $request->answer,
        ]);

        return redirect()->route('dashboard-soal');
    }
    public function editSoal($id)
    {
        $soal = DB::table('questions_intel')->find($id);
        return view('dashboard/admin/edit-soal', compact('soal'));
    }
    public function changeSoal(Request $request)
    {
        DB::table('questions_intel')
            ->where('id', $request->id)
            ->update(
                [
                    'question' => $request->question,
                    'option_a' => $request->option_a,
                    'option_b' => $request->option_b,
                    'option_c' => $request->option_c,
                    'option_d' => $request->option_d,
                    'option_e' => $request->option_e,
                    'answer' => $request->answer,
                ]
            );

        return redirect()->route('dashboard-soal', $request->id);
    }
    public function deleteSoal(Request $request)
    {
        $soal = DB::table('questions_intel')->where('id', $request->id)->delete();

        return redirect()->route('dashboard-soal');
    }

    public function soalwb1(Request $request)
    {
        $soal1wb = DB::table('questions')->where('test_id', 1)->get();
        foreach ($soal1wb as $soal1) {
            $soal1_dt = DB::table('question_choices')->where('question_id', $soal1->id)->get();
            $soalwb1[] = ([
                'id_soal' => $soal1->id,
                'id_test' => $soal1->test_id,
                'pilihan1' => $soal1_dt[0],
                'pilihan2' => $soal1_dt[1],
            ]);
        }
        return view('dashboard/admin/soalwb1', compact('soalwb1'));
    }

    public function createSoalwb1()
    {
        $soal1wb = DB::table('questions')->orderBy('id', 'desc')->first();
        return view('dashboard/admin/create-soalwb1', compact('soal1wb'));
    }
    public function storeSoalwb1(Request $request)
    {
        DB::table('questions')->insert([
            'id' => $request->nomor_soal,
            'test_id' => 1,
            'question' => "",
            'type' => 0,
        ]);
        DB::table('question_choices')->insert([
            'question_id' => $request->nomor_soal,
            'choice' => $request->pilihan1,
            'label' => $request->label1,
        ]);
        DB::table('question_choices')->insert([
            'question_id' => $request->nomor_soal,
            'choice' => $request->pilihan2,
            'label' => $request->label2,
        ]);

        $soal1wb = DB::table('questions')->where('test_id', 1)->get();
        foreach ($soal1wb as $soal1) {
            $soal1_dt = DB::table('question_choices')->where('question_id', $soal1->id)->get();
            $soalwb1[] = ([
                'id_soal' => $soal1->id,
                'id_test' => $soal1->test_id,
                'pilihan1' => $soal1_dt[0],
                'pilihan2' => $soal1_dt[1],
            ]);
        }

        return view('dashboard/admin/soalwb1', compact('soalwb1'));

    }

    public function editSoalwb1($id)
    {
        $soal = DB::table('question_choices')->where('question_id', $id)->get();
        $soalwb1 = [
            'id_soal' => $id,
            'id1' => $soal[0]->id,
            'pilihan1' => $soal[0]->choice,
            'label1' => $soal[0]->label,
            'id2' => $soal[1]->id,
            'pilihan2' => $soal[1]->choice,
            'label2' => $soal[1]->label,
        ];
        return view('dashboard/admin/edit-soalwb1', compact('soalwb1'));
    }

    public function changeSoalwb1(Request $request)
    {
        DB::table('question_choices')
            ->where('id', $request->id1)
            ->update(
                [
                    'choice' => $request->pilihan1,
                    'label' => $request->label1,
                ]
            );

        DB::table('question_choices')
            ->where('id', $request->id2)
            ->update(
                [
                    'choice' => $request->pilihan2,
                    'label' => $request->label2,
                ]
            );

        return redirect()->route('dashboard-soalwb1', $request->question_id);
    }

    public function deleteSoalwb1(Request $request)
    {
        $soal1wb = DB::table('question_choices')->where('question_id', $request->id)->delete();
        $soalwb1 = DB::table('questions')->where('id', $request->id)->delete();

        return redirect()->route('dashboard-soalwb1');
    }

    public function soalwb2(Request $request)
    {
        $soal2wb = DB::table('questions')->where('test_id', 2)->get();
        foreach ($soal2wb as $soal2) {
            $soal2_dt = DB::table('question_choices')->where('question_id', $soal2->id)->get();
            $soalwb2[] = ([
                'id_soal' => $soal2->id,
                'id_test' => $soal2->test_id,
                'pilihan1' => $soal2_dt[0],
                'pilihan2' => $soal2_dt[1],
            ]);
        }
        return view('dashboard/admin/soalwb2', compact('soalwb2'));
    }

    public function createSoalwb2()
    {
        $soal2wb = DB::table('questions')->orderBy('id', 'desc')->first();
        return view('dashboard/admin/create-soalwb2', compact('soal2wb'));
    }
    public function storeSoalwb2(Request $request)
    {
        DB::table('questions')->insert([
            'id' => $request->nomor_soal,
            'test_id' => 2,
            'question' => "",
            'type' => 0,
        ]);
        DB::table('question_choices')->insert([
            'question_id' => $request->nomor_soal,
            'choice' => $request->pilihan1,
            'label' => $request->label1,
        ]);
        DB::table('question_choices')->insert([
            'question_id' => $request->nomor_soal,
            'choice' => $request->pilihan2,
            'label' => $request->label2,
        ]);

        $soal2wb = DB::table('questions')->where('test_id', 2)->get();
        foreach ($soal2wb as $soal2) {
            $soal2_dt = DB::table('question_choices')->where('question_id', $soal2->id)->get();
            $soalwb2[] = ([
                'id_soal' => $soal2->id,
                'id_test' => $soal2->test_id,
                'pilihan1' => $soal2_dt[0],
                'pilihan2' => $soal2_dt[1],
            ]);
        }
        return view('dashboard/admin/soalwb2', compact('soalwb2'));
    }

    public function editSoalwb2($id)
    {
        $soal = DB::table('question_choices')->where('question_id', $id)->get();
        $soalwb2 = [
            'id_soal' => $id,
            'id1' => $soal[0]->id,
            'pilihan1' => $soal[0]->choice,
            'label1' => $soal[0]->label,
            'id2' => $soal[1]->id,
            'pilihan2' => $soal[1]->choice,
            'label2' => $soal[1]->label,
        ];
        return view('dashboard/admin/edit-soalwb2', compact('soalwb2'));
    }

    public function changeSoalwb2(Request $request)
    {
        DB::table('question_choices')
            ->where('id', $request->id1)
            ->update(
                [
                    'choice' => $request->pilihan1,
                    'label' => $request->label1,
                ]
            );

        DB::table('question_choices')
            ->where('id', $request->id2)
            ->update(
                [
                    'choice' => $request->pilihan2,
                    'label' => $request->label2,
                ]
            );

        return redirect()->route('dashboard-soalwb2', $request->question_id);
    }

    public function deleteSoalwb2(Request $request)
    {
        $soal1wb = DB::table('question_choices')->where('question_id', $request->id)->delete();
        $soalwb1 = DB::table('questions')->where('id', $request->id)->delete();

        return redirect()->route('dashboard-soalwb2');
    }

    public function soalwb3(Request $request)
    {
        $soal3wb = DB::table('questions')->where('test_id', 3)->get();
        foreach ($soal3wb as $soal3) {
            $soal3_dt = DB::table('question_choices')->where('question_id', $soal3->id)->get();
            $soalwb3[] = ([
                'id_soal' => $soal3->id,
                'id_test' => $soal3->test_id,
                'pilihan1' => $soal3_dt[0],
                'pilihan2' => $soal3_dt[1],
            ]);
        }
        return view('dashboard/admin/soalwb3', compact('soalwb3'));
    }

    public function createSoalwb3()
    {
        $soal3wb = DB::table('questions')->orderBy('id', 'desc')->first();
        return view('dashboard/admin/create-soalwb3', compact('soal3wb'));
    }
    public function storeSoalwb3(Request $request)
    {
        DB::table('questions')->insert([
            'id' => $request->nomor_soal,
            'test_id' => 3,
            'question' => "",
            'type' => 0,
        ]);
        DB::table('question_choices')->insert([
            'question_id' => $request->nomor_soal,
            'choice' => $request->pilihan1,
            'label' => $request->label1,
        ]);
        DB::table('question_choices')->insert([
            'question_id' => $request->nomor_soal,
            'choice' => $request->pilihan2,
            'label' => $request->label2,
        ]);

        $soal3wb = DB::table('questions')->where('test_id', 3)->get();
        foreach ($soal3wb as $soal3) {
            $soal3_dt = DB::table('question_choices')->where('question_id', $soal3->id)->get();
            $soalwb3[] = ([
                'id_soal' => $soal3->id,
                'id_test' => $soal3->test_id,
                'pilihan1' => $soal3_dt[0],
                'pilihan2' => $soal3_dt[1],
            ]);
        }
        return view('dashboard/admin/soalwb3', compact('soalwb3'));
    }

    public function editSoalwb3($id)
    {
        $soal = DB::table('question_choices')->where('question_id', $id)->get();
        $soalwb3 = [
            'id_soal' => $id,
            'id1' => $soal[0]->id,
            'pilihan1' => $soal[0]->choice,
            'label1' => $soal[0]->label,
            'id2' => $soal[1]->id,
            'pilihan2' => $soal[1]->choice,
            'label2' => $soal[1]->label,
        ];
        return view('dashboard/admin/edit-soalwb3', compact('soalwb3'));
    }

    public function changeSoalwb3(Request $request)
    {
        DB::table('question_choices')
            ->where('id', $request->id1)
            ->update(
                [
                    'choice' => $request->pilihan1,
                    'label' => $request->label1,
                ]
            );

        DB::table('question_choices')
            ->where('id', $request->id2)
            ->update(
                [
                    'choice' => $request->pilihan2,
                    'label' => $request->label2,
                ]
            );

        return redirect()->route('dashboard-soalwb3', $request->question_id);
    }

    public function deleteSoalwb3(Request $request)
    {
        $soal3wb = DB::table('question_choices')->where('question_id', $request->id)->delete();
        $soalwb3 = DB::table('questions')->where('id', $request->id)->delete();

        return redirect()->route('dashboard-soalwb3');
    }
    
}
