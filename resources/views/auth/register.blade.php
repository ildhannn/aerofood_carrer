<style>
    body,
    html,
    .va-table-h100 {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
    }

    /* VERTICAL ALIGN MIDDLE */

    .va-table-h100,
    .va-table {
        display: table;
        height: 100vh;
    }

    .va-middle {
        display: table-cell;
        margin: 0;
        padding: 0;
        text-align: center;
        vertical-align: middle;
    }

    .content-login {
        border: 0px solid red;
        width: auto;
        height: auto;
        margin: auto;
    }

    .width-75 {
        width: 60%;
    }

    .width-100 {
        width: 100%;
    }

    .mar-0-auto {
        margin: 0 auto;
    }

    .btn-hijau-aerofood {
        background-color: #00AA4E !important;
        transition: all 1.5s;
        border: none;
        color: #fff !important;
    }

    .btn-hijau-aerofood:hover {
        background-color: #048842 !important;
        color: #f3f3f3 !important;
    }

    .smart-form .icon-append {
        /*margin-top: 7px;*/
        font-size: 20px;
        height: 32px;
        line-height: 32px;
    }

    .navbar-brand {
        display: none;
    }

    input.form-control {
        margin-top: 0px !important;
        border: 1px solid #ccc;
    }
    
    .border {
         border-bottom: 10px solid #C1D72F; border-right: 10px solid #014990; border-bottom: 10px solid #00AA4E;
    }

</style>

@extends('layouts.main')

@section('content')

<div class="container-fluid account pad-l-0-m pad-r-0-m">
    <div class="layer-bg">
        <div class="va-table-h100">
            <div class="va-middle">
                <div id="mainLogin" role="main" class="animated fadeInDown">
                    <div class="content-login">
                        <div class="width-75 mar-0-auto width-90-m">
                            <div class="width-100">
                                <div class="row" style="padding-left: 0px;padding-right: 0px;-webkit-box-shadow: 0px 9px 34px -5px rgba(0,0,0,0.75); -moz-box-shadow: 0px 9px 34px -5px rgba(0,0,0,0.75); box-shadow: 0px 9px 34px -5px rgba(0,0,0,0.75);">
                                    <div class="col-md-7" style="background:rgba(255,255,255,.45); color: #fff; padding-left: 0px; padding-right: 0px; border-top-left-radius: 4px;">
                                        <div class="va-table width-100" style="height:60vh;">
                                            <div class="va-middle width-100">
                                                <div class="logo-login"><a href="{{route('home')}}"><img src="{{ url('img/logo.png') }}" width="100%"></a></div>
                                                <br>
                                                <div class="ta-center mar-b-10px ta-center-m">
                                                    <div class="lh-1k2em" style="font-size: 2.2em; color:#048842; letter-spacing:2px;"><b>SIERA REGISTRATION</b></div>
                                                    <div class="lh-1k2em" style="font-size: 1em; color:#666; letter-spacing:2px;">Sistem Informasi e-Recruitment Aerofood</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5" style="background:rgba(255,255,255,.9);padding-left: 0px; padding-right: 0px; border-top-right-radius: 4px;">
                                        <div class="va-table mar-0-auto" style="height:60vh;width: 100%;">
                                            <div class="va-middle pad-t-3em-m pad-b-3em-m">
                                                <form  method="POST" action="{{ route('register') }}" style="width: 80%; margin: 0 auto;">
                                                    {{ csrf_field() }}
                                                    <div style="font-size: 1.2em" class="mar-b-2em-m">Silahkan <span style="color: #00AA4E;"><b>Mendaftar</b></span> akun Anda</div>
                                                    
                                                    <section class="content mar-b-1em">
                                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                            <div class="col-md-6 pad-l-0 mar-b-1em pad-r-0-m">
                                                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama Lengkap">

                                                                @if ($errors->has('name'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                            <div class="col-md-6 pad-r-0 pad-l-0 mar-b-1em">
                                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Alamat E-mail">

                                                                @if ($errors->has('email'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                            <div class="col-md-6 pad-l-0 mar-b-1em pad-r-0-m">
                                                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                                                @if ($errors->has('password'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <div class="col-md-6 pad-r-0 pad-l-0 mar-b-1em">
                                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Konfirmasi Password">
                                                            </div>
                                                        </div>
                                                    </section>
                                                    
                                                    <footer style="padding: 0px;">
                                                        <button type="submit" class="btn btn-hijau-aerofood" style="width: 100%; padding: 10px 15px; margin-top: 0px;border-radius: 4px;">
                                                            <div style="float: left;">DAFTAR</div>
                                                            <div style="float: right;"><i class="fa fa-user" style="font-size:20px;"></i></div>
                                                        </button>
                                                    </footer>
                                                    <div><span style="color:#666;">Sudah punya akun?</span> <a href="{{route('login')}}">Masuk</a></div>
                                                    <div style="margin-top: 2em; font-size: 12px; color: #999;">Copyright &copy; AEROFOOD ACS INDONESIA - 2018</div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div class="container-fluid account">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="user-icon text-center"><i class="fa fa-user-plus"></i></div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Alamat E-mail">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Konfirmasi Password">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn col-md-12 register green">Daftar</button>    
                        </div>

                        <div class="col-md-12">
                            <span>Sudah punya akun? <a href="{{route('login')}}">Masuk</a></span>
                        </div>
                    </form>
                </div>
                
                 <div style="margin-top: 2em; font-size: 12px; color: #fff; text-align:center;">Copyright &copy; AEROFOOD ACS INDONESIA - 2018</div>
                
            </div>
        </div>
    </div>
</div>-->
@endsection
