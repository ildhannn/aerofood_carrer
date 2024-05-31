<div class="list-item tab-pane" role="tabpanel" id="step_1">
	<div class="visible-xs-block"><h2><i class="fa fa-video-camera"></i>&nbsp;PVI</h2></div>
	<ul class="nav nav-tabs sub-tab text-center" role='tab-list'>
	  <li role="presentation" class="active"><a href="#pvi-not-checked">Belum Diperiksa ({{$job->candidateProgressStatus('=', 1, 0)->count()}})</a></li>
	  <li role="presentation"><a href="#pass-pvi">Lolos ({{$job->candidateProgress('>', 1)->count()}})</a></li>
	  <li role="presentation"><a href="#fail-pvi">Gagal ({{$job->candidateProgressStatus('=', 1, 33)->count()}})</a></li>
	</ul>

	<div class="tab-content">
		<div class="list-item tab-pane active" role='tab-panel' id='pvi-not-checked'>
			<div class="item">
				<table id="table-pvi-not-checked" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
		                	<th class="all"></th>
		                    <th class="all">NAMA</th>
		                    <th class="min-tablet">HASIL PVI</th>
		                    <th class="min-tablet">AKSI</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgressStatus('=', 1, 0) as $candidate)
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
			                    <td width="68%"><div><a class='view-profile' onclick="showProfile('{{$candidate->candidate_id}}')" href='#{{$candidate->candidate_id}}' data-candidate='{{$candidate->candidate_id}}'>{{$candidate->user->name}}</a></div></td>
			                    <td width="15%" align="center"><div><a href="{{route('pvi-candidate', ['job_id'=>$job->job_id, 'candidate_id'=>$candidate->candidate_id])}}" data-toggle="tooltip" data-original-title="Lihat Hasil PVI"><i class="fa fa-external-link-square" style="font-size: 20px;"></i></a></div></td>
			                    <!-- <td width="45%"><div><a href="{{route('pvi-candidate', [$job->job_id, $candidate->candidate_id])}}">Lihat Hasil PVI</a></div></td> -->
				                <td width="15%">
				                	<div class="va-table width-100">
										<div class="va-middle width-50">
											<form method='POST' action='{{route("fail")}}'>
												{{csrf_field()}}
												<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
												<input type="hidden" name="job_id" value="{{$job->id}}">
												<input type="hidden" name="step_id" value="1">
												<button class='btn btn-danger width-100' style="margin-right: 5px;"><i class="fa fa-close"></i>&nbsp;Gagal</button>
											</form>
										</div>
										<div class="va-middle width-50">
											<form method='POST' action='{{route("pass")}}'>
												{{csrf_field()}}
												<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
												<input type="hidden" name="job_id" value="{{$job->id}}">
												<input type="hidden" name="step_id" value="1">
												<button class='btn btn-success width-100'><i class="fa fa-check"></i>&nbsp;Lolos</button>
											</form>
										</div>
									</div>
									<!-- 
													                	<div>
										<form method='POST' action='{{route("fail")}}'>
											{{csrf_field()}}
											<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
											<input type="hidden" name="job_id" value="{{$job->id}}">
											<input type="hidden" name="step_id" value="1">
											<button class='btn btn-danger'>Gagal</button>
										</form>
										<form method='POST' action='{{route("pass")}}'>
											{{csrf_field()}}
											<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
											<input type="hidden" name="job_id" value="{{$job->id}}">
											<input type="hidden" name="step_id" value="1">
											<button class='btn blue'>Lolos</button>
										</form>
									</div> -->
				                </td>
				            </tr>
			        	@endforeach
			        </tbody>
			    </table>
			</div>
		</div>

		<div class="list-item tab-pane" role='tab-panel' id='pass-pvi'>
			<div class="item">
				<table id="table-pvi-pass" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
		                	<th class="all"></th>
		                    <th class="all">NAMA</th>
		                    <th class="min-tablet">HASIL PVI</th>
		                    <th class="min-tablet">KETERANGAN</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgress('>', 1) as $candidate)
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
			                    <td width="80%"><div><a class='view-profile' onclick="showProfile('{{$candidate->candidate_id}}')" href='#{{$candidate->candidate_id}}' data-candidate='{{$candidate->candidate_id}}'>{{$candidate->user->name}}</a></div></td>
								<td width="13%" align="center">
								    <div>
								        <a href="{{route('pvi-candidate', ['job_id'=>$job->job_id, 'candidate_id'=>$candidate->candidate_id])}}" data-toggle="tooltip" data-original-title="Lihat Hasil PVI">
								            <i class="fa fa-external-link-square" style="font-size: 20px;"></i>
								        </a>
								    </div>
								</td>
			                    <!-- <td><div><a href="{{route('pvi-candidate', [$job->job_id, $candidate->candidate_id])}}">Lihat Hasil PVI</a></div></td> -->
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

		<div class="list-item tab-pane" role='tab-panel' id='fail-pvi'>
			<div class="item">
				<table id="table-pvi-fail" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
		                	<th class="all"></th>
		                    <th class="all">NAMA</th>
		                    <th class="min-tablet">HASIL PVI</th>
		                    <th class="min-tablet">KETERANGAN</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgressStatus('=', 1, 33) as $candidate)
			        	<tr>
				                <td width="2%" align="center">
									<div class="picture" style="height: auto !important;overflow: auto !important;float: none;border-radius: 0px;">
										@if($candidate->photo)
											<img src="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->photo : 'img/no-pic.jpg')}}" style="width: 30px !important;">
										@else
											<img src="{{ asset('img/no-pic.jpg') }}" style="width: 30px !important;">
										@endif
									</div>
				                </td>
			                    <td width="68%"><div><a class='view-profile' onclick="showProfile('{{$candidate->candidate_id}}')" href='#{{$candidate->candidate_id}}' data-candidate='{{$candidate->candidate_id}}'>{{$candidate->user->name}}</a></div></td>
			                    <td width="15%" align="center"><div><a href="{{route('pvi-candidate', ['job_id'=>$job->job_id, 'candidate_id'=>$candidate->candidate_id])}}" data-toggle="tooltip" data-original-title="Lihat Hasil PVI"><i class="fa fa-external-link-square" style="font-size: 20px;"></i></a></div></td>
			                    <!-- <td><div><a href="{{route('pvi-candidate', [$job->job_id, $candidate->candidate_id])}}">Lihat Hasil PVI</a></div></td> -->
				                <td width="15%" align="center">
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
        var tablejobs1 = $('#table-pvi-not-checked').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs1.buttons().container()
            .appendTo('#table-pvi-not-checked_wrapper .col-sm-6:eq(0)');

        var tablejobs2 = $('#table-pvi-pass').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs2.buttons().container()
            .appendTo('#table-pvi-pass_wrapper .col-sm-6:eq(0)');

        var tablejobs3 = $('#table-pvi-fail').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs3.buttons().container()
            .appendTo('#table-pvi-fail_wrapper .col-sm-6:eq(0)');
	})


	$('#table-pvi-not-checked tbody').on('click', 'td.details-control', function () {
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

	$('#table-pvi-pass tbody').on('click', 'td.details-control', function () {
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

	$('#table-pvi-fail tbody').on('click', 'td.details-control', function () {
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
