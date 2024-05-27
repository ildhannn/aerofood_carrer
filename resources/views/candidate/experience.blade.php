@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
            <div class="va-middle pad-b-1em-m ta-center-m">
                <h4 style=" margin:0px;"><i class="fa fa-briefcase"></i>&nbsp;PENGALAMAN KERJA</h4>
            </div>
            <div class="va-middle dis-tab-row-m ta-right ta-center-m"><a href="{{ route('create-candidate-experience') }}"
                    class='btn btn-success'><i class="fa fa-plus" style="width:auto !important;"></i>&nbsp;&nbsp;TAMBAH
                    PENGALAMAN</a></div>
        </div>
        <div class="section-content pad-20-30 mar-0 pad-1em-m">
            <div class="portlet-body">
                @if ($candidate->experiences->count() > 0)
                    <div class="timeline">
                        @foreach ($candidate->experiences as $experience)
                            <!-- TIMELINE ITEM -->
                            <div class="timeline-item">
                                <div class="timeline-badge">
                                    <div class="va-table width-100" style="height:80px;padding:5px;">
                                        <div class="va-middle ta-center">
                                            <div class="tt-upper" style="line-height:1.1em">
                                                <b>{{ $experience->position }}</b></div>
                                            <hr style="margin:5px 0px;border-top: 1px solid #ccc;">
                                            @if ($experience->still_work === null)
                                                <div class="fs-12 text-muted tt-upper">
                                                    {{ substr(date('F', strtotime($experience->start_date)), 0, 3) . ' ' . date('Y', strtotime($experience->start_date)) . ' - ' . substr(date('F', strtotime($experience->end_date)), 0, 3) . ' ' . date('Y', strtotime($experience->end_date)) }}
                                                </div>
                                            @else
                                                Masih Bekerja
                                            @endif

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
                                                                class="timeline-body-title font-blue-madison">{{ $experience->company }}</a>
                                                            <span class="timeline-body-time text-muted fs-12">
                                                                <?php
                                                                if ($experience->nationality == 1) {
                                                                    if ($experience->city) {
                                                                        echo $experience->city->city;
                                                                    } else {
                                                                        echo '-';
                                                                    }
                                                                
                                                                    if ($experience->province) {
                                                                        echo ', ' . $experience->province->province;
                                                                    } else {
                                                                        echo '-';
                                                                    }
                                                                } else {
                                                                    echo $experience->aboard_location;
                                                                }
                                                                ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div><span class="text-muted fs-12">Bidang/Industri: <span
                                                            class="tt-upper"><b>{{ $experience->field->field }}</b></span></span>
                                                </div>
                                                <div><span class="text-muted fs-12">Gaji: <b><span
                                                                class="thousand">{{ $experience->salary }}</span></b></span>
                                                </div>
                                            </div>
                                            <div class="va-middle ta-right dis-tab-row-m ta-center-m">
                                                <span class='action mar-l-0-m'>
                                                    <a href="{{ route('edit-candidate-experience', $experience->id) }}"
                                                        class="btn btn-primary" style="padding:5px 12px;"><i
                                                            class="fa fa-pencil" title='edit'></i></a>
                                                    <form class='delete' method='POST'
                                                        action="{{ route('delete-candidate-experience', $experience->id) }}">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger delete"
                                                            data-company="{{ $experience->company }}"
                                                            data-id="{{ $experience->id }}"><i class="fa fa-trash"
                                                                title='delete'></i></button>
                                                    </form>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="timeline-body-arrow"></div>
                                    <div class="timeline-body-content">
                                        <span class="font-grey-cascade">{{ $experience->description }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END TIMELINE ITEM -->
                        @endforeach
                    </div>
                @else
                    <i class="text-muted">(Tidak memiliki pengalaman)</i>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align:center;background:#dcdcdc;">
                    Hapus pengalaman kerja di <b class='company-name'></b>
                </div>
                <div class="modal-body" style="text-align:center">
                    <span style="text-transform: capitalize;">Apakah Anda yakin untuk menghapus pengalaman ini?</span>
                </div>
                <div class="modal-footer">
                    <a class='btn btn-danger cancel-delete' href='#'><i class="fa fa-close"
                            style="width:auto;"></i>&nbsp;&nbsp;Batal</a>
                    <a class='btn btn-success delete-trash delete-experience'><i class="fa fa-envelope"
                            style="width:auto;"></i>&nbsp;&nbsp;Hapus Pengalaman</a>
                </div>
            </div>
        </div>
    </div>
@stop


@push('scripts')
    <script type="text/javascript">
        $(function() {
            $('.thousand').each(function(index, element) {
                $(element).text('Rp' + parseInt($(element).text()).toLocaleString('id-ID'))
            })

            $('button.delete').click(function(e) {
                e.preventDefault()
                $('#delete-modal').modal('show')
                $('#delete-modal').find('.company-name').html($(this).data('company'))
                $('#delete-modal').find('.delete-experience').attr('data-id', $(this).data('id'))
                $('.delete-experience').click(function() {
                    var button = $('[data-id=' + $(this).data('id') + ']')

                    button.parents('form').submit()
                })
                $('.cancel-delete').click(function() {
                    $('#delete-modal').modal('hide')
                })
            })

            $('#delete-modal').on('hide.bs.modal', function() {
                $('#delete-modal').find('.company-name').html('')
                $('#delete-modal').find('.delete-experience').attr('data-id', '')
            })
        })
    </script>
@endpush
