@extends('layouts.dashboard')

@section('breadcrumb')
    <b>Master Soal WB 3</b>
@stop

@section('content')
    <div class="header-sub">
        <div class="va-table width-100">
            <div class="va-middle width-50">SOAL WORK BEHAVIOR 3</div>
            <div class="va-middle width-50 ta-right">
                <a href="{{ route('dashboard-create-soalwb3') }}" class='btn blue width-100-m mar-b-1em-m'
                    style="background-color: #5cb85c;"><i class="fa fa-plus"></i> Tambah Soal</a>
            </div>
        </div>
    </div>
    <div class="lists candidate">
        <div class="list-content">
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

                            <form method="POST" action="{{ route('delete-soalwb3') }}">
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
            <div class="list-item">
                <div class="item pad-0-m">
                    <table id="tabel-kandidat" class="table table-striped table-bordered row-border order-column"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th width="3%" class="all">NO. SOAL</th>
                                <th width="30%" class="min-tablet">PILIHAN 1</th>
                                <th width="10%" class="min-tablet">LABEL 1</th>
                                <th width="30%" class="min-tablet">PILIHAN 2</th>
                                <th width="10%" class="min-tablet">LABEL 2</th>
                                <th width="10%" class="min-tablet">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($soalwb3 as $soal3)
                                <tr>
                                    <td style="text-align: center">
                                        {{ $soal3['id_soal'] }}
                                    </td>
                                    <td>
                                        {{ $soal3['pilihan1']->choice }}
                                    </td>
                                    <td style="text-align: center">
                                        {{ $soal3['pilihan1']->label }}
                                    </td>
                                    <td>
                                        {{ $soal3['pilihan2']->choice }}
                                    </td>
                                    <td style="text-align: center">
                                        {{ $soal3['pilihan2']->label }}
                                    </td>
                                    <td align="center">
                                        <a href="{{ route('dashboard-edit-soalwb3', $soal3['id_soal']) }}"
                                            data-toggle="tooltip" title="Ubah"><span class="btn btn-primary"><i
                                                    class="fa fa-pencil"></i></span></a>
                                        <a onclick="deleteSoal({{ $soal3['id_soal'] }},'{{ $soal3['id_soal'] }}')"
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
@stop

@push('scripts')
    <script type="text/javascript">
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

        function deleteSoal(id, idSoal) {
            $('#inputID').val(id);
            $('#idSoal').html(idSoal);
            $('#konfirmasi').modal('show');
        }
    </script>
@endpush
