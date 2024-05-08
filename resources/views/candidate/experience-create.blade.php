@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
            <div class="va-middle pad-b-1em-m ta-center-m"><h4 style=" margin:0px;"><i class="fa fa-briefcase"></i>&nbsp;PENGALAMAN KERJA</h4></div>
            <div class="va-middle dis-tab-row-m ta-right ta-center-m"><a href="{{route('candidate-experience')}}" class='btn btn-success'><i class="fa fa-chevron-left" style="width:auto !important;"></i>&nbsp;&nbsp;KEMBALI</a></div>
        </div>
        <div class="section-content" style="padding:20px 30px;margin:0px;">
            <form method="POST" action="{{ route('store-candidate-experience') }}" class='form-horizontal'>
                <div class="row mar-b-0">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for='position' class="col-md-12" style="font-weight:normal;">Posisi <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <input id="position" type="text" class="form-control" name="position" required
                                    placeholder="Posisi">

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for='company' class="col-md-12" style="font-weight:normal;">Nama Perusahaan <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <input id="company" type="text" class="form-control" name="company" required
                                    placeholder="Nama Perusahaan">

                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for='start_date' class="col-md-12" style="font-weight:normal;">Waktu Mulai <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <input id="start_date" type="date" class="form-control" name="start_date" required
                                    placeholder="Waktu mulai">

                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for='end_date' class="col-md-12" style="font-weight:normal;">Waktu Berakhir <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <input id="end_date" type="date" class="form-control" name="end_date" required
                                    placeholder="Waktu berakhir">

                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $experience->still_work }}"
                                id="still_work">
                            <label class="form-check-label" for="still_work" style="font-weight:normal;">
                                Masih Bekerja
                            </label>
                        </div>
                        <br>

                        @if ($errors->has('still_work'))
                            <span class="help-block">
                                <strong>{{ $errors->first('still_work') }}</strong>
                            </span>
                        @endif --}}

                        <div class="form-group">
                            <label for="nationality" class="col-md-12" style="font-weight:normal;">Negara <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <select class='form-control' id='nationality' name='nationality'>
                                    <option value=''>Pilih Negara</option>
                                    <option value='1'>Indonesia</option>
                                    <option value='0'>Asing</option>
                                </select>
                            </div>
                            @if ($errors->has('nationality'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nationality') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group nationality">
                            <div class="col-md-12">
                                <input id="aboard_location" type="text" class="form-control" name="aboard_location"
                                    placeholder="Negara">

                                @if ($errors->has('aboard_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aboard_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group province">
                            <label for='province' class="col-md-12" style="font-weight:normal;">Lokasi <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <select class='form-control' id='province' name='province_id'>
                                    <option value=''>Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value='{{ $province->id }}'>{{ $province->province }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('province'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('province') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group city">
                            <div class="col-md-12">
                                <select class='form-control' id='city' name='city_id'>
                                    <option value=''>Pilih Kota/Kabupaten</option>
                                    @foreach ($cities as $city)
                                        <option value='{{ $city->id }}' data-province='{{ $city->province_id }}'>
                                            {{ $city->city }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                            <label for='city' class="col-md-12" style="font-weight:normal;">&nbsp;</label>
                        </div>

                        <div class="form-group">
                            <label for="field_id" class="col-md-12" style="font-weight:normal;">Bidang Perusahaan <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <select class='form-control' id='field_id' name='field_id' required>
                                    <option value=''>Pilih Bidang Perusahaan</option>
                                    @foreach ($fields as $field)
                                        <option value='{{ $field->id }}'>{{ $field->field }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($errors->has('field_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('field_id') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for='description' class="col-md-12" style="font-weight:normal;">Deskripsi Pekerjaan <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <textarea id="description" class="form-control" name="description" required
                                    placeholder="Deskripsi Pekerjaan"></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for='salary' class="col-md-12" style="font-weight:normal;">Gaji <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <input id="salary" type="number" class="form-control" name="salary" required
                                    placeholder="Gaji">

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mar-b-0">
                            <div class="col-md-12 text-right">
                                <button class='btn btn-success' style="text-transform:uppercase;"><i
                                        class="fa fa-floppy-o" style="width:auto;"></i>&nbsp;&nbsp;Simpan
                                    Pengalaman</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#start_date').change(function() {
                var startDate = new Date($('#start_date').val());
                var endDate = new Date($('#end_date').val());
                if (endDate < startDate) {
                    alert('Tanggal akhir harus setelah atau sama dengan tanggal mulai.');
                    $('#end_date').val('');
                }
            });

            $('#end_date').change(function() {
                var startDate = new Date($('#start_date').val());
                var endDate = new Date($('#end_date').val());
                if (endDate < startDate) {
                    alert('Tanggal akhir harus setelah atau sama dengan tanggal mulai.');
                    $('#end_date').val('');
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#province').on('change', function() {
                var provinceId = $(this).val()
                if (provinceId === '') {
                    $('#city').val('')
                    $('#city').prop('disabled', true)
                } else {
                    $('#city').prop('disabled', false)
                    $('#city').val('')
                    $('#city').find('option').hide()
                    $('#city').find('option:first').show()
                    $('#city').find('[data-province="' + provinceId + '"]').show()
                }
            })
            $('#nationality').on('change', function() {
                var nationality = $(this).val()
                if (nationality == 0) {
                    $('.nationality').show()
                    $('.nationality input').prop('disabled', false)
                    $('.nationality input').prop('required', true)
                    $('.province').hide()
                    $('.city').hide()
                    $('.province select').prop('disabled', true)
                    $('.city select').prop('disabled', true)
                } else {
                    $('.nationality').hide()
                    $('.nationality input').prop('disabled', true)
                    $('.nationality input').prop('required', false)
                    $('.province').show()
                    $('.city').show()
                    $('.province select').prop('disabled', false)
                    $('.city select').prop('disabled', false)
                }
            })
        })
    </script>
@endpush
