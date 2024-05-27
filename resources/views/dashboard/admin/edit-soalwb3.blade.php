@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-soalwb3') }}">Master Soal WB 3</a>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;{{ $soalwb3['id_soal'] }}&nbsp;&nbsp;&nbsp;<i
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
                <form method="POST" action="{{ route('change-soalwb3') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="question_id" value='{{ $soalwb3['id_soal'] }}'>
                    <input type="hidden" name="id1" value='{{ $soalwb3['id1'] }}'>
                    <input type="hidden" name="id2" value='{{ $soalwb3['id2'] }}'>
                    <!-- <h3>Ubah Profil</h3> -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>NOMOR SOAL</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nomor_soal" value='{{ $soalwb3['id_soal'] }}'
                                            class='form-control' readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>PILIHAN 1</label>
                                    <div class="col-sm-10">
                                        <textarea name="pilihan1" id="pilihan1" class='form-control' rows='2'>{{ $soalwb3['pilihan1'] }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>LABEL 1</label>
                                    <div class="col-sm-10">
                                        <select id="label1" name="label1">
                                            <option value="A" {{ $soalwb3['label1'] == 'A' ? 'selected' : '' }}>A
                                            </option>
                                            <option value="B" {{ $soalwb3['label1'] == 'B' ? 'selected' : '' }}>B
                                            </option>
                                            <option value="C" {{ $soalwb3['label1'] == 'C' ? 'selected' : '' }}>C
                                            </option>
                                            <option value="D" {{ $soalwb3['label1'] == 'D' ? 'selected' : '' }}>D
                                            </option>
                                            <option value="E" {{ $soalwb3['label1'] == 'E' ? 'selected' : '' }}>E
                                            </option>
                                            <option value="F" {{ $soalwb3['label1'] == 'F' ? 'selected' : '' }}>F
                                            </option>
                                            <option value="G" {{ $soalwb3['label1'] == 'G' ? 'selected' : '' }}>G
                                            </option>
                                            <option value="H" {{ $soalwb3['label1'] == 'H' ? 'selected' : '' }}>H
                                            </option>
                                            <option value="I" {{ $soalwb3['label1'] == 'I' ? 'selected' : '' }}>I
                                            </option>
                                            <option value="J" {{ $soalwb3['label1'] == 'J' ? 'selected' : '' }}>J
                                            </option>
                                            <option value="K" {{ $soalwb3['label1'] == 'K' ? 'selected' : '' }}>K
                                            </option>
                                            <option value="L" {{ $soalwb3['label1'] == 'L' ? 'selected' : '' }}>L
                                            </option>
                                            <option value="M" {{ $soalwb3['label1'] == 'M' ? 'selected' : '' }}>M
                                            </option>
                                            <option value="N" {{ $soalwb3['label1'] == 'N' ? 'selected' : '' }}>N
                                            </option>
                                            <option value="O" {{ $soalwb3['label1'] == 'O' ? 'selected' : '' }}>O
                                            </option>
                                            <option value="P" {{ $soalwb3['label1'] == 'P' ? 'selected' : '' }}>P
                                            </option>
                                            <option value="Q" {{ $soalwb3['label1'] == 'Q' ? 'selected' : '' }}>Q
                                            </option>
                                            <option value="R" {{ $soalwb3['label1'] == 'R' ? 'selected' : '' }}>R
                                            </option>
                                            <option value="S" {{ $soalwb3['label1'] == 'S' ? 'selected' : '' }}>S
                                            </option>
                                            <option value="T" {{ $soalwb3['label1'] == 'T' ? 'selected' : '' }}>T
                                            </option>
                                            <option value="U" {{ $soalwb3['label1'] == 'U' ? 'selected' : '' }}>U
                                            </option>
                                            <option value="V" {{ $soalwb3['label1'] == 'V' ? 'selected' : '' }}>V
                                            </option>
                                            <option value="W" {{ $soalwb3['label1'] == 'W' ? 'selected' : '' }}>W
                                            </option>
                                            <option value="X" {{ $soalwb3['label1'] == 'X' ? 'selected' : '' }}>X
                                            </option>
                                            <option value="Y" {{ $soalwb3['label1'] == 'Y' ? 'selected' : '' }}>Y
                                            </option>
                                            <option value="Z" {{ $soalwb3['label1'] == 'Z' ? 'selected' : '' }}>Z
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>PILIHAN 2</label>
                                    <div class="col-sm-10">
                                        <textarea name="pilihan2" id="pilihan2" class='form-control' rows='2'>{{ $soalwb3['pilihan2'] }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>LABEL 2</label>
                                    <div class="col-sm-10">
                                        <select id="label2" name="label2">
                                            <option value="A" {{ $soalwb3['label2'] == 'A' ? 'selected' : '' }}>A
                                            </option>
                                            <option value="B" {{ $soalwb3['label2'] == 'B' ? 'selected' : '' }}>B
                                            </option>
                                            <option value="C" {{ $soalwb3['label2'] == 'C' ? 'selected' : '' }}>C
                                            </option>
                                            <option value="D" {{ $soalwb3['label2'] == 'D' ? 'selected' : '' }}>D
                                            </option>
                                            <option value="E" {{ $soalwb3['label2'] == 'E' ? 'selected' : '' }}>E
                                            </option>
                                            <option value="F" {{ $soalwb3['label2'] == 'F' ? 'selected' : '' }}>F
                                            </option>
                                            <option value="G" {{ $soalwb3['label2'] == 'G' ? 'selected' : '' }}>G
                                            </option>
                                            <option value="H" {{ $soalwb3['label2'] == 'H' ? 'selected' : '' }}>H
                                            </option>
                                            <option value="I" {{ $soalwb3['label2'] == 'I' ? 'selected' : '' }}>I
                                            </option>
                                            <option value="J" {{ $soalwb3['label2'] == 'J' ? 'selected' : '' }}>J
                                            </option>
                                            <option value="K" {{ $soalwb3['label2'] == 'K' ? 'selected' : '' }}>K
                                            </option>
                                            <option value="L" {{ $soalwb3['label2'] == 'L' ? 'selected' : '' }}>L
                                            </option>
                                            <option value="M" {{ $soalwb3['label2'] == 'M' ? 'selected' : '' }}>M
                                            </option>
                                            <option value="N" {{ $soalwb3['label2'] == 'N' ? 'selected' : '' }}>N
                                            </option>
                                            <option value="O" {{ $soalwb3['label2'] == 'O' ? 'selected' : '' }}>O
                                            </option>
                                            <option value="P" {{ $soalwb3['label2'] == 'P' ? 'selected' : '' }}>P
                                            </option>
                                            <option value="Q" {{ $soalwb3['label2'] == 'Q' ? 'selected' : '' }}>Q
                                            </option>
                                            <option value="R" {{ $soalwb3['label2'] == 'R' ? 'selected' : '' }}>R
                                            </option>
                                            <option value="S" {{ $soalwb3['label2'] == 'S' ? 'selected' : '' }}>S
                                            </option>
                                            <option value="T" {{ $soalwb3['label2'] == 'T' ? 'selected' : '' }}>T
                                            </option>
                                            <option value="U" {{ $soalwb3['label2'] == 'U' ? 'selected' : '' }}>U
                                            </option>
                                            <option value="V" {{ $soalwb3['label2'] == 'V' ? 'selected' : '' }}>V
                                            </option>
                                            <option value="W" {{ $soalwb3['label2'] == 'W' ? 'selected' : '' }}>W
                                            </option>
                                            <option value="X" {{ $soalwb3['label2'] == 'X' ? 'selected' : '' }}>X
                                            </option>
                                            <option value="Y" {{ $soalwb3['label2'] == 'Y' ? 'selected' : '' }}>Y
                                            </option>
                                            <option value="Z" {{ $soalwb3['label2'] == 'Z' ? 'selected' : '' }}>Z
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
