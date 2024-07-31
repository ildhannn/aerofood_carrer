@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
            <div class="va-middle pad-b-1em-m ta-center-m"><h4 style=" margin:0px;"><i class="fa fa-file-pdf-o"></i>&nbsp;Unggah CV/Resume</h4></div>
        </div>
        <div class="section-content" style="padding:20px 30px;margin:0px;">
            <div class="row mar-b-0">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="text-muted">CV Sekarang</div>
                        <div class="photo" style="margin-top:10px;">
                            @if ($candidate->cv != '')
                                <a href="{{ asset('upload/candidates/' . md5($candidate->candidate_id . 'folder')) . '/' . $candidate->cv }}"
                                    target="_blank" class="btn btn-danger" style="text-transform:uppercase !important;"><i
                                        class="fa fa-file-pdf-o" style="width:auto !important;"></i>&nbsp;&nbsp;Lihat
                                    CV/Resume</a>
                            @else
                                <span id="error" style="display: none">Tidak ada CV!</span>
                            @endif
                        </div>
                        <!--<div class="photo" style="margin-top:10px;"><i class="text-muted fs-12">(Terakhir update CV/Resume: <b>{{ '20-03-2018' }}</b>)</i></div>-->
                    </div>
                    <!--<b>CV Sekarang:</b>-->
                </div>
                <div class="col-md-6">
                    <div class="form-group mar-b-0">
                        <form method="POST" action="{{ route('update-candidate-cv') }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-muted">
                                        Unggah CV/Resume Baru
                                        <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                                    </div>
                                    <div style="margin-top:10px;">
                                        <input id="cv" type="file" class="" name="cv" required placeholder="CV" accept="application/pdf">
                                        <div style="margin-top:10px;"><i class="text-muted fs-12">(Hanya menerima file
                                                dengan ekstensi <b>pdf</b> dan size <b>2MB</b>)</i></div>
                                        @if ($errors->has('cv'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cv') }}</strong>
                                            </span>
                                        @endif
                                        @if (Session::has('size'))
                                            <span class="help-block">
                                                <strong class='text-danger'>{{ Session::get('size') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mar-b-0">
                                <div class="col-md-12 text-right">
                                    <button class='btn btn-success' style="text-transform:uppercase !important;"><i
                                            class="fa fa-floppy-o" style="width:auto !important;"></i>&nbsp;&nbsp;Perbarui
                                        CV/Resume</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
