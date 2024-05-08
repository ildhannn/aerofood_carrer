<div class="list-title">
	<ul class="nav nav-tabs nav-tabs-colored text-center" role='tab-list' id='tabs'>
	  <li role="presentation" class="active"><a href="#candidate-list" data-toggle="tooltip" title="Kandidat"><span class="visible-inline-xs-block"><i class="fa fa-user-circle"></i>&nbsp;&nbsp;</span><span class="hidden-xs">Kandidat&nbsp;</span>(<span class="text-primary"><b>{{$job->candidates->count()}}</b></span>)</a></li>
	  <li role="presentation"><a href="#matched" data-toggle="tooltip" title="Matched"><span class="visible-inline-xs-block"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;</span><span class="hidden-xs">Matched&nbsp;</span>(<span class="text-primary"><b>{{$job->candidateProgressStatus('=', 0, 1)->count() + $job->candidateProgressStatus('=', 0, 33)->count()}}</b></span>)</a><!-- <a href="#matched">Matched ({{$job->candidateProgressStatus('=', 0, 1)->count() + $job->candidateProgressStatus('=', 0, 33)->count()}})</a> --></li>
	  <li role="presentation"><a href="#shortlisted" data-toggle="tooltip" title="Shortlisted"><span class="visible-inline-xs-block"><i class="fa fa-server"></i>&nbsp;&nbsp;</span><span class="hidden-xs">Shortlisted&nbsp;</span>(<span class="text-primary"><b>{{$job->candidateProgressStatus('=', 0, 2)->count() + $job->candidateProgressStatus('=', 0, 44)->count()}}</b></span>)</a><!-- <a href="#shortlisted">Shortlisted ({{$job->candidateProgressStatus('=', 0, 2)->count() + $job->candidateProgressStatus('=', 0, 44)->count()}})</a> --></li>
	  <?php $interview = 0; ?>
	  @foreach($job->steps as $key => $step)
		 @if($step->id <= 2 || $step->id > 7)
			  <li role="presentation">
			  	<a href="#step_{{$step->id}}">
						@if($step->id == 1)
							<span class="visible-inline-xs-block"><i class="fa fa-video-camera"></i>&nbsp;</span><span class="hidden-xs">PVI&nbsp;</span>
						@elseif($step->id == 8)
							<span class="visible-inline-xs-block"><i class="fa fa-medkit"></i>&nbsp;</span><span class="hidden-xs">MCU&nbsp;</span>
						@else
							<!-- {{$step->name}} -->
				          @if($step->id == 2)
				            <span class="visible-inline-xs-block"><i class="fa fa-globe"></i>&nbsp;</span><span class="hidden-xs">{{$step->name}}</span>
				          @elseif($step->id == 9)
				            <span class="visible-inline-xs-block"><i class="fa fa-folder-open"></i>&nbsp;</span><span class="hidden-xs">{{$step->name}}</span>
				          @elseif($step->id == 10)
				            <span class="visible-inline-xs-block"><i class="fa fa-thumbs-up"></i>&nbsp;</span><span class="hidden-xs">{{$step->name}}</span>
				          @endif
						@endif
						(<span class="text-primary"><b>{{$job->candidateProgress('=', $step->id)->count()}}</b></span>)
				</a>
			</li>
		@else
			<?php $interview += $job->candidateProgress('=', $step->id)->count() ?>
			@if($job->steps[$key+1]->id > 7)
	  		<li role="presentation"><a href="#interview" data-toggle="tooltip" title="Interview"><span class="visible-inline-xs-block"><i class="fa fa-exchange"></i>&nbsp;</span><span class="hidden-xs">Interview&nbsp;</span>(<span class="text-primary"><b>{{$interview}}</b></span>)</a></li>
			@endif
		@endif
	  @endforeach
	</ul>
</div>
<div class="tab-content list-content">
	@include('dashboard.admin._job-candidate')
	@include('dashboard.admin._matched')
	@include('dashboard.admin._shortlisted')
	@include('dashboard.admin._pvi')
	@include('dashboard.admin._online-test')
	@include('dashboard.admin._interview')
	@include('dashboard.admin._mcu')
	@include('dashboard.admin._offering')
	@include('dashboard.admin._hired')
</div>