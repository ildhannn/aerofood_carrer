@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-jobs') }}">Lowongan</a>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b>{{ $job->title }}</b>
@stop


@section('content')
    <div class="lists candidate">
        <div class="edit-job" style="margin-bottom: 0px;">
            @if ($job->status == 0)
                <div class="header-sub" style="width: auto !important;">
                    <div class="va-table width-100">
                        <div class="va-middle width-50 width-100-m">
                            JOB TITLE: <span style="text-transform: uppercase;"><b
                                    style="margin-right: 20px">{{ $job->title }}</b></span>
                            CREATE BY: <span style="text-transform: uppercase;"><b>{{ $job->createdBy['name'] }}</b></span>
                        </div>
                    </div>
                </div>
                <div class="va-table width-100" style="border: 1px solid #ccc; padding: 10px 15px;background: #fff;">
                    <div class="va-middle width-20 width-100-m display-in-block-m mar-b-1em-m ta-center-m">STATUS LOWONGAN
                    </div>
                    <div class="va-middle width-30 width-100-m display-in-block-m mar-b-2em-m ta-center-m"><span
                            type="button" class="label label-warning job-status" style="font-size: 17px;">DRAFT <i
                                class="fa fa-file"></i></span></div>
                    <div class="va-middle width-50 ta-right width-100-m display-block-m ta-center-m"><a
                            href="{{ route('edit-job', $job->job_id) }}" class='btn btn-primary' style="width: auto;"><i
                                class="fa fa-pencil" style="margin-right: 5px"></i> Ubah</a>&nbsp;&nbsp;<a
                            href="{{ route('delete-job', $job->job_id) }}" class='btn btn-danger delete'
                            data-title="{{ $job->title }}" style="width: auto;"><i class="fa fa-trash"
                                style="margin-right: 5px"></i> Hapus</a></div>
                </div>
                <br>
                <div class="va-table width-100" style="border: 1px solid #ccc; padding: 10px 15px;">
                    <div class="va-middle width-50 width-100-m display-in-block-m mar-b-1em-m ta-center-m"><a
                            href="{{ route('job-detail', $job->job_id) }}" class='btn btn-warning copy'
                            style="width:auto;"><i class="fa fa-copy"></i> Copy Job URL</a>&nbsp;&nbsp;<a
                            href="{{ route('job-detail', $job->job_id) }}" class='btn btn-default'
                            style="background: #fff;width:auto;"><i class="fa fa-eye"></i> Pratinjau</a></div>
                    <div class="va-middle width-50 ta-right width-100-m display-in-block-m ta-center-m"><a href="#close"
                            class='btn btn-danger close-job' style="width:auto;"><i class="fa fa-close"></i> Tutup
                            Lowongan</a></div>
                </div>
                {{-- <span type="button" class="label label-warning job-status"> Status Lowongan : Draft</span>
                <a href="{{ route('edit-job', $job->job_id) }}" class='btn'
                    style="width: 100px; background: #f0ad4e; border-color: #eea236; color: white"><i class="fa fa-pencil"
                        style="margin-right: 5px"></i> Ubah</a>
                <a href="{{ route('delete-job', $job->job_id) }}" class='btn delete' data-title="{{ $job->title }}"
                    style="width: 100px; background: red; border-color: red; color: white"><i class="fa fa-trash"
                        style="margin-right: 5px"></i> Hapus</a>
                <br><br>
                <a href="{{ route('job-detail', $job->job_id) }}" class='btn btn-warning copy'
                    style="background: #faebcc; color: #333"><i class="fa fa-copy"></i> Copy Job URL</a> --}}
            @elseif($job->status == 1)
                <div class="header-sub" style="width: auto !important;">
                    <div class="va-table width-100">
                        <div class="va-middle width-50 width-100-m">
                            JOB TITLE: <span style="text-transform: uppercase;"><b
                                    style="margin-right: 20px">{{ $job->title }}</b></span>
                            CREATE BY: <span style="text-transform: uppercase;"><b>{{ $job->createdBy['name'] }}</b></span>
                        </div>
                    </div>
                </div>
                <div class="va-table width-100" style="border: 1px solid #ccc; padding: 10px 15px;background: #fff;">
                    <div class="va-middle width-20 width-100-m display-in-block-m mar-b-1em-m ta-center-m">STATUS LOWONGAN
                    </div>
                    <div class="va-middle width-30 width-100-m display-in-block-m mar-b-2em-m ta-center-m"><span
                            type="button" class="label label-success job-status" style="font-size: 17px;">PUBLISH <i
                                class="fa fa-check-circle"></i></span></div>
                    <div class="va-middle width-50 ta-right width-100-m display-block-m ta-center-m"><a
                            href="{{ route('edit-job', $job->job_id) }}" class='btn btn-primary' style="width: auto;"><i
                                class="fa fa-pencil" style="margin-right: 5px"></i> Ubah</a>&nbsp;&nbsp;<a
                            href="{{ route('delete-job', $job->job_id) }}" class='btn btn-danger delete'
                            data-title="{{ $job->title }}" style="width: auto;"><i class="fa fa-trash"
                                style="margin-right: 5px"></i> Hapus</a></div>
                </div>
                <br>
                <div class="va-table width-100" style="border: 1px solid #ccc; padding: 10px 15px;">
                    <div class="va-middle width-50 width-100-m display-in-block-m mar-b-1em-m ta-center-m"><a
                            href="{{ route('job-detail', $job->job_id) }}" class='btn btn-warning copy'
                            style="width:auto;"><i class="fa fa-copy"></i> Copy Job URL</a>&nbsp;&nbsp;<a
                            href="{{ route('job-detail', $job->job_id) }}" class='btn btn-default'
                            style="background: #fff;width:auto;"><i class="fa fa-eye"></i> Pratinjau</a></div>
                    <div class="va-middle width-50 ta-right width-100-m display-in-block-m ta-center-m"><a href="#close"
                            class='btn btn-danger close-job' style="width:auto;"><i class="fa fa-close"></i> Tutup
                            Lowongan</a></div>
                </div>
            @else
                <div class="header-sub" style="width: auto !important;">
                    <div class="va-table width-100">
                        <div class="va-middle width-50 width-100-m">
                            JOB TITLE: <span style="text-transform: uppercase;"><b
                                    style="margin-right: 20px">{{ $job->title }}</b></span>
                            CREATE BY: <span style="text-transform: uppercase;"><b>{{ $job->createdBy['name'] }}</b></span>
                        </div>
                    </div>
                </div>
                <div class="va-table width-100" style="border: 1px solid #ccc; padding: 10px 15px;background: #fff;">
                    <div class="va-middle width-20 width-100-m display-in-block-m mar-b-1em-m ta-center-m">STATUS LOWONGAN
                    </div>
                    <div class="va-middle width-30 width-100-m display-in-block-m mar-b-2em-m ta-center-m"<span
                        type="button" class="label label-default job-status" style="font-size: 17px;">CLOSED <i
                            class="fa fa-minus-circle"></i></span></div>
                    <div class="va-middle width-50 ta-right width-100-m display-block-m ta-center-m"><a
                            href="{{ route('edit-job', $job->job_id) }}" class='btn btn-primary' style="width: auto;"><i
                                class="fa fa-pencil" style="margin-right: 5px"></i> Ubah</a>&nbsp;&nbsp;<a
                            href="{{ route('delete-job', $job->job_id) }}" class='btn btn-danger delete'
                            data-title="{{ $job->title }}" style="width: auto;"><i class="fa fa-trash"
                                style="margin-right: 5px"></i> Hapus</a></div>
                </div>
                <br>
                <div class="va-table width-100" style="border: 1px solid #ccc; padding: 10px 15px;">
                    <div class="va-middle width-50 width-100-m display-in-block-m mar-b-1em-m ta-center-m"><a
                            href="{{ route('job-detail', $job->job_id) }}" class='btn btn-warning copy'
                            style="width:auto;"><i class="fa fa-copy"></i> Copy Job URL</a>&nbsp;&nbsp;<a
                            href="{{ route('job-detail', $job->job_id) }}" class='btn btn-default'
                            style="background: #fff;width:auto;"><i class="fa fa-eye"></i> Pratinjau</a></div>
                    <div class="va-middle width-50 ta-right width-100-m display-in-block-m ta-center-m"><a href="#close"
                            class='btn btn-danger close-job' style="width:auto;"><i class="fa fa-close"></i> Tutup
                            Lowongan</a></div>
                </div>

                <!-- <span type="button" class="label label-default job-status"> Status Lowongan : Closed</span>
                                                        <a href="{{ route('edit-job', $job->job_id) }}" class='btn' style="width: 100px; background: #f0ad4e; border-color: #eea236; color: white"><i class="fa fa-pencil" style="margin-right: 5px"></i> Ubah</a>
                                                        <a href="{{ route('delete-job', $job->job_id) }}" class='btn btn-danger delete' data-title="{{ $job->title }}" style="width: auto;"><i class="fa fa-trash" style="margin-right: 5px"></i> Hapus</a>
                                                        <br><br> -->
            @endif
            <!-- <a href="{{ route('job-detail', $job->job_id) }}" class='btn btn-default' style="background: #fff"><i class="fa fa-eye"></i> Pratinjau</a> -->
            <span class='alert alert-success copied'
                style="position: absolute; top: 80px; right: 50px; display: none">Berhasil Mengcopy URL</span>
        </div>
        <br>
        <div class="alert alert-success" style="display: none">
        </div>
        <div class="alert alert-danger" style="display: none">
        </div>
        <div class="job-candidate-progress">
            <div class="list-title">
                <ul class="nav nav-tabs nav-tabs-colored text-center" role='tab-list' id='tabs'>
                    <li role="presentation" class="active"><a href="#candidate-list" data-toggle="tooltip"
                            title="Kandidat"><span class="visible-inline-xs-block"><i
                                    class="fa fa-user-circle"></i>&nbsp;&nbsp;</span><span
                                class="hidden-xs">Kandidat&nbsp;</span>(<span
                                class="text-primary"><b>{{ $job->candidates->count() }}</b></span>)</a></li>
                    <li role="presentation"><a href="#matched" data-toggle="tooltip" title="Matched"><span
                                class="visible-inline-xs-block"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;</span><span
                                class="hidden-xs">Matched&nbsp;</span>(<span
                                class="text-primary"><b>{{ $job->candidateProgressStatus('=', 0, 1)->count() + $job->candidateProgressStatus('=', 0, 33)->count() }}</b></span>)</a><!-- <a href="#matched">Matched ({{ $job->candidateProgressStatus('=', 0, 1)->count() + $job->candidateProgressStatus('=', 0, 33)->count() }})</a> -->
                    </li>
                    <li role="presentation"><a href="#shortlisted" data-toggle="tooltip" title="Shortlisted"><span
                                class="visible-inline-xs-block"><i class="fa fa-server"></i>&nbsp;&nbsp;</span><span
                                class="hidden-xs">Shortlisted&nbsp;</span>(<span
                                class="text-primary"><b>{{ $job->candidateProgressStatus('=', 0, 2)->count() + $job->candidateProgressStatus('=', 0, 44)->count() }}</b></span>)</a><!-- <a href="#shortlisted">Shortlisted ({{ $job->candidateProgressStatus('=', 0, 2)->count() + $job->candidateProgressStatus('=', 0, 44)->count() }})</a> -->
                    </li>
                    <?php $interview = 0; ?>
                    @foreach ($job->steps as $key => $step)
                        @if ($step->id <= 2 || $step->id > 7)
                            <li role="presentation">
                                <a href="#step_{{ $step->id }}">
                                    @if ($step->id == 1)
                                        <span class="visible-inline-xs-block"><i
                                                class="fa fa-video-camera"></i>&nbsp;</span><span
                                            class="hidden-xs">PVI&nbsp;</span>
                                    @elseif($step->id == 8)
                                        <span class="visible-inline-xs-block"><i
                                                class="fa fa-medkit"></i>&nbsp;</span><span
                                            class="hidden-xs">MCU&nbsp;</span>
                                    @else
                                        <!-- {{ $step->name }} -->
                                        @if ($step->id == 2)
                                            <span class="visible-inline-xs-block"><i
                                                    class="fa fa-globe"></i>&nbsp;</span><span
                                                class="hidden-xs">{{ $step->name }}</span>
                                        @elseif($step->id == 9)
                                            <span class="visible-inline-xs-block"><i
                                                    class="fa fa-folder-open"></i>&nbsp;</span><span
                                                class="hidden-xs">{{ $step->name }}</span>
                                            {{-- @elseif($step->id == 10)
                                            <span class="visible-inline-xs-block"><i
                                                    class="fa fa-thumbs-up"></i>&nbsp;</span><span
                                                class="hidden-xs">{{ $step->name }}</span> --}}
                                        @endif
                                    @endif
                                    (<span
                                        class="text-primary"><b>{{ $job->candidateProgress('=', $step->id)->count() }}</b></span>)
                                </a>
                            </li>
                        @else
                            <?php $interview += $job->candidateProgress('=', $step->id)->count(); ?>
                            @if ($job->steps[$key + 1]->id > 7)
                                <li role="presentation"><a href="#interview" data-toggle="tooltip"
                                        title="Interview"><span class="visible-inline-xs-block"><i
                                                class="fa fa-exchange"></i>&nbsp;</span><span
                                            class="hidden-xs">Interview&nbsp;</span>(<span
                                            class="text-primary"><b>{{ $interview }}</b></span>)</a></li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="tab-content list-content">
                @include('dashboard.admin._job-candidate')
                @include('dashboard.admin._matched')
                @include('dashboard.admin._shortlisted')
                @include('dashboard.admin._pvi')
                @include('dashboard.admin._online-test')
                @include('dashboard.admin._interview')
                @include('dashboard.admin._mcu')
                @include('dashboard.admin._offering')
                {{-- @include('dashboard.admin._hired') --}}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="modal">
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

    <!-- Modal Tutup Lowongan -->
    <div class="modal fade" id="close" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Tutup Lowongan
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Apakah Anda yakin ingin menutup lowongan ini?</h4><br><br>
                    <form action='{{ route('close-job', $job->id) }}' class='text-center' method='POST'>
                        {{ csrf_field() }}
                        <a class='btn btn-danger cancel-close-job' href='#' style='width: 100px;'>Batal</a>
                        <button class='btn btn-success' style='width: 100px;'>YA</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Uplaod MCU -->
    <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Upload Hasil Medical Check Up
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4></h4>
                    <form action='{{ route('upload-mcu') }}' method='POST' enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="job_id">
                        <input type="hidden" name="candidate_id">
                        <input id="mcu" type="file" class="form-control" name="mcu" required autofocus
                            placeholder="MCU" accept="image/*,application/pdf"><br>
                        <div class="button-group text-center">
                            <a class='btn btn-danger cancel-upload' href='#' style='width: 100px;'>Batal</a>
                            <button class='btn btn-success' style='width: 100px;'>Upload Hasil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Interview -->
    <div class="modal fade" id="interview-modal" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center;position: relative;">
                    <span style="text-align: center;">
                        <h3 style="margin:0px; ">Undang Interview</h3>
                    </span>
                    <div style="position: absolute; top: 18px; right: 14px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <div class="modal-body">

                    <form action='{{ route('invite-interview') }}' method='POST' enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="col-md-12">
                                    <div class="va-table">
                                        <div class="va-middle"
                                            style="border: 1px solid #ccc; padding: 0px 10px; background-color: #ccc;"><i
                                                class="fa fa-user-circle"></i>&nbsp;&nbsp;Kandidat</div>
                                        <div class="va-middle"
                                            style="border: 1px solid #ccc; padding: 0px 20px; border-left: 0px; background-color: #f2f2f2;font-weight: 700;">
                                            <h4 style="line-height: 35px;"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-3">Tanggal</label>
                                <div class="col-md-9"><input type="date" name="date_interview" class="form-group">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-3">Waktu</label>
                                <div class="col-md-9"><input type="time" name="time_interview" class="form-group">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-3">Tempat</label>
                                <div class="col-md-9">
                                    <textarea name='place_interview' class="form-group"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-3">Interviewer</label>
                                <div class="col-md-9"><select name='interviewer' id='interviewer' class="form-group"></select></div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-3">Nama Interviewer</label>
                                <div class="col-md-9">
                                    <input type="text" name='interviewer_name' class="form-group">
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <label class="col-md-3">Backup Interviewer</label>
                                <div class="col-md-9">
                                    <input type="text" name='interviewer_backup' class="form-group">
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                                                                    <label>Waktu</label>
                                                                    <input type="time" name="time-interview">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label style="vertical-align: top">Tempat</label>
                                                                    <textarea name='place-interview' cols='50' rows='4'></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Interviewer</label>
                                                                    <select name='interviewer'></select>
                                                                </div> -->
                        <div class="form-group">
                            <textarea id="invitation" name='invitation'>
                            <h5><b>Dear Mr/Mrs. <span class="candidate-name"></span>,</b></h5>
                            <p>
                                Follow up your application for PT. Aerofood Indonesia (Garuda Indonesia Group), herewith we sent to you our application form. Please fill it completely and bring it in our interview session as this schedule:
                            </p>
                            <p>
                                <table>
                                  <tr>
                                      <td>Day/Date</td>
                                      <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                      <td><b><span class='date'></span></b></td>
                                  </tr>
                                  <tr>
                                      <td>Time</td>
                                      <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                      <td><b><span class='time'></span></b></td>
                                  </tr>
                                  <tr>
                                      <td>Place</td>
                                      <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                      <td><b><span class="place"></span></b></td>
                                  </tr>
                                  <tr>
                                      <td>Interviewer</td>
                                      <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                      <td><b><span class="interviewer"></span></b></td>
                                  </tr>
                                  <tr>
                                      <td>Position offered</td>
                                      <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                      <td><b><span class="job-applied"></span></b></td>
                                  </tr>
                                </table>
                                <!-- Day/Date : <b><span class='date'></span></b>
                                <br> Time : <b><span class="time"></span> - Finished
                                <br> Place : <b><span class="place"></span>
                                <br> Interviewer : <span class="interviewer"></span>
                                <br> Position offered : <span class="job-applied"></span> -->
                            </p>
                            <p>
                                Kindly confirm if you are available with this schedule as soon as possible. Then bring along your full resume with your latest educational certification, latest payslip, NPWP, KTP, reference letter from the previous company and the completed application form.
                            </p>
                            <p>
                                Best Regards,
                            </p>
                            <p>
                                HC Talent Acquisition Team
                                <br> PT. Aerofood Indonesia
                                <br> GARUDA INDONESIA GROUP
                                <br> Aerowisata Park, Jl. Prof. Dr. Soepomo no.45 Tebet Jakarta Selatan 12810
                                <br> T: (6221) 83705076 | F: (6221) 83705012 | E: career@aerowisatafood.com | W: www.aerowisatafood.com |
                            </p>
                        </textarea>
                        </div>
                        <input type="hidden" name="job_id">
                        <input type="hidden" name="candidate_id">
                        <div class="button-group text-center">
                            <a class='btn btn-danger cancel-interview' href='#'><i
                                    class="fa fa-close"></i>&nbsp;Batal</a>
                            <button class='btn btn-success'><i class="fa fa-sign-in"></i>&nbsp;Kirim Undangan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Uplaod MCU -->
    <div class="modal fade" id="offering" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Upload Offering Letter
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4></h4>
                    <form action='{{ route('upload-offering') }}' method='POST' enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="job_id">
                        <input type="hidden" name="candidate_id">
                        
                        <div class="input-group" style="margin-top: 10px; margin-bottom: 10px;">
                            <label for="basic-url">Unit</label></label>
                            <input class="form-control" type="text" name="unit">
                        </div>
                        
                        <div class="input-group" style="margin-top: 10px; margin-bottom: 10px;">
                            <label for="basic-url">Position</label>
                            <input class="form-control" type="text" name="position">
                        </div>

                        <div class="input-group" style="margin-top: 10px;">
                            <label for="basic-url">Join Date</label>
                            <input class="form-control" type="date" name="join_date">
                        </div>

                        <div class="input-group" style="margin-top: 10px; margin-bottom: 10px;">
                            <label for="basic-url">Offering Date</label>
                            <input class="form-control" type="date" name="offering_date">
                        </div>

                        <div class="input-group" style="margin-top: 10px; margin-bottom: 10px;">
                            <label for="basic-url">Offering Letter</label>
                            <input id="offering" style="margin-top: 10px;" type="file" class="form-control"
                                name="offering" autofocus placeholder="Offering"
                                accept="image/*,application/pdf"><br>
                        </div>

                        <div class="button-group text-center">
                            <a class='btn btn-danger cancel-offer' href='#' style='width: 100px;'>Batal</a>
                            <button class='btn btn-success' style='width: 125px;'>Simpan Offering</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Hapus Lowongan -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align:center;background:#dcdcdc;    ">
                    Hapus lowongan di <b class='job-name'></b>
                </div>
                <div class="modal-body" style="text-align:center">
                    <span style="text-transform: capitalize;">Apakah Anda yakin untuk menghapus lowongan ini?</span>
                </div>
                <div class="modal-footer">

                    <a class='btn btn-danger cancel-delete' href='#' style='width: 100px;'><i
                            class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
                    <a class='btn btn-success delete-job'><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus Lowongan</a>
                </div>
            </div>
        </div>
    </div>
@stop

@push('styles')
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
@endpush


@push('scripts')
    <script type="text/javascript" src="{{ asset('js/summernote.js') }}"></script>
    <script type="text/javascript">
        function showProfile(candidate_id) {
            $('#profile').modal('show')
            $.get("{{ url('/admin-dashboard/data-candidate') }}" + '/' + candidate_id, function(data, status) {
                $('#profile').find('.modal-body').html(data)
                $('#tabs li a').click(function(e) {
                    e.preventDefault()
                    $(this).tab('show')
                })
            });
        }

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
            $('#tabs li a').click(function(e) {
                $(this).tab('show')
            })
            $('.sub-tab li a').click(function(e) {
                e.preventDefault()
                $(this).tab('show')
                var href = $(this).attr('href')
                $(this).parents('.sub-tab').siblings('.tab-content').find('.tab-pane').removeClass('active')
                $(this).parents('.sub-tab').siblings('.tab-content').find(href).addClass('active')

            })

            if (window.location.hash.substr(1) !== "") {
                $('[href$=' + window.location.hash.substr(1) + ']').click()
            }

            $(".close-job").on('click', function() {
                $('#close').modal('show')
            });

            $('.cancel-close-job').on('click', function() {
                $('#close').modal('hide')
            })

            $(".upload").on('click', function() {
                $('#upload').modal('show')
                $('#upload').find('h4').text($(this).data('user'))
                $('#upload').find('[name=candidate_id]').val($(this).data('candidate'))
                $('#upload').find('[name=job_id]').val($(this).data('job'))
            });

            $('.cancel-upload').on('click', function() {
                $('#upload').modal('hide')
                $('#upload').find('h4').text('')
                $('#upload').find('[name=candidate_id]').val('')
                $('#upload').find('[name=job_id]').val('')
                $('#upload').find('[name=mcu]').val('')
            })

            $(".offering").on('click', function() {
                $('#offering').modal('show')
                $('#offering').find('h4').text($(this).data('user'))
                $('#offering').find('[name=candidate_id]').val($(this).data('candidate'))
                $('#offering').find('[name=job_id]').val($(this).data('job'))
            });

            $('.cancel-offer').on('click', function() {
                $('#offering').modal('hide')
                $('#offering').find('h4').text('')
                $('#offering').find('[name=candidate_id]').val('')
                $('#offering').find('[name=job_id]').val('')
                $('#offering').find('[name=mcu]').val('')
            })


            $('#invitation').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                height: 300,
            });

            $(".invite.interview").on('click', function() {
                $('#interview-modal').modal('show')
                $('#interview-modal').find('h4').text($(this).data('user'))
                $('#interview-modal').find('.candidate-name').text($(this).data('user'))
                $('#interview-modal').find('[name=date-interview]').on('change', function() {
                    $('#interview-modal').find('.date').text($(this).val())
                })
                $('#interview-modal').find('[name=place-interview]').on('change', function() {
                    $('#interview-modal').find('.place').text($(this).val())
                })
                $('#interview-modal').find('[name=time-interview]').on('change', function() {
                    $('#interview-modal').find('.time').text($(this).val())
                })
                $('#interview-modal').find('.job-applied').val($(this).data('job-name'))


                var interviewers = $(this).data('interviewers')
                $('#interviewer').empty();
                $('[name=interviewer]').append('<option value="">Pilih Interviewer</option>')
                $('[name=interviewer]').append('<option value="' + interviewers[0] + '">' + interviewers[
                    0] + '</option>')
                $('[name=interviewer]').append('<option value="' + interviewers[1] + '">' + interviewers[
                    1] + '</option>')
                $('[name=interviewer]').append('<option value="' + interviewers[2] + '">' + interviewers[
                    2] + '</option>')
                $('[name=interviewer]').append('<option value="' + interviewers[3] + '">' + interviewers[
                    3] + '</option>')


                $('#interview-modal').find('[name=interviewer]').on('change', function() {
                    $('#interview-modal').find('.interviewer').text($(this).val())
                })

                $('#interview-modal').find('.job-applied').text($(this).data('job-name'))
                $('#interview-modal').find('[name=candidate_id]').val($(this).data('candidate'))
                $('#interview-modal').find('[name=job_id]').val($(this).data('job'))
            });

            $('.cancel-interview').on('click', function() {
                $('#interview-modal').modal('hide')
                $('#interview-modal').find('h4').text('')
                $('#interview-modal').find('.candidate-name').text('')
                $('#interview-modal').find('[name=candidate_id]').val('')
                $('#interview-modal').find('[name=job_id]').val('')
                $('#interview-modal').find('[name=mcu]').val('')
            })

            $('.copy').click(function(e) {
                e.preventDefault()
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val($(this).attr('href')).select();
                document.execCommand("copy");
                $temp.remove();
                $('.copied').show(200)
                setTimeout(function() {
                    $('.copied').hide(200)
                }, 2000)
            })

            $('a.btn.delete').click(function(e) {
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

            $(document).on('submit', '.tab-content form', function(e) {
                e.preventDefault()
                var data = {}
                var $form = $(this)
                $form.find('input').each(function(index, element) {
                    data[$(element).attr('name')] = $(element).attr('value')
                })

                var activeSubTab = []
                $('.sub-tab li.active a').each(function(index, a) {
                    activeSubTab.push(a.href.split('#')[1])
                })
                $.ajax({
                    url: $form.attr('action'),
                    method: 'POST',
                    data: data,
                    beforeSend: function() {
                        $('#dashboard .loading-screen').show()
                    },
                    success: function(result) {
                        // $('.job-candidate-progress').html(result)
                        // $('#dashboard .loading-screen').hide()
                        // if ($form.attr('action').includes('fail')) {
                        //     $('.lists .alert-success').html(
                        //         '<strong>Sukses!</strong> menggagalkan kandidat')
                        // } else {
                        //     $('.lists .alert-success').html(
                        //         '<strong>Sukses!</strong> meloloskan kandidat')
                        // }
                        // $('.lists .alert-success').show(500)
                        location.reload();
                        // setTimeout(function() {
                        //     $('.lists .alert-success').hide(500)
                        // }, 5000)

                        $('#tabs a').click(function(e) {
                            $(this).tab('show')
                        })
                        $('.sub-tab li a').click(function(e) {
                            e.preventDefault()
                            $(this).tab('show')
                        })
                        var step = window.location.href.split('#')[1]
                        $('.list-item.active').removeClass('active')
                        $("#" + step).addClass('active')

                        $('#tabs li.active').removeClass('active')
                        $('[href="#' + step + '"]').parents('li').addClass('active')


                        $('.sub-tab li.active').removeClass('active')
                        $('.list-item .list-item.active').removeClass('active')
                        activeSubTab.forEach(function(tab) {
                            $('[href="#' + tab + '"]').parents('li').addClass('active')
                            $('#' + tab).addClass('active')
                            console.log($('[href="#' + tab + '"]').parents('li'))
                        })
                    },
                    error: function() {
                        // $('#dashboard .loading-screen').hide()
                        // if ($form.attr('action').includes('fail')) {
                        //     $('.lists .alert-danger').html(
                        //         '<strong>Error!</strong> menggagalkan kandidat')
                        // } else {
                        //     $('.lists .alert-danger').html(
                        //         '<strong>Error!</strong> meloloskan kandidat')
                        // }
                        // $('.lists .alert-danger').show(500)
                        location.reload();
                        // setTimeout(function() {
                        //     $('.lists .alert-danger').hide(500)
                        // }, 5000)
                    }
                })
            })
        })
    </script>
@endpush
