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
                                <th width="3%" class="all"></th>
                                <th width="20%" class="all">NAMA</th>
                                <th width="20%" class="min-tablet">LOKASI</th>
                                <th width="10%" class="min-tablet">PENDIDIKAN</th>
                                <th width="10%" class="min-tablet">PENGALAMAN</th>
                                <th width="14%" class="min-tablet">EXPECTED SALARY</th>
                                {{-- <th width="14%" class="min-tablet">ACTION</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidates as $item)
                                <tr>
                                    <td>
                                        <img
                                            src="{{ asset($item->photo ? 'upload/candidates/' . md5($item->candidate_id . 'folder') . '/' . $item->photo : 'img/no-pic.jpg') }}" />
                                    </td>
                                    <td>
                                        {{-- <a class='view-profile' onclick='getCandidate({{ $item->candidate_id }})'
                                            href='#'
                                            data-candidate="{{ $item->candidate_id }}">{{ $item->user->name }}</a> --}}

                                        <a class='view-profile' onclick="getCandidate({{ $item->candidate_id }} )"
                                            href='#'
                                            data-candidate='{{ $item->candidate_id }}'>{{ $item->user->name }}</a>
                                    </td>
                                    <td>
                                        {!! $item->city
                                            ? '<i class="fa fa-map-marker"></i> ' . $item->city->city . ', ' . $item->province->province
                                            : '-' !!}
                                    </td>
                                    <td>
                                        @if ($item->education == 0)
                                            SMA / Sederajat
                                        @elseif($item->education == 1)
                                            D1-D4
                                        @elseif($item->education == 2)
                                            S1-S3
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->experience }} <span class='text-muted'>Tahun</span>
                                    </td>
                                    <td>
                                        <span class='text-muted'>Rp.</span> {{ $item->expected_salary }}
                                    </td>
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

        // $(function() {
        //     var tablejobs = $('#tabel-kandidat').DataTable({
        //         responsive: true,
        //         lengthChange: false,
        //         processing: true,
        //         paging: true,
        //         serverSide: true,
        //         ajax: "{{ route('dashboard-candidate-datatables') }}",
        //         columns: [{
        //                 render: function(data, type, row, meta) {
        //                     var content =
        //                         '<div class="picture" style="height: auto !important;overflow: auto !important;float: none;border-radius: 0px;">';
        //                     if (row.photo) {
        //                         var src = '{!! asset('uploads/candidates/' . md5(' + row.candidate_id +  "folder"  ') . '/' . "' + row.photo + '") !!}'
        //                     } else {
        //                         var src = "{{ asset('img/no-pic.jpg') }}"
        //                     }
        //                     content += '<img src="' + src + '" style="width: 30px !important">'
        //                     content += '</div>'
        //                     return content
        //                 }
        //             },
        //             {
        //                 render: function(data, type, row, meta) {
        //                     return "<div><a class='view-profile' onclick='getCandidate(\"" + row
        //                         .candidate_id + "\")' href='#' data-candidate='" + row
        //                         .candidate_id + "'>" + row.name + "</a></div>"
        //                 },
        //                 name: 'name'
        //             },
        //             {
        //                 render: function(data, type, row, meta) {
        //                     return row.city ? '<i class="fa fa-map-marker"></i> ' + row.city.city +
        //                         ', ' + row.province.province : '-'
        //                 },
        //                 name: 'location'
        //             },
        //             {
        //                 data: 'education',
        //                 name: 'education'
        //             },
        //             {
        //                 render: function(data, type, row, meta) {
        //                     return row.experience + " <span class='text-muted'>Tahun</span>"
        //                 },
        //                 name: 'experience'
        //             },
        //             {
        //                 data: 'expected_salary',
        //                 name: 'expected_salary'
        //             }
        //             //  	{render: function(data, type, row, meta){
        //             //  		var content = '<div class="va-table width-100">'
        //             // content += '<div class="va-middle ta-left" style="width: 20%;"><span class="text-muted">Rp</span></div>'
        //             // content += '<div class="va-middle ta-right" style="width: 80%;"><span class="thousand"></span></div>'
        //             // content += '</div>'
        //             // return content
        //             //  	}, name:'expected_salary'},
        //         ],
        //         buttons: ['copy', 'excel', 'pdf', 'colvis'],
        //         /*scrollX: true,
        //         scrollCollapse: true,*/
        //     });

        //     /*new $.fn.dataTable.FixedHeader(table);*/

        //     tablejobs.buttons().container()
        //         .appendTo('#tabel-kandidat_wrapper .col-sm-6:eq(0)');
        // })

        // $('#tabel-kandidat tbody').on('click', 'td.details-control', function() {
        //     var tr = $(this).closest('tr');
        //     var row = table.row(tr);

        //     if (row.child.isShown()) {
        //         // This row is already open - close it
        //         row.child.hide(500);
        //         tr.removeClass('shown');
        //     } else {
        //         // Open this row
        //         row.child(format(row.data())).show(500);
        //         tr.addClass('shown');
        //     }
        // });

        $(function() {
            var tablejobs = $('#tabel-kandidat').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                /*scrollX: true,
                scrollCollapse: true,*/
                paging: true
            });

            /*new $.fn.dataTable.FixedHeader(table);*/

            tablejobs.buttons().container()
                .appendTo('#tabel-kandidat_wrapper .col-sm-6:eq(0)');
        })
    </script>
@endpush
