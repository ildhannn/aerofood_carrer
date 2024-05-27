@extends('layouts.dashboard')

@section('breadcrumb')
    <b>Kandidat</b>
@stop


@section('content')
    <div class="header-sub">
        <div class="va-table width-100">
            <div class="va-middle width-50">KANDIDAT</div>
            <div class="va-middle width-50 ta-right"><i class="fa fa-user"></i></div>
        </div>
    </div>
    <div class="lists candidate">
        <div class="list-content">

            {{-- filter --}}
            {{-- <div class="list-filter">
			    <div class="container-fluid">
                    <div class="row">
                        <form class="form-inline" method='GET' action="{{route('dashboard-candidate')}}">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Cari nama kandidat" name='name' value='{{Request::get("name")}}' />
                                <button class='btn btn-info'>Cari</button>
                            </div>
                            <div class="form-group pull-right">
                                <label>Urutkan</label>
                                <select class='form-control' name='updated'>
                                    <option value='newest' {{Request::get('updated') == 'newest' ? 'selected' : ''}}>Terbaru</option>
                                    <option value='oldest' {{Request::get('updated') == 'oldest' ? 'selected' : ''}}>Terlama</option>
                                </select>
                                <select class='form-control' name='qualification'>
                                            <option value=''>Pilih Pendidikan Terakhir</option>
                                            <option value='0' {{Request::get('qualification') == '0' ? 'selected' : '' }}>SMA/Sederajat</option>
                                            <option value='1' {{Request::get('qualification') == '1' ? 'selected' : '' }}>D1</option>
                                            <option value='2' {{Request::get('qualification') == '2' ? 'selected' : '' }}>D2</option>
                                            <option value='3' {{Request::get('qualification') == '3' ? 'selected' : '' }}>D3</option>
                                            <option value='4' {{Request::get('qualification') == '4' ? 'selected' : '' }}>D4</option>
                                            <option value='5' {{Request::get('qualification') == '5' ? 'selected' : '' }}>S1</option>
                                            <option value='6' {{Request::get('qualification') == '6' ? 'selected' : '' }}>S2</option>
                                            <option value='7' {{Request::get('qualification') == '7' ? 'selected' : '' }}>S3</option>
                                </select>
                                <select class=form-control name='province_id'>
                                    <option value='0'>Pilih Lokasi</option>
                                    @foreach ($provinces as $province)
                                                <option value='{{$province->id}}' {{Request::get('province_id') == $province->id ? 'selected' : ''}}>{{$province->province}}</option>
                                            @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
			    </div>
		    </div>  --}}

            <div class="list-item">
                <div class="item pad-0-m">
                    <table id="tabel-kandidat" class="table table-striped table-bordered row-border order-column"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="all">LOWONGAN</th>
                                <th class="min-tablet">TOTAL PELAMAR</th>
                                <th class="min-tablet-l">LOKASI</th>
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
                                    <td>
                                        <a href="{{ url('admin-dashboard/total') . '/' . $job->id . '#candidate-list' }}">
                                            <span class="number"><b>{{ $job->candidates->count() }}</b></span><br>
                                            <span class="name">Kandidat</span>
                                        </a>
                                    </td>
                                    <td><i class="fa fa-map-marker"></i>
                                        {{ $job->city ? $job->city->city . ', ' . $job->province->province : '-' }}</td>
                                    <td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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

    <div class="modal fade" id="pelamar" tabindex="-1" role="dialog" aria-labelledby="modal">
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

@push('scripts')
    <script type="text/javascript">
        function getCandidate(candidate) {
            $('#profile').modal('show');
            $.get("{{ url('/admin-dashboard/data-candidate') }}" + '/' + candidate, function(data, status) {
                $('#profile').find('.modal-body').html(data)

                $('#tabs li a').click(function(e) {
                    e.preventDefault()
                    $(this).tab('show')
                })
            });
        }

        function getCandidate(id) {
            $('#pelamar').modal('show');
            $.get("{{ url('/admin-dashboard/job/detail') }}" + '/' + id, function(data, status) {
                $('#pelamar').find('.modal-body').html(data)

                $('#tabs li a').click(function(e) {
                    e.preventDefault()
                    $(this).tab('show')
                })
            });
        }

        $(function() {
            var tablejobs = $('#tabel-kandidat').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                paging: true
            });
            tablejobs.buttons().container()
                .appendTo('#tabel-kandidat_wrapper .col-sm-6:eq(0)');
        })
    </script>
@endpush
