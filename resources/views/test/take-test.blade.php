@extends('layouts.main')

@section('content')
<div id="online-test" class='test mar-t-0-m mar-t-3em'>
	<div class="containter-fluid">
		<?php 

			$next = 1;
			$candidate = Auth::user()->candidate;
			$testcomplete = 0;

		 ?>
		 @if($candidate->jobTestAnswers($job->id, 1)->count() >= 60)
		 	<?php $testcomplete++ ?>
		 @endif
		 @if($candidate->jobTestAnswers($job->id, 2)->count() >= 48)
		 	<?php $testcomplete++ ?>
		 @endif
		 @if($candidate->jobTestAnswers($job->id, 3)->count() >= 90)
		 	<?php $testcomplete++ ?>
		 @endif
		<?php $totalquestion = [60,48,90] ?>
		@if($testcomplete != 3)
		<div class="row welcome text-center step pad-1em-m mar-t-2em">
			<div class="col-sm-8 col-sm-offset-2">
				<h3 class="tt-upper">Selamat datang pada tahap Tes Online</h3>
				<br>
				<div class="label label-default mar-t-10px mar-b-10px">{{$testcomplete > 0 ? $testcomplete.' dari 3 test terjawab' : ''}}</div>
				<br><br>
				<div class="col-md-4 mar-b-1em-m">
                    <div class="va-table" style="border:1px solid #dcdcdc; padding:30px 20px;">
                        <div class="va-middle">
                            <div style="">
                                <div><img src="{{asset('img/tes.png')}}" height="150"></div><br><div>Pada Tahap ini Anda akan diberi <b>3 Tipe Tes</b></div>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col-md-4 mar-b-1em-m">
				    <div class="va-table" style="border:1px solid #dcdcdc; padding:30px 20px;">
                        <div class="va-middle">
                            <div style="">
                                <div><img src="{{asset('img/ceklis.png')}}" height="150"></div><br><div>Masing-masing tes berbentuk <b>Pilihan Ganda</b></div>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col-md-4 mar-b-1em-m">
				    <div class="va-table" style="border:1px solid #dcdcdc; padding:30px 20px;">
                        <div class="va-middle">
                            <div style="">
                                <div><img src="{{asset('img/stopwatch.png')}}" height="150"></div><br><div>Anda akan diberi <b>waktu</b> untuk masing-masing tes</div>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col-md-12 mar-b-1em-m">
				    <br>
					<div class="label label-primary fs-14 display-block-m" style="font-weight:normal; background:#dcdcdc !important; color:#666; border:1px solid #999; white-space: normal; line-height: 20px;">Silahkan Kerjakan tes dengan melihat waktu yang ada. Untuk memulai silahkan klik tombol <b>Lanjutkan</b>.</div>
					<br><br>
					<div><button class='btn btn-success next' data-next='test-{{$next}}' style="width:150px;"><span class="pull-left">LANJUTKAN</span><span class="pull-right"><i class="fa fa-sign-in"></i></span></button></div>
				</div>
				<!--<img src="{{asset('img/test.png')}}" width="300">
				<p>Pada Tahap ini Anda akan diberi <b>3 Tipe Tes</b>. Masing-masing tes berbentuk Pilihan Ganda. Anda akan diberi waktu untuk masing-masing Tes. Silahkan Kerjakan tes dengan melihat waktu yang ada. Untuk memulai silahkan klik tombol <b>Lanjut</b>.</p>
				<div class="row pull-right">
					<span>{{$testcomplete > 0 ? $testcomplete.' dari 3 test terjawab' : ''}}</span>
					<button class='btn green next' data-next='test-{{$next}}'>Lanjut</button>
				</div>-->
			</div>
		</div>
		@foreach($tests as $test)
			<?php  $answercount = $candidate->jobTestAnswers($job->id, $test->id)->count(); ?>
			@if($answercount < $totalquestion[$loop->iteration -1])
			<!-- <div class="row test-desc" id='test-{{$next}}' style="display: none;"> -->
			<div class="row test-desc mar-t-0-m" id='test-{{$next}}' style='display: none'>
				<div class="col-sm-8 col-sm-offset-2">
					<div class="col-sm-6">
						<img src="{{asset('img/test.png')}}" width="300" class='pull-right'>
					</div>
					<div class="col-sm-6">
						<h3 class="ta-center-m mar-t-0-m">{{$test->name}}</h3>						
						<div class="ta-center-m">{!! $test->instruction !!}<br><br>Untuk memulai silahkan klik tombol <b>Mulai</b>.</div><br><br>
						<button class='btn pull-right btn-primary next start-test mar-b-2em-m' data-next='tool-{{$test->id}}'>Mulai&nbsp;&nbsp;<i class="fa fa-thumbs-up"></i></button>
					</div>	
				</div>
			</div>
			<?php $next++ ?>
			@endif
		@endforeach		
		<!-- <div class="row test-container" id='test' style='display: none'> -->
		<div class="row test-container" id='test' style='display: none'>
		    <div class="va-table">
		        <div class="va-middle">
		            
		        </div>
		        <div class="va-middle">
		            
		        </div>
		    </div>
			<div class="col-sm-3 summary-test">
				@foreach($tests as $test)
				@if($test->id == $testcomplete + 1)
				<div class="time text-center">
					<h2><small>Waktu Tersisa</small><br><span class='time' data-time="{{$test->time}}">{{$test->time.':00'}}</span></h2>
					<span class="warning">Penambahan waktu akan mempengaruhi penilaian</span>
				</div>
				@endif
				<div class="question-nav">
					@if($test->id == $testcomplete + 1	)
					<div class="info row">
					    <div class="col-md-6"><div class="item">&nbsp;</div> : Belum terjawab</div>
					    <div class="col-md-6"><div class="item answered">&nbsp;</div> : Terjawab</div>
					</div>
					<br>
					<div class="info">
					</div>
					@endif
					<?php $i = 1 ?>
					<?php $q = 1 ?>
						<h3 class="mar-t-0">{{$test->name}}</h3>
						<span data-time='{{$test->time}}'></span>
						@if($test->id - $testcomplete == 1)
							@foreach($test->questionShuffled($test->id, Auth::user()->email) as $question)
								@if($test->id == 2)
									@if($i == 1)
										<?php $i++ ?>
										<div class="item item-disc" data-question='{{$q}}'>{{$q}}</div>
									@elseif($i == 4)
										<?php $i = 1 ?>
										<?php $q++ ?>
									@else
										<?php $i++ ?>
									@endif
								@else
									<div class="item" data-question='question_{{$question->id}}'>{{$loop->iteration}}</div>
								@endif
							@endforeach
						@elseif($test->id - $testcomplete <= 0)
						<span class='label label-info'>Jawaban Sudah Tersubmit</span>
						@else
							<span class='label label-default'>Belum melaksanakan</span>
						@endif
				</div>
				@endforeach
			</div>
			<div class="col-sm-9 questions">
					@if($tests->get(0)->id - $testcomplete == 1)
					<div class="tool" id='tool-1'>
						<form method="POST" action="{{route('submit-test-answer', $job->job_id)}}">
						{{csrf_field()}}
						<input type="hidden" name="test_id" value="{{$tests->get(0)->id}}">
						</form>
                            <div class="va-table mar-0-auto">
                                <div class="va-middle">
							        <h3 class="ta-center-m">Pilih yang paling menggambarkan diri Anda</h3>
                                </div>
                            </div>
							@foreach($tests->get(0)->questionShuffled(1, Auth::user()->email) as $question)
							<div class="step question pad-0-m mar-t-3em-m" id='{{$loop->iteration}}' style='display: {{$loop->iteration != 1 ? "none" : "block"}}; width:100%;'>
								<div class="va-table mar-0-auto">
								    <div class="va-middle" style="background:#000;color:#fff;width:auto;padding:5px 10px;display:block;font-size:18px;">Soal {{$loop->iteration}}</div>
								</div>
								<?php $label = 'a';?>
								<div class="va-table width-100">
								@foreach($question->choices as $choice)
								<div class="va-middle width-50 display-block-m width-100-m height-100 height-auto-m">
                                    <div class="radio foscheck mar-t-0 mar-b-0 display-block-m">								    
                                        <!--<input type="radio" name='question_{{$question->id}}' value="{{$choice->id}}"> {{$choice->choice}}-->
                                        <input type="radio" id="rad_{{$question->id . $label}}" name='question_{{$question->id}}' value="{{$choice->id}}" class="foscheck sr-only">
                                        <label for="rad_{{$question->id . $label}}" class="foscheck control-label width-100-m"><div class="va-middle">{{$choice->choice}}</div></label>
                                    </div>
								</div>
								<?php if($label == 'a') {$label = 'b';} else {$label = 'a';} ?>
								@endforeach
                                </div>
								<div class="navigation">
									<!--@if(!$loop->first)
									<div class="pull-left">
										<button class="btn back" data-back="{{$question->id - 1}}">&lt; Kembali</button>
									</div>
									@endif-->
									<div class="va-table mar-0-auto">
										@if($loop->last)
										<div class="va-middle">
										<button class="btn btn-success next finished disabled mar-t-0" data-next="tool-2">Submit&nbsp;&nbsp;<i class="fa fa-check-circle"></i></button>
                                        </div>
										@else
										<div class="va-middle">
										<button class="btn blue next disabled mar-t-0" data-next="{{$loop->iteration + 1}}">SOAL SELANJUTNYA&nbsp;<i class="fa fa-chevron-right"></i></button>
										</div>
										@endif
									</div>
								</div>
							</div>
						@endforeach
					</div>
					@endif
					
					@if($tests->get(1)->id - $testcomplete == 1)
					<div class="tool" id='tool-2'>
						<form method="POST" action="{{route('submit-test-answer', $job->job_id)}}">
							{{csrf_field()}}
							<input type="hidden" name="test_id" value="{{$tests->get(1)->id}}">
						</form>

						<h3>Pilih yang paling menggambarkan diri Anda <br><small>Pilih gambaran diri <b>mirip</b> dengan Anda maka pilih pada kolom <b>M</b>, jika <b>tidak mirip</b> maka pilih pada kolom <b>TM</b></small></h3>
						<?php $i = 1 ?>
						<?php $q = 1 ?>

						@foreach($tests->get(1)->questionShuffled(2, Auth::user()->email) as $question)

							@if($i == 1)
							<div class="step question pad-0-m mar-t-3em-m fs-15-m " id='{{$q}}' style='display: {{$loop->iteration != 1 ? "none" : "block"}}'>
								<h3>Soal {{$q}}</h3>
								<div class="box-answer">
									<div class="header pad-t-1em-m pad-b-1em-m" style="background: #ccc;">
										<span class='most text-center'><b>M</b></span>
										<span class='less'><b>TM</b></span>
										<span class='character'><b>Gambaran Diri</b></span>
									</div>
									<div class="choice">
							@endif
									@foreach($question->choices as $choice)
										<div class="container-radio radio {{$loop->iteration % 2 == 1 ? 'text-center radio-kiri' : 'radio-kanan'}}">
											<!-- <input data-question="{{$q}}" type="radio" name='question_{{$question->id}}' value="{{$choice->id}}"> 
											<label for="question_{{$question->id}}">{!! $loop->iteration % 2 == 0 ? '<span class="choice-content">'.$choice->choice.'</span>' : '' !!}</label>
											<div class="radio-custom"><div class="inside"></div></div> -->
											<label>
											<input data-question="{{$q}}" type="radio" name='question_{{$question->id}}' value="{{$choice->id}}">{!! $loop->iteration % 2 == 0 ? '<span class="choice-content mar-l-15-m fs-16-m">'.$choice->choice.'</span>' : '' !!}
											<div class="radio-custom"><div class="inside"></div></div>
											</label>
										</div>
									@endforeach
							@if($i == 4)
									</div>
								</div>

								<div class="navigation" style="margin-top:1em;">
									<div class="pull-left">
										<div class="mar-b-2em-m">
											@if($loop->last)
											<button class="btn blue next finished disabled mar-t-0" data-next="tool-2" style="width:150px; text-align: center;margin-top: 0px;">Submit</button>
											@else
											<button class="btn blue next disabled mar-t-0" data-next="{{$q + 1}}" style="width:150px; text-align: center;">Lanjut&nbsp;<i class="fa fa-chevron-right"></i></button>
											@endif
										</div>
										<!-- <div>
											@if(!$loop->first)
											<button class="btn" style="width:150px; text-align: center;margin-top: 1em;"><i class="fa fa-chevron-left"></i>&nbsp;Kembali</button>
											@endif
										</div> -->
									</div>
									<div class="pull-right">
										
									</div>
								</div>
							</div>
								<?php $i = 1 ?>
								<?php $q++ ?>
							@else
								<?php $i++ ?>
							@endif
						@endforeach
					</div>
					@endif

					@if($tests->get(2)->id - $testcomplete == 1)
					<div class="tool" id='tool-3'>
						<form method="POST" action="{{route('submit-test-answer', $job->job_id)}}">
						{{csrf_field()}}
						<input type="hidden" name="test_id" value="{{$tests->get(2)->id}}">
						</form>                            
                            <div class="va-table mar-0-auto">
                                <div class="va-middle">
							        <h3 class="ta-center-m">Pilih yang paling menggambarkan diri Anda</h3>
                                </div>
                            </div>
                            
							@foreach($tests->get(2)->questionShuffled(3, Auth::user()->email) as $question)
							<div class="step question pad-0-m mar-t-3em-m" id='{{$loop->iteration}}' style='display: {{$loop->iteration != 1 ? "none" : "block"}}; width:100%;'>
								<div class="va-table mar-0-auto">
								    <div class="va-middle" style="background:#000;color:#fff;width:auto;padding:5px 10px;display:block;font-size:18px;">Soal {{$loop->iteration}}</div>
								</div>
								
								<?php $label = 'aaa';?>
								<div class="va-table width-100">
								@foreach($question->choices as $choice)
								<div class="va-middle width-50 display-block-m width-100-m height-100 height-auto-m">
                                    <div class="radio foscheck mar-t-0 mar-b-0">								    
                                        <!--<input type="radio" name='question_{{$question->id}}' value="{{$choice->id}}"> {{$choice->choice}}-->
                                        <input type="radio" id="rad_{{$question->id . $label}}" name='question_{{$question->id}}' value="{{$choice->id}}" class="foscheck sr-only">
                                        <label for="rad_{{$question->id . $label}}" class="foscheck control-label"><div class="va-middle">{{$choice->choice}}</div></label>
                                    </div>
								</div>
								<?php if($label == 'aaa') {$label = 'bbb';} else {$label = 'aaa';} ?>
								@endforeach
                                </div>
                                
                                <div class="navigation">
									<div class="va-table mar-0-auto">
										@if($loop->last)
										<div class="va-middle">
										<button class="btn btn-success next finished disabled mar-t-0">Submit&nbsp;&nbsp;<i class="fa fa-check-circle"></i></button>
                                        </div>
										@else
										<div class="va-middle">
										<button class="btn blue next disabled mar-t-0" data-next="{{$loop->iteration + 1}}">SOAL SELANJUTNYA&nbsp;<i class="fa fa-chevron-right"></i></button>
										</div>
										@endif
									</div>
								</div>
							</div>
						@endforeach
					</div>
					@endif
			</div>
		</div>
		@else
		<div class="row welcome text-center step">
			<div class="col-sm-8 col-sm-offset-2">
				<h3 class="tt-upper">Anda telah menyelesaikan Tes Online</h3>
				<div class="mar-t-2em mar-b-2em"><i class="fa fa-check-circle color-green" style="font-size:200px;"></i></div>
				<div class="text-center">
					<a href='{{route("candidate-job")}}' class='btn green'><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali ke beranda</a>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>
@stop

@push('scripts')
<script type="text/javascript">
$(function(){
	for (var key in localStorage) {
		var id = key.split('question_')[1]
		if (id > 60 && id <= 156) {
			$('#tool-2').show()
			$(':radio[value="' + localStorage["question_" + id] + '"]').prop('checked', true)
			$(':radio[value="' + localStorage["question_" + id] + '"]').parents('.step').find('.next').removeClass('disabled')
			let question = $(':radio[value="' + localStorage["question_" + id] + '"]:checked').data('question')
			$('.item-disc[data-question=' + question +']').addClass('answered')
		} else {
			$(':radio[value="' + localStorage["question_" + id] + '"]').prop('checked', true)
			$(':radio[value="' + localStorage["question_" + id] + '"]').parents('.step').find('.next').removeClass('disabled')
			$('.item[data-question=question_' + id +']').addClass('answered')
		}
	}

		if (localStorage['finished_time']) {
			if (localStorage.length === 1) {
				localStorage.clear()
			}
			
		}
	$('.welcome .next').on('click', function(){
		var next = $(this).data('next')
		$(this).parents('.welcome').hide()
		$('#' + next).show()
		if($('.item.answered').length > 1){
			$('.item.answered')[$('.item.answered').length - 1].click()
		}
	})

	$('.test-desc .next').on('click', function(){
		var next = $(this).data('next')
		$(this).parents('.test-desc').hide()
		$('#test').show()
		$('#' + next).show()
		$('#' + next + ' .question').first().show()
		if($('.item.answered').length > 1){
			$('.item.answered')[$('.item.answered').length - 1].click()
		}
	})
	$('.back').on('click', function(){
			var data = $(this).data('back')
			$(this).parents('.step').hide()
			$('#' + data).show()
			$(this).parents('.step').find('[name=question_' + (data - 1) + ']').val()
	})
	$('#tool-1 .next, #tool-3 .next').on('click', function(){
		if(!$(this).hasClass('disabled')){
			var data = $(this).data('next')
			$(this).parents('.step').hide()
			$('#' + data).show()
			$(this).parents('.step').find('[name=question_' + (data - 1) + ']').val()
		}
	})
	$('#tool-1 input[type=radio], #tool-3 input[type=radio]').on('change', function(){
		$(this).parents('.step').find('.next').removeClass('disabled')
		var question = $(this).attr('name')
		$('.item[data-question=' + question + ']').addClass('answered')
		localStorage.setItem(question, $(this).val())
	})
	$('.finished').on('click', function(){
		for (var key in localStorage) {
			if(key.split('question_')[1] !== undefined){
				var id = key.split('question_')[1]
				var input = '<input type="hidden" name="question_' + id + '" value="'+ localStorage["question_" + id] +'">'
				$(this).parents('.tool').find('form').append(input)	
				$(this).parents('.tool').hide()
			}
		}
		var finishedTime = '<input type="hidden" name="finished_time" value="'+ localStorage["finished_time"] + '">'
		$(this).parents('.tool').find('form').append(finishedTime)
		localStorage.clear()	
		$(this).parents('.tool').find('form').submit()
		
	})
	$(document).on('click', '.item.answered',function(){
		$('.step').hide()
		$('.tool').hide()
		$('[name=' + $(this).data('question') + ']').parents('.step').show()
		$('[name=' + $(this).data('question') + ']').parents('.tool').show()
	})

	$(document).on('click', '.item-disc.answered',function(){
		$('.step').hide()
		$('.tool').hide()
		$('#tool-2').show()
		$('#' + $(this).data('question') + '.step').show()
	})	
	$('#tool-2 .next').on('click', function(){
		if(!$(this).hasClass('disabled')){
			var data = $(this).data('next')
			$(this).parents('.step').hide()
			$('.step#' + data).show()
			$(this).parents('.step').find('[name=question_' + (data - 1) + ']').val()
		}
	})
	$('#tool-2 input').on('change', function(){
		var questionMax = $('#' + $(this).data('question')).find('input').last().val()
		if($(this).parents('.radio').index() % 2 == 0) {
			$(this).parents('.box-answer').find('.radio:nth-child(odd) input').prop('checked', false)
		} else {
			$(this).parents('.box-answer').find('.radio:nth-child(even) input').prop('checked', false)
		}

		$(this).prop('checked', true)
		for (var key in localStorage) {
			if(key.split('_')[0] === 'question') {
				localStorage.removeItem(key)
			}
		}
		$('input[type=radio]:checked').each(function(index, value){
			localStorage[$(value).attr('name')] = $(value).val()
		})

		localStorage[$(this).attr('name')] = $(this).val()
		if( $(this).parents('.box-answer').find('.radio:nth-child(odd) input:checked').length == 1 
			&& $(this).parents('.box-answer').find('.radio:nth-child(even) input:checked').length == 1){
			$('.item-disc[data-question=' + $(this).data('question') + ']').addClass('answered')
			$(this).parents('.question').find('button.disabled').removeClass('disabled')
		} else {
			$(this).parents('.question').find('button').addClass('disabled')
			$('.item-disc[data-question=' + $(this).data('question') + ']').removeClass('answered')
		}
	})

	Date.prototype.addTime = addTime;


	$('.start-test').on('click', function() {
		var addMinutes = 0
		var addSeconds = 0
		if (localStorage['finished_time']) {
			addMinutes = Math.ceil(localStorage['finished_time'] / 60)
			addSeconds = localStorage['finished_time'] % 60
		}

		var countDownDate = new Date().addTime({minutes: $('span.time').data('time') - addMinutes, seconds: addSeconds > 0 ? (60 - addSeconds) : addSeconds});

		// Update the count down every 1 second
		var x = setInterval(function() {
			if (!localStorage['finished_time']) {
				localStorage['finished_time'] = 0
			} else {
				localStorage['finished_time'] = parseInt(localStorage['finished_time']) + 1
			}

			// Get todays date and time
			var now = new Date().getTime();

			// Find the distance between now an the count down date
			var distance = countDownDate - now;

			// Time calculations for minutes and seconds
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			minutes.toString().length == 1 ? minutes = '0' + minutes : minutes
			seconds.toString().length == 1 ? seconds = '0' + seconds : seconds

			if(minutes <= 2)  {
				if (!$('span.time').parents('.time').hasClass('few')) {
					$('span.time').parents('.time').addClass('few')
				}
			}

			// Display the result in the element with id="demo"
			$('span.time').html(minutes + ":" + seconds);

			// If the count down is finished, write some text 
			if (distance < 0) {
				if (!$('span.time').parents('.time').hasClass('minus')) {
					$('span.time').parents('.time').addClass('minus')
				}

				minutes = parseInt(minutes.toString().split('-')[1]) - 1
				minutes.toString().length == 1 ? minutes = '0' + minutes : minutes

				seconds = seconds.toString().split('-')[1]
				seconds.length == 1 ? seconds = '0' + seconds : seconds
				$('span.time').html('-' + minutes + ':' + seconds)
			}
		}, 1000);

	})
})

function addTime(values) {
  for (var l in values) {
    var unit = l.substr(0,1).toUpperCase() + l.substr(1);
    this['set' + unit](this['get' + unit]() + values[l]);
  }
  return this;
}
</script>
@endpush