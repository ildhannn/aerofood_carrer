@extends('layouts.dashboard')

@section('breadcrumb')
	<a href="{{route('dashboard-jobs')}}">Lowongan</a>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;
	<a href="{{route('detail-job', $job->id)}}">{{$job->title}}</a>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;
	Kandidat: <b>{{$candidate->user->name}}</b>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;
	<b>Hasil PVI</b>
@stop

@section('content')
<div class="header-sub">
	<div class="va-table width-100" style="font-size: 1.5em;">
		<div class="va-middle width-50">
			<i class="fa fa-user-circle"></i>&nbsp;&nbsp;Kandidat: <b>{{$candidate->user->name}}</b>
			@if($candidate->pivot->progress == 1 && $candidate->pivot->status == 33)
				<span class="label label-danger"><i>Tidak lanjut ke tahap berikutnya</i></span>
			@elseif($candidate->pivot->progress > 1)
				<span class="label label-info">Lolos</span>
			@endif
		</div>
		<div class="va-middle width-50 ta-right"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;Hasil PVI</div>
	</div>
</div>
<div class="panel" style="border-top:none;">
	<!-- <h2>Hasil PVI - {{$candidate->user->name}} 
		@if($candidate->pivot->progress == 1 && $candidate->pivot->status == 33)
			<span class="label label-danger"><i>Tidak lanjut ke tahap berikutnya</i></span>
		@elseif($candidate->pivot->progress > 1)
			<span class="label label-info">Lolos</span>
		@endif</h2> -->
	<br>
	@foreach($job->pvis as $pvi)
	<div class="pvi-question">

		<div class="va-table width-100" style="font-size: 1.5em; margin-bottom: 1em;">
			<div class="va-middle" style="width:5%; background: #666; color: #fff; padding: 1em;">#{{$loop->iteration}}</div>
			<div class="va-middle" style="width:95%; background: #f2f2f2;">
				<div class="va-table width-100" style="font-size: 15px;border-bottom: 1px solid #ddd;">
					<div class="va-middle" style="width:6%; background: #999; color: #fff; padding: 1em;text-align: center;">Q</div>
					<div class="va-middle" style="width:94%; background: #f2f2f2; padding: 1em;">
						{{$pvi->question}}
					</div>
				</div>
				<div class="va-table width-100" style="font-size: 13px;">
					<div class="va-middle" style="width:6%; background: #999; color: #fff; padding: 1em;text-align: center;">A</div>
					<div class="va-middle" style="width:94%; background: #f2f2f2; padding: 1em;">
						@if($pvi->candidateAnswer($candidate->id))
							<a href="#" type="button" class='view btn btn-primary' data-toggle="modal" data-target="#myModal" data-question='{{$pvi->question}}' data-video='{{asset("upload/jobs/".md5($job->job_id."folder")."/".$pvi->candidateAnswer($candidate->id)->answer)}}'><i class="fa fa-eye"></i>&nbsp;Lihat Hasil</a>
						@else
							<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;<b>Belum mengunggah jawaban</b></span>
						@endif
					</div>
				</div>
			</div>
		</div>
		<!-- <h4>#{{$loop->iteration}}</h4>
		{{$pvi->question}}<br>
		@if($pvi->candidateAnswer($candidate->id))
			<a href="#" type="button" class='view' data-toggle="modal" data-target="#myModal" data-question='{{$pvi->question}}' data-video='{{asset("upload/jobs/".md5($job->job_id."folder")."/".$pvi->candidateAnswer($candidate->id)->answer)}}'><i class="fa fa-eye"></i>Lihat Hasil</a>
		@else
			<em><b>(Belum mengunggah jawaban)</b></em>	
		@endif -->
	</div>
	@endforeach
	@if($candidate->pivot->progress == 1 && $candidate->pivot->status == 0)

	<div class="va-table" style="text-align: center;margin: 0 auto;">
		<div class="va-middle">
			<form method='POST' action='{{route("fail")}}' style="margin-right: 10px;">
				{{csrf_field()}}
				<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
				<input type="hidden" name="job_id" value="{{$job->id}}">
				<input type="hidden" name="step_id" value="1">
				<button class='btn btn-danger'><i class="fa fa-close"></i>&nbsp;&nbsp;Gagal</button>
			</form>
		</div>
		<div class="va-middle">
			<form method='POST' action='{{route("pass")}}'>
				{{csrf_field()}}
				<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
				<input type="hidden" name="job_id" value="{{$job->id}}">
				<input type="hidden" name="step_id" value="1">
				<button class='btn btn-success'><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Lolos</button>
			</form>
		</div>
	</div>
	
	
	@endif
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>
@stop

@push('scripts')
<script type="text/javascript">
	$(function(){
		$('.view').on('click', function(){
			var video = '<video width="100%" height="auto" controls>'
			var source = "<source src='" + $(this).data('video') + "' />"
			var videoClose = '</video>'

			$('.modal-body').html(video + source + videoClose)
			$('.modal-header').append('<span class="question-modal">' + $(this).data('question') + '</span>')
		})
		$('.close').on('click', function(){
			$('.modal-body').html('')
			$('.modal-header').find('.question-modal').remove()
		})
	})
</script>
@endpush