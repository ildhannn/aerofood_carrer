@extends('layouts.dashboard')

@section('breadcrumb')
    <b>Lowongan</b>
@stop

@section('content')
    <div class="lists jobs-page">
        <a href="{{ route('create-job') }}" class='btn blue width-100-m visible-xs-block mar-b-1em-m'
            style="background-color: #5cb85c;"><i class="fa fa-plus"></i> Buat Lowongan Baru</a>
        <div class="list-title">
            <ul class="nav nav-tabs nav-tabs-colored text-center" role='tab-list' id='tabs'>
                <li role="presentation" class='active'><a href="#publish"><i class="fa fa-check-square-o"></i> <span
                            class="hidden-xs">Terpublish</span> (<span
                            class="text-primary"><b>{{ $jobs->where('status', 1)->count() }}</b></span>)</a></li>
                <li role="presentation"><a href="#closed"><i class="fa fa-calendar-times-o"></i> <span
                            class="hidden-xs">Tidak Aktif</span> (<span
                            class="text-primary"><b>{{ $jobs->where('status', 2)->count() }}</b></span>)</a></li>
                <li role="presentation"><a href="#draft"><i class="fa fa-pencil-square-o"></i> <span
                            class="hidden-xs">Draft</span> (<span
                            class="text-primary"><b>{{ $jobs->where('status', 0)->count() }}</b></span>)</a></li>
                <a href="{{ route('create-job') }}" class='btn blue pull-right hidden-xs'
                    style="width:auto;background-color: #5cb85c;"><i class="fa fa-plus"></i> Buat Lowongan Baru</a>
            </ul>
        </div>
        <div class="tab-content list-content">

            {{-- filter --}}
            {{-- <div class="list-filter">
                <div class="container-fluid">
                    <div class="row">
                        <form class="form-inline filter-job" method="GET" action="{{ route('dashboard-jobs') }}">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Cari nama lowongan" name='title'
                                    value="{{ Request::get('title') }}" />
                                <button class='btn btn-info'>Cari</button>
                            </div>
                            <div class="form-group pull-right">
                                <label>Urutkan</label>
                                <select class='form-control' name='updated'>
                                    <option value='newest' {{ Request::get('updated') == 'newest' ? 'selected' : '' }}>
                                        Terbaru</option>
                                    <option value='oldest' {{ Request::get('updated') == 'oldest' ? 'selected' : '' }}>
                                        Terlama</option>
                                </select>
                                <select class='form-control' name='field_id'>
                                    <option value=''>Pilih Bidang</option>
                                    @foreach ($fields as $field)
                                        <option value='{{ $field->id }}'
                                            {{ Request::get('field_id') == $field->id ? 'selected' : '' }}>
                                            {{ $field->field }}</option>
                                    @endforeach
                                </select>
                                <select class='form-control' name='province_id'>
                                    <option value=''>Pilih Lokasi</option>
                                    @foreach ($provinces as $province)
                                        <option value='{{ $province->id }}'
                                            {{ Request::get('province_id') == $province->id ? 'selected' : '' }}>
                                            {{ $province->province }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}

            {{-- PUBLISH --}}
            <div class="list-item tab-pane active" role="tabpanel" class="" id="publish">
                <div class="item pad-0-m">
                    <table id="tabel-low-publish" class="table table-striped table-bordered row-border order-column"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th width="25%" class="all">JOB TITLE</th>
                                <th width="20%" class="min-tablet-l">LOKASI</th>
                                <th width="55%" class="min-tablet-l">JOB PROGRESS</th>
                                <th width="10%" class="min-tablet-l">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs->where('status', 1) as $job)
                                <tr>
                                    <td>
                                        <div class="title">
                                            <a href="{{ route('detail-job', $job->id) }}"
                                                style="font-size: 14px;"><b>{{ $job->title }}</b></a>
                                            <span class="status">
                                                @if ($job->status == 0)
                                                    <span type="button" class="label label-warning"> Draft</span>
                                                @elseif($job->status == 1)
                                                    <span type="button" class="label label-success"> Terpublish</span>
                                                @else
                                                    <span type="button" class="label label-default"> Tidak Aktif</span>
                                                @endif
                                                {{ $job->start_date }}<br>
                                            </span>
                                        </div>
                                    </td>
                                    <td><i class="fa fa-map-marker"></i>
                                        {{ $job->city ? $job->city->city . ', ' . $job->province->province : '-' }}</td>
                                    <td>
                                        <div class="job-progress">

                                            <div class="step" data-toggle="tooltip" data-placement="top" title="Kandidat">
                                                <a
                                                    href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#candidate-list' }}">
                                                    <span class="number"><b>{{ $job->candidates->count() }}</b></span><br>
                                                    <span class="name">Kandidat</span>
                                                </a>
                                            </div>
                                            <div class="step" data-toggle="tooltip" data-placement="top" title="Matched">
                                                <a
                                                    href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#matched' }}">
                                                    <span
                                                        class="number"><b>{{ $job->candidateProgressStatus('=', 0, 1)->count() + $job->candidateProgressStatus('=', 0, 33)->count() }}</b></span><br>
                                                    <span class="name">Matched
                                                    </span>
                                                </a>
                                            </div>

                                            <div class="step" data-toggle="tooltip" data-placement="top"
                                                title="Shortlisted">
                                                <a
                                                    href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . 'shortlisted' }}">
                                                    <span
                                                        class="number"><b>{{ $job->candidateProgressStatus('=', 0, 2)->count() + $job->candidateProgressStatus('=', 0, 44)->count() }}</b></span><br>
                                                    <span class="name">Shortlisted
                                                    </span>
                                                </a>
                                            </div>
                                            <?php $interview = 0; ?>
                                            @foreach ($job->steps as $key => $step)
                                                @if ($step->id <= 2 || $step->id > 7)
                                                    <div class="step" data-toggle="tooltip" data-placement="top"
                                                        title="{{ $step->name }} \n due: {{ $step->pivot->due_date }}">
                                                        <a
                                                            href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#step_' . $step->id }}">
                                                            <span
                                                                class="number"><b>{{ $job->candidateProgress('=', $step->id)->count() }}</b></span><br>
                                                            <span class="name">
                                                                @if ($step->id == 1)
                                                                    PVI
                                                                @elseif($step->id == 8)
                                                                    MCU
                                                                @else
                                                                    {{ $step->name }}
                                                                @endif
                                                            </span>
                                                        </a>
                                                    </div>
                                                @else
                                                    <?php $interview += $job->candidateProgress('=', $step->id)->count(); ?>
                                                    @if ($job->steps[$key + 1]->id > 7)
                                                        <div class="step" data-toggle="tooltip" data-placement="top"
                                                            title="{{ $step->name }} \n due: {{ $step->pivot->due_date }}">
                                                            <a
                                                                href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#interview' }}">
                                                                <span class="number"><b>{{ $interview }}</b></span><br>
                                                                <span class="name">
                                                                    Interview
                                                                </span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('copy-job', ['id' => $job->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_job" value="{{ $job->id }}">
                                            <button type="submit" class="btn btn-warning">Copy Lowongan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CLOSED -->
            <div class="list-item tab-pane" role="tabpanel" class="" id="closed">
                <div class="item pad-0-m">
                    <table id="tabel-low-closed" class="table table-striped table-bordered row-border order-column"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th width="20%" class="all">JOB TITLE</th>
                                <th width="15%" class="min-tablet-l">LOKASI</th>
                                <th width="50%" class="min-tablet-l">JOB PROGRESS</th>
                                <th width="10%" class="min-tablet-l">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs->where('status', 2) as $job)
                                <tr>
                                    <td width="20%">
                                        <div class="title">
                                            <a href="{{ route('detail-job', $job->id) }}"
                                                style="font-size: 14px;"><b>{{ $job->title }}</b></a>
                                            <span class="status">
                                                @if ($job->status == 0)
                                                    <span type="button" class="label label-warning"> Draft</span>
                                                @elseif($job->status == 1)
                                                    <span type="button" class="label label-success"> Terpublish</span>
                                                @else
                                                    <span type="button" class="label label-default"> Tidak Aktif</span>
                                                @endif
                                                {{ $job->start_date }}<br>
                                            </span>
                                        </div>
                                    </td>
                                    <td width="15%"><i class="fa fa-map-marker"></i>
                                        {{ $job->city ? $job->city->city . ', ' . $job->province->province : '-' }}</td>
                                    <td width="50%">
                                        <div class="job-progress">

                                            <div class="step" data-toggle="tooltip" data-placement="top"
                                                title="Kandidat">
                                                <a
                                                    href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#candidate-list' }}">
                                                    <span class="number"><b>{{ $job->candidates->count() }}</b></span><br>
                                                    <span class="name">Kandidat
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="step" data-toggle="tooltip" data-placement="top"
                                                title="Matched">
                                                <a
                                                    href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#matched' }}">
                                                    <span
                                                        class="number"><b>{{ $job->candidateProgressStatus('=', 0, 1)->count() + $job->candidateProgressStatus('=', 0, 33)->count() }}</b></span><br>
                                                    <span class="name">Matched
                                                    </span>
                                                </a>
                                            </div>

                                            <div class="step" data-toggle="tooltip" data-placement="top"
                                                title="Shortlisted">
                                                <a
                                                    href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#shortlisted' }}">
                                                    <span
                                                        class="number"><b>{{ $job->candidateProgressStatus('=', 0, 2)->count() + $job->candidateProgressStatus('=', 0, 44)->count() }}</b></span><br>
                                                    <span class="name">Shortlisted
                                                    </span>
                                                </a>
                                            </div>
                                            <?php $interview = 0; ?>
                                            @foreach ($job->steps as $key => $step)
                                                @if ($step->id <= 2 || $step->id > 7)
                                                    <div class="step" data-toggle="tooltip" data-placement="top"
                                                        title="{{ $step->name }} \n due: {{ $step->pivot->due_date }}">
                                                        <a
                                                            href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#step_' . $step->id }}">
                                                            <span
                                                                class="number"><b>{{ $job->candidateProgress('=', $step->id)->count() }}</b></span><br>
                                                            <span class="name">
                                                                @if ($step->id == 1)
                                                                    PVI
                                                                @elseif($step->id == 8)
                                                                    MCU
                                                                @else
                                                                    {{ $step->name }}
                                                                @endif
                                                            </span>
                                                        </a>
                                                    </div>
                                                @else
                                                    <?php $interview += $job->candidateProgress('=', $step->id)->count(); ?>
                                                    @if ($job->steps[$key + 1]->id > 7)
                                                        <div class="step" data-toggle="tooltip" data-placement="top"
                                                            title="{{ $step->name }} \n due: {{ $step->pivot->due_date }}">
                                                            <a
                                                                href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#interview' }}">
                                                                <span class="number"><b>{{ $interview }}</b></span><br>
                                                                <span class="name">
                                                                    Interview
                                                                </span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('copy-job', ['id' => $job->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_job" value="{{ $job->id }}">
                                            <button type="submit" class="btn btn-warning">Copy Lowongan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- DRAFT -->
            <div class="list-item tab-pane" role="tabpanel" class="" id="draft">
                <div class="item pad-0-m">
                    <table id="tabel-low-draft" class="table table-striped table-bordered row-border order-column"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th width="20%" class="all">JOB TITLE</th>
                                <th width="15%" class="min-tablet-l">LOKASI</th>
                                <th width="50%" class="min-tablet-l">JOB PROGRESS</th>
                                <th width="10%" class="min-tablet-l">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs->where('status', 0) as $job)
                                <tr>
                                    <td width="20%">
                                        <div class="title">
                                            <a href="{{ route('detail-job', $job->id) }}"
                                                style="font-size: 14px;"><b>{{ $job->title }}</b></a>
                                            <span class="status">
                                                @if ($job->status == 0)
                                                    <span type="button" class="label label-warning"> Draft</span>
                                                @elseif($job->status == 1)
                                                    <span type="button" class="label label-success"> Terpublish</span>
                                                @else
                                                    <span type="button" class="label label-default"> Tidak Aktif</span>
                                                @endif
                                                {{ $job->start_date }}<br>
                                            </span>
                                        </div>
                                    </td>
                                    <td width="15%"><i class="fa fa-map-marker"></i>
                                        {{ $job->city ? $job->city->city . ', ' . $job->province->province : '-' }}</td>
                                    <td width="50%">
                                        <div class="job-progress">

                                            <div class="step" data-toggle="tooltip" data-placement="top"
                                                title="Kandidat">
                                                <a
                                                    href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#candidate-list' }}">
                                                    <span class="number"><b>{{ $job->candidates->count() }}</b></span><br>
                                                    <span class="name">Kandidat
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="step" data-toggle="tooltip" data-placement="top"
                                                title="Matched">
                                                <a
                                                    href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#matched' }}">
                                                    <span
                                                        class="number"><b>{{ $job->candidateProgressStatus('=', 0, 1)->count() + $job->candidateProgressStatus('=', 0, 33)->count() }}</b></span><br>
                                                    <span class="name">Matched
                                                    </span>
                                                </a>
                                            </div>

                                            <div class="step" data-toggle="tooltip" data-placement="top"
                                                title="Shortlisted">
                                                <a
                                                    href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#shortlisted' }}">
                                                    <span
                                                        class="number"><b>{{ $job->candidateProgressStatus('=', 0, 2)->count() + $job->candidateProgressStatus('=', 0, 44)->count() }}</b></span><br>
                                                    <span class="name">Shortlisted
                                                    </span>
                                                </a>
                                            </div>
                                            <?php $interview = 0; ?>
                                            @foreach ($job->steps as $key => $step)
                                                @if ($step->id <= 2 || $step->id > 7)
                                                    <div class="step" data-toggle="tooltip" data-placement="top"
                                                        title="{{ $step->name }} \n due: {{ $step->pivot->due_date }}">
                                                        <a
                                                            href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#step_' . $step->id }}">
                                                            <span
                                                                class="number"><b>{{ $job->candidateProgress('=', $step->id)->count() }}</b></span><br>
                                                            <span class="name">
                                                                @if ($step->id == 1)
                                                                    PVI
                                                                @elseif($step->id == 8)
                                                                    MCU
                                                                @else
                                                                    {{ $step->name }}
                                                                @endif
                                                            </span>
                                                        </a>
                                                    </div>
                                                @else
                                                    <?php $interview += $job->candidateProgress('=', $step->id)->count(); ?>
                                                    @if ($job->steps[$key + 1]->id > 7)
                                                        <div class="step" data-toggle="tooltip" data-placement="top"
                                                            title="{{ $step->name }} \n due: {{ $step->pivot->due_date }}">
                                                            <a
                                                                href="{{ url('admin-dashboard/job/detail') . '/' . $job->id . '#interview' }}">
                                                                <span class="number"><b>{{ $interview }}</b></span><br>
                                                                <span class="name">
                                                                    Interview
                                                                </span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('copy-job', ['id' => $job->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_job" value="{{ $job->id }}">
                                            <button type="submit" class="btn btn-warning">Copy Lowongan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@stop

@push('scripts')
    <script type="text/javascript">
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
            $('#tabs li a').click(function(e) {
                e.preventDefault()
                $(this).tab('show')
            })

            $('.filter-job').on('submit', function(e) {
                e.preventDefault()
                window.location.search = 'title=' + $('[name=title]').val() + '&updated=' + $(
                        '[name=updated]').val() + '&field_id=' + $('[name=field_id]').val() +
                    '&province_id=' + $('[name=province_id]').val()
            })
            $('[name=updated]').on('change', function() {
                window.location.search = 'title=' + $('[name=title]').val() + '&updated=' + $(this).val() +
                    '&field_id=' + $('[name=field_id]').val() + '&province_id=' + $('[name=province_id]')
                    .val()
            })
            $('[name=field_id]').on('change', function() {
                window.location.search = 'title=' + $('[name=title]').val() + '&updated=' + $(
                    '[name=updated]').val() + '&field_id=' + $(this).val() + '&province_id=' + $(
                    '[name=province_id]').val()
            })
            $('[name=province_id]').on('change', function() {
                window.location.search = 'title=' + $('[name=title]').val() + '&updated=' + $(
                        '[name=updated]').val() + '&field_id=' + $('[name=field_id]').val() +
                    '&province_id=' + $(this).val()
            })
        })
        $(function() {
            var tablejobs1 = $('#tabel-low-publish').DataTable({
                responsive: true,
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                paging: true
            });

            tablejobs1.buttons().container().appendTo('#tabel-low-publish_wrapper .col-sm-6:eq(0)');


            var tablejobs2 = $('#tabel-low-closed').DataTable({
                responsive: true,
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                paging: true
            });

            tablejobs2.buttons().container().appendTo('#tabel-low-closed_wrapper .col-sm-6:eq(0)');


            var tablejobs3 = $('#tabel-low-draft').DataTable({
                responsive: true,
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                paging: true
            });

            tablejobs3.buttons().container().appendTo('#tabel-low-draft_wrapper .col-sm-6:eq(0)');

        })

        $('#tabel-low-publish tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide(500);
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show(500);
                tr.addClass('shown');
            }
        });

        $('#tabel-low-closed tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide(500);
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show(500);
                tr.addClass('shown');
            }
        });

        $('#tabel-low-draft tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide(500);
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show(500);
                tr.addClass('shown');
            }
        });
    </script>
@endpush
