<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function onlineTest() {
        return view('dashboard/online-test');
    }
    public function adminIndex() {
        return view('dashboard/admin/index');
    }

    public function evaluate() {
        return;
    }

    public function viewCandidateProfile() {
        return;
    }

    public function testResult() {
        return;
    }

    public function saveJob() {
        return;
    }


}
