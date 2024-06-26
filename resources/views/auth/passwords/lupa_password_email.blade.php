@extends('layouts.main')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Lupa Password</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('lupa_password-email-post') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password Baru</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('confirm_new_password') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="confirm_new_password" required>
                                    @if ($errors->has('confirm_new_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('confirm_new_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
