@extends('layouts.dashboard')

@section('breadcrumb')
    <b>Keahlian</b>
@stop


@section('content')
    <div class="header-sub">
        <div class="va-table width-100">
            <div class="va-middle width-50">Keahlian</div>
            <div class="va-middle width-50 ta-right"><i class="fa fa-user"></i></div>
        </div>
    </div>
    <div class="lists candidate">
        <div class="list-content">
            <div class="list-item">
                <div class="item pad-0-m">
                    <a href="{{ route('create-candidate-keahlian-admin') }}"
                        class='btn blue width-100-m  mar-b-1em-m' style="background-color: #5cb85c;"><i
                            class="fa fa-plus"></i> Tambah Keahlian</a>
                    <table id="tabel-skill" class="table table-striped table-bordered row-border order-column"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th width="1%" class="all">No</th>
                                <th width="20%" class="all">Keahlian</th>
                                <th width="5%" class="min-tablet">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skill as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td align="center">
                                        <a href="{{ route('edit-candidate-keahlian-admin', $item->id) }}"
                                            data-toggle="tooltip" title="Ubah"><span class="btn btn-primary"><i
                                                    class="fa fa-pencil"></i></span></a>
                                        <a onclick="deleteKeahlian({{ $item->id }},'{{ $item->name }}')"
                                            class='deleteKeahlian' data-toggle="tooltip" title="Hapus"><span
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

    {{-- Modal --}}
    <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align:center;background:#dcdcdc;">
                    Konfirmasi Hapus Keahlian
                </div>
                <div class="modal-body" style="text-align:center">
                    <span style="text-transform: capitalize;">Anda yakin akan menghapus keahlian ini <span
                            id='namaKeahlian'></span>?</span>
                </div>
                <div class="modal-footer">
                    <form method="POST" id="deleteForm">
                        {{ csrf_field() }}
                        <a class='btn btn-danger cancel-apply' href='#' style='width: 100px;' data-dismiss="modal">
                            <i class="fa fa-close"></i>&nbsp;&nbsp;Batal
                        </a>
                        <button class='btn btn-success' type="submit">Hapus Keahlian</button>
                    </form>
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

        function deleteKeahlian(id, nama) {
            $('#namaKeahlian').html(nama);
            $('#deleteForm').attr('action', '/public/admin-dashboard/keahlian/delete/' + id);
            $('#konfirmasi').modal('show');
        }

        $(function() {
            var tablejobs = $('#tabel-skill').DataTable({
                lengthChange: false,
                /*scrollX: true,
                scrollCollapse: true,*/
                paging: true
            });

            /*new $.fn.dataTable.FixedHeader(table);*/

            tablejobs.buttons().container()
                .appendTo('#tabel-skill_wrapper .col-sm-6:eq(0)');
        })
    </script>
@endpush
