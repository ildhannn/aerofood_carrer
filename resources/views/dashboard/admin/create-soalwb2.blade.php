@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-soalwb2') }}">Master Soal WB 2</a>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b>Buat Baru</b>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="header-sub">
                <div class="va-table width-100">
                    <div class="va-middle width-50">TAMBAH SOAL</div>
                    <div class="va-middle width-50 ta-right"><i class="fa fa-check-square-o"></i></div>
                </div>
            </div>
            <div class="panel">
                <form method="POST" action="{{ route('create-soalwb2') }}">
                    {{ csrf_field() }}
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>NOMOR SOAL</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nomor_soal" class='form-control'
                                            value="{{ $soal2wb->id + 1 }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>PILIHAN 1</label>
                                    <div class="col-sm-10">
                                        <textarea name="pilihan1" id="pilihan1" class='form-control' rows='2'></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>LABEL 1</label>
                                    <div class="col-sm-10">
                                        <select id="label1" name="label1">
                                            <option value="B">B
                                            </option>
                                            <option value="C">C
                                            </option>
                                            <option value="D">D
                                            </option>
                                            <option value="I">I
                                            </option>
                                            <option value="S">S
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>PILIHAN 2</label>
                                    <div class="col-sm-10">
                                        <textarea name="pilihan2" id="pilihan2" class='form-control' rows='2'></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>LABEL 2</label>
                                    <div class="col-sm-10">
                                        <select id="label2" name="label2">
                                            <option value="B">B
                                            </option>
                                            <option value="C">C
                                            </option>
                                            <option value="D">D
                                            </option>
                                            <option value="I">I
                                            </option>
                                            <option value="S">S
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class='btn blue pull-right'>Simpan Soal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
