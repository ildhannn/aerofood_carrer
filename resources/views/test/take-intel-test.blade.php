@extends('layouts.main')

@section('content')
<div id="online-test" class='test mar-t-0-m mar-t-3em'>
	<div class="containter-fluid">
		<?php 

			$candidate = Auth::user()->candidate;
			$testcomplete = $candidate->jobTestIntelAnswers($candidate->id, $job->id)->count() / 20;

			$next = $testcomplete + 1;
		 ?>
		 
		@if($testcomplete < 5)
		<div class="row welcome text-center step pad-1em-m mar-t-2em">
			<div class="col-sm-8 col-sm-offset-2">
				<h3 class="tt-upper">Selamat datang pada tahap Tes Inteligensi</h3>
				<br>
				<div class="label label-default mar-t-10px mar-b-10px">{{$testcomplete > 0 ? $testcomplete.' dari 5 test terjawab' : ''}}</div>
				<br><br>
				<div class="col-md-4 mar-b-1em-m">
                    <div class="va-table" style="border:1px solid #dcdcdc; padding:30px 20px;">
                        <div class="va-middle">
                            <div style="">
                                <div><img src="{{asset('img/tes.png')}}" height="150"></div><br><div>Pada Tahap ini Anda akan diberi <b>5 Tipe Tes</b></div>
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
					<div><button class='btn btn-success' onclick="start({{$next}}, {{$job->id}}, 0)" style="width:150px;"><span class="pull-left">LANJUTKAN</span><span class="pull-right"><i class="fa fa-sign-in"></i></span></button></div>
				</div>
				<!--<img src="{{asset('img/test.png')}}" width="300">
				<p>Pada Tahap ini Anda akan diberi <b>3 Tipe Tes</b>. Masing-masing tes berbentuk Pilihan Ganda. Anda akan diberi waktu untuk masing-masing Tes. Silahkan Kerjakan tes dengan melihat waktu yang ada. Untuk memulai silahkan klik tombol <b>Lanjut</b>.</p>
				<div class="row pull-right">
					<span>{{$testcomplete > 0 ? $testcomplete.' dari 3 test terjawab' : ''}}</span>
					<button class='btn green next' data-next='test-{{$next}}'>Lanjut</button>
				</div>-->
			</div>
		</div>
		<div id='test_container'>

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
	(function(){
		$(document).on('change', '[type=radio]', function(){
			var value = $(this).val()
			localStorage[$(this).attr('name')] = value
		})
	})()

var intervalScheduler;

function addTime(values) {
  for (var l in values) {
    var unit = l.substr(0,1).toUpperCase() + l.substr(1);
    this['set' + unit](this['get' + unit]() + values[l]);
  }
  return this;
}

function start(id, job_id, isSubmit){

	if(isSubmit && !confirm('Are you sure?')){
		return;
	}
	clearInterval(intervalScheduler);
	if(!localStorage['finished_time_intel']) {
		localStorage['finished_time_intel'] = 0;
	}

	if(!localStorage['continue']) {
		localStorage['continue'] === false
	}

	$('.btn').attr("disabled", "disabled");

	if(id > 1 && isSubmit){
		$('#form_intel [name=finished_time]').val(localStorage['finished_time_intel'])
		var inp = $("#form_intel").serialize();
		var url_submit = "{{url('/test/intel/submit')}}?"+inp;
		$.get(url_submit, function(data){
			if(data != 'success'){
				alert('submit gagal');
				return;
			} else if(data === 'success') {
				localStorage.clear()
			}
		});
	}
	
    var url = "{{url('/test/intel')}}?id="+id+"&job_id="+job_id;

    $.get(url,function(data){
        $("#test_container").empty();
        $("#test_container").append(data);
        $('.welcome').hide();
    });
}
Date.prototype.addTime = addTime;

function start_time() {
	var addMinutes = 0
	var addSeconds = 0
	if (localStorage['finished_time_intel']) {
		addMinutes = Math.ceil(localStorage['finished_time_intel'] / 60)
		addSeconds = localStorage['finished_time_intel'] % 60
	}

	var countDownDate = new Date().addTime({minutes: $('span.time').data('time') - addMinutes, seconds: addSeconds > 0 ? (60 - addSeconds) : addSeconds});
	
	// Update the count down every 1 second
	intervalScheduler = setInterval(function() {
		if (!localStorage['finished_time_intel']) {
			localStorage['finished_time_intel'] = 0
			localStorage['continue'] = false
		} else {
			localStorage['finished_time_intel'] = parseInt(localStorage['finished_time_intel']) + 1
			localStorage['continue'] = true
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

}

function checkAnswer(){
	Object.keys(localStorage).forEach(function(value){
		console.log('#rad_'+value+'_'+localStorage[value])

		$('#rad_'+value+'_'+localStorage[value].toLowerCase()).click()
	})
}

	
function start_test(){
	$('#intro-test').hide();
	$('#test').show();
	checkAnswer();
	start_time();
}

</script>
@endpush