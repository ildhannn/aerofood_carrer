@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-jobs') }}">Lowongan</a>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b>Buat Lowongan Baru</b>
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
        <form method="POST" action="{{ route('store-job') }}" enctype="multipart/form-data" class="mar-0" id="form-val">
            {{ csrf_field() }}
            <div class="steps row text-center" id="tab-val">
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
                <div class="step col-sm-2" data-step='4' style="padding:11px 0px;">
                    <!-- <span class='number'>4</span><br> -->
                    <i class="fa fa-list-alt"></i>&nbsp;&nbsp;<span class='title'>DESKRIPSI</span>
                    <div class="arrowrow_right_left"></div>
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
                            <div class="form-group col-md-4">
                                <label for="title">Nomor P.Req</label>
                                <input class="form-control require" type='text' placeholder='Nomor Preq' id='title'
                                    name='preq' required="required" />
                                <span class="display-none label label-danger"><i
                                        class="fa fa-exclamation-triangle"></i>&nbsp;<b>Nomor P.Req</b> harus diisi</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="need">Kebutuhan</label>
                                <input class="form-control require" type='number'
                                    placeholder='Jumlah Karyawan yang Dibutuhkan' id='need' name='need'
                                    min='0' required="required" />
                                <span class="display-none label label-danger"><i
                                        class="fa fa-exclamation-triangle"></i>&nbsp;<b>Kebutuhan</b> harus diisi</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for='preq' class="control-label">Unggah Dokumen P.Req</label>
                                <input id="preq" type="file" class="form-control require" name="file" required
                                    placeholder="Dokumen Preq" accept="application/pdf" required="required">
                                <i class="text-muted" style="font-size: 12px;">(hanya menerima file berupa pdf)</i>
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
                                                placeholder='Judul lowongan' id='title' name='title' />
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Judul lowongan</b>
                                                harus diisi</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Bidang</label>
                                            <select class='form-control' id='field' name='field_id'>
                                                <option value='999'>Pilih bidang</option>
                                                @foreach ($fields as $field)
                                                    <option value='{{ $field->id }}'>{{ $field->field }}</option>
                                                @endforeach
                                            </select>
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Bidang</b> harus
                                                diisi</span>
                                        </div>
                                        <div class="form-group">
                                            <select class='form-control' id='field_specialization'
                                                name='field_specialization_id' disabled>
                                                <option value='999'>Pilih bidang spesialisasi</option>
                                                @foreach ($specializations as $specialization)
                                                    <option value='{{ $specialization->id }}'
                                                        data-field='{{ $specialization->field_id }}'>
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
                                                <option value=''>Pilih Provinsi</option>
                                                @foreach ($provinces as $province)
                                                    <option value='{{ $province->id }}'>{{ $province->province }}</option>
                                                @endforeach
                                            </select>
                                            <span class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Provinsi</b> harus
                                                diisi</span>
                                        </div>
                                        <div class="form-group">
                                            <select class='form-control require' id='city' name='city_id' disabled>
                                                <option value=''>Pilih Kota/Kabupaten</option>
                                                @foreach ($cities as $city)
                                                    <option value='{{ $city->id }}'
                                                        data-province='{{ $city->province_id }}'>{{ $city->city }}
                                                    </option>
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
                                                <div class="col-md-12"><label>Tanggal Berlaku Lowongan</label></div>
                                                <div class="col-md-6"><input class="form-control require" type='date'
                                                        placeholder='Tanggal Mulai' id='start-date'
                                                        name='start_date' /><span
                                                        class="display-none label label-danger"><i
                                                            class="fa fa-exclamation-triangle"></i>&nbsp;<b>Tanggal
                                                            Mulai</b> harus diisi</span></div>
                                                <div class="col-md-6"><input class="form-control require" type='date'
                                                        placeholder='Tanggal Akhir' id='end-date'
                                                        name='end_date' /><span class="display-none label label-danger"><i
                                                            class="fa fa-exclamation-triangle"></i>&nbsp;<b>Tanggal
                                                            Akhir</b> harus diisi</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><label>Gaji</label></div>
                                                <div class="col-md-6"><input class="form-control" type='hidden'
                                                        placeholder='Gaji minimal' id='min_salary' name='min_salary' />
                                                </div>
                                                <div class="col-md-6"><input class="form-control" type='hidden'
                                                        placeholder='Gaji maksimal' id='max_salary' name='max_salary' />
                                                </div>
                                                <div class="col-md-12">
                                                    <select class='form-control require' id='expected_salary'>
                                                        <option value=''>Pilih Gaji yang Diharapkan</option>
                                                        <option value="0,0"><span style="color:red;">Negotiable</span>
                                                        </option>
                                                        <option value="0,1000000">Rp0 - Rp1.000.000</option>
                                                        <option value="1000000,1500000">Rp1.000.000 - Rp1.500.000</option>
                                                        <option value="1500000,2000000">Rp1.500.000 - Rp2.000.000</option>
                                                        <option value="2000000,3000000">Rp2.000.000 - Rp3.000.000</option>
                                                        <option value="3000000,4000000">Rp3.000.000 - Rp4.000.000</option>
                                                        <option value="4000000,5000000">Rp4.000.000 - Rp5.000.000</option>
                                                        <option value="5000000,6000000">Rp5.000.000 - Rp6.000.000</option>
                                                        <option value='6000000,8000000'>Rp6.000.000 - Rp8.000.000</option>
                                                        <option value='8000000,10000000'>Rp8.000.000 - Rp10.000.000
                                                        </option>
                                                        <option value='10000000,13000000'>Rp10.000.000 - Rp13.000.000
                                                        </option>
                                                        <option value='13000000,16000000'>Rp13.000.000 - Rp16.000.000
                                                        </option>
                                                        <option value='16000000,22000000'>Rp16.000.000 - Rp22.000.000
                                                        </option>
                                                        <option value='22000000,28000000'>Rp22.000.000 - Rp28.000.000
                                                        </option>
                                                        <option value='28000000,38000000'>Rp28.000.000 - Rp38.000.000
                                                        </option>
                                                        <option value='38000000,50000000'>Rp38.000.000 - Rp50.000.000
                                                        </option>
                                                        <option value='50000000,70000000'>Rp50.000.000 - Rp70.000.000
                                                        </option>
                                                        <option value='70000000,90000000'>Rp70.000.000 - Rp90.000.000
                                                        </option>
                                                    </select>
                                                    <span class="display-none label label-danger"><i
                                                            class="fa fa-exclamation-triangle"></i>&nbsp;<b>Gaji yang
                                                            diharapkan</b> harus diisi</span>
                                                </div>
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
                                                    <label>Benefit</label>&nbsp;<span class="text-muted"><i>(multiple
                                                            choice)</i></span>
                                                    <span id="warning-benefit" class="display-none label label-danger"><i
                                                            class="fa fa-exclamation-triangle"></i>&nbsp;<b>Benefit</b>
                                                        harus diisi</span>
                                                </div>
                                                <div class="col-md-12">
                                                    @foreach ($benefits as $benefit)
                                                        <div class="checkbox" style="float:left; margin-right: 15px;">
                                                            <div class="container-check">
                                                                <ul>
                                                                    <li>
                                                                        <input type="checkbox" class="benefit-list"
                                                                            name='benefit[]' value='{{ $benefit->id }}'
                                                                            id="benefit-{{ $benefit->id }}">
                                                                        <label
                                                                            for="benefit-{{ $benefit->id }}">{{ $benefit->benefit }}</label>
                                                                        <div class="check">
                                                                            <div class="inside"></div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            {{-- <label>
                                                                <input type="checkbox" name='benefit[]'
                                                                    value='{{ $benefit->id }}'> {{ $benefit->benefit }}
                                                            </label> --}}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Employment Type</label>&nbsp;<span
                                                        class="text-muted"><i>(multiple choice)</i></span>
                                                    <span id="warning-employment"
                                                        class="display-none label label-danger"><i
                                                            class="fa fa-exclamation-triangle"></i>&nbsp;<b>Employment
                                                            Type</b> harus diisi</span>
                                                </div>
                                                <div class="col-md-12">
                                                    @foreach ($empTypes as $type)
                                                        <div class="checkbox" style="float:left; margin-right: 15px;">
                                                            <div class="container-check">
                                                                <ul>
                                                                    <li>
                                                                        <input type="checkbox" class="employment-list"
                                                                            name='employment_type[]'
                                                                            value='{{ $type->id }}'
                                                                            id="emp-{{ $type->id }}">
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
                                                @foreach ($empTypes as $type)
                                                    <div class="checkbox col-md-4">
                                                        <label>
                                                            <input type="checkbox" name='employment_type[]'
                                                                value='{{ $type->id }}'> {{ $type->type }}
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

                                <!-- <a data-next='2' class="btn blue next">Selanjutnya&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="container-fluid">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">Judul lowongan</label>
                            <input class="form-control" type='text' placeholder='Judul lowongan' id='title'
                                name='title' />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Bidang</label>
                            <select class='form-control' id='field' name='field_id'>
                                <option value=''>Pilih bidang</option>
                                @foreach ($fields as $field)
                                    <option value='{{ $field->id }}'>{{ $field->field }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <select class='form-control' id='field_specialization' name='field_specialization_id'
                                disabled>
                                <option value=''>Pilih bidang spesialisasi</option>
                                @foreach ($specializations as $specialization)
                                    <option value='{{ $specialization->id }}'
                                        data-field='{{ $specialization->field_id }}'>
                                        {{ $specialization->specialization }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Lokasi</label>
                            <select class='form-control' id='province' name='province_id'>
                                <option value=''>Pilih Provinsi</option>
                                @foreach ($provinces as $province)
                                    <option value='{{ $province->id }}'>{{ $province->province }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <select class='form-control' id='city' name='city_id' disabled>
                                <option value=''>Pilih Kota/Kabupaten</option>
                                @foreach ($cities as $city)
                                    <option value='{{ $city->id }}' data-province='{{ $city->province_id }}'>
                                        {{ $city->city }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Tanggal Berlaku Lowongan</label>
                            <input class="form-control" type='date' placeholder='Tanggal Mulai' id='start-date'
                                name='start_date' />
                        </div>
                        <div class="form-group col-md-3">
                            <label>&nbsp;</label>
                            <input class="form-control" type='date' placeholder='Tanggal Akhir' id='end-date'
                                name='end_date' />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="min_salary">Gaji</label>
                            <input class="form-control" type='number' placeholder='Gaji minimal' id='min_salary'
                                name='min_salary' />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="max_salary">&nbsp;</label>
                            <input class="form-control" type='number' placeholder='Gaji maksimal' id='max_salary'
                                name='max_salary' />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label>Benefit</label><br>
                            @foreach ($benefits as $benefit)
                                <div class="checkbox col-md-4">
                                    <label>
                                        <input type="checkbox" name='benefit[]' value='{{ $benefit->id }}'>
                                        {{ $benefit->benefit }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label>Employment Type</label><br>
                            @foreach ($empTypes as $type)
                                <div class="checkbox col-md-4">
                                    <label>
                                        <input type="checkbox" name='employment_type[]' value='{{ $type->id }}'>
                                        {{ $type->type }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <a data-back='1' class="btn btn-default pull-left back"><i
                                class="fa fa-angle-left">&nbsp;&nbsp;&nbsp; Sebelumnya</i></a>
                        <a data-next='3' class="btn blue pull-right next">Selanjutnya &nbsp;&nbsp;&nbsp;<i
                                class="fa fa-angle-right"></i> </a>
                    </div>
                </div> --}}
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
                                <label for="title">Pendidikan minimal</label>
                                <select class='form-control require' id='education' name='min_education'>
                                    <option value=''>Pilih Pendidikan minimal</option>
                                    <option value='0'>SMA Sederajat</option>
                                    <option value='1'>D1</option>
                                    <option value='2'>D2</option>
                                    <option value='3'>D3</option>
                                    <option value='4'>D4</option>
                                    <option value='5'>S1</option>
                                    <option value='6'>S2</option>
                                    <option value='7'>S3</option>
                                </select>
                                <span class="display-none label label-danger"><i
                                        class="fa fa-exclamation-triangle"></i>&nbsp;<b>Pendidikan</b> harus diisi</span>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-md-12"><label>Umur</label></div>
                                    <div class="col-md-6"><input class="form-control require" type='number'
                                            placeholder='Umur Minimal' id='min-age' name='min_age' /><span
                                            class="display-none label label-danger"><i
                                                class="fa fa-exclamation-triangle"></i>&nbsp;<b>Umur Minimal</b> harus
                                            diisi</span></div>
                                    <div class="col-md-6"><input class="form-control require" type='number'
                                            placeholder='Umur Maksimal' id='max-age' name='max_age' /><span
                                            class="display-none label label-danger"><i
                                                class="fa fa-exclamation-triangle"></i>&nbsp;<b>Umur Maksimal</b> harus
                                            diisi</span></div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-md-12"><label>Minimal Pengalaman kerja</label></div>
                                    <div class="col-md-10"><input class="form-control require" type='number'
                                            placeholder='Pengalaman Kerja' id='max-age' name='min_experience' /><span
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
                                <textarea id="description" name="description" class="width-100" rows="10"></textarea>
                                <span class="display-none label label-danger"><i
                                        class="fa fa-exclamation-triangle"></i>&nbsp;<b>Deskripsi</b> harus diisi</span>
                                <!-- <input type="button" onclick="javascript:fnConsolePrint();" value="Console" /> -->
                                <!-- <textarea id="description" name='description' class="width-100" rows="10"></textarea> -->
                            </div>
                            <div class="form-group col-md-12 ta-center">
                                <a data-back='3' class="btn btn-default back"><i
                                        class="fa fa-angle-left"></i>&nbsp;&nbsp;&nbsp; Sebelumnya</a>
                                {{-- <a data-next='5' class="btn blue next">Selanjutnya &nbsp;&nbsp;&nbsp;<i
                                        class="fa fa-angle-right"></i> </a> --}}
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
                                                placeholder='Due Date PVI' />
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
                                                name="has_intelligence_test" checked>
                                            <label for="checkCust">Has Intelligence Test</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="step[]" value='2'>
                                            <input class="form-control " type='date' name="due_date[]"
                                                placeholder='Due Date Test Online' />
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
                                                placeholder='Due Date Interview HC 1' />
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type='text' name="interviewer[]"
                                                placeholder='Nama Pewawancara' />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Interview HC 2</label></div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="step[]" value='4'>
                                            <input class="form-control" type='date' name="due_date[]"
                                                placeholder='Due Date Interview HC 2' />
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type='text' name="interviewer[]"
                                                placeholder='Nama Pewawancara' />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Interview User 1</label></div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="step[]" value='5'>
                                            <input class="form-control" type='date' name="due_date[]"
                                                placeholder='Due Date Interview User 1' />
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type='text' name="interviewer[]"
                                                placeholder='Nama Pewawancara' />
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
                                                placeholder='Due Date Interview User 2' />
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type='text' name="interviewer[]"
                                                placeholder='Nama Pewawancara' />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Interview User 3</label></div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="step[]" value='7'>
                                            <input class="form-control" type='date' name="due_date[]"
                                                placeholder='Due Date Interview User 3' />
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type='text' name="interviewer[]"
                                                placeholder='Nama Pewawancara' />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Medical Check Up</label></div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="step[]" value='8'>
                                            <input class="form-control " type='date' name="due_date[]"
                                                placeholder='Due Date Medical Checkup' />
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
                                                placeholder='Due Date Offering' />
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
                                                placeholder='Due Date Join Date' />
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
                                <h3><i class="fa fa-video-camera"></i></h3>
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 20px;">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Pertanyaan 1</label></div>
                                        <div class="col-md-12"><input type="text" name="pvi[]"
                                                class='form-control require'><span
                                                class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Pertanyaan 1</b> harus
                                                diisi</span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Pertanyaan 2</label></div>
                                        <div class="col-md-12"><input type="text" name="pvi[]"
                                                class='form-control require'><span
                                                class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Pertanyaan 2</b> harus
                                                diisi</span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Pertanyaan 3</label></div>
                                        <div class="col-md-12"><input type="text" name="pvi[]"
                                                class='form-control require'><span
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
                                                class='form-control require'><span
                                                class="display-none label label-danger"><i
                                                    class="fa fa-exclamation-triangle"></i>&nbsp;<b>Pertanyaan 4</b> harus
                                                diisi</span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label for="step2">Pertanyaan 5</label></div>
                                        <div class="col-md-12"><input type="text" name="pvi[]"
                                                class='form-control require'><span
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
                            <a href='{{ route('dashboard-jobs') }}' class="btn btn-danger pull-left"><i
                                    class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
                            <button class="btn blue pull-right save-job" style='display: none; margin-left: 2em;'><i
                                    class="fa fa-upload"></i>&nbsp;&nbsp;Publish lowongan</button>
                            <button class="btn pull-right draft btn-success" style="display:none"><i
                                    class="fa fa-floppy-o"></i>&nbsp;&nbsp;Simpan sebagai draft</button>
                            <!-- <button class="btn blue pull-right save-job" style='display: none'>Publish lowongan</button> -->
                            <button data-action='{{ route('preview-job') }}' class="btn btn-warning pull-right preview"
                                style="display:none"><i class="fa fa-eye"></i>&nbsp;&nbsp;Preview</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function setGaji(min_s, max_s) {
            $('#min_salary').val(min_s);
            $('#max_salary').val(max_s);
        }

        $('#preq').on('change', function() {
            const size = (this.files[0].size / 1024 / 1024);
            if (size > 2) {
                alert("Max Dokumen 2 MB");
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
                if (next == 3) {
                    $('.draft').show()
                    $('.preview').show()
                }
            })
            $('.back').on('click', function() {
                var back = $(this).data('back')
                $('.step-content').hide()
                $('#step-' + back).show()
                $('.step[data-step=' + (back + 1) + ']').removeClass('active')
                //$('.draft').show()
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

            $('.preview').on('click', function(e) {
                e.preventDefault()
                var action = $(this).parents('form').attr('action')
                $(this).parents('form').attr('action', $(this).data('action'))
                $(this).parents('form').attr('target', '_blank')
                $(this).parents('form').submit()
                $(this).parents('form').attr('action', action)
                $(this).parents('form').attr('target', '')
            })

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
            $('#expected_salary').on('change', function() {
                //setGaji($('#expected_salary').val()[0], $('#expected_salary').val()[1]);
                //alert( $('#expected_salary').val() );
                //alert($('#expected_salary').val().split(',')[0]);
                $('#min_salary').val($('#expected_salary').val().split(',')[0]);
                $('#max_salary').val($('#expected_salary').val().split(',')[1]);
            });


            /* VALIDATION */

            var validator = $("#form-val").validate();

            var tabs = $("#tab-val").tabs({
                select: function(event, ui) {
                    var valid = true;
                    var current = $(this).tabs("option", "selected");
                    var panelId = $("#tabs step i").eq(current).attr("href");

                    $(panelId).find(":input").each(function() {
                        //$(".nextbutton").click(function() {
                        //console.log(valid);
                        if (!validator.element(this) && valid) {
                            valid = false;
                        }
                    });

                    return valid;
                }
            });

            $(".nexttab").click(function() {
                $("#tabs").tabs("select", this.hash);
            });

            $("a[id=submit]").click(function() {
                $(this).parents("form").submit();
            });

            $('#yes').click(function() {
                $("#tabs").tabs("select", this.hash);
                $('#yes-reply').show();
                $('#no-reply').hide();
            });

            $('#no').click(function() {
                $("#tabs").tabs("select", this.hash);
                $('#yes-reply').hide();
                $('#no-reply').show();
            });
        });
    </script>
@endpush
