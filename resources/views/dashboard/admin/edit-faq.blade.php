@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-faq') }}">Master FAQ</a>&nbsp;&nbsp;&nbsp;
    <i class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;{{ $faq->id }}&nbsp;&nbsp;&nbsp;
    <i class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b>Ubah</b>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="header-sub">
                <div class="va-table width-100">
                    <div class="va-middle width-50">UBAH FAQ</div>
                    <div class="va-middle width-50 ta-right"><i class="fa fa-check-square-o"></i></div>
                </div>
            </div>
            <div class="panel">
                <form method="POST" action="{{ route('change-faq') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value='{{ $faq->id }}'>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>Pertanyaan</label>
                                    <div class="col-sm-10">
                                        <textarea name="question" id="question" class='form-control' rows='4'>{{ $faq->question }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>Jawaban</label>
                                    <div class="col-sm-10">
                                        <textarea name="answer" id="answer" class='form-control' rows='4'>{{ $faq->answer }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class='btn blue pull-right'>Ubah FAQ</button>
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
