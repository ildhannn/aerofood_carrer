@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
            <div class="va-middle pad-b-1em-m ta-center-m"><h4 style=" margin:0px;"><i class="fa fa-graduation-cap"></i>&nbsp;PENDIDIKAN TERAKHIR</h4></div>
            <div class="va-middle dis-tab-row-m ta-right ta-center-m"><a href="{{route('candidate-education')}}" class='btn btn-success'><i class="fa fa-chevron-left" style="width:auto !important;"></i>&nbsp;&nbsp;KEMBALI</a></div>
        </div>
        <div class="section-content" style="padding:20px 30px;margin:0px;">
            <form method="POST" action="{{ route('store-candidate-education') }}" class='form-horizontal'>
                <div class="row mar-b-0">
                    <div class="col-md-6">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="qualification" class="col-md-12" style="font-weight:normal;">Tingkat Pendidikan <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <select class='form-control' id='qualification' name='qualification' required='required'>
                                    <option value=''>Pilih Tingkat Pendidikan</option>
                                    <option value='0'>SMA/Sederajat</option>
                                    <option value='1'>D1-D4</option>
                                    <option value='2'>S1-S3</option>
                                </select>
                                @if ($errors->has('qualification'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('qualification') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='institute' class="col-md-12" style="font-weight:normal;">Nama Lembaga
                                Pendidikan <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <input id="institute" type="text" class="form-control" name="institute" required
                                    placeholder="Nama Lembaga Pendidikan">

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Nama Lembaga Pendidikan" id="institute" name="institute" required
                                        style="height: 100px"></textarea>
                                    <label for="institute">Nama</label>
                                </div>
                                @if ($errors->has('institute'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institute') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field_id" class="col-md-12" style="font-weight:normal;">Bidang Pendidikan <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <select class='form-control' id='field_id' name='field_id' required='required'>
                                    <option value=''>Pilih Bidang Pendidikan</option>
                                    @foreach ($fields as $field)
                                        <option value='{{ $field->id }}'>{{ $field->field }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('field_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('field_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='major' class="col-md-12" style="font-weight:normal;">Jurusan <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <input id="major" type="text" class="form-control" name="major" required
                                    placeholder="Jurusan">

                                @if ($errors->has('major'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('major') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for='graduate_date' class="col-md-12" style="font-weight:normal;">Waktu Lulus <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <input id="graduate_date" type="date" class="form-control" name="graduate_date" required
                                    placeholder="Waktu lulus">

                                @if ($errors->has('graduate_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('graduate_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group" id="GPA-sh">
                            <label for='GPA' class="col-md-12" style="font-weight:normal;">GPA/Nilai AKhir</label>
                            <div class="col-sm-3">
                                <input id="GPA" type="number" step="0.01" class="form-control" name="GPA"
                                    required='required' placeholder="GPA">
                                <input type="hidden" class="form-control" name="GPA" value="0">

                                @if ($errors->has('GPA'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('GPA') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- <span class='col-sm-2 control-label text-center'
                                style="text-align: center !important;">dari</span>
                            <div class="col-sm-3">
                                <input id="GPA_max" type="number" class="form-control" name="GPA_max" value='4'
                                    placeholder="GPA max">

                                @if ($errors->has('GPA_max'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('GPA_max') }}</strong>
                                    </span>
                                @endif
                            </div> --}}
                            <p class="fs-12">
                            <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span>
                                isikan dengan nilai desimal menggunakan tanda koma (,) contoh : 3,01
                                atau 90,2
                            </p>
                        </div>
                        <div class="form-group">
                            <label for='info' class="col-md-12" style="font-weight:normal;">Info lain <span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span></label>
                            <div class="col-md-12">
                                <textarea id="info" class="form-control" name="info" required
                                    placeholder="Tulis prestasi, sertifikasi, dan lain sebagainya" rows=3 maxlength="300"></textarea>

                                @if ($errors->has('info'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('info') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mar-b-0">
                            <div class="col-md-12 text-right">
                                <button class='btn btn-success' style="text-transform:uppercase;"><i
                                        class="fa fa-floppy-o" style="width:auto;"></i>&nbsp;&nbsp;Simpan
                                    Pendidikan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#qualification').on('change', function() {
                if (this.value == '0')
                //.....................^.......
                {
                    $("#GPA-sh").hide(300);
                } else {
                    $("#GPA-sh").show(300);
                }
            });
        });
    </script>
@stop
