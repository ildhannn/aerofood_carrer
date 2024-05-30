<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Traits\DataTrait;
use App\Traits\JobTrait;
use App\Models\Admin;
use App\Models\Candidate;
use App\Models\Divition;
use App\Models\Field;
use App\Models\Job;
use App\Models\Province;
use App\Models\Unit;
use App\Models\User;
use App\Models\Skill;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\Converts;
use App\Helpers\Dbases;

class AdminDashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changeUnit(Request $request) {
        session(['unit'=> $request->unit]);

        return json_encode($request->unit);
    }

    public function index() {
        $arr_nationality = array();
        $arr_nationality[] = Dbases::getCountById('candidates', 'nationality', 0);
        $arr_nationality[] = Dbases::getCountById('candidates', 'nationality', 1);
         
        $arr_age = array();
        
        $arr_age[] = DB::table('candidates')->where('age', '<=', 20)->count();
        $arr_age[] = DB::table('candidates')->where('age', '>', 20)->where('age', '<=', 25)->count();
        $arr_age[] = DB::table('candidates')->where('age', '>', 25)->where('age', '<=', 30)->count();
        $arr_age[] = DB::table('candidates')->where('age', '>', 30)->where('age', '<=', 35)->count();
        $arr_age[] = DB::table('candidates')->where('age', '>', 35)->count();
        
        $arr_step = array();
        $Matched     = DB::table('job_candidates')->where('status', 1)->where('progress', 0)->count();
        $Shortlisted = DB::table('job_candidates')->where('status', 2)->where('progress', 0)->count();
        $PVI         = DB::table('job_candidates')->where('status', 0)->where('progress', 1)->count();
        $OnlineTest  = DB::table('job_candidates')->where('status', 0)->where('progress', 2)->count();
        $Interview   = DB::table('job_candidates')->where('status', 0)->whereIn('id', array(3, 4, 5, 6, 7))->count();
        $MCU         = DB::table('job_candidates')->where('status', 0)->where('progress', 8)->count();
        $Offering    = DB::table('job_candidates')->where('status', 0)->where('progress', 9)->count();
        // $Hired       = DB::table('job_candidates')->where('status', 0)->where('progress', 10)->count();
        
        $arr_step = array(
            'Matched'       => $Matched,
            'Shortlisted'   => $Shortlisted,
            'PVI'           => $PVI,
            'OnlineTest'    => $OnlineTest,
            'Interview'     => $Interview,
            'MCU'           => $MCU,
            'Offering'      => $Offering,
            // 'Hired'         => $Hired,
        );
        
        $arr_province = array();
        $db = Dbases::getOrderLimit('provinces', 'id', 'ASC', 5);
        foreach($db as $r) {
            $arr_province[] = array(
                'label' => $r->province,
                'value' => $r->total,
            );
        }

        $arr_salary = array();
        $arr_salary[] = DB::table('candidates')->where('expected_salary', '<=', 3000000)->count();
        $arr_salary[] = DB::table('candidates')->where('expected_salary', '>', 3000000)->where('expected_salary', '<=', 5000000)->count();
        $arr_salary[] = DB::table('candidates')->where('expected_salary', '>', 5000000)->where('expected_salary', '<=', 8000000)->count();
        $arr_salary[] = DB::table('candidates')->where('expected_salary', '>', 8000000)->where('expected_salary', '<=', 10000000)->count();
        $arr_salary[] = DB::table('candidates')->where('expected_salary', '>', 10000000)->count();

        $now = Carbon::now();     
        $yearNow  = Carbon::createFromFormat('Y-m-d H:i:s', $now)
                    ->format('Y'); 

        $monthNow  = Carbon::createFromFormat('Y-m-d H:i:s', $now)
                    ->format('m'); 

        $dayTotal = Converts::dayCountInMonth();
        $arr_candidate = array();
        for($i=1; $i<=$dayTotal; $i++) {
            $preq = $yearNow .'-'. $monthNow .'-'. $i;
            $total = DB::table("candidates")->where('created_at', 'LIKE', "%{$preq}%")->count();
            $arr_candidate[] = array(
                // 'label' => (($i < 10)?"0".$i:$i) .'-'. $monthNow .'-'. $yearNow,
                'label' => (($i < 9)?"0".$i:$i) .'-'. $monthNow .'-'. $yearNow,
                'value' => $total,
            );
        }

        $arr_qualification = array();
        $arr_qualification [] = Dbases::getCountById('candidates', 'education', 0);
        $arr_qualification [] = Dbases::getCountById('candidates', 'education', 1);
        $arr_qualification [] = Dbases::getCountById('candidates', 'education', 2);

        $total_candidate = $arr_nationality[0]+$arr_nationality[1];

        $arr = array(
            'arr_nationality'   => $arr_nationality,
            'arr_age'           => $arr_age,
            'arr_province'      => $arr_province,
            'arr_salary'        => $arr_salary,
            'arr_candidate'     => $arr_candidate,
            'arr_qualification' => $arr_qualification,
            'total_candidate'   => $total_candidate,
            'arr_step'          => $arr_step,
        );
        
        return view('dashboard/admin/index', compact('arr'));
    }
    public function jobs(Request $request) {
        if (Auth::user()->id == 1) {
            $jobs = Job::join('admins', 'admins.user_id', '=', 'jobs.created_by')
                        ->where('unit_id', '=', session('unit'))
                        ->title($request->title)
                        ->orderBy('jobs.updated_at', $request->updated == 'oldest' ? 'desc' : 'asc')
                        ->field($request->field_id)
                        ->province($request->province_id)
                        ->select('jobs.*')
                        ->get();
        } else {
            $jobs = Job::title($request->title)
                        ->orderBy('updated_at', $request->updated == 'oldest' ? 'desc' : 'asc')
                        ->field($request->field_id)
                        ->province($request->province_id)
                        ->where('created_by', Auth::user()->id)->get();
        }
        $fields = Field::all(); 
        $provinces = Province::all();
        return view('dashboard/admin/jobs', compact('jobs', 'fields', 'provinces'));
    }
    public function detailJob($id) {
        $job = Job::findorfail($id);
        $umurMin = Dbases::getFieldById('jobs', 'min_age', 'id', $id);
        $umurMax = Dbases::getFieldById('jobs', 'max_age', 'id', $id);
        return view('dashboard/admin/detail-job', compact('job', 'umurMin', 'umurMax'));
    }
    
    public function candidate(Request $request){
        if (Auth::user()->id == 1) {
            $jobs = Job::join('admins', 'admins.user_id', '=', 'jobs.created_by')
                        ->where('unit_id', '=', session('unit'))
                        ->title($request->title)
                        ->orderBy('jobs.updated_at', $request->updated == 'oldest' ? 'desc' : 'asc')
                        ->field($request->field_id)
                        ->province($request->province_id)
                        ->select('jobs.*')
                        ->get();
        } else {
            $jobs = Job::title($request->title)
                        ->orderBy('updated_at', $request->updated == 'oldest' ? 'desc' : 'asc')
                        ->field($request->field_id)
                        ->province($request->province_id)
                        ->where('created_by', Auth::user()->id)->get();
        }

        $provinces = Province::all();
        $candidates = Candidate::all();

        return view('dashboard/admin/candidate', compact('candidates', 'provinces', 'jobs'));
    }

    public function totalPelamar($id){
        $job = Job::findorfail($id);
        $umurMin = Dbases::getFieldById('jobs', 'min_age', 'id', $id);
        $umurMax = Dbases::getFieldById('jobs', 'max_age', 'id', $id);
        return view('dashboard/admin/_total-candidate', compact('job', 'umurMin', 'umurMax'));
    }

    // public function candidate(Request $request){
    //     $provinces = Province::all(); 
    //     $candidates = Candidate::get();

    //     return view('dashboard/admin/candidate', compact('candidates', 'provinces'));
    // }

    public function candidateDataTable() {
        $candidates = Candidate::paginate(10);
        $candidates->getCollection()->transform(function($candidate) {
            $candidate['name'] = $candidate->user->name;
            $cantidate['location'] = $candidate->city ? $candidate->city->city.', '.$candidate->province->province : '';
            $candidate['education'] = $candidate->educations->first() ? $candidate->educations->first()->qualification() : '-';
            return $candidate;
        });
        return response()->json([
            'draw' => 1,
            'recordsTotal' => Candidate::count(),
            'recordsFiltered' => Candidate::count(),
            'data' => $candidates->items()
        ]);
    }

    public function detailCandidate($id){
        return view('dashboard/admin/detail-candidate');
    }

    public function keahlian(){
        $skill = Skill::all(); 
        return view('dashboard/admin/skill', compact('skill'));
    }
    public function createkeahlian() {
        return view('dashboard/admin/skill-create');
    }

    public function storekeahlian(Request $request) {
        Skill::create(['name' => $request->input('name')]);
        return redirect()->route('dashboard-keahlian');
    }

    public function editkeahlian(Request $request, $id) {
        $fields = Field::all();
        $skill = Skill::findorfail($id);
        return view('dashboard/admin/skill-edit', compact('skill', 'fields'));
    }

    public function updatekeahlian(Request $request, $id) {
        $skill = Skill::findorfail($id);
        $inputs = $request->all();
        $skill->update($inputs);
        return redirect()->route('dashboard-keahlian');
    }

    public function deletekeahlian($id) {
        $skill = Skill::findorfail($id);
        $skill->delete();
        return redirect()->route('dashboard-keahlian');
    }

    public function profile(){
        $user = Auth::user();
        $divitions = Divition::all();
        $units = Unit::all();

        return view('dashboard/admin/profile', compact('user', 'divitions', 'units'));
    }
    public function changeProfile(Request $request){
        $user = User::findorfail($request->user_id);
        $admin = $user->admin;

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        $admin->divition_id = $request->divition_id;
        $admin->unit_id = $request->unit_id;

        $admin->save();


        return redirect()->back();
    }
    public function changePassword(Request $request){
        $user = User::findorfail($request->id);
        $session = [];
        if(!(Hash::check($request->password, $user->password))) {
            $session['wrong-old-password'] = 'Password lama salah';
        }
        if($request->new_password != $request->confirm_new_password) {
            $session['same-password'] = 'Password baru dan konfirmasi password baru harus sama';
        }
        if(!(Hash::check($request->password, $user->password)) || $request->new_password != $request->confirm_new_password) {
            return redirect()->back()->with($session);
        }
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Berhasil mengubah password');

    }
    public function account(){
        $admins = Admin::all();
        return view('dashboard/admin/account', compact('admins'));
    }
    public function createAccount(){
        $divitions = Divition::all();
        $units = Unit::all();
        return view('dashboard/admin/create-account', compact('divitions', 'units'));
    }
    public function editAccount($id){
        $admin = Admin::findorfail($id);

        $divitions = Divition::all();
        $units = Unit::all();
        return view('dashboard/admin/edit-account', compact('admin', 'divitions', 'units'));
    }
    public function storeAccount(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->admin()->save(new Admin([
            'user_id' => $user->id,
            'admin_id' => md5($user->email.';+'),
            'divition_id'=>$request->divition_id,
            'unit_id'=>$request->unit_id
        ]));


        return redirect()->route('dashboard-account');
    }
    public function detailAccount($id){
        return view('dashboard/admin/detail-account');
    }

    public function deleteAccount(Request $request){
        $user = User::findorfail($request->id);
        $user->status = 0;
        $user->save();

        return redirect()->route('dashboard-account');
    }

    public function age() {
        $db = DB::table('candidates')->whereNotNull('birth_date', )->orderBy('id', 'ASC')->get();
        foreach($db as $r) {
            if($r->birth_date != "") {
                $age = Converts::generateAge($r->birth_date);
                DB::table('candidates')
                    ->where('id', $r->id)
                    ->update(['age' => $age]);
            }
        }
        
        echo "Done";
    }

    public function province() {
        $db = DB::table('provinces')->orderBy('id', 'ASC')->get();
        foreach($db as $r) {
            $total = DB::table('candidates')->where('province_id', $r->id)->count();
            DB::table('provinces')
                ->where('id', $r->id)
                ->update(['total' => $total]);
        }
        
        echo "Done";
    }

    public function education() {
        $db = DB::table('candidates')->orderBy('id', 'ASC')->get();
        foreach($db as $r) {
            $qualification = 0;
            $edu = Dbases::getByIdOrderLimit('candidate_education', 'candidate_id', $r->id, 'id', 'DESC', 1);
            foreach($edu as $rw) {
                $qualification = $rw->qualification;
                Dbases::setFieldById('candidates', 'education', $qualification, 'id', $r->id);
            }
        }
        
        echo "Done";
    }

    public function getDataCandidateEducation($education) {
        $list = DB::table('candidates')
            ->join('users', 'candidates.user_id', '=', 'users.id')
            ->select('candidates.*', 'users.name', 'users.email')
            ->where('candidates.education', $education)
            ->get();
        
        return view('dashboard._candidateeducation', compact('list'));
    }
}
