@extends('layouts.dashboard')

@section('breadcrumb')
    <b>Ttoal Kandidat</b>
@stop

@section('content')
    <div class="list-item tab-pane active" role="tabpanel" id="candidate-list">
        <div class="visible-xs-block">
            <h2><i class="fa fa-user-circle"></i>&nbsp;KANDIDAT</h2>
        </div>
        {{-- <ul class="nav nav-tabs sub-tab text-center" role='tab-list'>
            <li role="presentation" class="active"><a href="#all">Semua
                    ({{ $job->candidateProgress('>=', 0)->count() }})</a></li>
            <li role="presentation"><a href="#not-matched">Tidak Match
                    ({{ $job->candidateProgressStatus('=', 0, 0)->count() }})</a></li>
        </ul> --}}

        {{-- list --}}
        <div class="tab-content">
            <div class="list-item tab-pane active" role='tabpanel' id='all'>
                <div class="item">
                    <table id="table-all" class="table table-striped table-bordered row-border order-column"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th width="3%" class="all"></th>
                                <th width="20%" class="all">NAMA</th>
                                <th width="20%" class="min-tablet">LOKASI</th>
                                <th width="10%" class="min-tablet">PENDIDIKAN</th>
                                <th width="10%" class="min-tablet">PENGALAMAN</th>
                                <th width="5%" class="min-tablet">PROGRESS</th>
                                <th width="5%" class="min-tablet">KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($job->candidateProgress('>=', 0) as $candidate)
                                <tr>
                                    <td align="center">
                                        <div class="picture"
                                            style="height: auto !important;overflow: auto !important;float: none;border-radius: 0px;">
                                            @if ($candidate->photo)
                                                <img src="{{ asset($candidate->photo ? 'upload/candidates/' . md5($candidate->candidate_id . 'folder') . '/' . $candidate->photo : 'img/no-pic.jpg') }}"
                                                    style="width: 30px !important;">
                                            @else
                                                <img src="{{ asset('img/no-pic.jpg') }}" style="width: 30px !important;">
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a class='view-profile' onclick="showProfile('{{ $candidate->candidate_id }}')"
                                                onclick="showProfile('{{ $candidate->candidate_id }}')"
                                                href='#{{ $candidate->candidate_id }}'
                                                data-candidate='{{ $candidate->candidate_id }}'>{{ $candidate->user->name }}
                                            </a>
                                            <div style="margin-top: 10px">
                                                @if ($candidate->age < $umurMin)
                                                    <span class="label label-warning">Usia belum mencukupi</span>
                                                @elseif($candidate->age > $umurMax)
                                                    <span class="label label-warning">Melebihi batas usia</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div><i class="fa fa-map-marker"></i>
                                            {{ $candidate->city ? $candidate->city->city . ', ' . $candidate->province->province : '' }}
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            {{ $candidate->educations->first() ? $candidate->educations->first()->qualification() : '-' }}
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ $candidate->experience }} Tahun</div>
                                    </td>
                                    <td>
                                        <!-- <div class="blue-text">{{ $candidate->match($job->id) }} %</div> -->
                                        <div class="progress">
                                            <?php $presentase = $candidate->match($job->id); ?>
                                            @if ($presentase < 25)
                                                <div class="progress-bar progress-bar-danger" role="progressbar"
                                                    aria-valuenow="{{ $candidate->match($job->id) }}" aria-valuemin="0"
                                                    aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
                                                @elseif($presentase < 50)
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                        aria-valuenow="{{ $candidate->match($job->id) }}" aria-valuemin="0"
                                                        aria-valuemax="100"
                                                        style="width:{{ $candidate->match($job->id) }}%">
                                                    @elseif($presentase < 75)
                                                        <div class="progress-bar progress-bar-primary" role="progressbar"
                                                            aria-valuenow="{{ $candidate->match($job->id) }}"
                                                            aria-valuemin="0" aria-valuemax="100"
                                                            style="width:{{ $candidate->match($job->id) }}%">
                                                        @else
                                                            <div class="progress-bar progress-bar-success"
                                                                role="progressbar"
                                                                aria-valuenow="{{ $candidate->match($job->id) }}"
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width:{{ $candidate->match($job->id) }}%">
                                            @endif
                                            {{ $candidate->match($job->id) }}%
                                        </div>

                                    <td align="center">
                                        <div>
                                            @if ($candidate->pivot->progress == 0 && $candidate->pivot->status == 0)
                                                <div class="va-table">
                                                    <div class="va-middle">
                                                        <form method='POST' action='{{ route('fail') }}'>
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="candidate_id"
                                                                value="{{ $candidate->id }}">
                                                            <input type="hidden" name="job_id"
                                                                value="{{ $job->id }}">
                                                            <input type="hidden" name="step_id" value="0">
                                                            <button class='btn btn-danger'
                                                                style="font-size: 10px;">Tidak Terima&nbsp;<i
                                                                    class="fa fa-close"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="va-middle">
                                                        <form method='POST' action='{{ route('pass') }}'>
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="candidate_id"
                                                                value="{{ $candidate->id }}">
                                                            <input type="hidden" name="job_id"
                                                                value="{{ $job->id }}">
                                                            <input type="hidden" name="matched" value='1'>
                                                            <input type="hidden" name="step_id" value="0">
                                                            <button class='btn btn-success'
                                                                style="font-size: 10px;">Terima&nbsp;<i
                                                                    class="fa fa-check-circle"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @else
                                                @if ($candidate->pivot->status == 33 && $candidate->pivot->progress > 0)
                                                    <span class="label label-danger"><i>Gagal pada
                                                            {{ $candidate->progress() }}</i></span>
                                                @elseif($candidate->pivot->status == 33 && $candidate->pivot->progress == 0)
                                                    <span class="label label-danger"><i>Gagal</i></span>
                                                @elseif($candidate->pivot->status == 1 && $candidate->pivot->progress == 0)
                                                    <span class="label label-info">Tahap matched</span>
                                                @elseif($candidate->pivot->status == 2 && $candidate->pivot->progress == 0)
                                                    <span class="label label-info">Tahap shortlisted</span>
                                                @elseif($candidate->pivot->status == 0)
                                                    <span class="label label-info">Tahap
                                                        {{ $candidate->progress() }}</span>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

        </div>

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
                var tablejobs = $('#table-all').DataTable({
                    responsive: true,
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis'],
                    /*scrollX: true,
                    scrollCollapse: true,*/
                    paging: true
                });

                /*new $.fn.dataTable.FixedHeader(table);*/

                tablejobs.buttons().container()
                    .appendTo('#table-all_wrapper .col-sm-6:eq(0)');
            })

            $('#table-all tbody').on('click', 'td.details-control', function() {
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


            $(function() {
                var tablejobs2 = $('#table-not-matched').DataTable({
                    responsive: true,
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis'],
                    /*scrollX: true,
                    scrollCollapse: true,*/
                    paging: true
                });

                /*new $.fn.dataTable.FixedHeader(table);*/

                tablejobs2.buttons().container()
                    .appendTo('#table-not-matched_wrapper .col-sm-6:eq(0)');
            })

            $('#table-not-matched tbody').on('click', 'td.details-control', function() {
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

    @endsection
