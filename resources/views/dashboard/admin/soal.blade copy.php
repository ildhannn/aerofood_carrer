@extends('layouts.dashboard')

@section('breadcrumb')
    <b>Master Soal</b>
@stop


@section('content')
    <div class="header-sub">
        <div class="va-table width-100">
            <div class="va-middle width-50">MASTER SOAL</div>
            <div class="va-middle width-50 ta-right">
                <div><a href="{{ route('dashboard-create-soal') }}" class='btn blue' style="width: auto;"><i
                            class="fa fa-plus"></i> Tambah Soal</a></div>
            </div>
        </div>
    </div>
    <div class="lists soal">
        <div class="list-content">
            <div class="list-item">
                <div class="item pad-0-m">
                    <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align:center;background:#dcdcdc;    ">
                                    Konfirmasi Hapus Soal
                                </div>
                                <div class="modal-body" style="text-align:center">
                                    <span style="text-transform: capitalize;">Anda yakin akan menghapus soal dengan ID <span
                                            id='idSoal'></span>?</span>
                                </div>
                                <div class="modal-footer">

                                    <form method="POST" action="{{ route('delete-soal') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" id='inputID' name="id" value=''
                                            class='form-control'>
                                        <a class='btn btn-danger cancel-apply' href='#' style='width: 100px;'><i
                                                class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
                                        <button class='btn btn-success' type="submit">Hapus Soal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="tabel-soal" class="table table-striped table-bordered row-border order-column"
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
                            @foreach ($soalintel as $soal)
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
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()

            $('.cancel-apply').click(function(e) {
                $('#konfirmasi').modal('hide');
            });
        })

        function deleteSoal(id, idSoal) {
            $('#inputID').val(id);
            $('#idSoal').html(idSoal);
            $('#konfirmasi').modal('show');
        }
        $(function() {
            var tablejobs = $('#tabel-soal').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                /*scrollX: true,
                scrollCollapse: true,*/
                paging: true
            });

            /*new $.fn.dataTable.FixedHeader(table);*/

            tablejobs.buttons().container()
                .appendTo('#tabel-soal_wrapper .col-sm-6:eq(0)');
        })
    </script>
@endpush
