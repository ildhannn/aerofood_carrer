@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-faq') }}">Master FAQ</a>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b>Buat Baru</b>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="header-sub">
                <div class="va-table width-100">
                    <div class="va-middle width-50">TAMBAH FAQ</div>
                    <div class="va-middle width-50 ta-right">
                        <div><i class="fa fa-plus"></i></div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <form method="POST" action="{{ route('create-faq') }}">
                    {{ csrf_field() }}
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
                                    <label class='col-sm-2 control-label ta-left'>Jawaban</label>
                                    <div class="col-sm-10">
                                        <textarea name="answer" id="answer" class='form-control' rows='4'></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class='btn blue pull-right'>Tambah FAQ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
