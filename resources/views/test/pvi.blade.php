@extends('layouts.main')

@section('content')
<div class="test">
	<div class="container-fluid mar-t-1em-m mar-t-3em">
        
	    <div class="row text-center welcome pad-1em-m">
			<div class="col-md-10 col-md-offset-1">
				<div id='0'>
				    <?php $answers = $job->pviCandidateAnswers(Auth::user()->candidate->id) ?>
	                @if($answers->count() < 5)
					<h3 class="tt-upper" >Selamat datang pada tahap Prescreening Video Interview (PVI)</h3>
					<br>
					<div class="label label-default mar-t-10px mar-b-10px">{{$answers->count().' dari 5 sudah terjawab'}}</div>
					<br><br>
					<div class="col-md-3 mar-b-1em-m">
	                    <div class="va-table" style="border:1px solid #dcdcdc; padding:30px 20px; height:350px;">
	                        <div class="va-middle">
	                            <div style="">
	                                <div><img src="{{asset('img/tes.png')}}" height="150"></div><br><div>Pada tahap ini Anda akan diminta untuk menjawab <b>5 (lima)</b> pertanyaan.</div>
	                            </div>
	                        </div>
	                    </div>
					</div>
					<div class="col-md-3 mar-b-1em-m">
					    <div class="va-table" style="border:1px solid #dcdcdc; padding:30px 20px; height:350px;">
	                        <div class="va-middle">
	                            <div style="">
	                                <div><img src="{{asset('img/upload-vid.png')}}" height="150"></div><br><div><b>Jawaban Anda berupa video</b> yang nanti harus Anda upload pada setiap pertanyaan.</div>
	                            </div>
	                        </div>
	                    </div>
					</div>
					<div class="col-md-3 mar-b-1em-m">
					    <div class="va-table" style="border:1px solid #dcdcdc; padding:30px 20px; height:350px;">
	                        <div class="va-middle">
	                            <div style="">
	                                <div><img src="{{asset('img/nb-cam-hp.png')}}" height="150"></div><br><div>Video bisa Anda buat menggunakan alat apa saja (<b>Laptop, HP, atau Kamera</b>) asalkan gambar cukup jelas.</div>
	                            </div>
	                        </div>
	                    </div>
					</div>
					<div class="col-md-3 mar-b-1em-m">
					    <div class="va-table" style="border:1px solid #dcdcdc; padding:30px 20px; height:350px;">
	                        <div class="va-middle">
	                            <div style="">
	                                <div><img src="{{asset('img/video-size.png')}}" height="150"></div><br><div>Setiap video maksimal berukuran <b>25 MB</b>. Ekstensi file berupa <b>mp4</b>.</div>
	                            </div>
	                        </div>
	                    </div>
					</div>
					<div class="col-md-12 ta-center mar-t-10px">
					    <br>
					    <div class="label label-primary fs-14 display-block-m" style="font-weight:normal; background:#dcdcdc !important; border:1px solid #999; white-space: normal; line-height: 20px;"><span class="text-danger"><b>Perhatian&nbsp;:&nbsp;Jawaban yang telah diunggah tidak dapat diganti.</b></span><span style="color:#666;"> Untuk memulai silahkan klik tombol <b>Mulai Tes PVI</b> dibawah ini.</span></div>
					    <div></div>
					    <br>
						<button class='btn btn-success next' data-next='1'>{{$answers->count() > 0 ? 'Lanjutkan Tes PVI' : 'Mulai Tes PVI '}}&nbsp;&nbsp;<i class="fa fa-video-camera"></i></button>
					    <br>
					    <br>
					</div>
				</div>
				@endif
                <?php $next = 1 ?>
                @foreach($job->pvis as $pvi)
                    @if($answers->where('pvi_id', $pvi->id)->count() == 0)
                        <div class="step question pad-0" id='{{$next}}' style="display:none">
                            <div class="va-table width-90 mar-0-auto width-100-m pad-30-20 pad-t-2em-m" style="border:1px solid #dcdcdc; background:#f5f5f5; height:250px;position:relative;">
                                <div style="position:absolute;top:0;left:0;background:#999;color:#fff;padding:5px 10px;">{{$loop->iteration}}</div>
                                <div class="va-middle ta-left width-70 pad-r-1em display-block-m width-100-m mar-b-1em-m"><div class="fs-18" style="line-height: 23px;">{{$pvi->question}}</div></div>
                                <div class="va-middle width-30 display-block-m width-100-m mar-b-1em-m">
                                    <form action="{{route('pvi-answer', $job->job_id)}}" class="dropzone fs-14" enctype="multipart/form-data" id="dropzone_{{$loop->iteration}}" style="background:#000;color:#fff;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pvi_id" value="{{$pvi->id}}">
                                        <input type="hidden" name="number" value="{{$loop->iteration}}">
                                        <div class="fallback">
                                            <input type="file" name="answer">
                                        </div>
                                    </form>
                                    <div class="text-danger fs-13 mar-t-10px">Maksimal file = <b>25 MB</b>. Maksimal durasi video = <b>1 menit</b>. Ekstensi file berupa <b>mp4</b>.</div>
                                </div>
                                <div style="position:absolute;bottom:0;left:0;"><button class='btn btn-success pull-right next' disabled data-next='{{$next + 1}}'>Selanjutnya&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></button></div>
                            </div>
                        </div>
                        <?php $next++; ?>
                    @endif
                @endforeach
                <div class="step welcome pad-1em-m" id='{{$next}}' style="display: {{$answers->count() < 5 ? 'none' : ''}}">
                    <h3>Anda telah menyelesaikan Prescreening Video interview</h3>
                    <img src="{{asset('img/pvi.png')}}" width="50%">
                    <div class="text-center">
                        <a href='{{route("candidate-job")}}' class='btn btn-success'><i class="fa fa-home"></i>&nbsp;&nbsp;Kembali ke beranda</a>
                    </div>
                </div>
			</div>
		</div>
	
		
	</div>
</div>
@stop


@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/basic.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/dropzone.min.css')}}">
@endpush
@push('scripts')
<script type="text/javascript" src='{{asset("js/dropzone.min.js")}}'></script>
<script type="text/javascript">
	Dropzone.options.dropzone1 = {
	  paramName: "answer", // The name that will be used to transfer the file
	  maxFilesize: 25, // MB
	  dictDefaultMessage: '<i class="fa fa-3x fa-upload"></i><br>Unggah Video Jawaban Anda',
	  acceptedFiles: 'video/*',
	  params: {
	  	'pvi_id': $('#dropzone_1').find('[name=pvi_id]').val(),
	  	'number': $('#dropzone_1').find('[name=number]').val()
	  },
	  headers: {
	  	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  },
	  success: function(data, response) {
	  	var button = $(this.element).parents('.question').find('button')
	  	button.prop('disabled', false)
	  }
	};
	Dropzone.options.dropzone2 = Dropzone.options.dropzone1
	Dropzone.options.dropzone3 = Dropzone.options.dropzone1
	Dropzone.options.dropzone4 = Dropzone.options.dropzone1
	Dropzone.options.dropzone5 = Dropzone.options.dropzone1
	Dropzone.options.dropzone2.params = {
		'pvi_id': $('#dropzone_2').find('[name=pvi_id]').val(),
	  	'number': $('#dropzone_2').find('[name=number]').val()
	}
	Dropzone.options.dropzone3.params = {
		'pvi_id': $('#dropzone_3').find('[name=pvi_id]').val(),
	  	'number': $('#dropzone_3').find('[name=number]').val()
	}
	Dropzone.options.dropzone4.params = {
		'pvi_id': $('#dropzone_4').find('[name=pvi_id]').val(),
	  	'number': $('#dropzone_4').find('[name=number]').val()
	}
	Dropzone.options.dropzone5.params = {
		'pvi_id': $('#dropzone_5').find('[name=pvi_id]').val(),
	  	'number': $('#dropzone_5').find('[name=number]').val()
	}
	$('.next').on('click', function(){
		var data = $(this).data('next');
		//$(this).parents('.step').hide();
		$('#' + (data-1)).hide();
		$('#' + data).show();
	});
</script>
@endpush