@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-soalwb1') }}">Master Soal WB 1</a>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;{{ $soalwb1['id_soal'] }}&nbsp;&nbsp;&nbsp;<i
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
                <form method="POST" action="{{ route('change-soalwb1') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="question_id" value='{{ $soalwb1['id_soal'] }}'>
                    <input type="hidden" name="id1" value='{{ $soalwb1['id1'] }}'>
                    <input type="hidden" name="id2" value='{{ $soalwb1['id2'] }}'>
                    <!-- <h3>Ubah Profil</h3> -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>NOMOR SOAL</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nomor_soal" value='{{ $soalwb1['id_soal'] }}'
                                            class='form-control' readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>PILIHAN 1</label>
                                    <div class="col-sm-10">
                                        <textarea name="pilihan1" id="pilihan1" class='form-control' rows='2'>{{ $soalwb1['pilihan1'] }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>LABEL 1</label>
                                    <div class="col-sm-10">
                                        <select id="label1" name="label1">
                                            <option value="E" {{ $soalwb1['label1'] == 'E' ? 'selected' : '' }}>E
                                            </option>
                                            <option value="F" {{ $soalwb1['label1'] == 'F' ? 'selected' : '' }}>F
                                            </option>
                                            <option value="I" {{ $soalwb1['label1'] == 'I' ? 'selected' : '' }}>I
                                            </option>
                                            <option value="J" {{ $soalwb1['label1'] == 'J' ? 'selected' : '' }}>J
                                            </option>
                                            <option value="N" {{ $soalwb1['label1'] == 'N' ? 'selected' : '' }}>N
                                            </option>
                                            <option value="P" {{ $soalwb1['label1'] == 'P' ? 'selected' : '' }}>P
                                            </option>
                                            <option value="S" {{ $soalwb1['label1'] == 'S' ? 'selected' : '' }}>S
                                            </option>
                                            <option value="T" {{ $soalwb1['label1'] == 'T' ? 'selected' : '' }}>T
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>PILIHAN 2</label>
                                    <div class="col-sm-10">
                                        <textarea name="pilihan2" id="pilihan2" class='form-control' rows='2'>{{ $soalwb1['pilihan2'] }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>LABEL 2</label>
                                    <div class="col-sm-10">
                                        <select id="label2" name="label2">
                                            <option value="E" {{ $soalwb1['label2'] == 'E' ? 'selected' : '' }}>E
                                            </option>
                                            <option value="F" {{ $soalwb1['label2'] == 'F' ? 'selected' : '' }}>F
                                            </option>
                                            <option value="I" {{ $soalwb1['label2'] == 'I' ? 'selected' : '' }}>I
                                            </option>
                                            <option value="J" {{ $soalwb1['label2'] == 'J' ? 'selected' : '' }}>J
                                            </option>
                                            <option value="N" {{ $soalwb1['label2'] == 'N' ? 'selected' : '' }}>N
                                            </option>
                                            <option value="P" {{ $soalwb1['label2'] == 'P' ? 'selected' : '' }}>P
                                            </option>
                                            <option value="S" {{ $soalwb1['label2'] == 'S' ? 'selected' : '' }}>S
                                            </option>
                                            <option value="T" {{ $soalwb1['label2'] == 'T' ? 'selected' : '' }}>T
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
