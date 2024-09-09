<style>
    /*@font-face {
      font-family: 'FontAwesome';
      src: url('../fonts/fontawesome-webfont.eot?v=4.7.0');
      src: url('../fonts/fontawesome-webfont.eot?#iefix&v=4.7.0') format('embedded-opentype'), url('../fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'), url('../fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'), url('../fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'), url('../fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');
      font-weight: normal;
      font-style: normal;
    }*/
    .panel-title {
        cursor: pointer;
    }

    .panel-title.accordion-toggle:after {
        /* symbol for "opening" panels UP */
        font-family: 'FontAwesome';
        /* essential for enabling glyphicon */
        content: "\f077";
        /* adjust as needed, taken from bootstrap.css */
        float: right;
        /* adjust as needed */
        color: #fff;
        /* adjust as needed */
        transition: all 500ms;

    }

    .panel-title.accordion-toggle.collapsed:after {
        /* symbol for "collapsed" panels DOWN */
        content: "\f078";
        /* adjust as needed, taken from bootstrap.css */
        transition: all 500ms;
    }

    .panel-title.kualif:after {
        /* symbol for "opening" panels UP */
        font-family: 'FontAwesome';
        /* essential for enabling glyphicon */
        content: "\f046";
        /* adjust as needed, taken from bootstrap.css */
        float: right;
        /* adjust as needed */
        color: #fff;
        /* adjust as needed */
    }
</style>

@extends('layouts.main') @section('content')
    <div class="job-detail" style="min-height:625px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!--<div class="panel brief">
         <h4>{{ $job->title }}</h4>
         <div class="location"><small><i class="fa fa-map-marker"></i> {{ $job->city ? $job->city->city . ', ' . $job->province->province : '' }}</small></div>
        </div>-->
                    <div class="panel qualifications"style="padding-top:0px;">
                        <h4 class="panel-title kualif"
                            style="border-bottom:none; background:#034369;padding-top:20px; color:#fff; text-transform:uppercase;">
                            Kualifikasi</h4>
                        <div class="panel-content list-qualification">
                            <div class="item">
                                <i class="fa fa-birthday-cake"></i> Usia Minimal {{ $job->min_age }} tahun
                            </div>
                            <div class="item">
                                <i class="fa fa-graduation-cap"></i> Minimal {{ $job->min_education() }}
                            </div>
                            <div class="item">
                                <i class="fa fa-briefcase"></i> Pengalaman {{ $job->min_experience }} tahun
                            </div>
                        </div>
                        <br>
                        <!--<p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
                        </p>-->
                    </div>
                    <div class="panel" style="padding-bottom:0px;border:none;padding-top:0px;">
                        <h4 class="panel-title accordion-toggle collapsed" data-toggle="collapse"
                            href="#multiCollapseExample1"
                            style="border-bottom:none; background:#034369;padding-top:20px; color:#fff; text-transform:uppercase;">
                            Employment Type</h4>
                        <div class="row panel-content list-qualification" style="padding:0px;margin:0px;">
                            <div class="col">
                                <div class="collapse multi-collapse in" id="multiCollapseExample1" role="button"
                                    aria-expanded="false" aria-controls="multiCollapseExample1">
                                    <div class="card card-body" style="padding:15px 0px 10px 0px;">
                                        <ul>
                                            @foreach ($job->employmentTypes as $type)
                                                <li>{{ $type->type }}</li>
                                            @endforeach
                                            @if (Route::currentRouteName() == 'preview-job')
                                                @foreach ($request->employment_type as $type)
                                                    <li>{{ App\Models\EmploymentType::findorfail($type)->type }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel" style="padding-bottom:0px;border:none;padding-top:0px;">
                        <h4 class="panel-title accordion-toggle collapsed" data-toggle="collapse"
                            href="#multiCollapseExample2"
                            style="border-bottom:none; background:#034369;padding-top:20px; color:#fff; text-transform:uppercase;">
                            Benefit</h4>
                        <div class="row panel-content list-qualification" style="padding:0px;margin:0px;">
                            <div class="col">
                                <div class="collapse multi-collapse in" id="multiCollapseExample2" role="button"
                                    aria-expanded="false" aria-controls="multiCollapseExample2">
                                    <div class="card card-body" style="padding:15px 0px 10px 0px;">
                                        <ul>
                                            @foreach ($job->benefits as $benefit)
                                                <li>{{ $benefit->benefit }}</li>
                                            @endforeach
                                            @if (Route::currentRouteName() == 'preview-job')
                                                @foreach ($request->benefit as $benefit)
                                                    <li>{{ App\Models\Benefit::findorfail($benefit)->benefit }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 job-description">
                    @if (session('message'))
                        <div class="alert alert-info" role="alert">{!! session('message') !!}</div>
                    @endif
                    <?php
                    if (Route::currentRouteName() != 'preview-job') {
                        if (Auth::user() == null || !Auth::user()->admin) {
                            $job_saved = Auth::user() ? $job->isSaved(Auth::user()->candidate->id)->count() : 0;
                            $job_applied = Auth::user() ? $job->isApplied(Auth::user()->candidate->id)->count() : 0;
                        }
                    }
                    ?>
                    @if (Route::currentRouteName() != 'preview-job' && (Auth::user() == null || !Auth::user()->admin))
                        @if (($job_saved == 1 || $job_applied) && !session('message'))
                            @if ($job_applied == 1)
                                <div class="alert alert-success" role="alert">
                                    Lowongan ini sudah Anda lamar, untuk detail progress lamaran Anda, dapat dilihat di <a
                                        href="{{ route('candidate-job') }}">beranda</a> Anda
                                </div>
                            @else
                                <div class="alert alert-success" role="alert">
                                    Lowongan ini sudah sudah Anda simpan, untuk melihat lowongan lainnya yang sudah disimpan
                                    dapat dilihat di <a href="{{ route('candidate-job') }}">beranda</a> Anda
                                </div>
                            @endif
                        @endif
                    @endif
                    <div style="position:relative; margin-bottom:15.5em;" class="hidden-xs">
                        <div style="position:absolute; z-index:0;"><img src="{{ asset('img/bg-detail.jpg') }}"
                                width="100%"></div>
                        <div
                            style="position:absolute; z-index:0; top:25px; width:640px; left:50%; margin-left:-320px; text-align:center;">
                            <div><img src="{{ asset('img/logo-white.png') }}" width="120px"></div>
                            <div style="margin:0 auto; text-align:center;">
                                <div style="width:100px; height:1px; background:rgba(255,255,255,0.2); margin:10px auto;">
                                </div>
                            </div>
                            <div style="text-transform:uppercase; color:#fff; font-size:25px;">{{ $job->title }}</div>
                            <div style="color:#fff; font-size:15px;">
                                <div class="location"><small><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Aerofood
                                        unit:&nbsp;&nbsp;{{ isset($unit) ? $unit->unit : '' }}<br /><b>{{ $job->city ? $job->city->city . ', ' . $job->province->province : '' }}</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MOBILE VERSION -->
                    <div style="position:relative; margin-bottom:1.5em;background:url('{{ asset('img/bg-detail.jpg') }}'); padding:1.5em;"
                        class="visible-xs-block">
                        <!-- <div><img src="{{ asset('img/bg-detail.jpg') }}" width="100%"></div> -->
                        <div style="text-align:center;">
                            <div><img src="{{ asset('img/logo-white.png') }}" width="120px"></div>
                            <div style="margin:0 auto; text-align:center;">
                                <div style="width:100px; height:1px; background:rgba(255,255,255,0.2); margin:10px auto;">
                                </div>
                            </div>
                            <div
                                style="text-transform:uppercase; color:#fff; font-size:20px;line-height: 22px;margin-bottom: 1em;">
                                {{ $job->title }}</div>
                            <div style="color:#fff; font-size:13px;">
                                <div class="location"><small><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Aerofood
                                        unit:&nbsp;&nbsp;{{ isset($unit) ? $unit->unit : '' }}<br /><b>{{ $job->city ? $job->city->city . ', ' . $job->province->province : '' }}</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel" style="padding-bottom:20px;border:none;padding-top:0px;">
                        <div class='panel-title' style="padding: 10px 20px 10px 20px; background:#dcdcdc;">
                            <div class="va-table width-100">
                                <div class="va-middle pad-b-1em-m ta-center-m">
                                    <h4><i class="fa fa-briefcase"></i>&nbsp;Informasi Pekerjaan</h4>
                                </div>
                                @if (Route::currentRouteName() != 'preview-job' && (Auth::user() == null || !Auth::user()->admin))
                                    @if ($job_applied == 0 && Route::currentRouteName() != 'preview-job')
                                        <div class="va-middle dis-tab-row-m ta-right ta-center-m"
                                            style="text-transform:uppercase !important;">
                                            <!--<button class="btn btn-success" style="text-transform:uppercase !important;">Lamar Sekarang</button>-->
                                            <form action='{{ Auth::user() ? route('apply') : route('register') }}'
                                                method="{{ Auth::user() ? 'POST' : 'GET' }}" class='pull-right mar-b-0'
                                                id='lamar-form'>
                                                {{ csrf_field() }}
                                                @if (Auth::user())
                                                    @if (Auth::user()->candidate->job($job->id)->get()->count() == 0)
                                                        <input type="hidden" name="job_id"
                                                            value='{{ $job->job_id }}'>
                                                        <input type="hidden" name="candidate_id"
                                                            value="{{ Auth::user()->candidate->candidate_id }}">
                                                        <button class="btn btn-success lamar"
                                                            style="text-transform:uppercase !important;"><i
                                                                class="fa fa-envelope"></i>&nbsp;&nbsp;Lamar
                                                            Sekarang</button>
                                                    @endif

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="lamar" tabindex="-1" role="dialog"
                                                        aria-labelledby="modal">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="text-align:center;background:{{ Auth::user()->candidate->isProfileComplete() ? '#dcdcdc' : 'red' }};    ">
                                                                    @if (Auth::user()->candidate->isProfileComplete())
                                                                        Lamar Pekerjaan ini Sekarang!
                                                                    @else
                                                                        <span style="color: white">Tidak Bisa Melamar
                                                                            Lowongan Ini</span>
                                                                    @endif
                                                                    <!--<h4>Pastikan Profil Anda Sudah Lengkap Sebelum Melamar<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4>-->

                                                                </div>
                                                                <div class="modal-body" style="text-align:center">
                                                                    @if (Auth::user()->candidate->isProfileComplete())
                                                                        <span style="text-transform: capitalize;">Apakah
                                                                            Anda yakin untuk melamar lowongan ini?</span>
                                                                    @else
                                                                        <span style="text-transform: capitalize;"><b>Profile
                                                                                Anda Belum Lengkap</b><br> Lengkapi profile
                                                                            Anda untuk melamar lowongan ini</span>
                                                                    @endif
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <a class='btn btn-danger cancel-apply' href='#'
                                                                        style='width: 100px;'><i
                                                                            class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
                                                                    @if (Auth::user()->candidate->isProfileComplete())
                                                                        <a class='btn btn-success apply-job'><i
                                                                                class="fa fa-envelope"></i>&nbsp;&nbsp;Lamar
                                                                            Lowongan</a>
                                                                    @else
                                                                        <a class='btn btn-primary'
                                                                            href="{{ route('candidate-profile') }}"><i
                                                                                class="fa fa-user"></i>&nbsp;&nbsp;Lengkapi
                                                                            Profil</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="lamar-incomplete" tabindex="-1"
                                                        role="dialog" aria-labelledby="modal">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="text-align:center;background:#dcdcdc;    ">
                                                                    Data profile Anda belum lengkap
                                                                    <!--<h4>Pastikan Profil Anda Sudah Lengkap Sebelum Melamar<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4>-->

                                                                </div>
                                                                <div class="modal-body" style="text-align:center">
                                                                    <span style="text-transform: capitalize;">Anda perlu
                                                                        mengunggah CV anda terlebih dahulu sebelum
                                                                        melamar</span>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <a class='btn btn-danger cancel-apply' href='#'
                                                                        style='width: 100px;'><i
                                                                            class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
                                                                    <a target="_blank"
                                                                        class='btn btn-success cancel-apply'
                                                                        href='/profile/cv'><i
                                                                            class="fa fa-envelope"></i>&nbsp;&nbsp;Unggah
                                                                        CV</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <input type="hidden" name="url_intended"
                                                        value="{{ Request::path() }}">
                                                    <button class="btn btn-success lamar"
                                                        style="text-transform:uppercase !important;"><i
                                                            class="fa fa-envelope"></i>&nbsp;&nbsp;Lamar Sekarang</button>
                                                @endif

                                            </form>
                                            @if (Auth::user())
                                                @if ($job_saved == 0)
                                                    <form
                                                        action='{{ Auth::user() ? route('save-job') : route('register') }}'
                                                        method="{{ Auth::user() ? 'POST' : 'GET' }}"
                                                        class='save-job pull-right mar-b-0'>
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="job_id"
                                                            value='{{ $job->job_id }}'>
                                                        <input type="hidden" name="candidate_id"
                                                            value="{{ Auth::user()->candidate->candidate_id }}">
                                                        <button class="btn btn-primary"
                                                            style="text-transform:uppercase !important;"><i
                                                                class="fa fa-floppy-o"></i>&nbsp;&nbsp;Simpan
                                                            lowongan</button>
                                                    </form>
                                                @endif
                                            @endif
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="panel-content">
                            {!! $job->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@push('scripts')
    <script type="text/javascript">
        $(function() {
            $('button.lamar').click(function(e) {
                @if (Auth::user())
                    e.preventDefault()
                @endif ()
                $('#lamar').modal('show')
                $('.apply-job').click(function() {
                    $.ajax({
                        data: null,
                        type: 'GET',
                        url: "{{ route('isHasCV') }}",
                        success: function(data) {
                            if (data == 1) {
                                $('#lamar-form').submit()
                            } else {
                                $('#lamar').modal('hide')
                                $('#lamar-incomplete').modal('show')
                            }
                        }
                    });
                    //$('#lamar-form').submit()
                })
                $('.cancel-apply').click(function() {
                    $('#lamar').modal('hide')
                    $('#lamar-incomplete').modal('hide')
                })
            })

            @if (Session::get('popup') == 'lamar')
                $('button.lamar').click()
            @endif
        })
    </script>
@endpush
