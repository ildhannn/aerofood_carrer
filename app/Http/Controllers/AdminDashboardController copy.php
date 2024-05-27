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
use Yajra\Datatables\Datatables;

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
        return view('dashboard/admin/index');
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
        return view('dashboard/admin/detail-job', compact('job'));
    }
    public function candidate(Request $request){
        $provinces = Province::all(); 
        $candidates = Candidate::get();

        return view('dashboard/admin/candidate', compact('candidates', 'provinces'));
    }

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
}
