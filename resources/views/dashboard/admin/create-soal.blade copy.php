@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-soal') }}">Master Soal</a>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b>Buat Baru</b>
@stop


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="header-sub">
                <div class="va-table width-100">
                    <div class="va-middle width-50">TAMBAH SOAL</div>
                    <div class="va-middle width-50 ta-right">
                        <div><i class="fa fa-plus"></i></div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <form method="POST" action="{{ route('create-soal') }}">
                    {{ csrf_field() }}
                    <!-- <h3>Profil</h3> -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>Pertanyaan</label>
                                    <div class="col-sm-10">
                                        <textarea name="question" id="question" class='form-control' rows='4'></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>OPSI A</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="option_a" value='' class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>OPSI B</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="option_b" value='' class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>OPSI C</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="option_c" value='' class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>OPSI D</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="option_d" value='' class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>OPSI E</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="option_e" value='' class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>JAWABAN BENAR</label>
                                    <div class="col-sm-10">
                                        <select id="answer" name="answer" required>
                                            <option value="">Pilih jawaban benar</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class='btn blue pull-right'>Tambah Soal</button>
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
