@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-jobs') }}">Lowongan</a>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<a
        href="{{ route('detail-job', $job->id) }}">{{ $job->title }}</a>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b>Ubah</b>
@stop

@section('content')
    <style>
        input.is-invalid {
            border: 1px solid red;
        }

        .styled-checkbox {
            position: absolute;
            opacity: 0;
        }

        .styled-checkbox+label {
            position: relative;
            cursor: pointer;
            padding: 3px 5px;
            border: 1px solid #999;
            font-size: 11px;
        }

        .styled-checkbox+label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            width: 15px;
            height: 15px;
            background: white;
            border: 1px solid #999;
        }

        .styled-checkbox:hover+label:before {
            background: #f35429;
        }

        .styled-checkbox:focus+label:before {
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.12);
        }

        .styled-checkbox:checked+label:before {
            background: #f35429;
        }

        .styled-checkbox:disabled+label {
            color: #b8b8b8;
            cursor: auto;
        }

        .styled-checkbox:disabled+label:before {
            box-shadow: none;
            background: #ddd;
        }

        .styled-checkbox:checked:disabled+label:after {
            color: #666;
        }

        .styled-checkbox:checked+label:after {
            position: absolute;
            left: 8px;
            top: -3px;
            /* background: white;
                                                        width: 2px;
                                                        height: 2px;
                                                        box-shadow: 2px 0 0 white, 4px 0 0 white, 4px -2px 0 white, 4px -4px 0 white, 4px -6px 0 white, 4px -8px 0 white;
                                                        -webkit-transform: rotate(45deg);
                                                        transform: rotate(45deg); */
            font-family: FontAwesome;
            content: "\f00c";
            font-size: 17px;
            color: #FFF;
        }

        .styled-checkbox:checked+label {
            background: #00F;
            border: 1px solid #00F;
            color: #FFF;
        }

        .styled-checkbox:disabled+label {
            background: #f2f2f2;
            border: 1px solid #ccc;
            color: #666;
        }
    </style>
    <div class="panel pad-0" style="border-top: none !important; border-top: none !important;">
        <form method="POST" action="{{ route('update-job', $job->job_id) }}" enctype="multipart/form-data" class="mar-0">
            {{ csrf_field() }}

            {{-- Header --}}
            <div class="steps row text-center">
                <div class="step active col-sm-2" data-step='1'>
                    <!-- <span class='number'>1</span><br> -->
                    <i class="fa fa-file-text"></i>&nbsp;&nbsp;<span class='title'>P.REQ</span>
                    <div class="arrowrow_right"></div>
                    <div class="arrowrow_right_blue"></div>
                </div>
                <div class="step col-sm-2" data-step='2'>
                    <!-- <span class='number'>2</span><br> -->
                    <i class="fa fa-info-circle"></i>&nbsp;&nbsp;<span class='title'>INFORMASI</span>
                    <div class="arrowrow_right_left"></div>
                    <div class="arrowrow_right"></div>
                    <div class="arrowrow_right_blue"></div>
                </div>
                <div class="step col-sm-2" data-step='3'>
                    <!-- <span class='number'>3</span><br> -->
                    <i class="fa fa-database"></i>&nbsp;&nbsp;<span class='title'>KUALIFIKASI</span>
                    <div class="arrowrow_right_left"></div>
                    <div class="arrowrow_right"></div>
                    <div class="arrowrow_right_blue"></div>
                </div>
                <div class="step col-sm-2" data-step='4'>
                    <!-- <span class='number'>4</span><br> -->
                    <i class="fa fa-list-alt"></i>&nbsp;&nbsp;<span class='title'>DESKRIPSI</span>
                    <div class="arrowrow_right_left"></div>
                    <div class="arrowrow_right"></div>
                    <div class="arrowrow_right_blue"></div>
                </div>
                {{-- <div class="step col-sm-2" data-step='5'>
                    <!-- <span class='number'>5</span><br> -->
                    <i class="fa fa-briefcase"></i>&nbsp;&nbsp;<span class='title'>REKRUTMEN</span>
                    <div class="arrowrow_right_left"></div>
                    <div class="arrowrow_right"></div>
                    <div class="arrowrow_right_blue"></div>
                </div>
                <div class="step col-sm-2" data-step='6' style="padding:11px 0px;">
                    <!-- <span class='number'>6</span><br> -->
                    <i class="fa fa-video-camera"></i>&nbsp;&nbsp;<span class='title'>PVI</span>
                    <div class="arrowrow_right_left"></div>
                </div> --}}
            </div>

            <div class="step-content" id='step-1'>
                <div class="panel mar-b-0 pad-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Personnel Requisition</h3>
                            </div>
                            <div class="col-md-6 ta-right">
                                <h3><i class="fa fa-file-text"></i></h3>
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 20px;">
                            <div class="form-group col-md-4" data-tip="This is the text of the tooltip2">
                                <label for="title">Nomor P.Req</label>
                                <input class="form-control require" type='text' placeholder='Nomor P.Req' id='title'
                                    name='preq' value='{{ $job->preq }}' />
                                <span class="display-none label label-danger"><i
                                        class="fa fa-exclamation-triangle"></i>&nbsp;<b>Nomor P.Req</b> harus diisi</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="need">Kebutuhan</label>
                                <input class="form-control require" type='number'
                                    placeholder='Jumlah Karyawan yang Dibutuhkan' id='need' name='need'
                                    min='0' required="required" value='{{ $job->need }}' />
                                <span class="display-none label label-danger"><i
                                        class="fa fa-exclamation-triangle"></i>&nbsp;<b>Kebutuhan</b> harus diisi</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for='preq' class="control-label">Ubah Dokumen Preq</label>
                                <input id="preq" type="file" class="form-control" name="file" required autofocus
                                    placeholder="Dokumen Preq" accept="application/pdf">
                                <i>(hanya menerima file berupa pdf)</i><br>
                                @if ($job->preq_file)
                                    <b>File Terunggah:</b> <a
                                        href="{{ asset('upload/jobs/' . md5($job->job_id . 'folder')) . '/' . $job->preq_file }}"
                                        target="blank">{{ $job->preq_file }}</a>
                                @endif
                                <span class="display-none label label-danger"><i
                                        class="fa fa-exclamation-triangle"></i>&nbsp;Harus unggah <b>dokumen</b></span>
                            </div>
                            <div class="form-group col-md-12 ta-center">
                                <a data-next='2' class="btn blue next">Selanjutnya&nbsp;&nbsp;<i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="step-content" id='step-2' style='display: none'>

                <div class="panel mar-b-0 pad-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Informasi Umum</h3>
                            </div>
                            <div class="col-md-6 ta-right">
                                <h3><i class="fa fa-info-circle"></i></h3>
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 20px;">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title">Judul lowongan</label>
                                            <input class="form-control require" type='text'
                                                placeholder='Judul lowongan' id='title' name='title'
                                                value='{{ $job->title }}' />
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Judul lowongan</b>
                                                harus diisi</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Bidang</label>
                                            <select class='form-control' id='field' name='field_id'>
                                                <option value='' {{ $job->field_id == '' ? 'selected' : '' }}>Pilih
                                                    bidang</option>
                                                @foreach ($fields as $field)
                                                    <option value='{{ $field->id }}'
                                                        {{ $job->field_id == $field->id ? 'selected' : '' }}>
                                                        {{ $field->field }}</option>
                                                @endforeach
                                            </select>
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Bidang</b> harus
                                                diisi</span>
                                        </div>
                                        <div class="form-group">
                                            <select class='form-control' id='field_specialization'
                                                name='field_specialization_id'
                                                {{ $job->field_specialization_id ?: 'disabled' }}>
                                                <option value=''
                                                    {{ $job->field_specialization_id == '' ? 'selected' : '' }}>Pilih
                                                    bidang spesialisasi</option>
                                                @foreach ($specializations as $specialization)
                                                    <option value='{{ $specialization->id }}'
                                                        data-field='{{ $specialization->field_id }}'
                                                        {{ $job->field_specialization_id == $specialization->id ? 'selected' : '' }}>
                                                        {{ $specialization->specialization }}</option>
                                                @endforeach
                                            </select>
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Bidang Spesialisasi</b>
                                                harus diisi</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <select class='form-control require' id='province' name='province_id'>
                                                <option value='' {{ $job->province_id == '' ? 'selected' : '' }}>
                                                    Pilih Provinsi</option>
                                                @foreach ($provinces as $province)
                                                    <option value='{{ $province->id }}'
                                                        {{ $job->province_id == $province->id ? 'selected' : '' }}>
                                                        {{ $province->province }}</option>
                                                @endforeach
                                            </select>
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Provinsi</b> harus
                                                diisi</span>
                                        </div>
                                        <div class="form-group">
                                            <select class='form-control require' id='city' name='city_id'
                                                {{ $job->city_id ?: 'disabled' }}>
                                                <option value='' {{ $job->city_id == '' ? 'selected' : '' }}>Pilih
                                                    Kota/Kabupaten</option>
                                                @foreach ($cities as $city)
                                                    <option value='{{ $city->id }}'
                                                        data-province='{{ $city->province_id }}'
                                                        {{ $job->city_id == $city->id ? 'selected' : '' }}>
                                                        {{ $city->city }}</option>
                                                @endforeach
                                            </select>
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Kota/Kab.</b> harus
                                                diisi</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><label>Tanggal Berlaku Lowongan</label>&nbsp;<span
                                                        class="text-muted">(<i>format: <b>mm/dd/yyyy</b></i>)</span></div>
                                                <div class="col-md-6"><input class="form-control required" type='date'
                                                        placeholder='Tanggal Mulai' id='start-date' name='start_date'
                                                        value='{{ $job->start_date }}' /><span
                                                        class="display-none label label-danger"><i
                                                            class="fa fa-exclamation-triangle"></i>&nbsp;<b>Tanggal
                                                            Mulai</b> harus diisi</span>
                                                </div>
                                                <div class="col-md-6"><input class="form-control require" type='date'
                                                        placeholder='Tanggal Akhir' id='end-date' name='end_date'
                                                        value='{{ $job->end_date }}' /><span
                                                        class="display-none label label-danger"><i
                                                            class="fa fa-exclamation-triangle"></i>&nbsp;<b>Tanggal
                                                            Akhir</b> harus diisi</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><label>
                                                        Gaji
                                                        @if ($job->min_salary == 0 && $job->max_salary == 0)
                                                            <span style="color: red;"> (Negotiable)</span>
                                                        @endif
                                                    </label></div>
                                                <div class="col-md-6"><input class="form-control require" type='number'
                                                        placeholder='Gaji minimal' id='min_salary' name='min_salary'
                                                        value='{{ $job->min_salary }}' /><span
                                                        class="display-none label label-danger"><i
                                                            class="fa fa-exclamation-triangle"></i>&nbsp;<b>Gaji
                                                            Minimal</b> harus diisi</span></div>
                                                <div class="col-md-6"><input class="form-control require" type='number'
                                                        placeholder='Gaji maksimal' id='max_salary' name='max_salary'
                                                        value='{{ $job->max_salary }}' /><span
                                                        class="display-none label label-danger"><i
                                                            class="fa fa-exclamation-triangle"></i>&nbsp;<b>Gaji
                                                            Maksimal</b> harus diisi</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Benefit</label>
                                                    <span id="warning-benefit" class="display-none label label-danger"><i
                                                            class="fa fa-exclamation-triangle"></i>&nbsp;<b>Benefit</b>
                                                        harus diisi</span>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php $job_benefit = []; ?>
                                                    @foreach ($job->benefits as $benefit)
                                                        <?php array_push($job_benefit, $benefit->pivot->benefit_id); ?>
                                                    @endforeach

                                                    @foreach ($benefits as $benefit)
                                                        <div class="checkbox" style="float:left; margin-right: 15px;">
                                                            <div class="container-check">
                                                                <ul>
                                                                    <li>
                                                                        <input class="benefit-list" type="checkbox"
                                                                            name='benefit[]'
                                                                            id="benefit-{{ $benefit->id }}"
                                                                            value='{{ $benefit->id }}'
                                                                            {{ in_array($benefit->id, $job_benefit) ? 'checked' : '' }}>
                                                                        <label
                                                                            for="benefit-{{ $benefit->id }}">{{ $benefit->benefit }}</label>
                                                                        <div class="check">
                                                                            <div class="inside"></div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                {{-- <label>Benefit</label><br>
                                                <?php $job_benefit = []; ?>
                                                @foreach ($job->benefits as $benefit)
                                                    <?php array_push($job_benefit, $benefit->pivot->benefit_id); ?>
                                                @endforeach
                                                @foreach ($benefits as $benefit)
                                                    <div class="checkbox col-md-4">
                                                        <label>
                                                            <input type="checkbox" name='benefit[]'
                                                                value='{{ $benefit->id }}'
                                                                {{ in_array($benefit->id, $job_benefit) ? 'checked' : '' }}>
                                                            {{ $benefit->benefit }}
                                                        </label>
                                                    </div>
                                                @endforeach --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Employment Type</label>
                                                    <span id="warning-employment"
                                                        class="display-none label label-danger"><i
                                                            class="fa fa-exclamation-triangle"></i>&nbsp;<b>Employment
                                                            Type</b> harus diisi</span>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php $job_type = []; ?>
                                                    @foreach ($job->employmentTypes as $type)
                                                        <?php array_push($job_type, $type->pivot->employment_type_id); ?>
                                                    @endforeach

                                                    @foreach ($empTypes as $type)
                                                        <div class="checkbox" style="float:left; margin-right: 15px;">
                                                            <div class="container-check">
                                                                <ul>
                                                                    <li>
                                                                        <input class="employment-list" type="checkbox"
                                                                            name='employment_type[]'
                                                                            id="emp-{{ $type->id }}"
                                                                            value='{{ $type->id }}'
                                                                            {{ in_array($type->id, $job_type) ? 'checked' : '' }}>
                                                                        <label
                                                                            for="emp-{{ $type->id }}">{{ $type->type }}</label>
                                                                        <div class="check">
                                                                            <div class="inside"></div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                {{-- <label>Employment Type</label><br>
                                                <?php $job_type = []; ?>
                                                @foreach ($job->employmentTypes as $type)
                                                    <?php array_push($job_type, $type->pivot->employment_type_id); ?>
                                                @endforeach
                                                @foreach ($empTypes as $type)
                                                    <div class="checkbox col-md-4">
                                                        <label>
                                                            <input type="checkbox" name='employment_type[]'
                                                                value='{{ $type->id }}'
                                                                {{ in_array($type->id, $job_type) ? 'checked' : '' }}>
                                                            {{ $type->type }}
                                                        </label>
                                                    </div>
                                                @endforeach --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 ta-center">
                                <a data-back='1' class="btn btn-default back"><i
                                        class="fa fa-angle-left"></i>&nbsp;&nbsp;&nbsp; Sebelumnya</a>
                                <a data-next='3' class="btn blue next">Selanjutnya &nbsp;&nbsp;&nbsp;<i
                                        class="fa fa-angle-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="step-content" id='step-3' style='display: none'>

                <div class="panel mar-b-0 pad-0">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Kualifikasi</h3>
                            </div>
                            <div class="col-md-6 ta-right">
                                <h3><i class="fa fa-database"></i></h3>
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 20px;">
                            <div class="form-group col-md-4">
                                <label for='education'>Pendidikan minimal</label>
                                <select class='form-control require' id='education' name='min_education'>
                                    <option>Pilih Pendidikan minimal</option>
                                    <option value='0' {{ $job->min_education == 0 ? 'selected' : '' }}>SMA Sederajat
                                    </option>
                                    <option value='1' {{ $job->min_education == 1 ? 'selected' : '' }}>D1</option>
                                    <option value='2' {{ $job->min_education == 2 ? 'selected' : '' }}>D2</option>
                                    <option value='3' {{ $job->min_education == 3 ? 'selected' : '' }}>D3</option>
                                    <option value='4' {{ $job->min_education == 4 ? 'selected' : '' }}>D4</option>
                                    <option value='5' {{ $job->min_education == 5 ? 'selected' : '' }}>S1</option>
                                    <option value='6' {{ $job->min_education == 6 ? 'selected' : '' }}>S2</option>
                                    <option value='7' {{ $job->min_education == 7 ? 'selected' : '' }}>S3</option>
                                </select>
                                <span class="display-none label label-danger"><i
                                        class="fa fa-exclamation-triangle"></i>&nbsp;<b>Pendidikan</b> harus diisi</span>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-md-12"><label>Umur</label></div>
                                    <div class="col-md-6"><input class="form-control require" type='number'
                                            placeholder='Umur Minimal' id='min-age' name='min_age'
                                            value="{{ $job->min_age }}" /><span
                                            class="display-none label label-danger"><i
                                                class="fa fa-exclamation-triangle"></i>&nbsp;<b>Umur Minimal</b> harus
                                            diisi</span></div>
                                    <div class="col-md-6"><input class="form-control require" type='number'
                                            placeholder='Umur Maksimal' id='max-age' name='max_age'
                                            value="{{ $job->max_age }}" /><span
                                            class="display-none label label-danger"><i
                                                class="fa fa-exclamation-triangle"></i>&nbsp;<b>Umur Maksimal</b> harus
                                            diisi</span></div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-md-12"><label>Minimal Pengalaman kerja</label></div>
                                    <div class="col-md-10"><input class="form-control require" type='number'
                                            placeholder='Pengalaman Kerja' id='max-age' name='min_experience'
                                            value="{{ $job->min_experience }}" /><span
                                            class="display-none label label-danger"><i
                                                class="fa fa-exclamation-triangle"></i>&nbsp;<b>Pengalaman Kerja</b> harus
                                            diisi</span></div>
                                    <div class="col-md-2">
                                        <div style="margin-top: 7px; text-align: left;" class="text-muted">Tahun</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 ta-center">
                                <a data-back='2' class="btn btn-default back"><i
                                        class="fa fa-angle-left"></i>&nbsp;&nbsp;&nbsp; Sebelumnya</a>
                                <a data-next='4' class="btn blue next">Selanjutnya &nbsp;&nbsp;&nbsp;<i
                                        class="fa fa-angle-right"></i> </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="step-content" id='step-4' style='display: none'>

                <div class="panel mar-b-0 pad-0">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Deskripsi Pekerjaan</h3>
                            </div>
                            <div class="col-md-6 ta-right">
                                <h3><i class="fa fa-list-alt"></i></h3>
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 20px;">
                            <div class="form-group col-md-12">
                                <textarea id="description" name='description' class="width-100">{{ $job->description }}</textarea>
                                <span class="display-none label label-danger"><i
                                        class="fa fa-exclamation-triangle"></i>&nbsp;<b>Deskripsi</b> harus diisi</span>
                            </div>
                            <div class="form-group col-md-12 ta-center">
                                <a data-back='3' class="btn btn-default back"><i
                                        class="fa fa-angle-left"></i>&nbsp;&nbsp;&nbsp; Sebelumnya</a>
                                <!--<a data-next='5' class="btn blue next">Selanjutnya &nbsp;&nbsp;&nbsp;<i-->
                                <!--        class="fa fa-angle-right"></i> </a>-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            {{-- <div class="step-content" id='step-5' style='display: none'>

                <div class="panel mar-b-0 pad-0">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Requirement Process</h3>
                            </div>
                            <div class="col-md-6 ta-right">
                                <h3><i class="fa fa-briefcase"></i></h3>
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 20px;">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Pre-screening Video Interview</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="step[]" value='1'>
                                            <input class="form-control " type='date' name="due_date[]"
                                                placeholder='Due Date PVI'
                                                value='{{ $job->jobStep(1)->pivot->due_date }}' />
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>PVI</b> harus
                                                diisi</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="step2">Online Test</label>
                                        </div>
                                        <div class="col-md-6 ta-right">
                                            <input class="styled-checkbox" id="checkCust" type="checkbox"
                                                name="has_intelligence_test"
                                                {{ $job->has_intelligence_test ? 'checked' : '' }}>
                                            <label for="checkCust">Has Intelligence Test</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="step[]" value='2'>
                                            <input class="form-control " type='date' name="due_date[]"
                                                placeholder='Due Date Online Test'
                                                value='{{ $job->jobStep(2)->pivot->due_date }}' />
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Online Test</b> harus
                                                diisi</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Interview HC 1</label></div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="step[]" value='3'>
                                            <input class="form-control" type='date' name="due_date[]"
                                                placeholder='Due Date Interview HC 1'
                                                value='{{ $job->jobStep(3)->pivot->due_date }}' />
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type='text' name="interviewer[]"
                                                placeholder='Nama Pewawancara'
                                                value='{{ $job->interviewer(3)->interviewer }}' />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Interview HC 2</label></div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="step[]" value='4'>
                                            <input class="form-control" type='date' name="due_date[]"
                                                placeholder='Due Date Interview HC 2'
                                                value='{{ $job->jobStep(4)->pivot->due_date }}' />
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type='text' name="interviewer[]"
                                                placeholder='Nama Pewawancara'
                                                value='{{ $job->interviewer(4)->interviewer }}' />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Interview User 1</label></div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="step[]" value='5'>
                                            <input class="form-control" type='date' name="due_date[]"
                                                placeholder='Due Date Interview User 1'
                                                value='{{ $job->jobStep(5)->pivot->due_date }}' />
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type='text' name="interviewer[]"
                                                placeholder='Nama Pewawancara'
                                                value='{{ $job->interviewer(5)->interviewer }}' />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Interview User 2</label></div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="step[]" value='6'>
                                            <input class="form-control" type='date' name="due_date[]"
                                                placeholder='Due Date Interview User 2'
                                                value='{{ $job->jobStep(6)->pivot->due_date }}' />
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type='text' name="interviewer[]"
                                                placeholder='Nama Pewawancara'
                                                value='{{ $job->interviewer(6)->interviewer }}' />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Interview User 3</label></div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="step[]" value='7'>
                                            <input class="form-control" type='date' name="due_date[]"
                                                placeholder='Due Date Interview User 3'
                                                value='{{ $job->jobStep(7)->pivot->due_date }}' />
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type='text' name="interviewer[]"
                                                placeholder='Nama Pewawancara'
                                                value='{{ $job->interviewer(7)->interviewer }}' />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Medical Check Up</label></div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="step[]" value='8'>
                                            <input class="form-control " type='date' name="due_date[]"
                                                placeholder='Due Date Medical Checkup'
                                                value='{{ $job->jobStep(8)->pivot->due_date }}' />
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>MCU</b> harus
                                                diisi</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Offering</label></div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="step[]" value='9'>
                                            <input class="form-control " type='date' name="due_date[]"
                                                placeholder='Due Date Offering'
                                                value='{{ $job->jobStep(9)->pivot->due_date }}' />
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Offering</b> harus
                                                diisi</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Join Date</label></div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="step[]" value='10'>
                                            <input class="form-control require" type='date' name="due_date[]"
                                                placeholder='Due Date Join Date'
                                                value='{{ $job->jobStep(10)->pivot->due_date }}' />
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Join Date</b> harus
                                                diisi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 ta-center">
                                <a data-back='4' class="btn btn-default back"><i
                                        class="fa fa-angle-left"></i>&nbsp;&nbsp;&nbsp; Sebelumnya</a>
                                <a data-next='6' class="btn blue next">Selanjutnya &nbsp;&nbsp;&nbsp;<i
                                        class="fa fa-angle-right"></i> </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="step-content" id='step-6' style='display: none'>

                <div class="panel mar-b-0 pad-0">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Pertanyaan Pre-screening Video Interview (PVI)</h3>
                            </div>
                            <div class="col-md-6 ta-right">
                                <h3><i class="fa fa-list-alt"></i></h3>
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 20px;">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Pertanyaan 1</label></div>
                                        <div class="col-md-12"><input type="text" name="pvi[]"
                                                class='form-control require'
                                                value='{{ $job->pvis->get(0)->question }}'><span
                                                class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Pertanyaan 1</b> harus
                                                diisi</span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Pertanyaan 2</label></div>
                                        <div class="col-md-12"><input type="text" name="pvi[]"
                                                class='form-control require'
                                                value='{{ $job->pvis->get(1)->question }}'><span
                                                class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Pertanyaan 2</b> harus
                                                diisi</span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Pertanyaan 3</label></div>
                                        <div class="col-md-12"><input type="text" name="pvi[]"
                                                class='form-control require'
                                                value='{{ $job->pvis->get(2)->question }}'><span
                                                class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Pertanyaan 3</b> harus
                                                diisi</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Pertanyaan 4</label></div>
                                        <div class="col-md-12"><input type="text" name="pvi[]"
                                                class='form-control require'
                                                value='{{ $job->pvis->get(3)->question }}'><span
                                                class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Pertanyaan 4</b> harus
                                                diisi</span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Pertanyaan 5</label></div>
                                        <div class="col-md-12"><input type="text" name="pvi[]"
                                                class='form-control require'
                                                value='{{ $job->pvis->get(4)->question }}'><span
                                                class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Pertanyaan 5</b> harus
                                                diisi</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 ta-center">
                                <a data-back='5' class="btn btn-default back"><i
                                        class="fa fa-angle-left"></i>&nbsp;&nbsp;&nbsp; Sebelumnya</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div> --}}

            <div class="panel mar-b-0 pad-0" style="background: #f2f2f2;">
                <div class="form-footer mar-0">
                    <div class="container-fluid">
                        <div class="row">
                            <a href='{{ route('detail-job', $job->id) }}' class="btn btn-danger pull-left"><i
                                    class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
                            <button class="btn blue pull-right save-job" style='display: none; margin-left: 2em;'><i
                                    class="fa fa-upload"></i>&nbsp;&nbsp;Publish lowongan</button>
                            <button class="btn pull-right draft btn-success"><i
                                    class="fa fa-floppy-o"></i>&nbsp;&nbsp;Simpan sebagai draft</button>
                            <button data-action='{{ route('preview-job') }}'
                                class="btn btn-warning pull-right preview"><i
                                    class="fa fa-eye"></i>&nbsp;&nbsp;Preview</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@stop

@push('styles')
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/summernote.js') }}"></script>
    <script type="text/javascript">
        function setGaji(min_s, max_s) {
            $('#min_salary').val(min_s);
            $('#max_salary').val(max_s);
        }

        $('#preq').on('change', function() {
            const size = (this.files[0].size / 1024 / 1024);
            if (size > 2) {
                alert("Dokumen harus 2 MB");
                this.value = "";
            }
        });

        function validate(step_id) {
            var valid = true;
            var currentTab = document.getElementById(step_id);
            var inputs = $("#" + step_id).find(".require");
            var i;
            for (i = 0; i < inputs.length; i++) {
                var sp = inputs[i].parentElement.getElementsByTagName("span");
                if (sp.length > 0) {
                    sp[0].style.display = "none";
                }
                if (inputs[i].value == "") {
                    inputs[i].style.border += "1px solid red";
                    if (sp.length > 0) {
                        sp[0].style.display = "inline";
                    }
                    valid = false;
                }
            }

            if (step_id == "step-2") {
                $('#warning-benefit').css('display', 'none');
                $('#warning-employment').css('display', 'none');
                if ($('.benefit-list:checked').length == 0) {
                    $('#warning-benefit').css('display', 'inline');
                    valid = false;
                }
                if ($('.employment-list:checked').length == 0) {
                    $('#warning-employment').css('display', 'inline');
                    valid = false;
                }

            }

            return valid; // return the valid status
        }

        $(document).ready(function() {
            $('.require').on('keyup', function() {
                $(this).css('border', '');
            });
            $('.require').on('click', function() {
                $(this).css('border', '');
            });

            $('.next').on('click', function() {
                var next = $(this).data('next')

                if (!validate('step-' + (next - 1))) {
                    return false;
                }

                $('.step-content').hide()
                $('#step-' + next).show()
                $('.step[data-step=' + next + ']').addClass('active')
                if (next == 4) {
                    /*$('.draft').hide()*/
                    $('.draft').show()
                    $('.save-job').show()
                }
            })
            $('.back').on('click', function() {
                var back = $(this).data('back')
                $('.step-content').hide()
                $('#step-' + back).show()
                $('.step[data-step=' + (back + 1) + ']').removeClass('active')
                $('.draft').show()
                $('.save-job').hide()
            })
            $('.draft').on('click', function(e) {
                e.preventDefault()

                $('form').append('<input class="draft-input" name="draft" value="1" type="hidden">')
                $('form').submit()
            })
            $('.save-job').on('click', function(e) {
                e.preventDefault()

                $('.draft-input').remove()
                $('form').submit()
            })

            $('.preview').on('click', function(e) {
                e.preventDefault()
                var action = $(this).parents('form').attr('action')
                $(this).parents('form').attr('action', $(this).data('action'))
                $(this).parents('form').attr('target', '_blank')
                $(this).parents('form').submit()
                $(this).parents('form').attr('action', action)
                $(this).parents('form').attr('target', '')
            })

            $('#description').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                height: 300,
            });

            $('#field').on('change', function() {
                var fieldId = $(this).val()
                if (fieldId === '') {
                    $('#field_specialization').val('')
                    $('#field_specialization').prop('disabled', true)
                } else {
                    $('#field_specialization').prop('disabled', false)
                    $('#field_specialization').find('option').hide()
                    $('#field_specialization').find('[data-field="' + fieldId + '"]').show()
                }
            })

            var province = $('#province').val()
            if (province === '') {
                $('#city').val('')
                $('#city').prop('disabled', true)
            } else {
                $('#city').prop('disabled', false)
                $('#city').find('option').hide()
                $('#city').find('option:first').show()
                $('#city').find('[data-province="' + province + '"]').show()
            }

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
        });
    </script>
@endpush
