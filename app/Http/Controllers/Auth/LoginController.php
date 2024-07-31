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
use DB;
use App\Helpers\Dbases;
use App\Helpers\Converts;

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
        
        $db = DB::table('candidates')->whereNotNull('birth_date', )->orderBy('id', 'ASC')->get();
        foreach($db as $r) {
            if($r->birth_date != "") {
                $age = Converts::generateAge($r->birth_date);
                DB::table('candidates')
                    ->where('id', $r->id)
                    ->update(['age' => $age]);
            }
        }
        
         $db2 = DB::table('provinces')->orderBy('id', 'ASC')->get();
        foreach($db2 as $r) {
            $total = DB::table('candidates')->where('province_id', $r->id)->count();
            DB::table('provinces')
                ->where('id', $r->id)
                ->update(['total' => $total]);
        }

        $db3 = DB::table('candidates')->orderBy('id', 'ASC')->get();
        foreach($db3 as $r) {
            $qualification = 0;
            $edu = Dbases::getByIdOrderLimit('candidate_education', 'candidate_id', $r->id, 'id', 'DESC', 1);
            foreach($edu as $rw) {
                $qualification = $rw->qualification;
                Dbases::setFieldById('candidates', 'education', $qualification, 'id', $r->id);
            }
        }

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
        $verify = User::where('email', $request->all()['email'])->first();
        $emailuse = $request->email;
        $idemail = $verify->id;

        if ($verify) {
            Mail::to($request->all()['email'])->send(new ResetPassword($request->all()['email'], $emailuse, $idemail));
            Alert::success('Success', 'Cek Email');
            return view('auth.login');
        } else {
            Alert::error('Opps', 'email tidak ada di database');
            return view('auth.passwords.lupa_password');
        }
    }

    public function viewLupaPasswordEmail(Request $request, $email, $id)
    {
        return view('auth.passwords.lupa_password_email', ['email' => $email, 'id' => $id]);
    }

    public function lupaPassword(Request $request)
    {
        $email = User::where('email', $request->all()['email'])->first();

        if ($request->password != $request->confirm_new_password) {
            $session['same-password'] = 'Password baru dan konfirmasi password baru harus sama';
        }

        if ($request->password != $request->confirm_new_password) {
            return redirect()->back()->with($session);
        }
        $email->password = bcrypt($request->password);

        $email->save();

        return redirect()->route('login')->with('success', 'Berhasil mengubah password');
    }
}
