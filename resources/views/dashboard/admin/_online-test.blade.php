<div class="list-item tab-pane" role="tabpanel" id="step_2">
	<div class="visible-xs-block"><h2><i class="fa fa-globe"></i>&nbsp;TES ONLINE</h2></div>
	<ul class="nav nav-tabs sub-tab text-center" role='tab-list'>
	  <li role="presentation" class="active"><a href="#test-not-checked">Belum Diperiksa ({{$job->candidateProgressStatus('=', 2, 0)->count()}})</a></li>
	  <li role="presentation"><a href="#test-pass">Lolos ({{$job->candidateProgress('>', 2)->count()}})</a></li>
	  <li role="presentation"><a href="#test-fail">Gagal ({{$job->candidateProgressStatus('=', 2, 33)->count()}})</a></li>
	</ul>

	<div class="tab-content">

		<div class="list-item tab-pane active" role='tab-panel' id='test-not-checked'>
			<div class="item">
				<table id="table-test-not-checked" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
		                	<th class="all"></th>
		                    <th class="all">NAMA</th>
		                    <th class="min-tablet">PROGRESS</th>
		                    <th class="min-tablet">HASIL TEST</th>
		                    <th class="min-tablet">AKSI</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgressStatus('=', 2, 0) as $candidate)
				        	<tr>
				                <td align="center" width="2%">
									<div class="picture" style="height: auto !important;overflow: auto !important;float: none;border-radius: 0px;">
										@if($candidate->photo)
											<img src="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->photo : 'img/no-pic.jpg')}}" style="width: 30px !important;">
										@else
											<img src="{{ asset('img/no-pic.jpg') }}" style="width: 30px !important;">
										@endif
									</div>
				                </td>
			                    <td width="45%"><div><a class='view-profile' onclick="showProfile('{{$candidate->candidate_id}}')" href='#{{$candidate->candidate_id}}' data-candidate='{{$candidate->candidate_id}}'>{{$candidate->user->name}}</a></div></td>
			                    <!-- <td><div><a href="{{route('test-candidate', [$job->job_id, $candidate->candidate_id])}}">Lihat Hasil Test</a></div></td> -->
			                    <td width="28%" align="center">
			                    		<?php
			                    			$test_done = 0;
			                    			if($candidate->jobTestAnswers($job->id, 1)->count() == 60){
			                    				$test_done = 1;
			                    			} if($candidate->jobTestAnswers($job->id, 2)->count() == 48){
			                    				$test_done = 2;
			                    			} if($candidate->jobTestAnswers($job->id, 3)->count() == 90){
			                    				$test_done = 3;
			                    			}

			                    			$intel_done = $candidate->jobTestIntelAnswers($candidate->id, $job->id)->count() / 20;
			                    		?>
			                    		<div><span>{{$test_done}}/3 <?php if($job->has_intelligence_test) echo '| '.$intel_done.'/5'?></span></div>
			                    </td>
			                    <td width="20%" align="center">
			                    	<div>
			                    		<a href="{{route('test-candidate', [$job->job_id, $candidate->candidate_id])}}" data-toggle="tooltip" data-original-title="Lihat Hasil Test"><i class="fa fa-external-link-square" style="font-size: 20px;"></i></a>
			                    	</div>
			                    </td>
				                <td width="5%" align="center">
				                	<div>
				                		<div class="va-table width-100">
											<div class="va-middle width-50">
												<form method='POST' action='{{route("fail")}}'>
													{{csrf_field()}}
													<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
													<input type="hidden" name="job_id" value="{{$job->id}}">
													<input type="hidden" name="step_id" value="2">
													<button class='btn btn-danger width-100' style="margin-right: 5px;"><i class="fa fa-close"></i>&nbsp;Gagal</button>
												</form>
											</div>
											<div class="va-middle width-50">
												<form method='POST' action='{{route("pass")}}'>
													{{csrf_field()}}
													<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
													<input type="hidden" name="job_id" value="{{$job->id}}">
													<input type="hidden" name="step_id" value="2">
													<button class='btn btn-success width-100'><i class="fa fa-check"></i>&nbsp;Lolos</button>
												</form>
											</div>
										</div>
										
										
									</div>
				                </td>
				            </tr>
			        	@endforeach
			        </tbody>
			    </table>
			</div>
		</div>

		<div class="list-item tab-pane" role='tab-panel' id='test-pass'>
			<div class="item">
				<table id="table-test-pass" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
		                	<th class="all"></th>
		                    <th class="all">NAMA</th>
		                    <th class="min-tablet">HASIL TEST</th>
		                    <th class="min-tablet">KETERANGAN</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgress('>', 2) as $candidate)
				        	<tr>
				                <td align="center" width="2%">
									<div class="picture" style="height: auto !important;overflow: auto !important;float: none;border-radius: 0px;">
										@if($candidate->photo)
											<img src="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->photo : 'img/no-pic.jpg')}}" style="width: 30px !important;">
										@else
											<img src="{{ asset('img/no-pic.jpg') }}" style="width: 30px !important;">
										@endif
									</div>
				                </td>
			                    <td width="60%"><div><a class='view-profile' onclick="showProfile('{{$candidate->candidate_id}}')" href='#{{$candidate->candidate_id}}' data-candidate='{{$candidate->candidate_id}}'>{{$candidate->user->name}}</a></div></td>
			                    <!-- <td><div><a href="{{route('test-candidate', [$job->job_id, $candidate->candidate_id])}}">Lihat Hasil Test</a></div></td> -->
			                    <td width="33%" align="center"><div><a href="{{route('test-candidate', [$job->job_id, $candidate->candidate_id])}}" data-toggle="tooltip" data-original-title="Lihat Hasil Test"><i class="fa fa-external-link-square" style="font-size: 20px;"></i></a></div></td>
				                <td width="5%" align="center">
				                	<div>
										<span class="label label-info">Lolos</span>
									</div>
				                </td>
				            </tr>
			        	@endforeach
			        </tbody>
			    </table>
			</div>
		</div>


		<div class="list-item tab-pane" role='tab-panel' id='test-fail'>
			<div class="item">
				<table id="table-test-fail" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
		                	<th class="all"></th>
		                    <th class="all">NAMA</th>
		                    <th class="min-tablet">HASIL TEST</th>
		                    <th class="min-tablet">KETERANGAN</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgressStatus('=', 2, 33) as $candidate)
				        	<tr>
				        		<td width="2%" align="center">
				                <div class="picture" style="height: auto !important;overflow: auto !important;float: none;border-radius: 0px;">
										@if($candidate->photo)
											<img src="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->photo : 'img/no-pic.jpg')}}" style="width: 30px !important;">
										@else
											<img src="{{ asset('img/no-pic.jpg') }}" style="width: 30px !important;">
										@endif
									</div>
			                    <td width="60%"><div><a class='view-profile' onclick="showProfile('{{$candidate->candidate_id}}')" href='#{{$candidate->candidate_id}}' data-candidate='{{$candidate->candidate_id}}'>{{$candidate->user->name}}</a></div></td>
			                    <!-- <td><div><a href="{{route('test-candidate', [$job->job_id, $candidate->candidate_id])}}">Lihat Hasil Test</a></div></td> -->
			                    <td width="33%" align="center"><div><a href="{{route('test-candidate', [$job->job_id, $candidate->candidate_id])}}" data-toggle="tooltip" data-original-title="Lihat Hasil Test"><i class="fa fa-external-link-square" style="font-size: 20px;"></i></a></div></td>
				                <td width="5%" align="center">
				                	<div>
										<span class="label label-danger">Gagal</span>
									</div>
				                </td>
				            </tr>
			        	@endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
        var tablejobs1 = $('#table-test-not-checked').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs1.buttons().container()
            .appendTo('#table-test-not-checked_wrapper .col-sm-6:eq(0)');

        var tablejobs2 = $('#table-test-pass').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs2.buttons().container()
            .appendTo('#table-test-pass_wrapper .col-sm-6:eq(0)');

        var tablejobs3 = $('#table-test-fail').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs3.buttons().container()
            .appendTo('#table-test-fail_wrapper .col-sm-6:eq(0)');
	})	

	$('#table-test-not-checked tbody').on('click', 'td.details-control', function () {
	    var tr = $(this).closest('tr');
	    var row = table.row( tr );
	 
	    if ( row.child.isShown() ) {
	        // This row is already open - close it
	        row.child.hide(500);
	        tr.removeClass('shown');
	    }
	    else {
	        // Open this row
	        row.child( format(row.data()) ).show(500);
	        tr.addClass('shown');
	    }
	} );

	$('#table-test-pass tbody').on('click', 'td.details-control', function () {
	    var tr = $(this).closest('tr');
	    var row = table.row( tr );
	 
	    if ( row.child.isShown() ) {
	        // This row is already open - close it
	        row.child.hide(500);
	        tr.removeClass('shown');
	    }
	    else {
	        // Open this row
	        row.child( format(row.data()) ).show(500);
	        tr.addClass('shown');
	    }
	} );

	$('#table-test-fail tbody').on('click', 'td.details-control', function () {
	    var tr = $(this).closest('tr');
	    var row = table.row( tr );
	 
	    if ( row.child.isShown() ) {
	        // This row is already open - close it
	        row.child.hide(500);
	        tr.removeClass('shown');
	    }
	    else {
	        // Open this row
	        row.child( format(row.data()) ).show(500);
	        tr.addClass('shown');
	    }
	} );
</script>
