<div class="list-item tab-pane" role="tabpanel" id="step_8">
	<div class="visible-xs-block"><h2><i class="fa fa-medkit"></i>&nbsp;MCU</h2></div>
	<ul class="nav nav-tabs sub-tab text-center" role='tab-list'>
	  <li role="presentation" class="active"><a href="#mcu-not-checked">Belum Diperiksa ({{$job->candidateProgressStatus('=', 8, 0)->count()}})</a></li>
	  <li role="presentation"><a href="#mcu-pass">Lolos ({{$job->candidateProgress('>', 8)->count()}})</a></li>
	  <li role="presentation"><a href="#mcu-fail">Gagal ({{$job->candidateProgressStatus('=', 8, 33)->count()}})</a></li>
	  <li class="pull-right">
	  	<!--
	  	<form action='{{route("sent-mcu-letter")}}' method="post">
	  		{{csrf_field()}}
	  		<input type="hidden" name="job_id" value='{{$job->id}}'>
	  		<button class='btn blue' style='margin-right: 20px;'>Kirim Surat Pengantar</button>
	  	</form>
	  	-->
	  </li>
	</ul>

	<div class="tab-content">

		<div class="list-item tab-pane active" role='tab-panel' id='mcu-not-checked'>
			<div class="item">
				<table id="table-mcu-not-checked" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
		                	<th class="all"></th>
		                    <th class="all">NAMA</th>
		                    <th class="min-tablet">HASIL MCU</th>
		                    <th class="min-tablet">AKSI</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgressStatus('=', 8, 0) as $candidate)
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
			                    	@if($candidate->mcu($job->id))
			                    	<div class="va-table">
										<div class="va-middle">
											<div style="margin-right: 5px;"><a href="{{asset('upload/candidates/'.md5($candidate->candidate_id.'folder')).'/'.$candidate->mcu($job->id)->mcu}}" data-toggle="tooltip" data-original-title="Lihat Hasil MCU" target="_blank" class="btn btn-primary" style="width:auto;"><i class="fa fa fa-eye" style="font-size: 14px;"></i></a></div>
										</div>
										<div class="va-middle">
											<div><a href="#upload" class='upload btn btn-warning' data-toggle="tooltip" data-original-title="Ubah Hasil MCU" data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}' style="width:auto;"><i class="fa fa fa-pencil" style="font-size: 14px;"></i></a></div>
										</div>
									</div>
									<!-- <div class="">
										<a href="{{asset('upload/candidates/'.md5($candidate->candidate_id.'folder')).'/'.$candidate->mcu($job->id)->mcu}}" target="_blank"><i class="fa fa-eye"></i>Lihat Hasil MCU</a>
									</div> -->										
									<!-- <div class="">
										<a href="#upload" class='upload fa fa-upload' data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}'>Ubah Hasil MCU</a>
									</div> -->
									@else
									<div><a href="#upload"  class='upload' data-toggle="tooltip" data-original-title="Upload Hasil MCU" data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}'><i class="fa fa fa-upload" style="font-size: 20px;"></i></a></div>
									<!-- <div class="">
										<a href="#upload" class='upload fa fa-upload' data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}'>Upload Hasil MCU</a>
									</div> -->
									@endif
			                    </td>
				                <td width="5%" align="center">
				                	<div>
				                		<div class="va-table width-100">
											<div class="va-middle width-50">
												<form method='POST' action='{{route("fail-candidates")}}' style="display: inline-block;">
													{{csrf_field()}}
													<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
													<input type="hidden" name="job_id" value="{{$job->id}}">
													<input type="hidden" name="step_id" value="8">
													<button class='btn btn-danger width-100' style="margin-right: 5px;"><i class="fa fa-close"></i>&nbsp;Gagal</button>
												</form>
											</div>
											<div class="va-middle width-50">
												<form method='POST' action='{{route("pass-candidates")}}' style="display: inline-block;">
													{{csrf_field()}}
													<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
													<input type="hidden" name="job_id" value="{{$job->id}}">
													<input type="hidden" name="step_id" value="8">
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

		<div class="list-item tab-pane" role='tab-panel' id='mcu-pass'>
			<div class="item">
				<table id="table-mcu-pass" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
		                	<th class="all"></th>
		                    <th class="all">NAMA</th>
		                    <th class="min-tablet">HASIL MCU</th>
		                    <th class="min-tablet">KETERANGAN</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgress('>', 8) as $candidate)
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
			                    	@if($candidate->mcu($job->id))
									<div class="va-table">
										<div class="va-middle">
											<div style="margin-right: 5px;"><a href="{{asset('upload/candidates/'.md5($candidate->candidate_id.'folder')).'/'.$candidate->mcu($job->id)->mcu}}" data-toggle="tooltip" data-original-title="Lihat Hasil MCU" target="_blank" class="btn btn-primary" style="width:auto;"><i class="fa fa fa-eye" style="font-size: 14px;"></i></a></div>
										</div>
										<div class="va-middle">
											<div><a href="#upload" class='upload btn btn-warning' data-toggle="tooltip" data-original-title="Ubah Hasil MCU" data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}' style="width:auto;"><i class="fa fa fa-pencil" style="font-size: 14px;"></i></a></div>
										</div>
									</div>
									<!-- <div class="">
										<a href="{{asset('upload/candidates/'.md5($candidate->candidate_id.'folder')).'/'.$candidate->mcu($job->id)->mcu}}" target="_blank"><i class="fa fa-eye"></i>Lihat Hasil MCU</a>
									</div>
									<div class="">
										<a href="#upload" class='upload fa fa-upload' data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}'>Ubah Hasil MCU</a>
									</div> -->
									@else
									<div><a href="#upload"  class='upload' data-toggle="tooltip" data-original-title="Upload Hasil MCU" data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}'><i class="fa fa fa-upload" style="font-size: 20px;"></i></a></div>
									<!-- <div class="">
										<a href="#upload" class='upload fa fa-upload' data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}'>Upload Hasil MCU</a>
									</div> -->
									@endif
			                    </td>
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

		<div class="list-item tab-pane" role='tab-panel' id='mcu-fail'>
			<div class="item">
				<table id="table-mcu-fail" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
		                	<th class="all"></th>
		                    <th class="all">NAMA</th>
		                    <th class="min-tablet">HASIL MCU</th>
		                    <th class="min-tablet">KETERANGAN</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgressStatus('=', 8, 33) as $candidate)
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
			                    	@if($candidate->mcu($job->id))
			                    	<div class="va-table">
										<div class="va-middle">
											<div style="margin-right: 5px;"><a href="{{asset('upload/candidates/'.md5($candidate->candidate_id.'folder')).'/'.$candidate->mcu($job->id)->mcu}}" data-toggle="tooltip" data-original-title="Lihat Hasil MCU" target="_blank" class="btn btn-primary" style="width:auto;"><i class="fa fa fa-eye" style="font-size: 14px;"></i></a></div>
										</div>
										<div class="va-middle">
											<div><a href="#upload" class='upload btn btn-warning' data-toggle="tooltip" data-original-title="Ubah Hasil MCU" data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}' style="width:auto;"><i class="fa fa fa-pencil" style="font-size: 14px;"></i></a></div>
										</div>
									</div>
									<!-- <div class="">
										<a href="{{asset('upload/candidates/'.md5($candidate->candidate_id.'folder')).'/'.$candidate->mcu($job->id)->mcu}}" target="_blank"><i class="fa fa-eye"></i>Lihat Hasil MCU</a>
									</div>
									<div class="">
										<a href="#upload" class='upload fa fa-upload' data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}'>Ubah Hasil MCU</a>
									</div> -->
									@else
									<div><a href="#upload" data-toggle="tooltip" data-original-title="Upload Hasil MCU" data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}'><i class="fa fa-external-link-square" style="font-size: 20px;"></i></a></div>
									<!-- <div class="">
										<a href="#upload" class='upload fa fa-upload' data-candidate='{{$candidate->id}}' data-job='{{$job->id}}' data-user='{{$candidate->user->name}}'>Upload Hasil MCU</a>
									</div> -->
									@endif
			                    </td>
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
        var tablejobs1 = $('#table-mcu-not-checked').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs1.buttons().container()
            .appendTo('#table-mcu-not-checked_wrapper .col-sm-6:eq(0)');

        var tablejobs2 = $('#table-mcu-pass').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs2.buttons().container()
            .appendTo('#table-mcu-pass_wrapper .col-sm-6:eq(0)');

        var tablejobs3 = $('#table-mcu-fail').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs3.buttons().container()
            .appendTo('#table-mcu-fail_wrapper .col-sm-6:eq(0)');
	})

	$('#table-mcu-not-checked tbody').on('click', 'td.details-control', function () {
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

	$('#table-mcu-pass tbody').on('click', 'td.details-control', function () {
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

	$('#table-mcu-fail tbody').on('click', 'td.details-control', function () {
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
