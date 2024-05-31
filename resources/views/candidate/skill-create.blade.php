@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
            <div class="va-middle pad-b-1em-m ta-center-m"><h4 style=" margin:0px;"><i class="fa fa-star"></i>&nbsp;KEAHLIAN</h4></div>
            <div class="va-middle dis-tab-row-m ta-right ta-center-m"><a href="{{route('candidate-skill')}}" class='btn btn-success'><i class="fa fa-chevron-left" style="width:auto !important;"></i>&nbsp;&nbsp;KEMBALI</a></div>
        </div>
        <div class="section-content" style="padding:20px 30px;margin:0px;">
            <form method="POST" action="{{ route('store-candidate-skill') }}" class='form-horizontal'>
                <div class="row mar-b-0">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="skill" class="col-md-12" style="font-weight:normal;">Keahlian <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                @foreach ($candidate->skills as $skill)
                                    <span class="tag"><input name="skill[]" type="hidden"
                                            value="{{ $skill->id }}">{{ $skill->name }}<i
                                            class="fa fa-close text-right"></i></span>
                                @endforeach
                                <select id='select-skill' class="form-control" require>
                                    <option></option>
                                    @foreach ($skills as $skill)
                                        <option value='{{ $skill->id }}'>{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('skill'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('skill') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="skill_lainnya" class="col-md-12" style="font-weight:normal;">Lainnya</label>
                            <div class="col-md-12">
                                <textarea id="skill" class="form-control" name="skill_lainnya"
                                    placeholder="Tulis keahlian anda dengan bidang terkait di sini" rows=3></textarea>

                                @if ($errors->has('skill_lainnya'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('skill_lainnya') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mar-b-0">
                            <div class="col-md-12 text-right">
                                <button class='btn btn-success' style="text-transform:uppercase;"><i
                                        class="fa fa-floppy-o" style="width:auto;"></i>&nbsp;&nbsp;Simpan
                                        Keahlian</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop


@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript">
        $(function() {
            $('#select-skill').select2({
                placeholder: 'Pilih Keahlian'
            })

            $('#select-skill').on('change', function() {
                var span = '<span class="tag"><input name="skill[]" type="hidden" value="' + $(this).val() +
                    '">' + $(this).find(':selected').text() +
                    '<i class="fa fa-close text-right"></i></span>'
                $(this).find(':selected').remove()
                $(this).parent().prepend(span)
            })

            $(document).on('click', '.tag .fa-close', function() {
                var option = '<option value="' + $(this).siblings('input').val() + '">' + $(this).parents(
                    '.tag').text() + '</option>'
                var tag = $(this).siblings('input').val()
                var sibling = $(this).parents('form').find('option').filter(function() {
                    return this.value > tag
                }).first()
                $(option).insertBefore(sibling)
                $(this).parents('.tag').remove()
            })
        })
    </script>
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
@endpush
