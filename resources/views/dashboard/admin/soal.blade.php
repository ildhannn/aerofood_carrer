@extends('layouts.dashboard')

@section('breadcrumb')
    <b>Master Soal</b>
@stop

@section('content')
    <div class="lists jobs-page">
        <a href="{{ route('dashboard-create-soal') }}" class='btn blue width-100-m visible-xs-block mar-b-1em-m'
            style="background-color: #5cb85c;"><i class="fa fa-plus"></i> Tambah Soal</a>
        <div class="list-title">
            <ul class="nav nav-tabs nav-tabs-colored text-center" role='tab-list' id='tabs'>
                <li role="presentation" class='active'><a href="#umum"> <span class="hidden-xs">Umum</span> (<span
                            class="text-primary"><b>{{ $soalintel->where('jenis_soal', 1)->count() }}</b></span>)</a></li>
                <li role="presentation"><a href="#verbal"> <span class="hidden-xs">Verbal</span> (<span
                            class="text-primary"><b>{{ $soalintel->where('jenis_soal', 2)->count() }}</b></span>)</a>
                </li>
                <li role="presentation"><a href="#logis"> <span class="hidden-xs">Berpikir Logis</span> (<span
                            class="text-primary"><b>{{ $soalintel->where('jenis_soal', 3)->count() }}</b></span>)</a></li>
                <li role="presentation"><a href="#hitung"> <span class="hidden-xs">Berhitung</span> (<span
                            class="text-primary"><b>{{ $soalintel->where('jenis_soal', 4)->count() }}</b></span>)</a></li>
                <li role="presentation"><a href="#induktif"> <span class="hidden-xs">Induktif</span> (<span
                            class="text-primary"><b>{{ $soalintel->where('jenis_soal', 5)->count() }}</b></span>)</a></li>
                <a href="{{ route('dashboard-create-soal') }}" class='btn blue pull-right hidden-xs'
                    style="width:auto;background-color: #5cb85c;"><i class="fa fa-plus"></i> Tambah Soal</a>
            </ul>
        </div>
        <div class="lists soal">
            <div class="tab-content list-content">
                <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="text-align:center;background:#dcdcdc;    ">
                                Konfirmasi Hapus Soal
                            </div>
                            <div class="modal-body" style="text-align:center">
                                <span style="text-transform: capitalize;">Anda yakin akan menghapus soal dengan ID
                                    <span id='idSoal'></span>?</span>
                            </div>
                            <div class="modal-footer">

                                <form method="POST" action="{{ route('delete-soal') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" id='inputID' name="id" value='' class='form-control'>
                                    <a class='btn btn-danger cancel-apply' href='#' style='width: 100px;'><i
                                            class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
                                    <button class='btn btn-success' type="submit">Hapus Soal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-item tab-pane active" role="tabpanel" class="" id="umum">
                    <div class="item pad-0-m">
                        <table id="tabel-soal-umum" class="table table-striped table-bordered row-border order-column"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="20%" class="all">PERTANYAAN</th>
                                    <th width="10%" class="min-tablet">OPSI A</th>
                                    <th width="10%" class="min-tablet">OPSI B</th>
                                    <th width="10%" class="min-tablet">OPSI C</th>
                                    <th width="10%" class="min-tablet">OPSI D</th>
                                    <th width="10%" class="min-tablet">OPSI E</th>
                                    <th width="10%" class="min-tablet">JAWABAN BENAR</th>
                                    <th width="5%">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soalintel->where('jenis_soal', 1) as $soal)
                                    <tr>
                                        <td>
                                            <div>{{ $soal->question }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_a }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_b }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_c }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_d }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_e }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->answer }}</div>
                                        </td>
                                        <td align="center">
                                            <a href="{{ route('dashboard-edit-soal', $soal->id) }}" data-toggle="tooltip"
                                                title="Ubah"><span class="btn btn-primary"><i
                                                        class="fa fa-pencil"></i></span></a>
                                            <a onclick="deleteSoal({{ $soal->id }},'{{ $soal->id }}')"
                                                class='deleteSoal' data-toggle="tooltip" title="Hapus"><span
                                                    class="btn btn-danger"><i class="fa fa-close"></i></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="list-item tab-pane" role="tabpanel" class="" id="verbal">
                    <div class="item pad-0-m">
                        <table id="tabel-soal-verbal" class="table table-striped table-bordered row-border order-column"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="10%" class="min-tablet">OPSI A</th>
                                    <th width="10%" class="min-tablet">OPSI B</th>
                                    <th width="10%" class="min-tablet">OPSI C</th>
                                    <th width="10%" class="min-tablet">OPSI D</th>
                                    <th width="10%" class="min-tablet">OPSI E</th>
                                    <th width="10%" class="min-tablet">JAWABAN BENAR</th>
                                    <th width="5%">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soalintel->where('jenis_soal', 2) as $soal)
                                    <tr>
                                        <td>
                                            <div>{{ $soal->option_a }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_b }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_c }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_d }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_e }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->answer }}</div>
                                        </td>
                                        <td align="center">
                                            <a href="{{ route('dashboard-edit-soal', $soal->id) }}" data-toggle="tooltip"
                                                title="Ubah"><span class="btn btn-primary"><i
                                                        class="fa fa-pencil"></i></span></a>
                                            <a onclick="deleteSoal({{ $soal->id }},'{{ $soal->id }}')"
                                                class='deleteSoal' data-toggle="tooltip" title="Hapus"><span
                                                    class="btn btn-danger"><i class="fa fa-close"></i></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="list-item tab-pane" role="tabpanel" class="" id="logis">
                    <div class="item pad-0-m">
                        <table id="tabel-soal-logis" class="table table-striped table-bordered row-border order-column"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="20%" class="all">PERTANYAAN</th>
                                    <th width="10%" class="min-tablet">OPSI A</th>
                                    <th width="10%" class="min-tablet">OPSI B</th>
                                    <th width="10%" class="min-tablet">OPSI C</th>
                                    <th width="10%" class="min-tablet">OPSI D</th>
                                    <th width="10%" class="min-tablet">OPSI E</th>
                                    <th width="10%" class="min-tablet">JAWABAN BENAR</th>
                                    <th width="5%">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soalintel->where('jenis_soal', 3) as $soal)
                                    <tr>
                                        <td>
                                            <div>{{ $soal->question }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_a }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_b }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_c }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_d }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_e }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->answer }}</div>
                                        </td>
                                        <td align="center">
                                            <a href="{{ route('dashboard-edit-soal', $soal->id) }}" data-toggle="tooltip"
                                                title="Ubah"><span class="btn btn-primary"><i
                                                        class="fa fa-pencil"></i></span></a>
                                            <a onclick="deleteSoal({{ $soal->id }},'{{ $soal->id }}')"
                                                class='deleteSoal' data-toggle="tooltip" title="Hapus"><span
                                                    class="btn btn-danger"><i class="fa fa-close"></i></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="list-item tab-pane" role="tabpanel" class="" id="hitung">
                    <div class="item pad-0-m">
                        <table id="tabel-soal-hitung" class="table table-striped table-bordered row-border order-column"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="20%" class="all">PERTANYAAN</th>
                                    <th width="10%" class="min-tablet">OPSI A</th>
                                    <th width="10%" class="min-tablet">OPSI B</th>
                                    <th width="10%" class="min-tablet">OPSI C</th>
                                    <th width="10%" class="min-tablet">OPSI D</th>
                                    <th width="10%" class="min-tablet">OPSI E</th>
                                    <th width="10%" class="min-tablet">JAWABAN BENAR</th>
                                    <th width="5%">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soalintel->where('jenis_soal', 4) as $soal)
                                    <tr>
                                        <td>
                                            <div>{{ $soal->question }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_a }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_b }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_c }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_d }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_e }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->answer }}</div>
                                        </td>
                                        <td align="center">
                                            <a href="{{ route('dashboard-edit-soal', $soal->id) }}" data-toggle="tooltip"
                                                title="Ubah"><span class="btn btn-primary"><i
                                                        class="fa fa-pencil"></i></span></a>
                                            <a onclick="deleteSoal({{ $soal->id }},'{{ $soal->id }}')"
                                                class='deleteSoal' data-toggle="tooltip" title="Hapus"><span
                                                    class="btn btn-danger"><i class="fa fa-close"></i></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="list-item tab-pane" role="tabpanel" class="" id="induktif">
                    <div class="item pad-0-m">
                        <table id="tabel-soal-induktif" class="table table-striped table-bordered row-border order-column"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="20%" class="all">PERTANYAAN</th>
                                    <th width="10%" class="min-tablet">OPSI A</th>
                                    <th width="10%" class="min-tablet">OPSI B</th>
                                    <th width="10%" class="min-tablet">OPSI C</th>
                                    <th width="10%" class="min-tablet">OPSI D</th>
                                    <th width="10%" class="min-tablet">OPSI E</th>
                                    <th width="10%" class="min-tablet">JAWABAN BENAR</th>
                                    <th width="5%">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soalintel->where('jenis_soal', 5) as $soal)
                                    <tr>
                                        <td>
                                            <div>{{ $soal->question }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_a }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_b }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_c }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_d }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->option_e }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $soal->answer }}</div>
                                        </td>
                                        <td align="center">
                                            <a href="{{ route('dashboard-edit-soal', $soal->id) }}" data-toggle="tooltip"
                                                title="Ubah"><span class="btn btn-primary"><i
                                                        class="fa fa-pencil"></i></span></a>
                                            <a onclick="deleteSoal({{ $soal->id }},'{{ $soal->id }}')"
                                                class='deleteSoal' data-toggle="tooltip" title="Hapus"><span
                                                    class="btn btn-danger"><i class="fa fa-close"></i></span></a>
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
        {{-- <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="modal">
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
        </div> --}}
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

            $('.cancel-apply').click(function(e) {
                $('#konfirmasi').modal('hide');
            });
        })

        function deleteSoal(id, idSoal) {
            $('#inputID').val(id);
            $('#idSoal').html(idSoal);
            $('#konfirmasi').modal('show');
        }
        // $(function() {
        //     $('[data-toggle="tooltip"]').tooltip()
        //     $('#tabs li a').click(function(e) {
        //         e.preventDefault()
        //         $(this).tab('show')
        //     })

        //     $('.filter-job').on('submit', function(e) {
        //         e.preventDefault()
        //         window.location.search = 'title=' + $('[name=title]').val() + '&updated=' + $(
        //                 '[name=updated]').val() + '&field_id=' + $('[name=field_id]').val() +
        //             '&province_id=' + $('[name=province_id]').val()
        //     })
        //     $('[name=updated]').on('change', function() {
        //         window.location.search = 'title=' + $('[name=title]').val() + '&updated=' + $(this).val() +
        //             '&field_id=' + $('[name=field_id]').val() + '&province_id=' + $('[name=province_id]')
        //             .val()
        //     })
        //     $('[name=field_id]').on('change', function() {
        //         window.location.search = 'title=' + $('[name=title]').val() + '&updated=' + $(
        //             '[name=updated]').val() + '&field_id=' + $(this).val() + '&province_id=' + $(
        //             '[name=province_id]').val()
        //     })
        //     $('[name=province_id]').on('change', function() {
        //         window.location.search = 'title=' + $('[name=title]').val() + '&updated=' + $(
        //                 '[name=updated]').val() + '&field_id=' + $('[name=field_id]').val() +
        //             '&province_id=' + $(this).val()
        //     })
        // })
        $(function() {
            var tablejobs1 = $('#tabel-soal-umum').DataTable({
                responsive: true,
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                paging: true
            });

            tablejobs1.buttons().container().appendTo('#tabel-soal-umum_wrapper .col-sm-6:eq(0)');


            var tablejobs2 = $('#tabel-soal-verbal').DataTable({
                responsive: true,
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                paging: true
            });

            tablejobs2.buttons().container().appendTo('#tabel-soal-verbal_wrapper .col-sm-6:eq(0)');


            var tablejobs3 = $('#tabel-soal-logis').DataTable({
                responsive: true,
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                paging: true
            });

            tablejobs3.buttons().container().appendTo('#tabel-soal-logis_wrapper .col-sm-6:eq(0)');

            var tablejobs4 = $('#tabel-soal-hitung').DataTable({
                responsive: true,
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                paging: true
            });

            tablejobs4.buttons().container().appendTo('#tabel-soal-hitung_wrapper .col-sm-6:eq(0)');

            var tablejobs5 = $('#tabel-soal-induktif').DataTable({
                responsive: true,
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                paging: true
            });

            tablejobs5.buttons().container().appendTo('#tabel-soal-induktif_wrapper .col-sm-6:eq(0)');

        })

        $('#tabel-soal-umum tbody').on('click', 'td.details-control', function() {
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

        $('#tabel-soal-verbal tbody').on('click', 'td.details-control', function() {
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

        $('#tabel-soal-logis tbody').on('click', 'td.details-control', function() {
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

        $('#tabel-soal-hitung tbody').on('click', 'td.details-control', function() {
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

        $('#tabel-soal-induktif tbody').on('click', 'td.details-control', function() {
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
