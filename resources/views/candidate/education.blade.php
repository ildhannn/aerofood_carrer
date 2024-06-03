@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
            <div class="va-middle pad-b-1em-m ta-center-m"><h4 style=" margin:0px;"><i class="fa fa-graduation-cap"></i>&nbsp;PENDIDIKAN TERAKHIR</h4></div>
            @if ($candidate->educations->count() == 0)
                <div class="va-middle dis-tab-row-m ta-right ta-center-m"><a href="{{route('create-candidate-education')}}" class='btn btn-success'><i class="fa fa-plus" style="width:auto !important;"></i>&nbsp;&nbsp;TAMBAH PENDIDIKAN</a></div>
            @endif
        </div>
        <div class="section-content pad-20-30 mar-0 pad-1em-m">
            <div class="portlet-body">
                @if ($candidate->educations->count() > 0)
                    <div class="timeline">
                        @foreach ($candidate->educations as $education)
                            <!-- TIMELINE ITEM -->
                            <div class="timeline-item">
                                <div class="timeline-badge">
                                    <div class="va-table width-100" style="height:80px;padding:5px;">
                                        <div class="va-middle ta-center">
                                            <div class="tt-upper" style="line-height:1.1em; margin-bottom:5px;"><i
                                                    class="fa fa-graduation-cap fs-20"></i></div>
                                            <!--<hr style="margin:5px 0px;border-top: 1px solid #ccc;">-->
                                            <div class="fs-12 text-muted tt-upper">Lulus pada
                                                <b>{{ substr(date('F', strtotime($education->graduate_date)), 0, 3) . ' ' . date('Y', strtotime($education->graduate_date)) }}</b>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-body">
                                    <div>
                                        <div class="va-table width-100">
                                            <div class="va-middle pad-b-1em-m">
                                                <div style="display:table;">
                                                    <div class="timeline-body-head">
                                                        <div class="timeline-body-head-caption">
                                                            <a href="#"
                                                                class="timeline-body-title font-blue-madison">{{ $education->major }}</a>,&nbsp;{{ $education->institute }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-muted fs-12">
                                                    @if ($education->qualification > 0)
                                                        @if ($education->GPA)
                                                            GPA: <b>{{ $education->GPA }}</b> {{-- dari <b>{{$education->GPA_max}}</b> --}}
                                                        @endif
                                                    @else
                                                        @if ($education->GPA)
                                                            Nilai: <b>{{ $education->GPA }}</b> {{-- dari <b>{{$education->GPA_max}}</b> --}}
                                                        @endif
                                                    @endif
                                                    <br>
                                                    Bidang Pendidikan: <b>{{ $education->field->field }}</b>
                                                </div>
                                            </div>
                                            <div class="va-middle ta-right dis-tab-row-m ta-center-m">
                                                <span class='action mar-l-0-m'>
                                                    <a href="{{ route('edit-candidate-education', $education->id) }}"
                                                        class="btn btn-primary" style="padding:5px 12px;"><i
                                                            class="fa fa-pencil" title='edit'></i></a>
                                                    <form class='delete' method='POST'
                                                        action="{{ route('delete-candidate-education', $education->id) }}">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger delete"
                                                            data-company="{{ $education->institute }}"
                                                            data-id="{{ $education->id }}"><i class="fa fa-trash"
                                                                title='delete'></i></button>
                                                    </form>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="timeline-body-arrow"></div>

                                    <div class="timeline-body-content">
                                        <span class="font-grey-cascade"><?php echo $education->info; ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- END TIMELINE ITEM -->
                        @endforeach
                    </div>
                @else
                    <i class="text-muted">(Tidak memiliki pendidikan)</i>
                @endif
            </div>
        </div>
    </div>


    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align:center;background:#dcdcdc;">
                    Hapus pendidikan <b id="eduForDel" class='institute-name'></b>
                </div>
                <div class="modal-body" style="text-align:center">
                    <span style="text-transform: capitalize;">Apakah Anda yakin untuk menghapus pendidikan ini?</span>
                </div>
                <div class="modal-footer">
                    <a class='btn btn-danger cancel-delete' href='#'><i class="fa fa-close"
                            style="width:auto;"></i>&nbsp;&nbsp;Batal</a>
                    <a class='btn btn-success delete-education'><i class="fa fa-trash"
                            style="width:auto;"></i>&nbsp;&nbsp;Hapus pendidikan</a>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script type="text/javascript">
        $(function() {
            $('button.delete').click(function(e) {
                e.preventDefault()
                $('#delete-modal').modal('show')
                $('#delete-modal').find('.institute-name').html($(this).data('institute'))
                $('#delete-modal').find('.delete-education').attr('data-id', $(this).data('id'))
                $('.delete-education').click(function() {
                    var button = $('[data-id=' + $(this).data('id') + ']')

                    button.parents('form').submit()
                })
                $('.cancel-delete').click(function() {
                    $('#delete-modal').modal('hide')
                })
            })

            $('#delete-modal').on('hide.bs.modal', function() {
                $('#delete-modal').find('.institute-name').html('')
                $('#delete-modal').find('.delete-education').attr('data-id', '')
            })
        })
    </script>
@endpush
