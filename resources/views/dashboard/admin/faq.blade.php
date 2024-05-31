@extends('layouts.dashboard')

@section('breadcrumb')
    <b>Master FAQ</b>
@stop

@section('content')
    <div class="header-sub">
        <div class="va-table width-100">
            <div class="va-middle width-50">MASTER FAQ</div>
            <div class="va-middle width-50 ta-right">
                <div>
                    <a href="{{ route('dashboard-create-faq') }}" class='btn blue' style="width: auto;">
                        <i class="fa fa-plus"></i> Tambah FAQ
                    </a>
                </div>
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
                                <div class="modal-header" style="text-align:center;background:#dcdcdc;">
                                    Konfirmasi Hapus FAQ
                                </div>
                                <div class="modal-body" style="text-align:center">
                                    <span style="text-transform: capitalize;">
                                        Anda yakin akan menghapus FAQ dengan ID <span id='idFaq'></span>?
                                    </span>
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('delete-faq') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" id='inputID' name="id" value='' class='form-control'>
                                        <a class='btn btn-danger cancel-apply' href='#' style='width: 100px;'>
                                            <i class="fa fa-close"></i>&nbsp;&nbsp;Batal
                                        </a>
                                        <button class='btn btn-success' type="submit">Hapus FAQ</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="tabel-faq" class="table table-striped table-bordered row-border order-column" style="width:100%">
                        <thead>
                            <tr>
                                <th width="70%" class="all">PERTANYAAN</th>
                                <th width="20%" class="min-tablet">JAWABAN</th>
                                <th hidden>created_at</th>
                                <th width="10%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>
                                        {!! $faq->question !!}
                                    </td>
                                    <td>
                                        {!! $faq->answer !!}
                                    </td>
                                    <td hidden>
                                        {{ $faq->created_at }}
                                    </td>
                                    <td align="center">
                                        <a href="{{ route('dashboard-edit-faq', $faq->id) }}" data-toggle="tooltip" title="Ubah">
                                            <span class="btn btn-primary"><i class="fa fa-pencil"></i></span>
                                        </a>
                                        <a onclick="deleteFaq({{ $faq->id }},'{{ $faq->id }}')" class='deleteFaq' data-toggle="tooltip" title="Hapus">
                                            <span class="btn btn-danger"><i class="fa fa-close"></i></span>
                                        </a>
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
    <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()

            $('.cancel-apply').click(function(e) {
                $('#konfirmasi').modal('hide');
            });
        })

        function deleteFaq(id, idFaq) {
            $('#inputID').val(id);
            $('#idFaq').html(idFaq);
            $('#konfirmasi').modal('show');
        }

        $(function() {
            var tableFaqs = $('#tabel-faq').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                paging: true,
                order: [2, 'DESC']
            });

            tableFaqs.buttons().container().appendTo('#tabel-faq_wrapper .col-sm-6:eq(0)');
        })
    </script>
@endpush
