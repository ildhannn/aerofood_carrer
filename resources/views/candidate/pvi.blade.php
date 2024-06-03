@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
            <div class="va-middle pad-b-1em-m ta-center-m">
                <h4 style="margin:0px;"><i class="fa fa-video-camera"></i>&nbsp;PVI</h4>
            </div>
        </div>
        <div class="section-content">
            @if (!$pvis)
                <i class="text-muted">(Tidak ada pertanyaan yang tersedia)</i>
            @else
                <div class="row">
                    <div class="col-md-12">
                        @foreach($pvis as $pvi)
                            <div class="col-md-6">
                                <div class="card" style="padding: 10px; margin-bottom: 20px; border-top: 1px solid #F4F6FA; border-left: 1px solid #F4F6FA; border-right: 1px solid #F4F6FA; border-bottom: 1px solid #F4F6FA; background: #F4F6FA;">
                                    <div class="card-body">
                                        <label for="question" class="form-label">Pertanyaan :</label>
                                        <p class="card-text" style="height: 150px; overflow-y: scroll; overflow-x: hidden;">
                                            {{ $pvi->question }}
                                        </p>
                                        <label for="answer" class="form-label">Jawaban :</label>
                                        <video style="height: 300px; width: 100%;" controls>   
                                            <source src="{{ URL::asset('upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$pvi->answer) }}" type="video/mp4">
                                            <source src="{{ URL::asset('upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$pvi->answer) }}" type="video/ogg">
                                            <source src="{{ URL::asset('upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$pvi->answer) }}" type="video/webm">
                                            Your browser does not support the video tag. 
                                        </video>
                                    </div>
                                    <div class="card-footer text-right" style="margin-top: 5px;">
                                        @if ($pvi->answer != null)
                                            <a href="pvi/edit/{{ $pvi->id }}" class='btn btn-primary' style="text-transform:uppercase !important;">
                                                <i class="fa fa-file-video-o" style="width:auto !important;"></i>&nbsp;&nbsp;Jawab Pertanyaan
                                            </a>
                                        @else
                                            <a href="pvi/add/{{ $pvi->id }}" class='btn btn-primary' style="text-transform:uppercase !important;">
                                                <i class="fa fa-file-video-o" style="width:auto !important;"></i>&nbsp;&nbsp;Jawab Pertanyaan
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
