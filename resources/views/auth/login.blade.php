<!--@extends('layouts.main')-->

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
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    
    .border {
         border-bottom: 10px solid #C1D72F; border-right: 10px solid #014990; border-bottom: 10px solid #00AA4E;
    }

</style>

<link rel="stylesheet" href="{{ asset('asset/input-anim/set2.css') }}" type="text/css">
<script src="{{ asset('asset/input-anim/classie.js') }}" type="text/javascript"></script>

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
                                                    <div class="lh-1k2em" style="font-size: 2.2em; color:#048842; letter-spacing:5px;"><b>SIERA SIGN IN</b></div>
                                                    <div class="lh-1k2em" style="font-size: 1em; color:#666;">Sistem Informasi e-Recruitment Aerofood</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5" style="background:rgba(255,255,255,.9);padding-left: 0px; padding-right: 0px; border-top-right-radius: 4px;">
                                        <div class="va-table mar-0-auto" style="height:60vh;width: 100%;">
                                            <div class="va-middle pad-t-3em-m pad-b-3em-m">
                                                <form  method="POST" action="{{ route('login') }}" style="width: 80%; margin: 0 auto;">
                                                    {{ csrf_field() }}
                                                    <div style="font-size: 1.2em">Please <span style="color: #00AA4E;"><b>Login</b></span> to your account</div>
                                                    
                                                    <!--<section class="content bgcolor-4">
                                                        <span class="input input--kozakura">
                                                            <input class="input__field input__field--kozakura" type="text" id="input-7" />
                                                            <label class="input__label input__label--kozakura" for="input-7">
                                                                <span class="input__label-content input__label-content--kozakura" data-content="Name">Name</span>
                                                            </label>
                                                            <svg class="graphic graphic--kozakura" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                                                <path d="M1200,9c0,0-305.005,0-401.001,0C733,9,675.327,4.969,598,4.969C514.994,4.969,449.336,9,400.333,9C299.666,9,0,9,0,9v43c0,0,299.666,0,400.333,0c49.002,0,114.66,3.484,197.667,3.484c77.327,0,135-3.484,200.999-3.484C894.995,52,1200,52,1200,52V9z"/>
                                                            </svg>
                                                        </span>
                                                        <span class="input input--kozakura">
                                                            <input class="input__field input__field--kozakura" type="text" id="input-8" />
                                                            <label class="input__label input__label--kozakura" for="input-8">
                                                                <span class="input__label-content input__label-content--kozakura" data-content="Email">Email</span>
                                                            </label>
                                                            <svg class="graphic graphic--kozakura" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                                                <path d="M1200,9c0,0-305.005,0-401.001,0C733,9,675.327,4.969,598,4.969C514.994,4.969,449.336,9,400.333,9C299.666,9,0,9,0,9v43c0,0,299.666,0,400.333,0c49.002,0,114.66,3.484,197.667,3.484c77.327,0,135-3.484,200.999-3.484C894.995,52,1200,52,1200,52V9z"/>
                                                            </svg>
                                                        </span>
                                                    </section>-->
                                                    
                                                    
                                                    
                                                    <!--<section class="content">
                                                        <span class="input input--yoshiko">
                                                            <input class="input__field input__field--yoshiko" type="text" id="input-10" />
                                                            <label class="input__label input__label--yoshiko" for="input-10">
                                                                <span class="input__label-content input__label-content--yoshiko" data-content="Bird's Color">Bird's Color</span>
                                                            </label>
                                                        </span>
                                                        <span class="input input--yoshiko">
                                                            <input class="input__field input__field--yoshiko" type="text" id="input-11" />
                                                            <label class="input__label input__label--yoshiko" for="input-11">
                                                                <span class="input__label-content input__label-content--yoshiko" data-content="Wing Span">Wing Span</span>
                                                            </label>
                                                        </span>
                                                        <span class="input input--yoshiko">
                                                            <input class="input__field input__field--yoshiko" type="text" id="input-12" />
                                                            <label class="input__label input__label--yoshiko" for="input-12">
                                                                <span class="input__label-content input__label-content--yoshiko" data-content="Beak Length">Beak Length</span>
                                                            </label>
                                                        </span>
                                                    </section>-->
                                                    
                                                    <section class="content mar-b-1em">
                                                        <span class="input input--nariko">
                                                            <input id="email" type="email" class="input__field input__field--nariko" name="email" value="{{ old('email') }}" required autofocus>                                                           
                                                            <!--<input class="input__field input__field--nariko" type="text" id="input-20" />-->
                                                            <label class="input__label input__label--nariko" for="email" style="margin-bottom:0px;">
                                                                <span class="input__label-content input__label-content--nariko">Email</span>
                                                            </label>
                                                        </span>                                                           
                                                        @if ($errors->has('email'))
                                                            <div class="help-block" style="color:#F00;">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </div>
                                                        @endif
                                                        <span class="input input--nariko">
                                                            <input id="password" type="password" class="input__field input__field--nariko" name="password" required>
                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                            <!--<input class="input__field input__field--nariko" type="text" id="input-21" />-->
                                                            <label class="input__label input__label--nariko" for="password" style="margin-bottom:0px;">
                                                                <span class="input__label-content input__label-content--nariko">Password</span>
                                                            </label>
                                                        </span>
                                                    </section>
                                                    
                                                    <!--<fieldset>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Alamat E-mail" aria-describedby="basic-addon1">                                                               

                                                                @if ($errors->has('email'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon" id="basic-addon2"><i class="fa fa-lock"></i></span>
                                                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password" aria-describedby="basic-addon2">
                                                                
                                                                @if ($errors->has('password'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </fieldset>-->
                                                    
                                                    <script>    
                                                        (function() {
                                                            // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
                                                            if (!String.prototype.trim) {
                                                                (function() {
                                                                    // Make sure we trim BOM and NBSP
                                                                    var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                                                                    String.prototype.trim = function() {
                                                                        return this.replace(rtrim, '');
                                                                    };
                                                                })();
                                                            }

                                                            [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
                                                                // in case the input is already filled..
                                                                if( inputEl.value.trim() !== '' ) {
                                                                    classie.add( inputEl.parentNode, 'input--filled' );
                                                                }

                                                                // events:
                                                                inputEl.addEventListener( 'focus', onInputFocus );
                                                                inputEl.addEventListener( 'blur', onInputBlur );
                                                            } );

                                                            function onInputFocus( ev ) {
                                                                classie.add( ev.target.parentNode, 'input--filled' );
                                                            }

                                                            function onInputBlur( ev ) {
                                                                if( ev.target.value.trim() === '' ) {
                                                                    classie.remove( ev.target.parentNode, 'input--filled' );
                                                                }
                                                            }
                                                        })();
                                                    </script>
                                                    <footer style="padding: 0px;">
                                                        <button type="submit" class="btn btn-hijau-aerofood" style="width: 100%; padding: 10px 15px; margin-top: 0px;border-radius: 4px;" ng-click="login()">
                                                            <div style="float: left;">SIGN IN</div>
                                                            <div style="float: right;"><i class="fa fa-sign-in" style="font-size:20px;"></i></div>
                                                        </button>
                                                    </footer>
                                                    <div><span style="color:#666;">Belum punya akun?</span> <a href="{{route('register')}}">Daftar</a></div>
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
@endsection
