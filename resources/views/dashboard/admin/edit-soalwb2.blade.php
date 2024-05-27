@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-soalwb2') }}">Master Soal WB 2</a>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;{{ $soalwb2['id_soal'] }}&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b>Ubah</b>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="header-sub">
                <div class="va-table width-100">
                    <div class="va-middle width-50">UBAH SOAL</div>
                    <div class="va-middle width-50 ta-right"><i class="fa fa-check-square-o"></i></div>
                </div>
            </div>
            <div class="panel">
                <form method="POST" action="{{ route('change-soalwb2') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="question_id" value='{{ $soalwb2['id_soal'] }}'>
                    <input type="hidden" name="id1" value='{{ $soalwb2['id1'] }}'>
                    <input type="hidden" name="id2" value='{{ $soalwb2['id2'] }}'>
                    <!-- <h3>Ubah Profil</h3> -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>NOMOR SOAL</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nomor_soal" value='{{ $soalwb2['id_soal'] }}'
                                            class='form-control' readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>PILIHAN 1</label>
                                    <div class="col-sm-10">
                                        <textarea name="pilihan1" id="pilihan1" class='form-control' rows='2'>{{ $soalwb2['pilihan1'] }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>LABEL 1</label>
                                    <div class="col-sm-10">
                                        <select id="label1" name="label1">
                                            <option value="B" {{ $soalwb2['label1'] == 'B' ? 'selected' : '' }}>B
                                            </option>
                                            <option value="C" {{ $soalwb2['label1'] == 'C' ? 'selected' : '' }}>C
                                            </option>
                                            <option value="D" {{ $soalwb2['label1'] == 'D' ? 'selected' : '' }}>D
                                            </option>
                                            <option value="I" {{ $soalwb2['label1'] == 'I' ? 'selected' : '' }}>I
                                            </option>
                                            <option value="S" {{ $soalwb2['label1'] == 'S' ? 'selected' : '' }}>S
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>PILIHAN 2</label>
                                    <div class="col-sm-10">
                                        <textarea name="pilihan2" id="pilihan2" class='form-control' rows='2'>{{ $soalwb2['pilihan2'] }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>LABEL 2</label>
                                    <div class="col-sm-10">
                                        <select id="label2" name="label2">
                                            <option value="B" {{ $soalwb2['label2'] == 'B' ? 'selected' : '' }}>B
                                            </option>
                                            <option value="C" {{ $soalwb2['label2'] == 'C' ? 'selected' : '' }}>C
                                            </option>
                                            <option value="D" {{ $soalwb2['label2'] == 'D' ? 'selected' : '' }}>D
                                            </option>
                                            <option value="I" {{ $soalwb2['label2'] == 'I' ? 'selected' : '' }}>I
                                            </option>
                                            <option value="S" {{ $soalwb2['label2'] == 'S' ? 'selected' : '' }}>S
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class='btn blue pull-right'>Ubah Soal</button>
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
