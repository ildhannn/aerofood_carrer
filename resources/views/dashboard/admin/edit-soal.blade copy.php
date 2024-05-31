@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-soal') }}">Master Soal</a>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;{{ $soal->id }}&nbsp;&nbsp;&nbsp;<i
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
                <form method="POST" action="{{ route('change-soal') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value='{{ $soal->id }}'>
                    <!-- <h3>Ubah Profil</h3> -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>Pertanyaan</label>
                                    <div class="col-sm-10">
                                        <textarea name="question" id="question" class='form-control' rows='4'>{{ $soal->question }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>OPSI A</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="option_a" value='{{ $soal->option_a }}'
                                            class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>OPSI B</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="option_b" value='{{ $soal->option_b }}'
                                            class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>OPSI C</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="option_c" value='{{ $soal->option_c }}'
                                            class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>OPSI D</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="option_d" value='{{ $soal->option_d }}'
                                            class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>OPSI E</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="option_e" value='{{ $soal->option_e }}'
                                            class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>JAWABAN BENAR</label>
                                    <div class="col-sm-10">
                                        <select id="answer" name="answer">
                                            <option value="A" {{ $soal->answer == 'A' ? 'selected' : '' }}>A</option>
                                            <option value="B" {{ $soal->answer == 'B' ? 'selected' : '' }}>B</option>
                                            <option value="C" {{ $soal->answer == 'C' ? 'selected' : '' }}>C</option>
                                            <option value="D" {{ $soal->answer == 'D' ? 'selected' : '' }}>D</option>
                                            <option value="E" {{ $soal->answer == 'E' ? 'selected' : '' }}>E</option>
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
