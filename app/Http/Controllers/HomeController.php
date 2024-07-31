<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;
use App\Models\Field;
use App\Models\Province;
use App\Models\Unit;

class HomeController extends Controller
{
    public function index()
    {
        if (session()->has('unit')) {
            return redirect()->route('admin-dashboard');
        }
        $jobs = Job::orderBy('updated_at', 'desc')->where('status', 1)->get();
        $fields = Field::all(); 
        $provinces = Province::all(); 
        return view('home', compact('jobs', 'fields', 'provinces'));
    }
    public function login(Request $request) {
        return view('auth/login');
    }
    public function register(Request $request) {
        if ($request->url_intended) {
            $request->session()->push('url_intended', $request->url_intended);
        }
        return view('auth/register');
    }
    public function jobs(Request $request) {
        if($request){
            $jobs = $request->filter == 'oldest' ? Job::orderBy('updated_at', 'asc')->where('status', 1)->get() : Job::orderBy('updated_at', 'desc')->where('status', 1)->get();
        } else {
            $jobs = Job::orderBy('updated_at', 'desc')->where('status', 1)->get();
        }

        $fields = Field::all(); 
        $provinces = Province::all(); 
        return view('jobs', compact('jobs', 'fields', 'provinces'));
    }
    public function jobDetail($id) {
        $job = Job::whereJobId($id)->first();

        $unit = Job::join('admins', 'admins.user_id', '=', 'jobs.created_by')
                ->join('units', 'admins.unit_id', '=', 'units.id')
                ->where('jobs.id', '=', $job->id)
                ->select('units.*')
                ->first();
        return view('job-detail', compact('job', 'unit'));
    }

    public function searchJob(Request $request){
        $fields = Field::all(); 
        $provinces = Province::all();
        $jobs = Job::title($request->title)->field($request->field_id)->province($request->province_id)->get();

        return view('jobs', compact('jobs', 'provinces', 'fields'));
    }

    public function faq() {
        return view('faq');
    }
}
