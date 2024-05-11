@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 30px;background:#dcdcdc;">
            <div class="va-middle">
                <h4 style=" margin:0px;"><i class="fa fa-user"></i>&nbsp;UBAH PROFIL SAYA</h4>
            </div>
        </div>
        <div class="section-content" style="padding:20px 30px;margin:0px;">
            <form method="POST" action="{{ route('candidate-summary-update') }}" class='form-horizontal'
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mar-b-0">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for='photo' class="col-md-12" style="font-weight:normal;">
                                Photo <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div style="margin-top:10px;">
                                <div class="col-md-12">
                                    @if ($candidate->photo)
                                        <img src="{{ asset($candidate->photo ? 'upload/candidates/' . md5($candidate->candidate_id . 'folder') . '/' . $candidate->photo : 'img/no-pic.jpg') }}"
                                            width="100">
                                    @else
                                    @endif
                                </div>
                                <div class="col-md-12" style="padding-top: 10px;">
                                    <input id="photo" type="file" class="" name="photo"
                                        value="{{ Auth::user()->photo }}" placeholder="Photo" accept="image/*" max>
                                    <i class="text-muted fs-12">Silahkan upload foto 3x4 Anda (<b>max. 2MB</b>)</i>
                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                            <strong class='text-danger'>{{ $errors->first('photo') }}</strong>
                                        </span>
                                    @endif
                                    {{-- @if (Session::has('size'))
                                        <span class="help-block">
                                            <strong class='text-danger'>{{ Session::get('size') }}</strong>
                                        </span>
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='name' class="col-md-12" style="font-weight:normal;">
                                Nama <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ Auth::user()->name }}" required placeholder="Nama">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='ktp' class="col-md-12" style="font-weight:normal;">
                                No. KTP <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="ktp" type="text" class="form-control" name="ktp"
                                    value="{{ Auth::user()->candidate->ktp }}" required placeholder="No. KTP" maxlength="16">
                                @if ($errors->has('ktp'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('ktp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='npwp' class="col-md-12" style="font-weight:normal;">
                                No. NPWP <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="npwp" type="text" class="form-control" name="npwp"
                                    value="{{ Auth::user()->candidate->npwp }}" required placeholder="No. NPWP">
                                @if ($errors->has('npwp'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('npwp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='bpjs' class="col-md-12" style="font-weight:normal;">
                                No. BPJS Ketenagakerjaan <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="bpjs" type="text" class="form-control" name="bpjs"
                                    value="{{ Auth::user()->candidate->bpjs }}" required placeholder="No. BPJS Ketenagakerjaan">
                                @if ($errors->has('bpjs'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('bpjs') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='email' class="col-md-12" style="font-weight:normal;">
                                Email <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ Auth::user()->email }}" required placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='phone' class="col-md-12" style="font-weight:normal;">
                                Nomor Telepon <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control" name="phone"
                                    value="{{ Auth::user()->candidate->phone }}" required placeholder="Nomor Telepon">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='phone' class="col-md-12" style="font-weight:normal;">
                                Gaji yang Diharapkan <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                               <input id="expected_salary" type="number" class="form-control" name="expected_salary"
                                    value="{{ $candidate->expected_salary }}" placeholder="Gaji yang diharapkan">
                                @if ($errors->has('expected_salary'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('expected_salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='phone' class="col-md-12" style="font-weight:normal;">
                                Tanggal Lahir <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="birth_date" type="date" class="form-control" name="birth_date"
                                    value="{{ $candidate->birth_date }}" required placeholder="Tanggal Lahir">
                                @if ($errors->has('birth_date'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for='nationality' class="col-md-12" style="font-weight:normal;">
                                Kewarganegaraan <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <select class='form-control' id='nationality' name='nationality'>
                                    <option value=''>Pilih Kewarganegaraan</option>
                                    <option value='1' {{ $candidate->nationality == '1' ? 'selected' : '' }}>Indonesia
                                    </option>
                                    <option value='0' {{ $candidate->nationality == '0' ? 'selected' : '' }}>Asing
                                    </option>
                                </select>
                                @if ($errors->has('nationality'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group nationality"
                            style="display: {{ $candidate->nationality == 1 ? 'none' : '' }}">
                            <div class="col-md-12">
                                <input id="country" type="text" class="form-control" name="country"
                                    value="{{ $candidate->country }}" placeholder="Negara"
                                    {{ $candidate->nationality == 1 ? 'disabled' : 'none' }}>
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='province' class="col-md-12" style="font-weight:normal;">
                                Lokasi <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <select class='form-control' id='province' name='province_id'>
                                    <option value=''>Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value='{{ $province->id }}'
                                            {{ $candidate->province_id && $candidate->province_id == $province->id ? 'selected' : '' }}>
                                            {{ $province->province }}</option>
                                    @endforeach
                                </select>    
                                @if ($errors->has('province'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group city">
                            <div class="col-md-12">
                                <select class='form-control' id='city' name='city_id'
                                    {{ $candidate->city_id ? '' : 'disabled' }}>
                                    <option value=''>Pilih Kota/Kabupaten</option>
                                    @foreach ($cities as $city)
                                        <option value='{{ $city->id }}' data-province='{{ $city->province_id }}'
                                            {{ $candidate->city_id && $candidate->city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->city }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='address' class="col-md-12" style="font-weight:normal;">
                                Alamat Sesuai Domisili <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <textarea id="address" class="form-control" name="address" required placeholder="Alamat" rows=5>{{ $candidate->address }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='why_hire_me' class="col-md-12" style="font-weight:normal;">
                                Why Hire Me <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <textarea id="why_hire_me" class="form-control" name="why_hire_me" required
                                    placeholder="Tulis alasan kenapa Anda harus di hire" rows=3>{{ $candidate->why_hire_me }}</textarea>
                                @if ($errors->has('why_hire_me'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('why_hire_me') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='summary' class="col-md-12" style="font-weight:normal;">
                                Ringkasan <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                            </label>
                            <div class="col-md-12">
                                <textarea id="summary" class="form-control" name="summary" required placeholder="Tulis deskripsi diri Anda" rows=5
                                    maxlength="300">{{ $candidate->summary }}</textarea>
                                <em class="pull-right">Karakter tersisa: <span class="count-char">300</span></em>
                                @if ($errors->has('summary'))
                                    <span class="help-block">
                                        <strong class='text-danger'>{{ $errors->first('summary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mar-b-0">
                    <div class="col-md-12 text-right">
                        <button class='btn btn-success save-profile' style="text-transform:uppercase;"><i
                                class="fa fa-floppy-o" style="width:auto;"></i>&nbsp;&nbsp;Simpan Profil</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@push('scripts')
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


            // $('#photo').bind('change', function() {
            //     var size = Math.ceil(this.files[0].size / 1024 * 100) / 100;
            //     if (size > 500) {
            //         alert('Tidak bisa menggunakan file ini, maksimal 500KBm tapi file ini: ' + size + "KB");
            //         $(this).val('')
            //     }
            // });

            $('#summary').on('keyup', function() {
                var val = $(this).val().length
                var remaining = 300 - val
                $('.count-char').text(remaining)
            })
        })
    </script>
@endpush
