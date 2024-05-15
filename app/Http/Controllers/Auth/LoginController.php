<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Unit;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;

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

        if (count($admin) != 0) {

            if (Auth::user()->status == 0) {
                return redirect()->route('logout');
            }

            session(['unit' => $admin[0]->unit_id]);

            if ($admin[0]->unit_id == 1) {
                $units = Unit::get();
            } else {
                $units = Unit::where('id', '=', $admin[0]->unit_id)->get();
            }

            session(['units' => $units]);

            return redirect()->route('admin-dashboard');
        } else {
            return redirect()->route('home');
        }
    }

    public function viewLupaPassword()
    {
        return view('auth.passwords.lupa_password');
    }

    public function emailLupaPassword(Request $request)
    {
        $verify = User::where('email', $request->all()['email'])->exists();
        $emailuse = $request->email;

        if ($verify) {
            Mail::to($request->all()['email'])->send(new ResetPassword($request->all()['email'], $emailuse));
            Alert::success('Success', 'Cek Email');
            return view('auth.login');
        } else {
            Alert::error('Opps', 'email tidak ada di database');
            return view('auth.passwords.lupa_password');
        }
    }

    public function viewLupaPasswordEmail(Request $request, $token)
    {
        $token = request()->cookie('laravel_session');
        return view('auth.passwords.lupa_password_email', ['token' => $token]);
    }

    public function lupaPassword(Request $request)
    {
        $user = User::findorfail($request->id);
        $session = [];
        if ($request->new_password != $request->confirm_new_password) {
            $session['same-password'] = 'Password baru dan konfirmasi password baru harus sama';
        }

        if ($request->new_password != $request->confirm_new_password) {
            return redirect()->back()->with($session);
        }
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Berhasil mengubah password');
     
    }
}
