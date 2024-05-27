<div class="list-item tab-pane" role="tabpanel" id="interview">
    <div class="visible-xs-block">
        <h2><i class="fa fa-exchange"></i>&nbsp;INTERVIEW</h2>
    </div>
    <ul class="nav nav-tabs sub-tab text-center" role='tab-list'>
        <?php
        $pass = $job->candidateProgress('>', 7);
        
        $fail = $job->candidateProgressStatus('=', 3, 33);
        $fail = $fail->merge($job->candidateProgressStatus('=', 4, 33));
        $fail = $fail->merge($job->candidateProgressStatus('=', 5, 33));
        $fail = $fail->merge($job->candidateProgressStatus('=', 6, 33));
        $fail = $fail->merge($job->candidateProgressStatus('=', 7, 33));
        
        $not_checked = $job->candidateProgressStatus('=', 3, 0);
        $not_checked = $not_checked->merge($job->candidateProgressStatus('=', 4, 0));
        $not_checked = $not_checked->merge($job->candidateProgressStatus('=', 5, 0));
        $not_checked = $not_checked->merge($job->candidateProgressStatus('=', 6, 0));
        $not_checked = $not_checked->merge($job->candidateProgressStatus('=', 7, 0));
        
        $interviewers = [];
        foreach ($job->interviews as $key => $value) {
            array_push($interviewers, $value->interviewer);
        }
        
        //dd($interviewers);
        
        ?>
        <li role="presentation" class="active"><a href="#interview-not-checked">Belum Diperiksa
                ({{ $not_checked->count() }})</a></li>
        <li role="presentation"><a href="#interview-pass">Lolos ({{ $pass->count() }})</a></li>
        <li role="presentation"><a href="#interview-fail">Gagal ({{ $fail->count() }})</a></li>
    </ul>

    <div class="tab-content">

        <div class="list-item tab-pane active" role='tab-panel' id='interview-not-checked'>
            <?php $interviews = $job->interviews; ?>
            <?php $result = ['Not Recommended', 'Recommended', 'To Be Considered', '<em>(Belum dinilai)</em>']; ?>
            <?php $class = ['danger', 'success', 'warning', 'default']; ?>


            <div class="item">
                <table id="table-interview-not-checked"
                    class="table table-striped table-bordered row-border order-column" style="width:100%">
                    <thead>
                        <tr>
                            <th width="3%" class="all"></th>
                            <th width="30%" class="all">NAMA</th>
                            <th width="10%" class="min-tablet">SCORE</th>
                            <th width="50%" class="min-tablet">INTERVIEWER</th>
                            <th width="5%" class="min-tablet">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($job->candidateProgress('>=', 3) as $candidate)
                            @if ($candidate->pivot->status == 0 && $candidate->pivot->progress < 8)
                                <?php $interview = [$job->interviewResults($interviews->get(0)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(0)->id, $job->id, $candidate->id)['result'] : 3, $job->interviewResults($interviews->get(1)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(1)->id, $job->id, $candidate->id)['result'] : 3, $job->interviewResults($interviews->get(2)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(2)->id, $job->id, $candidate->id)['result'] : 3, $job->interviewResults($interviews->get(3)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(3)->id, $job->id, $candidate->id)['result'] : 3, $job->interviewResults($interviews->get(4)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(4)->id, $job->id, $candidate->id)['result'] : 3]; ?>
                                <tr>
                                    <td align="center" width="3%">
                                        <div class="picture"
                                            style="height: auto !important;overflow: auto !important;float: none;border-radius: 0px;">
                                            @if ($candidate->photo)
                                                <img src="{{ asset($candidate->photo ? 'upload/candidates/' . md5($candidate->candidate_id . 'folder') . '/' . $candidate->photo : 'img/no-pic.jpg') }}"
                                                    style="width: 30px !important;">
                                            @else
                                                <img src="{{ asset('img/no-pic.jpg') }}"
                                                    style="width: 30px !important;">
                                            @endif
                                        </div>
                                    </td>
                                    <td width="30%">
                                        <div><a class='view-profile'
                                                onclick="showProfile('{{ $candidate->candidate_id }}')"
                                                href='#{{ $candidate->candidate_id }}'
                                                data-candidate='{{ $candidate->candidate_id }}'>{{ $candidate->user->name }}</a>
                                        </div>
                                    </td>
                                    <td width="10%" align="center">
                                        <div><a href="{{ route('interview-candidate', [$job->job_id, $candidate->candidate_id]) }}"
                                                data-toggle="tooltip" data-original-title="Lihat Scoring Interview"><i
                                                    class="fa fa-external-link-square" style="font-size: 20px;"></i></a>
                                        </div>
                                    </td>
                                    <td width="50%">
                                        <div class="va-table">
                                            <div class="va-middle result {{ $class[$interview[0]] }}">
                                                <div class="btn"
                                                    style="font-size: 10px !important;margin-right: 5px;">
                                                    <div class='interviewer'><b>HC 1</b></div>
                                                    <div class="detail">{!! $result[$interview[0]] !!}</div>
                                                </div>
                                            </div>

                                            <div class="va-middle result {{ $class[$interview[1]] }}">
                                                <div class="btn"
                                                    style="font-size: 10px !important;margin-right: 5px;">
                                                    <div class='interviewer'><b>HC 2</b></div>
                                                    <div class="detail">{!! $result[$interview[1]] !!}</div>
                                                </div>
                                            </div>

                                            <div class="va-middle result {{ $class[$interview[2]] }}">
                                                <div class="btn"
                                                    style="font-size: 10px !important;margin-right: 5px;">
                                                    <div class='interviewer'><b>User 1</b></div>
                                                    <div class="detail">{!! $result[$interview[2]] !!}</div>
                                                </div>
                                            </div>

                                            <div class="va-middle result {{ $class[$interview[3]] }}">
                                                <div class="btn"
                                                    style="font-size: 10px !important;margin-right: 5px;">
                                                    <div class='interviewer'><b>User 2</b></div>
                                                    <div class="detail">{!! $result[$interview[3]] !!}</div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                    <td width="5%">
                                        <div class="pull-right">
                                            @if ($candidate->pivot->progress >= 3 && $candidate->pivot->progress <= 7 && $candidate->pivot->status == 0)
                                                <div class="va-table width-100">
                                                    <div class="va-middle width-50">
                                                        <form method='POST' action='{{ route('fail-candidates') }}'>
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="candidate_id"
                                                                value="{{ $candidate->id }}">
                                                            <input type="hidden" name="job_id"
                                                                value="{{ $job->id }}">
                                                            <input type="hidden" name="step_id" value="3">
                                                            <button class='btn btn-danger width-100'
                                                                style="margin-right: 5px;"><i
                                                                    class="fa fa-close"></i>&nbsp;Gagal</button>
                                                        </form>
                                                    </div>
                                                    <div class="va-middle width-50">
                                                        <form method='POST' action='{{ route('pass-candidates') }}'>
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="candidate_id"
                                                                value="{{ $candidate->id }}">
                                                            <input type="hidden" name="job_id"
                                                                value="{{ $job->id }}">
                                                            <input type="hidden" name="step_id" value="3">
                                                            <button class='btn btn-success width-100'><i
                                                                    class="fa fa-check"></i>&nbsp;Lolos</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{-- <!-- --}}
                                                <div class="va-table width-100">
                                                    <div class="va-middle width-100">
                                                        <a href="#interview-modal"
                                                            class='btn btn-primary invite interview width-100'
                                                            data-candidate='{{ $candidate->id }}'
                                                            data-job-name='{{ $job->title }}'
                                                            data-job='{{ $job->id }}'
                                                            data-user='{{ $candidate->user->name }}'
                                                            data-interviewers='{{ collect($interviewers) }}'>Undang
                                                            interview</a>
                                                    @else
                                                        @if ($candidate->pivot->progress >= 3 && $candidate->pivot->progress <= 7 && $candidate->pivot->status == 33)
                                                            <span class="label label-danger"><i>Gagal</i></span>
                                                        @endif
                                            @endif
                                        </div>
            </div>
            {{-- --> --}}

        </div>
        </td>
        </tr>
        @endif
        @endforeach
        </tbody>
        </table>
    </div>

</div>

<div class="list-item tab-pane" role='tab-panel' id='interview-pass'>
    <div class="item">
        <table id="table-interview-pass" class="table table-striped table-bordered row-border order-column"
            style="width:100%">
            <thead>
                <tr>
                    <th width="3%" class="all"></th>
                    <th width="30%" class="all">NAMA</th>
                    <th width="10%" class="min-tablet">SCORE</th>
                    <th width="50%" class="min-tablet">INTERVIEWER</th>
                    <th width="5%" class="min-tablet">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pass as $candidate)
                    <?php $interview = [$job->interviewResults($interviews->get(0)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(0)->id, $job->id, $candidate->id) : 3, $job->interviewResults($interviews->get(1)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(1)->id, $job->id, $candidate->id) : 3, $job->interviewResults($interviews->get(2)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(2)->id, $job->id, $candidate->id) : 3, $job->interviewResults($interviews->get(3)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(3)->id, $job->id, $candidate->id) : 3, $job->interviewResults($interviews->get(4)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(4)->id, $job->id, $candidate->id) : 3]; ?>
                    <tr>
                        <td align="center" width="3%">
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
                        <td width="30%">
                            <div><a class='view-profile' onclick="showProfile('{{ $candidate->candidate_id }}')"
                                    href='#{{ $candidate->candidate_id }}'
                                    data-candidate='{{ $candidate->candidate_id }}'>{{ $candidate->user->name }}</a>
                            </div>
                        </td>
                        <td width="10%" align="center">
                            <div><a href="{{ route('interview-candidate', [$job->job_id, $candidate->candidate_id]) }}"
                                    data-toggle="tooltip" data-original-title="Lihat Form Interview"><i
                                        class="fa fa-file-text" style="font-size: 20px;"></i></a></div>
                        </td>
                        <td width="50%">
                            <div class="va-table">
                                <div class="va-middle result {{ $class[$interview[0]] }}">
                                    <div class="btn" style="font-size: 10px !important;margin-right: 5px;">
                                        <div class='interviewer'><b>HC 1</b></div>
                                        <div class="detail">{!! $result[$interview[0]] !!}</div>
                                    </div>
                                </div>

                                <div class="va-middle result {{ $class[$interview[1]] }}">
                                    <div class="btn" style="font-size: 10px !important;margin-right: 5px;">
                                        <div class='interviewer'><b>HC 2</b></div>
                                        <div class="detail">{!! $result[$interview[1]] !!}</div>
                                    </div>
                                </div>

                                <div class="va-middle result {{ $class[$interview[2]] }}">
                                    <div class="btn" style="font-size: 10px !important;margin-right: 5px;">
                                        <div class='interviewer'><b>User 1</b></div>
                                        <div class="detail">{!! $result[$interview[2]] !!}</div>
                                    </div>
                                </div>

                                <div class="va-middle result {{ $class[$interview[3]] }}">
                                    <div class="btn" style="font-size: 10px !important;margin-right: 5px;">
                                        <div class='interviewer'><b>User 2</b></div>
                                        <div class="detail">{!! $result[$interview[3]] !!}</div>
                                    </div>
                                </div>

                            </div>
                        </td>
                        <td width="5%">
                            <div>
                                <span class="label label-info">Lolos</span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="list-item tab-pane" role='tab-panel' id='interview-fail'>
    <div class="item">
        <table id="table-interview-fail" class="table table-striped table-bordered row-border order-column"
            style="width:100%">
            <thead>
                <tr>
                    <th width="3%" class="all"></th>
                    <th width="30%" class="all">NAMA</th>
                    <th width="10%" class="min-tablet">SCORE</th>
                    <th width="50%" class="min-tablet">INTERVIEWER</th>
                    <th width="5%" class="min-tablet">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fail as $candidate)
                    <?php $interview = [$job->interviewResults($interviews->get(0)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(0)->id, $job->id, $candidate->id) : 3, $job->interviewResults($interviews->get(1)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(1)->id, $job->id, $candidate->id) : 3, $job->interviewResults($interviews->get(2)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(2)->id, $job->id, $candidate->id) : 3, $job->interviewResults($interviews->get(3)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(3)->id, $job->id, $candidate->id) : 3, $job->interviewResults($interviews->get(4)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(4)->id, $job->id, $candidate->id) : 3]; ?>
                    <tr>
                        <td align="center" width="3%">
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
                        <td width="30%">
                            <div><a class='view-profile' onclick="showProfile('{{ $candidate->candidate_id }}')"
                                    href='#{{ $candidate->candidate_id }}'
                                    data-candidate='{{ $candidate->candidate_id }}'>{{ $candidate->user->name }}</a>
                            </div>
                        </td>
                        <td width="10%" align="center">
                            <div><a href="{{ route('interview-candidate', [$job->job_id, $candidate->candidate_id]) }}"
                                    data-toggle="tooltip" data-original-title="Lihat Form Interview"><i
                                        class="fa fa-file-text" style="font-size: 20px;"></i></a></div>
                        </td>
                        <td width="50%">
                            <div class="va-table">
                                <div class="va-middle result {{ $class[$interview[0]] }}">
                                    <div class="btn" style="font-size: 10px !important;margin-right: 5px;">
                                        <div class='interviewer'><b>HC 1</b></div>
                                        <div class="detail">{!! $result[$interview[0]] !!}</div>
                                    </div>
                                </div>

                                <div class="va-middle result {{ $class[$interview[1]] }}">
                                    <div class="btn" style="font-size: 10px !important;margin-right: 5px;">
                                        <div class='interviewer'><b>HC 2</b></div>
                                        <div class="detail">{!! $result[$interview[1]] !!}</div>
                                    </div>
                                </div>

                                <div class="va-middle result {{ $class[$interview[2]] }}">
                                    <div class="btn" style="font-size: 10px !important;margin-right: 5px;">
                                        <div class='interviewer'><b>User 1</b></div>
                                        <div class="detail">{!! $result[$interview[2]] !!}</div>
                                    </div>
                                </div>

                                <div class="va-middle result {{ $class[$interview[3]] }}">
                                    <div class="btn" style="font-size: 10px !important;margin-right: 5px;">
                                        <div class='interviewer'><b>User 2</b></div>
                                        <div class="detail">{!! $result[$interview[3]] !!}</div>
                                    </div>
                                </div>

                            </div>
                        </td>
                        <td width="5%">
                            <div>
                                <span class="label label-danger">Gagal</span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
    $(function() {
        var tablejobs1 = $('#table-interview-not-checked').DataTable({
            responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs1.buttons().container()
            .appendTo('#table-interview-not-checked_wrapper .col-sm-6:eq(0)');

        var tablejobs2 = $('#table-interview-pass').DataTable({
            responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs2.buttons().container()
            .appendTo('#table-interview-pass_wrapper .col-sm-6:eq(0)');

        var tablejobs3 = $('#table-interview-fail').DataTable({
            responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs3.buttons().container()
            .appendTo('#table-interview-fail_wrapper .col-sm-6:eq(0)');
    })

    $('#table-test-fail tbody').on('click', 'td.details-control', function() {
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

    $('#table-interview-not-checked tbody').on('click', 'td.details-control', function() {
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

    $('#table-interview-fail tbody').on('click', 'td.details-control', function() {
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
