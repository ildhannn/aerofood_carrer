@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('dashboard-pvi') }}">Master PVI</a>&nbsp;&nbsp;&nbsp;
    <i class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;{{ $pvi->id }}&nbsp;&nbsp;&nbsp;
    <i class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b>Ubah</b>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="header-sub">
                <div class="va-table width-100">
                    <div class="va-middle width-50">UBAH PVI</div>
                    <div class="va-middle width-50 ta-right"><i class="fa fa-check-square-o"></i></div>
                </div>
            </div>
            <div class="panel">
                <form method="POST" action="{{ route('change-pvi') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value='{{ $pvi->id }}'>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>Pertanyaan</label>
                                    <div class="col-sm-10">
                                        <textarea name="question" id="question" class='form-control' rows='4'>{{ $pvi->question }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 control-label ta-left'>Status</label>
                                    <div class="col-sm-10">
                                        <select id="status" name="status">
                                            <option value="1" {{ $pvi->status == '1' ? 'selected' : '' }}>Aktif</option>
                                            <option value="2" {{ $pvi->status == '2' ? 'selected' : '' }}>Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class='btn blue pull-right'>Ubah PVI</button>
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
