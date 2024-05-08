<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Unit;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(Request $request, $user)
    {   
        $admin = Admin::where('user_id', '=', Auth::user()->id)->get();

        if(count($admin) != 0){

            if(Auth::user()->status == 0){
                return redirect()->route('logout');
            }

            session(['unit'=> $admin[0]->unit_id]);

            if($admin[0]->unit_id == 1){
                $units = Unit::get();      
            } else {
                $units = Unit::where('id', '=', $admin[0]->unit_id)->get();      
            }
            
            session(['units'=> $units]);

            return redirect()->route('admin-dashboard');       
        } else {
            return redirect()->route('home');
        }
    }
}
