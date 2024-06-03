@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
            <div class="va-middle pad-b-1em-m ta-center-m"><h4 style=" margin:0px;"><i class="fa fa-video-camera"></i>&nbsp;PVI</h4></div>
            <div class="va-middle dis-tab-row-m ta-right ta-center-m"><a href="{{ route('candidate-pvi') }}" class='btn btn-success'><i class="fa fa-chevron-left" style="width:auto !important;"></i>&nbsp;&nbsp;KEMBALI</a></div>
        </div>
        <div class="section-content">
            <form method="POST" action="{{ route('add-candidate-pvi') }}" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row" style="padding-left: 20px; padding-right: 20px; padding-bottom: 20px;">
                    <div class="col-md-12">
                        <div class="card" style="padding: 10px; margin-bottom: 20px; border-top: 1px solid #F4F6FA; border-left: 1px solid #F4F6FA; border-right: 1px solid #F4F6FA; border-bottom: 1px solid #F4F6FA; background: #F4F6FA;">
                            <div class="card-body">
                                @foreach($pvis as $pvi)
                                    <input type="hidden" name="pvi_id" value="{{ $pvi->id }}">
                                    <label for="question" class="form-label">Pertanyaan :</label>
                                    <p class="card-text" style="height: 150px; overflow-y: scroll; overflow-x: hidden;">
                                        {{ $pvi->question }}
                                    </p>
                                @endforeach
                                <label for="question" class="form-label">Unggah Video<span class="input-group-text" id="inputGroupPrepend" style="color: red">*</span> :</label>
                                <input type="file" class="" id="answer" name="answer" placeholder="Jawaban" accept="video/*" required>
                                <i class="text-muted fs-12">(Hanya menerima file <b>video</b> dan size <b>25MB</b>)</i>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class='btn btn-success' style="text-transform:uppercase !important;">
                                <i class="fa fa-floppy-o" style="width:auto !important;"></i>&nbsp;&nbsp;Upload Jawaban
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
