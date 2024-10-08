<style>
    .panel-title.kualif:after {
        /* symbol for "opening" panels UP */
        font-family: 'FontAwesome';
        /* essential for enabling glyphicon */
        content: "\f0ae";
        /* adjust as needed, taken from bootstrap.css */
        float: right;
        /* adjust as needed */
        color: #fff;
        /* adjust as needed */
    }
</style>

@extends('layouts.candidate')

@section('content')
    <div class="beranda" style="min-height:625px;">
        <div class="container-fluid">
            <div class="row">

                {{-- konten kiri --}}
                {{-- <div class="col-sm-4 pad-l-0-m pad-r-0-m">
                   <div class="agenda">
                       <div class="panel qualifications"style="padding-top:0px;padding-bottom:0px;">
                           <h4 class="panel-title kualif"
                               style="border-bottom:none; background:#034369;padding-top:20px; color:#fff; text-transform:uppercase;">
                               Aktivitas Lamaran</h4>
                           @if ($jadwal == null)
                               <div class="panel-content list-qualification" style="overflow-x: scroll; height: 300px;">
                                   <h5>Tidak Ada Aktivitas</h5>
                               </div>
                           @else
                               <div class="panel-content list-qualification" style="overflow-x: scroll; height: 300px;">
                                   @foreach ($jadwal as $jd)
                                       <div class="va-table">
                                           <div class="va-middle">
                                               <div class="date">
                                                   <div class="month fs-12 pad-5-0">{{ $jd['month'] }}</div>
                                                   <div class="day">{{ $jd['dateMonth'] }}</div>
                                               </div>
                                           </div>
                                           <div class="va-middle">
                                               <div class="agenda-content">
                                                   <strong>{{ $jd['aktivitas'] }}</strong><br>
                                                   <span>{{ $jd['job'] }}</span>
                                               </div>
                                           </div>
                                       </div>
                                       <hr>
                                   @endforeach
                               </div>

                           @endif
                       </div>
                   </div>
               </div> --}}

                {{-- konten kanan --}}
                <div class="col-sm-12 profile pad-l-15-m pad-r-15-m">
                    {{-- Header --}}
                    <div class="row panel pad-t-5em-m"
                        style="position:relative;border:none;-webkit-box-shadow: 0px 20px 30px -17px rgba(0,0,0,0.6);-moz-box-shadow: 0px 20px 30px -17px rgba(0,0,0,0.6);box-shadow: 0px 20px 30px -17px rgba(0,0,0,0.6);">
                        <div class="va-table">
                            <div class="va-middle">
                                <div class="photo"><img
                                        src="{{ asset($candidate->photo ? 'upload/candidates/' . md5($candidate->candidate_id . 'folder') . '/' . $candidate->photo : 'img/no-pic.jpg') }}"
                                        class="img-responsive"></div>
                            </div>
                            <div class="va-middle">
                                <div class="general-info">
                                    <div class="name"><b>{{ Auth::user()->name }}</b></div>
                                    <div class="education">{!! $candidate->educations->first()
                                        ? $candidate->educations->first()->major . ', ' . $candidate->educations->first()->institute
                                        : '' !!}</div>
                                    <div class="info">
                                        <span><i class="fa fa-phone"></i> {{ $candidate->phone ?: '-' }}</span><br>
                                        <span><i class="fa fa-envelope"></i> {{ Auth::user()->email }}</span><br>
                                        <span><i class="fa fa-map-marker"></i>
                                            {{ $candidate->city ? $candidate->city->city . ', ' . $candidate->province->province : '-' }}</span><br>
                                        <span><i class="fa fa-question-circle-o"></i> Why hire me?
                                            {{ $candidate->why_hire_me }}</span><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="position:absolute;top:0px;right:0px;" class="width-100-m">
                            <a href="{{ route('candidate-profile') }}" class="btn btn-success width-100-m"
                                style="padding:15px 20px;margin-top:0px;text-transform:uppercase;"><i
                                    class="fa fa-pencil"></i>&nbsp;&nbsp;Perbarui Profil</a>
                        </div>
                    </div>

                    <div class="row panel pad-0" style="background:none;">
                        {{-- tab --}}
                        <ul class="nav nav-tabs sub-tab text-center" role='tab-list'>
                            <li role="presentation" class="active"><a href="#applied"><i
                                        class="fa fa-check-square"></i><span class="hidden-xs">&nbsp;&nbsp;LOWONGAN
                                        TERLAMAR</span></a></li>
                            <li role="presentation"><a href="#saved"><i class="fa fa-floppy-o"></i><span
                                        class="hidden-xs">&nbsp;&nbsp;LOWONGAN TERSIMPAN</span></a></li>
                        </ul>

                        <div class="tab-content">
                            {{-- lowongan terlamar --}}
                            <div class="list-item tab-pane active" role='tabpanel' id='applied'>
                                <ul class="item-low-t mar-b-0 border-b-0">
                                    <div class="visible-xs-block pad-1em-m" style="font-size: 1.5em;background:#fff;">
                                        LOWONGAN TERLAMAR</div>
                                    @foreach ($candidate->jobs as $job)
                                        <?php $testcomplete = 0; ?>
                                        @if ($candidate->jobTestAnswers($job->id, 1)->count() == 60)
                                            <?php $testcomplete++; ?>
                                        @endif
                                        @if ($candidate->jobTestAnswers($job->id, 2)->count() == 48)
                                            <?php $testcomplete++; ?>
                                        @endif
                                        @if ($candidate->jobTestAnswers($job->id, 3)->count() == 90)
                                            <?php $testcomplete++; ?>
                                        @endif
                                        <li class="beranda-item" style="background:#fff;">
                                            <div class="row"
                                                style="border:1px solid #ddd; margin:5px 5px 0 5px;background:#F5F5F5;">
                                                <div class="col-sm-8">
                                                    <div class="va-table pad-t-1em-m pad-b-1em-m height-130 height-auto-m">
                                                        <div class="va-middle">

                                                            <h4><a
                                                                    href="{{ route('job-detail', $job->job_id) }}">{{ $job->title }}</a>
                                                            </h4>
                                                            @php
                                                                $candidate_job = $job->jobCandidate(
                                                                    $candidate->candidate_id,
                                                                );
                                                                $job_step = $job->jobStep(
                                                                    $candidate_job->pivot->progress,
                                                                );
                                                            @endphp
                                                            @if ($candidate_job->pivot->status == 0 && $candidate_job->pivot->progress == 10)
                                                            @else
                                                                <div>
                                                                    <span class="text-muted">Tahap:</span>
                                                                    <label>{{ $candidate_job->pivot->progress > 0 ? $candidate_job->progress() : 'Seleksi dokumen' }}{{ $candidate_job->pivot->progress == 1 ? ' (Prescreening Video Interview)' : '' }}</label>

                                                                </div>
                                                                {{-- @if ($candidate_job->pivot->progress >= 3)
                                                                    <div>
                                                                        <!--<span class="text-muted">Tanggal Offering:</span>-->
                                                                        <span class="text-muted"><i>Silahkan periksa e-mail
                                                                                anda, untuk informasi lebih
                                                                                lanjut.</i></span>
                                                                    </div>
                                                                @endif --}}
                                                            @endif

                                                            @if ($candidate_job->pivot->progress > 0)
                                                                @if ($candidate_job->pivot->status == 0)
                                                                    @if ($candidate_job->pivot->progress == 1)
                                                                    @elseif($candidate_job->pivot->progress == 2)
                                                                        @if ($testcomplete == 0)
                                                                            <div style="margin-top:10px;"><span
                                                                                    class='label label-danger'><i
                                                                                        class="fa fa-close"></i>&nbsp;&nbsp;Belum
                                                                                    melaksanakan</span></div>
                                                                        @elseif($testcomplete < 3)
                                                                            <div style="margin-top:10px;"><span
                                                                                    class='label label-warning'><i
                                                                                        class="fa fa-close"></i>&nbsp;&nbsp;Belum
                                                                                    menjawab semua</span></div>
                                                                        @else
                                                                            <div style="margin-top:10px;"><span
                                                                                    class='label label-info'><i
                                                                                        class="fa fa-check"></i>&nbsp;&nbsp;Proses
                                                                                    pemeriksaan</span></div>
                                                                        @endif
                                                                    @elseif($candidate_job->pivot->status == 0 && $candidate_job->pivot->progress == 10)
                                                                        <span class="label label-success">Hired</span>
                                                                    @endif
                                                                @elseif($candidate_job->pivot->status == 1)
                                                                    <span class='label label-success'>Lolos</span>
                                                                @else
                                                                    <span class='label label-danger'>Gagal</span>
                                                                @endif
                                                            @endif

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-4">
                                                    <div
                                                        class="va-table width-100 height-130 height-auto-m pad-t-1em-m pad-b-1em-m">
                                                        <div class="va-middle ta-right">
                                                            @if ($candidate_job->pivot->status == 0)
                                                                @if ($candidate_job->pivot->progress == 1 && $job->pviCandidateAnswers($candidate->id)->count() != 5)
                                                                @elseif($candidate_job->pivot->progress == 2)
                                                                    @if ($testcomplete < 3)
                                                                        <a href='{{ route('take-test', $job->job_id) }}'
                                                                            class='btn green pull-right mar-t-0'>{{ $testcomplete == 0 ? 'Laksanakan' : 'Lanjutkan' }}
                                                                            Tes Online&nbsp;&nbsp;<i
                                                                                class="fa fa-server"></i></a>
                                                                    @endif
                                                                    <br />
                                                                    @if ($job->has_intelligence_test and $candidate->jobTestIntelAnswers($candidate->id, $job->id)->count() / 20 < 5)
                                                                        <br />
                                                                        <a href='{{ route('take-intel-test', $job->job_id) }}'
                                                                            class='btn green pull-right mar-t-0'>Laksanakan
                                                                            Tes Intelegensi&nbsp;&nbsp;<i
                                                                                class="fa fa-server"></i></a>
                                                                    @endif
                                                                @endif
                                                                <br />
                                                                @if ($candidate_job->pivot->progress == 9 && $candidate_job->offering($job->id) != null)
                                                                    <div class="input-group"
                                                                        style="margin-top: 10px; margin-bottom: 10px;">
                                                                        <form action='{{ route('offering-candidate') }}'
                                                                            method='POST' enctype="multipart/form-data">
                                                                            {{ csrf_field() }}
                                                                            
                                                                            <input type="hidden" name="job_id"
                                                                                value="{{ $candidate_job->offering($job->id)->job_id }}">
                                                                            <input type="hidden" name="candidate_id"
                                                                                value="{{ $candidate_job->offering($job->id)->candidate_id }}">

                                                                            <input id="offering" type="file"
                                                                                class="form-control" name="offering"
                                                                                required autofocus placeholder="Offering"
                                                                                accept="image/*,application/pdf"><br>
                                                                            <button type="submit"
                                                                                class='btn btn-success'>Upload
                                                                                Offering</button>
                                                                        </form>
                                                                        <span
                                                                            style="font-style:italic; color: red; font-size: 12px;">cek
                                                                            kembali TTD!</span>
                                                                    </div>
                                                                @endif
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- save lowongan --}}
                            <div class="list-item tab-pane" role='tabpanel' id='saved'>
                                <div class="beranda-item"
                                    style="background:#fff;border-left:1px solid #ddd;border-right:1px solid #ddd; padding:25px 20px;">
                                    <div class="visible-xs-block mar-b-1em-m" style="font-size: 1.5em;">LOWONGAN TERSIMPAN
                                    </div>
                                    <div class="list-job row">
                                        @foreach ($candidate->savedJobs as $job)
                                            <div class="col-md-12 cont-page">
                                                <div style="border:1px solid #ddd; margin-bottom:1em;">
                                                    <div class="va-table width-100" style="background:#DCDCDC;">
                                                        <div class="va-middle">
                                                            <div style="padding-left:1.2em;">
                                                                <h4 class="mar-b-0"><a
                                                                        href="{{ route('job-detail', $job->job_id) }}">{{ $job->title }}</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="va-middle" style="text-align:right;">
                                                            <div class="see-detail text-right">
                                                                <a href="{{ route('delete-saved', $job->job_id) }}"
                                                                    class='btn btn-lg btn-danger mar-t-0 delete'
                                                                    data-title="{{ $job->title }}"><i
                                                                        class="fa fa-trash"></i></a><a
                                                                    href="{{ route('job-detail', $job->job_id) }}"
                                                                    class='btn btn-lg btn-success mar-t-0'><i
                                                                        class="fa fa-ellipsis-h"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" pad-1em">
                                                        <div class="location mar-b-10 text-muted">
                                                            <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Aerofood unit:
                                                            <b>{{ $job->city->city . ', ' . $job->province->province }}</b>
                                                        </div>
                                                        <div class="item panel pad-l-0-m pad-r-0-m mar-b-0-m pad-b-0-m">
                                                            <div class="va-table" style=" width:100%;">
                                                                <div class="va-middle">
                                                                    <div class="description mar-b-0 teks-elipsis">
                                                                        <?php echo $job->description; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if ($candidate->savedJobs->count() == 0)
                                            <h4 class="pad-1em text-muted">Belum ada lowongan tersimpan</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal delete save lowongan --}}
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align:center;background:#dcdcdc;">
                    Hapus lowongan tersimpan di <b class='job-name'></b>

                </div>
                <div class="modal-body" style="text-align:center">
                    <span style="text-transform: capitalize;">Apakah Anda yakin untuk menghapus lowongan tersimpan
                        ini?</span>
                </div>
                <div class="modal-footer">
                    <a class='btn btn-danger cancel-delete' href='#' style='width: 100px;'><i
                            class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
                    <a class='btn btn-success delete-job'><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus Lowongan
                        Tersimpan</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Confirm Upload Offering -->
    <div class="modal fade" id="upload-offering" tabindex="-1" role="dialog"
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

                    <a class='btn btn-danger cancel-upload-offering' href='#' style='width: 100px;'>
                        <i class="fa fa-close"></i>&nbsp;&nbsp;Batal
                    </a>
                    <a class='btn btn-success click-upload-offering'>
                        <i class="fa fa-envelope"></i>&nbsp;&nbsp;Lamar Lowongan
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop

@push('scripts')
    <script type="text/javascript">
        $(function() {
            $('.nav-tabs li a').click(function(e) {
                e.preventDefault()
                $(this).tab('show')
            })

            $('a.delete').click(function(e) {
                e.preventDefault()
                $('#delete-modal').modal('show')
                $('#delete-modal').find('.job-name').html($(this).data('title'))
                $('#delete-modal').find('.delete-job').attr('data-href', $(this).attr('href'))
                $('.delete-job').click(function() {
                    window.location.href = $(this).data('href')
                })
                $('.cancel-delete').click(function() {
                    $('#delete-modal').modal('hide')
                })
            })

            $('#delete-modal').on('hide.bs.modal', function() {
                $('#delete-modal').find('.job-name').html('')
            })

            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        })
    </script>
@endpush
