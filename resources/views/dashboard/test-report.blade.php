@extends('layouts.dashboard')

<style>
    .masonry {
        display: block;
        -webkit-column-gap: 2.25rem;
        -moz-column-gap: 2.25rem;
        column-gap: auto;
    }

    /* 5 columns */
    .masonry.masonry-columns-5 {
        -webkit-column-count: 5;
        -moz-column-count: 5;
        column-count: 5;
    }

    @media(max-width: 1170px) {
        .masonry.masonry-columns-5 {
            -webkit-column-count: 4;
            -moz-column-count: 4;
            column-count: 4;
        }
    }


    /*-4 columns------*/
    .masonry.masonry-columns-4 {
        -webkit-column-count: 4;
        -moz-column-count: 4;
        column-count: 4;
    }

    /*-3 columns------*/
    .masonry.masonry-columns-3 {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
    }

    /*-2 columns------*/
    .masonry.masonry-columns-2 {
        -webkit-column-count: 2;
        -moz-column-count: 2;
        column-count: 2;
    }

    /*-1 columns------*/
    .masonry.masonry-columns-1 {
        -webkit-column-count: 1;
        -moz-column-count: 1;
        column-count: 1;
    }


    /*--------Responsive---------*/
    @media(max-width: 991px) {

        .masonry.masonry-columns-4,
        .masonry.masonry-columns-5 {
            -webkit-column-count: 3;
            -moz-column-count: 3;
            column-count: 3;
        }
    }

    @media(max-width: 767px) {

        .masonry.masonry-columns-4,
        .masonry.masonry-columns-5,
        .masonry.masonry-columns-3 {
            -webkit-column-count: 2;
            -moz-column-count: 2;
            column-count: 2;
        }
    }

    @media(max-width: 540px) {

        .masonry.masonry-columns-4,
        .masonry.masonry-columns-5,
        .masonry.masonry-columns-3,
        .masonry.masonry-columns-2 {
            -webkit-column-count: 1;
            -moz-column-count: 1;
            column-count: 1;
        }
    }

    .masonry .masonry-item {
        display: inline-block !important;
        width: 100% !important;
        max-width: 100% !important;
        position: relative;
        display: block;
        padding: 3px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        border-radius: .25rem;
        float: none !important;
        margin-right: 0 !important;
        margin-bottom: 0 !important;
        /* margin-bottom: 2.25rem !important; */
    }

    .masonry .masonry-item {
        display: inline-block;
        margin-bottom: 20px;
        width: 100%;
        /* padding: 10px; */
        border: 1px solid transparent;
        transition: all 0.4s ease-in-out;
    }

    .masonry .masonry-item:hover {
        border: 1px solid #f0f0f0;
    }

    .masonry .masonry-item .post-title {
        font-size: 20px;
    }

    .masonry .masonry-item .post-info {
        color: #999;
        text-transform: uppercase;
    }

    .masonry .masonry-item p {
        color: #666;
    }

    .masonry .masonry-item .read-more {
        color: #27c2aa;
    }

    .masonry .masonry-item .tag-comment {
        border-top: 1px solid #f0f0f0;
        margin-top: 10px;
        padding: 5px 0;
        color: #999;
    }
</style>

@section('breadcrumb')
    <b><a href="{{ route('dashboard-jobs') }}">Lowongan</a></b>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;
    <b><a href="{{ route('detail-job', $job->id) }}">{{ $job->title }}</a></b>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;
    <b>{{ $candidate->user->name }}</b>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;
    <b>Hasil Test</b>
@stop

@section('content')
    <div class="header-sub">
        <div class="va-table width-100" style="font-size: 1.5em">
            <div class="va-middle width-50">HASIL TEST</div>
            <div class="va-middle width-50 ta-right">
                <i class="fa fa-user-circle-o"></i>&nbsp;&nbsp;Kandidat: <b>{{ $candidate->user->name }}</b>
                @if ($candidate->pivot->progress == 2 && $candidate->pivot->status == 33)
                    <span class="label label-danger"><i>Tidak lanjut ke tahap berikutnya</i></span>
                @elseif($candidate->pivot->progress > 2)
                    <span class="label label-info">Lolos</span>
                @endif
            </div>
        </div>
    </div>
    <div class="panel" style="border-top: none;">

        <span class="pull-right">
            @if ($candidate->pivot->progress == 2 && $candidate->pivot->status == 0)
                <form method='POST' action='{{ route('fail-candidates') }}'>
                    {{ csrf_field() }}
                    <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                    <input type="hidden" name="step_id" value="2">
                    <button class='btn btn-danger'>Gagal&nbsp;&nbsp;<i class="fa fa-close"></i></button>
                </form>
                <form method='POST' action='{{ route('pass-candidates') }}'>
                    {{ csrf_field() }}
                    <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                    <input type="hidden" name="step_id" value="2">
                    <button class='btn btn-success'>Lolos&nbsp;&nbsp;<i class="fa fa-check-circle"></i></button>
                </form>
            @endif
        </span>

        <ul class="nav nav-tabs sub-tab text-center" role='tab-list' id='tabs'>
            <li role="presentation" class="active"><a href="#mbti">Work Behaviour 1</a></li>
            <li role="presentation"><a href="#disc">Work Behaviour 2</a></li>
            <li role="presentation"><a href="#papi">Work Behaviour 3</a></li>
            @if ($job->has_intelligence_test)
                <li role="presentation"><a href="#intel">General Ability Test</a></li>
            @endif
        </ul>

        <div class="tab-content">
            <div class="list-item tab-pane active" role='tab-panel' id='mbti'>
                <h3 align="center" class="text-primary">WORK BEHAVIOUR 1</h3>
                @if ($candidate->jobTestAnswers($job->id, 1)->count() == 60)
                    <div class="mbti-result text-center mar-1em" style="background: #f2f2f2;">
                        <p class='tagline'>"{{ $mbti->tagline }}"</p>
                        <div class='type'>{{ $mbti->type }}</div>
                        <p>{{ $mbti->character }}</p>
                    </div>
                    <div class="mean">
                        <h4 style="background: #f2f2f2; padding:0px 20px;">Arti</h4>
                        <p class="pad-1em">{{ $mbti->trait }}</p>
                    </div>
                    <div class="explaination">
                        <h4 style="background: #f2f2f2; padding:0px 20px;">Penjelasan</h4>
                        <ul class="pad-2em" style="margin-left: 2em;">
                            @foreach ($mbti->explanations as $explain)
                                <li>{{ $explain->explanation }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="development">
                        <h4 style="background: #f2f2f2; padding:0px 20px;">Saran Pengembangan</h4>
                        <ul class="pad-2em" style="margin-left: 2em;">
                            @foreach ($mbti->developments as $develop)
                                <li>{{ $develop->development }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="position">
                        <h4 style="background: #f2f2f2; padding:0px 20px;">Saran Profesi/Jabatan</h4>
                        <p class="pad-1em">{{ $mbti->position }}</p>
                    </div>
                    <div class="partner">
                        <h4 style="background: #f2f2f2; padding:0px 20px;">Tipe Partner Kerja</h4>
                        <p class="pad-1em"><span class="label label-default fs-16">{{ $mbti->partner }}</span></p>
                    </div>
                @else
                    <h4 align="center" class="label-warning"><i class="fa fa-warning"></i>&nbsp;&nbsp;Belum melaksanakan
                        test</h4>
                @endif

            </div>
            <div class="list-item tab-pane" role='tab-panel' id='disc'>
                <h3 align="center" class="text-primary">WORK BEHAVIOUR 2</h3>

                @if ($candidate->jobTestAnswers($job->id, 2)->count() == 48)
                    <div class="container-fluid pad-1em">
                        <div style="margin: auto; width:100%;">
                            <table style="margin:0 auto; width:100%;" border="1">
                                <thead>
                                    <tr>
                                        <th colspan="5" align="center"
                                            style="text-align: center;padding: 1em; width:50%; background: #F00;">MOST</th>
                                        <th colspan="5" align="center"
                                            style="text-align: center;padding: 1em; width:50%; background: #0F0;">LEAST</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center" class="text-muted">D</td>
                                        <td align="center" class="text-muted">I</td>
                                        <td align="center" class="text-muted">S</td>
                                        <td align="center" class="text-muted">C</td>
                                        <td align="center" class="text-muted">B</td>
                                        <td align="center" class="text-muted">D</td>
                                        <td align="center" class="text-muted">I</td>
                                        <td align="center" class="text-muted">S</td>
                                        <td align="center" class="text-muted">C</td>
                                        <td align="center" class="text-muted">B</td>
                                    </tr>
                                    <tr>
                                        <td align="center" data-dm="{{ $disc['dm'] }}" style="background: #f2f2f2;">
                                            <b>{{ $disc['dm'] }}</b>
                                        </td>
                                        <td align="center" data-im="{{ $disc['im'] }}" style="background: #f2f2f2;">
                                            <b>{{ $disc['im'] }}</b>
                                        </td>
                                        <td align="center" data-sm="{{ $disc['sm'] }}" style="background: #f2f2f2;">
                                            <b>{{ $disc['sm'] }}</b>
                                        </td>
                                        <td align="center" data-cm="{{ $disc['cm'] }}" style="background: #f2f2f2;">
                                            <b>{{ $disc['cm'] }}</b>
                                        </td>
                                        <td align="center" data-bm="{{ $disc['bm'] }}" style="background: #f2f2f2;">
                                            <b>{{ $disc['bm'] }}</b>
                                        </td>
                                        <td align="center" data-dl="{{ $disc['dl'] }}" style="background: #f2f2f2;">
                                            <b>{{ $disc['dl'] }}</b>
                                        </td>
                                        <td align="center" data-il="{{ $disc['il'] }}" style="background: #f2f2f2;">
                                            <b>{{ $disc['il'] }}</b>
                                        </td>
                                        <td align="center" data-sl="{{ $disc['sl'] }}" style="background: #f2f2f2;">
                                            <b>{{ $disc['sl'] }}</b>
                                        </td>
                                        <td align="center" data-cl="{{ $disc['cl'] }}" style="background: #f2f2f2;">
                                            <b>{{ $disc['cl'] }}</b>
                                        </td>
                                        <td align="center" data-bl="{{ $disc['bl'] }}" style="background: #f2f2f2;">
                                            <b>{{ $disc['bl'] }}</b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="graphic">
                            <div class="row">
                                <div class="col-sm-4">
                                    <canvas id="mostGraph" width="400" height="400"></canvas>
                                    <div class="result-most text-center"></div>
                                </div>

                                <div class="col-sm-4">
                                    <canvas id="leastGraph" width="400" height="400"></canvas>
                                    <div class="result-least text-center"></div>
                                </div>

                                <div class="col-sm-4">
                                    <canvas id="changeGraph" width="400" height="400"></canvas>
                                    <div class="result-change text-center"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                @else
                    <h4 align="center" class="label-warning"><i class="fa fa-warning"></i>&nbsp;&nbsp;Belum melaksanakan
                        test</h4>
                @endif

            </div>
            <div class="list-item tab-pane" role='tab-panel' id='papi'>
                <h3 align="center" class="text-primary">WORK BEHAVIOUR 3</h3>

                @if ($candidate->jobTestAnswers($job->id, 3)->count() == 90)
                    @if (session('unit') == 1)
                        <div class="container-fluid">
                            <div class="row header">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-4 point">&nbsp</div>
                                <div class="col-sm-1 point text-center">CODE</div>
                                <div class="col-sm-1 point text-center">SCORE</div>
                                <div class="col-sm-3 point text-center">ANALISIS</div>
                            </div>
                            <div class="result-content pad-1em">
                                <div class="row">
                                    <div class="col-sm-3"><b>ARAH KERJA</b></div>
                                    <div class="col-sm-4 point">
                                        <div class="row">Ketekunan/Gigih</div>
                                        <div class="row">Kemauan bekerja keras</div>
                                        <div class="row">Motivasi berprestasi</div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="row">N</div>
                                        <div class="row">G</div>
                                        <div class="row">A</div>

                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="papiscore row" data-N="{{ $papi['N']['score'] }}"
                                            data-label="Ketekunan/Gigih">{{ $papi['N']['score'] }}</div>
                                        <div class="papiscore row" data-G="{{ $papi['G']['score'] }}"
                                            data-label="Kemauan bekerja keras">{{ $papi['G']['score'] }}</div>
                                        <div class="papiscore row" data-A="{{ $papi['A']['score'] }}"
                                            data-label="Motivasi berprestasi">{{ $papi['A']['score'] }}</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">{{ $papi['N']['analisis'] }}</div>
                                        <div class="row">{{ $papi['G']['analisis'] }}</div>
                                        <div class="row">{{ $papi['A']['analisis'] }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><b>KEPEMIMPINAN</b></div>
                                    <div class="col-sm-4 point">
                                        <div class="row">Kemampuan mendelegasikan tugas</div>
                                        <div class="row">Kemampuan mengontrol & mengelola</div>
                                        <div class="row">Pengambilan Keputusan</div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="row">L</div>
                                        <div class="row">P</div>
                                        <div class="row">I</div>

                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="papiscore row" data-L="{{ $papi['L']['score'] }}"
                                            data-label="Kemampuan mendelegasikan tugas">{{ $papi['L']['score'] }}</div>
                                        <div class="papiscore row" data-P="{{ $papi['P']['score'] }}"
                                            data-label="Kemampuan mengontrol & mengelola">{{ $papi['P']['score'] }}</div>
                                        <div class="papiscore row" data-I="{{ $papi['I']['score'] }}"
                                            data-label="Pengambilan Keputusan">{{ $papi['I']['score'] }}</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">{{ $papi['L']['analisis'] }}</div>
                                        <div class="row">{{ $papi['P']['analisis'] }}</div>
                                        <div class="row">{{ $papi['I']['analisis'] }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><b>AKTIFITAS</b></div>
                                    <div class="col-sm-4 point">
                                        <div class="row">Aktif (Sibuk)</div>
                                        <div class="row">Semangat dalam bekerja</div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="row">T</div>
                                        <div class="row">V</div>

                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="papiscore row" data-T="{{ $papi['T']['score'] }}"
                                            data-label="Aktif (Sibuk)">{{ $papi['T']['score'] }}</div>
                                        <div class="papiscore row" data-V="{{ $papi['V']['score'] }}"
                                            data-label="Semangat dalam bekerja">{{ $papi['V']['score'] }}</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">{{ $papi['T']['analisis'] }}</div>
                                        <div class="row">{{ $papi['V']['analisis'] }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><b>PERGAULAN</b></div>
                                    <div class="col-sm-4 point">
                                        <div class="row">Kebutuhan untuk diperhatikan</div>
                                        <div class="row">Kepercayaan diri</div>
                                        <div class="row">Kemampuan bekerjasama</div>
                                        <div class="row">Peka terhadap perasaan orang lain</div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="row">X</div>
                                        <div class="row">S</div>
                                        <div class="row">B</div>
                                        <div class="row">O</div>

                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="papiscore row" data-X="{{ $papi['X']['score'] }}"
                                            data-label="Kebutuhan untuk diperhatikan">{{ $papi['X']['score'] }}</div>
                                        <div class="papiscore row" data-S="{{ $papi['S']['score'] }}"
                                            data-label="Kepercayaan diri">{{ $papi['S']['score'] }}</div>
                                        <div class="papiscore row" data-B="{{ $papi['B']['score'] }}"
                                            data-label="Kemampuan bekerjasama">{{ $papi['B']['score'] }}</div>
                                        <div class="papiscore row" data-O="{{ $papi['O']['score'] }}"
                                            data-label="Peka terhadap perasaan orang lain">{{ $papi['O']['score'] }}</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">{{ $papi['X']['analisis'] }}</div>
                                        <div class="row">{{ $papi['S']['analisis'] }}</div>
                                        <div class="row">{{ $papi['B']['analisis'] }}</div>
                                        <div class="row">{{ $papi['O']['analisis'] }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><b>GAYA KERJA</b></div>
                                    <div class="col-sm-4 point">
                                        <div class="row">Tipe teoritik</div>
                                        <div class="row">Ketelitian dan konsentrasi</div>
                                        <div class="row">Kemampuan merencanakan sesuatu</div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="row">R</div>
                                        <div class="row">D</div>
                                        <div class="row">C</div>

                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="papiscore row" data-R="{{ $papi['R']['score'] }}"
                                            data-label="Tipe teoritik">{{ $papi['R']['score'] }}</div>
                                        <div class="papiscore row" data-D="{{ $papi['D']['score'] }}"
                                            data-label="Ketelitian dan konsentrasi">{{ $papi['D']['score'] }}</div>
                                        <div class="papiscore row" data-C="{{ $papi['C']['score'] }}"
                                            data-label="Kemampuan merencanakan sesuatu">{{ $papi['C']['score'] }}</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">{{ $papi['R']['analisis'] }}</div>
                                        <div class="row">{{ $papi['D']['analisis'] }}</div>
                                        <div class="row">{{ $papi['C']['analisis'] }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><b>SIFAT / TEMPRAMEN</b></div>
                                    <div class="col-sm-4 point">
                                        <div class="row">Kemampuan untuk berubah (adaptasi)</div>
                                        <div class="row">Stabilitas emosi</div>
                                        <div class="row">Agresif</div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="row">Z</div>
                                        <div class="row">E</div>
                                        <div class="row">K</div>

                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="papiscore row" data-Z="{{ $papi['Z']['score'] }}"
                                            data-label="Kemampuan untuk berubah (adaptasi)">{{ $papi['Z']['score'] }}
                                        </div>
                                        <div class="papiscore row" data-E="{{ $papi['E']['score'] }}"
                                            data-label="Stabilitas emosi">{{ $papi['E']['score'] }}</div>
                                        <div class="papiscore row" data-K="{{ $papi['K']['score'] }}"
                                            data-label="Agresif">{{ $papi['K']['score'] }}</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">{{ $papi['Z']['analisis'] }}</div>
                                        <div class="row">{{ $papi['E']['analisis'] }}</div>
                                        <div class="row">{{ $papi['K']['analisis'] }}</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"><b>KETAATAN</b></div>
                                    <div class="col-sm-4 point">
                                        <div class="row">Kemandirian</div>
                                        <div class="row">Mengikuti aturan yang ada</div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="row">F</div>
                                        <div class="row">W</div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="papiscore row" data-F="{{ $papi['F']['score'] }}"
                                            data-label="Kemandirian">{{ $papi['F']['score'] }}</div>
                                        <div class="papiscore row" data-W="{{ $papi['W']['score'] }}"
                                            data-label="Mengikuti aturan yang ada">{{ $papi['W']['score'] }}</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">{{ $papi['F']['analisis'] }}</div>
                                        <div class="row">{{ $papi['W']['analisis'] }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 align="center">GRAFIK</h3>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <canvas height="400" width='400' id='papigraph'></canvas>
                                </div>
                            </div>
                        </div>
                    @endif

                    <h3 align="center">PENJELASAN</h3>
                    <!-- <h3>PENJELASAN</h3> -->

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="masonry masonry-columns-2">
                                    @foreach ($papi as $result)
                                        @if ($loop->iteration == 1)
                                            <div class="masonry-item">
                                                <div class="category"
                                                    style="width:auto;padding: 1em;margin: 0px 0px 20px 0px;">
                                                    <h4
                                                        style="background: #666;color: #fff; margin: -14px -14px 20px -14px;text-align: center;">
                                                        <strong>ARAH KERJA</strong>
                                                    </h4>
                                                @elseif($loop->iteration == 4)
                                                </div>
                                            </div>
                                            <div class="masonry-item">
                                                <div class="category"
                                                    style="width:auto;padding: 1em;margin: 0px 0px 20px 0px;">
                                                    <h4
                                                        style="background: #666;color: #fff; margin: -14px -14px 20px -14px;text-align: center;">
                                                        <strong>KEPEMIMPINAN</strong>
                                                    </h4>
                                                @elseif($loop->iteration == 7)
                                                </div>
                                            </div>
                                            <div class="masonry-item">
                                                <div class="category"
                                                    style="width:auto;padding: 1em;margin: 0px 0px 20px 0px;">
                                                    <h4
                                                        style="background: #666;color: #fff; margin: -14px -14px 20px -14px;text-align: center;">
                                                        <strong>AKTIFITAS</strong>
                                                    </h4>
                                                @elseif($loop->iteration == 9)
                                                </div>
                                            </div>
                                            <div class="masonry-item">
                                                <div class="category"
                                                    style="width:auto;padding: 1em;margin: 0px 0px 20px 0px;">
                                                    <h4
                                                        style="background: #666;color: #fff; margin: -14px -14px 20px -14px;text-align: center;">
                                                        <strong>PERGAULAN</strong>
                                                    </h4>
                                                @elseif($loop->iteration == 13)
                                                </div>
                                            </div>
                                            <div class="masonry-item">
                                                <div class="category"
                                                    style="width:auto;padding: 1em;margin: 0px 0px 20px 0px;">
                                                    <h4
                                                        style="background: #666;color: #fff; margin: -14px -14px 20px -14px;text-align: center;">
                                                        <strong>GAYA KERJA</strong>
                                                    </h4>
                                                @elseif($loop->iteration == 16)
                                                </div>
                                            </div>
                                            <div class="masonry-item">
                                                <div class="category"
                                                    style="width:auto;padding: 1em;margin: 0px 0px 20px 0px;">
                                                    <h4
                                                        style="background: #666;color: #fff; margin: -14px -14px 20px -14px;text-align: center;">
                                                        <strong>SIFAT/TEMPRAMEN</strong>
                                                    </h4>
                                                @elseif($loop->iteration == 19)
                                                </div>
                                            </div>
                                            <div class="masonry-item">
                                                <div class="category"
                                                    style="width:auto;padding: 1em;margin: 0px 0px 20px 0px;">
                                                    <h4
                                                        style="background: #666;color: #fff; margin: -14px -14px 20px -14px;text-align: center;">
                                                        <strong>KETAATAN</strong>
                                                    </h4>
                                                @elseif($loop->iteration == 20)
                                                </div>
                                            </div>
                                        @endif
                                        <div class="papi-norm">
                                            <h5 style="text-transform:uppercase;">
                                                <strong>{{ $result['papi'] != null ? $result['papi']['role'] : $result['papi'] }}</strong>
                                            </h5>
                                            <p>{{ $result['papi'] != null ? $result['papi']['norm'] : $result['papi'] }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                @else
                    <h4 align="center" class="label-warning"><i class="fa fa-warning"></i>&nbsp;&nbsp;Belum melaksanakan
                        test</h4>
                @endif

            </div>
            <div class="list-item tab-pane" role='tab-panel' id='intel'>
                <h3 align="center" class="text-primary">General Ability Test</h3>
                <?php
                $hasilTest = $candidate->jobTestIntelAnswers($candidate->id, $job->id);
                $scores = [];
                $titleTest = ['Pengetahuan Umum', 'Daya Tangkap Verbal', 'Berpikir Logis', 'Kemempuan Berhitung', 'Induktif'];
                function interpretasi($score)
                {
                    return $score;
                }
                function interpretasi2($score)
                {
                    if ($score >= 85) {
                        return '(Excellent)';
                    } elseif ($score >= 65) {
                        return '(Very Good)';
                    } elseif ($score >= 55) {
                        return '(Good)';
                    } elseif ($score >= 40) {
                        return '(Less)';
                    } else {
                        return '(Poor)';
                    }
                }
                ?>
                @if ($hasilTest->count() == 0)
                    <h4 align="center" class="label-warning"><i class="fa fa-warning"></i>&nbsp;&nbsp;Belum melaksanakan
                        test</h4>
                @else
                    <div class="container-fluid pad-1em">
                        <div style="margin: auto; width:100%;">
                            <div class="col-md-1">
                            </div>
                            @for ($i = 1; $i <= $hasilTest->count() / 20; $i++)
                                <div class="col-md-2">
                                    <table class='table table-bordered' style="margin:0 auto; width:100%;"
                                        border="1">
                                        <tr style="height: 85px;">
                                            <th colspan="2" style="text-align: center;">Subtest
                                                {{ $titleTest[$i - 1] }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <th>NO</th>
                                            <th>ANS</th>
                                        </tr> --}}
                                        <?php
                                        $total_benar = 0;
                                        ?>
                                        @for ($n = 20 * $i - 20; $n < 20 * $i; $n++)
                                            <?php
                                            $back_col = 'red';
                                            // if ($hasilTest[$n]->answer == $hasilTest[$n]->key_answer) {
                                            //     $back_col = 'green';
                                            //     $total_benar++;
                                            // }
                                            if ($hasilTest[$n]->point == 1) {
                                                $back_col = 'green';
                                                $total_benar++;
                                            }
                                            ?>
                                            {{-- <tr>
                                                <td>{{ $hasilTest[$n]->question_number }}</td>
                                                <td style="background-color:{{ $back_col }}; color:white">
                                                    {{ $hasilTest[$n]->answer }}
                                                </td>
                                            </tr> --}}
                                        @endfor
                                        <?php array_push($scores, $total_benar * 5); ?>
                                        <tr>
                                            <td colspan="2">
                                                <h4 align="center" class="text-success">Score :
                                                    {{ interpretasi($total_benar * 5) }}<br>{{ interpretasi2($total_benar * 5) }}
                                                </h4>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="container-fluid pad-1em">
                        <div style="margin: auto; width:100%;">
                            <h3 align="center" class="text-success">Average Score :
                                {{ interpretasi(array_sum($scores) / 5) }} {{ interpretasi2(array_sum($scores) / 5) }}
                            </h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
@stop

@push('styles')
    <style type="text/css">
        .canvas {
            display: block;
            width: 100%;
        }
    </style>
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/Chart.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('#tabs li a').click(function(e) {
                e.preventDefault()
                $(this).tab('show')
            })
            $('.view').on('click', function() {
                var video = '<video width="100%" height="auto" controls>'
                var source = "<source src='" + $(this).data('video') + "' />"
                var videoClose = '</video>'

                $('.modal-body').html(video + source + videoClose)
                $('.modal-header').append('<span class="question-modal">' + $(this).data('question') +
                    '</span>')
            })
            $('.close').on('click', function() {
                $('.modal-body').html('')
                $('.modal-header').find('.question-modal').remove()
            })


            var MOST = {
                'd': {
                    0: -6.1,
                    1: -5,
                    2: -2.5,
                    3: -2.5,
                    4: -1.1,
                    5: -1,
                    6: -0.2,
                    7: 1.4,
                    8: 1.5,
                    9: 2.1,
                    10: 3,
                    11: 3.3,
                    12: 3.8,
                    13: 4.8,
                    14: 5,
                    15: 6.8,
                    16: 7,
                    17: 7.1,
                    18: 7.1,
                    19: 7.2,
                    20: 7.2,
                    21: 7.3,
                    22: 7.5,
                    23: 7.6,
                    24: 7.9
                },
                'i': {
                    0: -7,
                    1: -4.5,
                    2: -2.5,
                    3: -1,
                    4: 1,
                    5: 3,
                    6: 3.3,
                    7: 5,
                    8: 5.3,
                    9: 6.1,
                    10: 6.2,
                    11: 7,
                    12: 7.1,
                    13: 7.2,
                    14: 7.2,
                    15: 7.2,
                    16: 7.2,
                    17: 7.3,
                    18: 7.4,
                    19: 7.5,
                    20: 7.6,
                    21: 7.7,
                    22: 7.8,
                    23: 7.9,
                    24: 7.9,
                },
                's': {
                    0: -5.9,
                    1: -4.5,
                    2: -3.7,
                    3: -1.6,
                    4: -0.8,
                    5: 0.8,
                    6: 1,
                    7: 2.8,
                    8: 3,
                    9: 3.9,
                    10: 4.8,
                    11: 5,
                    12: 5.3,
                    13: 5.9,
                    14: 6.7,
                    15: 6.8,
                    16: 6.9,
                    17: 7,
                    18: 7.1,
                    19: 7.2,
                    20: 7.3,
                    21: 7.4,
                    22: 7.5,
                    23: 7.6,
                    24: 7.7,
                },
                'c': {
                    0: -6.1,
                    1: -4.5,
                    2: -3.7,
                    3: -1.6,
                    4: 1,
                    5: 2.1,
                    6: 3,
                    7: 5,
                    8: 5.3,
                    9: 5.9,
                    10: 6.4,
                    11: 6.7,
                    12: 6.9,
                    13: 7,
                    14: 7,
                    15: 7.1,
                    16: 7.1,
                    17: 7.2,
                    18: 7.3,
                    19: 7.4,
                    20: 7.5,
                    21: 7.6,
                    22: 7.7,
                    23: 7.8,
                    24: 7.9,
                }
            }

            var LEAST = {
                'd': {
                    0: 7.3,
                    1: 6.3,
                    2: 4.1,
                    3: 2.8,
                    4: 1.7,
                    5: 0.8,
                    6: -0.2,
                    7: -1,
                    8: -1.5,
                    9: -2.6,
                    10: -3,
                    11: -3.3,
                    12: -4.5,
                    13: -5.3,
                    14: -5.9,
                    15: -6.1,
                    16: -6.3,
                    17: -6.6,
                    18: -7,
                    19: -7.3,
                    20: -7.7,
                    21: -7.7,
                    22: -7.8,
                    23: -7.9,
                    24: -7.9,
                },
                'i': {
                    0: 7,
                    1: 5.9,
                    2: 3.9,
                    3: 2.8,
                    4: 0.8,
                    5: -0.2,
                    6: -2.1,
                    7: -3.3,
                    8: -4.5,
                    9: -5.3,
                    10: -6.1,
                    11: -6.3,
                    12: -7.2,
                    13: -7.4,
                    14: -7.5,
                    15: -7.6,
                    16: -7.6,
                    17: -7.6,
                    18: -7.7,
                    19: -7.7,
                    20: -7.8,
                    21: -7.8,
                    22: -7.8,
                    23: -7.9,
                    24: -7.9,
                },
                's': {
                    0: 7.3,
                    1: 7,
                    2: 5.9,
                    3: 3.9,
                    4: 2.8,
                    5: 1.7,
                    6: 0.8,
                    7: -1,
                    8: -2.1,
                    9: -3,
                    10: -4.5,
                    11: -5.3,
                    12: -6.1,
                    13: -6.3,
                    14: -6.5,
                    15: -6.8,
                    16: -7.2,
                    17: -7.4,
                    18: -7.6,
                    19: -7.7,
                    20: -7.7,
                    21: -7.8,
                    22: -7.8,
                    23: -7.9,
                    24: -7.9,
                },
                'c': {
                    0: 7.3,
                    1: 7,
                    2: 5.6,
                    3: 3.9,
                    4: 2.8,
                    5: 1.7,
                    6: 0.8,
                    7: -0.2,
                    8: -1,
                    9: -2.6,
                    10: -3.3,
                    11: -5.3,
                    12: -5.9,
                    13: -6.1,
                    14: -6.5,
                    15: -7.2,
                    16: -7.4,
                    17: -7.7,
                    18: -7.7,
                    19: -7.8,
                    20: -7.8,
                    21: -7.8,
                    22: -7.9,
                    23: -7.9,
                    24: -7.9,
                }
            }

            var CHANGE = {
                'd': {
                    24: 7.8,
                    23: 7.7,
                    22: 7.6,
                    21: 7.5,
                    20: 7.4, //
                    19: 7.3, //
                    18: 7,
                    17: 6.9, //
                    16: 6.7, //
                    15: 6.5,
                    14: 6.1,
                    13: 5.5,
                    12: 5,
                    11: 4.8, //
                    10: 4.7,
                    9: 3.8,
                    8: 3.6,
                    7: 2.8,
                    6: 2.0, //
                    5: 1.5,
                    4: 1.3, //
                    3: 1,
                    2: 0.9, //
                    1: 0.8,
                    0: -0.1,
                    '-1': -0.3, //
                    '-2': -0.5,
                    '-3': -1,
                    '-4': -1.5,
                    '-5': -2, //
                    '-6': -2.5,
                    '-7': -3,
                    '-8': -3.1, //
                    '-9': -3.3,
                    '-10': -4.5,
                    '-11': -5.5,
                    '-12': -5.8,
                    '-13': -5.9,
                    '-14': -6,
                    '-15': -6.3,
                    '-16': -6.5,
                    '-17': -6.7, //
                    '-18': -6.8, //
                    '-19': -6.9, //
                    '-20': -7,
                    '-21': -7.1,
                    '-22': -7.2,
                    '-23': -7.3,
                    '-24': -7.4,
                },
                'i': {
                    24: 7.9,
                    23: 7.8,
                    22: 7.8,
                    21: 7.7,
                    20: 7.6,
                    19: 7.5,
                    18: 7.5,
                    17: 7.5,
                    16: 7.4,
                    15: 7.4,
                    14: 7.3,
                    13: 7.3,
                    12: 7.2,
                    11: 7.1,
                    10: 7,
                    9: 6.8,
                    8: 6.5,
                    7: 5.5,
                    6: 5,
                    5: 4.1,
                    4: 3.8,
                    3: 3,
                    2: 1.5,
                    1: 1,
                    0: 0.8,
                    '-1': -0.1,
                    '-2': -1.5,
                    '-3': -1.9,
                    '-4': -3,
                    '-5': -3.3,
                    '-6': -4.5,
                    '-7': -5,
                    '-8': -5.8,
                    '-9': -6.1,
                    '-10': -6.5,
                    '-11': -6.6,
                    '-12': -6.7,
                    '-13': -6.7,
                    '-14': -6.7,
                    '-15': -6.8,
                    '-16': -6.8,
                    '-17': -6.9,
                    '-18': -7,
                    '-19': -7.1,
                    '-20': -7.2,
                    '-21': -7.2,
                    '-22': -7.2,
                    '-23': -7.3,
                    '-24': -7.4,
                },
                's': {
                    24: 7.8,
                    23: 7.8,
                    22: 7.7,
                    21: 7.6,
                    20: 7.5,
                    19: 7.4,
                    18: 7.3,
                    17: 7.2,
                    16: 7.1,
                    15: 7,
                    14: 6.9,
                    13: 6.8,
                    12: 6.6,
                    11: 6.5,
                    10: 6.1,
                    9: 5.5,
                    8: 5,
                    7: 4.7,
                    5: 3.8,
                    4: 3.6,
                    3: 3,
                    2: 2.2,
                    1: 1.5,
                    0: 1,
                    '-1': -0.1,
                    '-2': -0.5,
                    '-3': -1,
                    '-4': -1.5,
                    '-5': -1.9,
                    '-6': -3,
                    '-7': -3.3,
                    '-8': -4.5,
                    '-9': -5,
                    '-10': -6.1,
                    '-11': -6.2,
                    '-12': -6.3,
                    '-13': -6.4,
                    '-14': -6.7,
                    '-15': -7,
                    '-16': -7.1,
                    '-17': -7.2,
                    '-18': -7.5,
                    '-19': -7.6,
                    '-20': -7.6,
                    '-21': -7.7,
                    '-22': -7.7,
                    '-23': -7.8,
                    '-24': -7.8,
                },
                'c': {
                    24: 7.8,
                    23: 7.7,
                    22: 7.7,
                    21: 7.6,
                    20: 7.6,
                    19: 7.6,
                    18: 7.5,
                    17: 7.5,
                    16: 7.4,
                    15: 7.4,
                    14: 7.3,
                    13: 7.3,
                    12: 7.2,
                    11: 7.1,
                    10: 7,
                    9: 6.8,
                    8: 6.7,
                    7: 6.6,
                    6: 6.5,
                    5: 6.1,
                    4: 5.5,
                    3: 4.1,
                    2: 3.8,
                    1: 3,
                    0: 1.5,
                    '-1': 1,
                    '-2': 1,
                    '-3': -0.1,
                    '-4': -0.5,
                    '-5': -2.5,
                    '-6': -3,
                    '-7': -3.3,
                    '-8': -4.5,
                    '-9': -5,
                    '-10': -5.8,
                    '-11': -5.9,
                    '-12': -6,
                    '-13': -6.1,
                    '-14': -6.3,
                    '-15': -6.5,
                    '-16': -6.6,
                    '-17': -6.7,
                    '-18': -6.8,
                    '-19': -7,
                    '-20': -7.1,
                    '-21': -7.2,
                    '-22': -7.5,
                    '-23': -7.6,
                    '-24': -7.7,
                }
            }

            var ctx = document.getElementById("mostGraph").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["D", "I", "S", "C"],
                    datasets: [{
                        label: 'MOST',
                        type: 'line',
                        lineTension: 0,
                        data: [
                            MOST.d[$('[data-dm]').data('dm')],
                            MOST.i[$('[data-im]').data('im')],
                            MOST.s[$('[data-sm]').data('sm')],
                            MOST.c[$('[data-cm]').data('cm')]
                        ],
                        fill: false,
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                max: 8,
                                min: -8,
                                stepSize: 2
                            }
                        }]
                    },
                    layout: {
                        padding: {
                            left: 50,
                            right: 50,
                            top: 0,
                            bottom: 0
                        }
                    }
                }
            });

            var resultMOST = '';
            resultMOST += MOST.d[$('[data-dm]').data('dm')] > 0 ? 'D' : ''
            resultMOST += MOST.i[$('[data-im]').data('im')] > 0 ? 'I' : ''
            resultMOST += MOST.s[$('[data-sm]').data('sm')] > 0 ? 'S' : ''
            resultMOST += MOST.c[$('[data-cm]').data('cm')] > 0 ? 'C' : ''
            $('.result-most').text(resultMOST)

            var ctx = document.getElementById("leastGraph").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["D", "I", "S", "C"],
                    datasets: [{
                        label: 'LEAST',
                        type: 'line',
                        lineTension: 0,
                        data: [
                            LEAST.d[$('[data-dl]').data('dl')],
                            LEAST.i[$('[data-il]').data('il')],
                            LEAST.s[$('[data-sl]').data('sl')],
                            LEAST.c[$('[data-sl]').data('sl')]
                        ],
                        fill: false,
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                max: 8,
                                min: -8,
                                stepSize: 2
                            }
                        }]
                    },
                    layout: {
                        padding: {
                            left: 50,
                            right: 50,
                            top: 0,
                            bottom: 0
                        }
                    }
                }
            });
            var resultLEAST = '';
            resultLEAST += LEAST.d[$('[data-dl]').data('dl')] > 0 ? 'D' : ''
            resultLEAST += LEAST.i[$('[data-il]').data('il')] > 0 ? 'I' : ''
            resultLEAST += LEAST.s[$('[data-sl]').data('sl')] > 0 ? 'S' : ''
            resultLEAST += LEAST.c[$('[data-sl]').data('sl')] > 0 ? 'C' : ''
            $('.result-least').text(resultLEAST)

            var ctx = document.getElementById("changeGraph").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["D", "I", "S", "C"],
                    datasets: [{
                        label: 'CHANGE',
                        type: 'line',
                        lineTension: 0,
                        data: [
                            CHANGE.d[$('[data-dm]').data('dm') - $('[data-dl]').data('dl')],
                            CHANGE.i[$('[data-im]').data('im') - $('[data-il]').data('il')],
                            CHANGE.s[$('[data-sm]').data('sm') - $('[data-sl]').data('sl')],
                            CHANGE.c[$('[data-sm]').data('sm') - $('[data-sl]').data('sl')]
                        ],
                        fill: false,
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                max: 8,
                                min: -8,
                                stepSize: 2
                            }
                        }]
                    },
                    layout: {
                        padding: {
                            left: 50,
                            right: 50,
                            top: 0,
                            bottom: 0
                        }
                    }
                }
            });

            var resultCHANGE = ''
            resultCHANGE += CHANGE.d[$('[data-dm]').data('dm') - $('[data-dl]').data('dl')] > 0 ? 'D' : ''
            resultCHANGE += CHANGE.i[$('[data-im]').data('im') - $('[data-il]').data('il')] > 0 ? 'I' : ''
            resultCHANGE += CHANGE.s[$('[data-sm]').data('sm') - $('[data-sl]').data('sl')] > 0 ? 'S' : ''
            resultCHANGE += CHANGE.c[$('[data-sm]').data('sm') - $('[data-sl]').data('sl')] > 0 ? 'C' : ''
            $('.result-change').text(resultCHANGE)

            var papiData = []
            var labels = []
            $('.papiscore').each(function(index, papi) {
                papiData.push($(papi).data(Object.keys($(papi).data())[1]))
                labels.push($(papi).data('label'))
            })

            var ctx = document.getElementById("papigraph").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'WORK BEHAVIOUR 3',
                        data: papiData,
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    scale: {
                        ticks: {
                            beginAtZero: true
                        },
                        reverse: false
                    },
                    animation: {
                        animateRotate: false,
                        animateScale: true
                    }
                }
            });
        })

        $(document).ready(function() {
            $('.grid').masonry({
                itemSelector: '.grid-item',
                columnWidth: 160,
                horizontalOrder: true
            });
        });
    </script>
@endpush
