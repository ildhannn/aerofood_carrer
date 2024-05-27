<div class="list-item tab-pane" role="tabpanel" id="shortlisted">
	<div class="visible-xs-block"><h2><i class="fa fa-server"></i>&nbsp;SHORTLISTED</h2></div>
	<ul class="nav nav-tabs sub-tab text-center" role='tab-list'>
	  <li role="presentation" class="active"><a href="#shortlisted-not-checked">Belum Diperiksa ({{$job->candidateProgressStatus('=', 0, 2)->count()}})</a></li>
	  <li role="presentation"><a href="#shortlisted-pass">Lolos ({{$job->candidateProgress('>', 0)->count()}})</a></li>
	  <li role="presentation"><a href="#shortlisted-fail">Gagal ({{$job->candidateProgressStatus('=', 0, 55)->count()}})</a></li>
	</ul>

	<div class="tab-content">
		<div class="list-item tab-pane active" role='tabpanel' id='shortlisted-not-checked'>
			<div class="item">
				<table id="table-shortlisted-all" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
			            	<th width="3%" class="all"></th>
			                <th width="20%" class="all">NAMA</th>
			                <th width="20%" class="min-tablet">LOKASI</th>
			                <th width="10%" class="min-tablet">PENDIDIKAN</th>
			                <th width="10%" class="min-tablet">PENGALAMAN</th>
			                <th width="17%" class="min-tablet">KESESUAIAN</th>
			                <th width="5%" class="min-tablet">AKSI</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgressStatus('=', 0, 2) as $candidate)
				        	<tr>
				                <td align="center">
									<div class="picture" style="height: auto !important;overflow: auto !important;float: none;border-radius: 0px;">
										@if($candidate->photo)
											<img src="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->photo : 'img/no-pic.jpg')}}" style="width: 30px !important;">
										@else
											<img src="{{ asset('img/no-pic.jpg') }}" style="width: 30px !important;">
										@endif
									</div>
				                </td>
				                <td><div><a class='view-profile' onclick="showProfile('{{$candidate->candidate_id}}')" href='#{{$candidate->candidate_id}}' data-candidate='{{$candidate->candidate_id}}'>{{$candidate->user->name}}</a></div></td>
				                <td><div><i class="fa fa-map-marker"></i> {{$candidate->city ? $candidate->city->city.', '.$candidate->province->province : ''}}</div></td>
				                <td><div>{{ $candidate->educations->first() ? $candidate->educations->first()->qualification() : '-'}}</div></td>
				                <td><div>{{ $candidate->experience }} Tahun</div></td>
				                <td>
				                	<!-- <div class="blue-text">97%</div> -->
									<div class="progress">
									  <?php $presentase = $candidate->match($job->id); ?>
									  @if($presentase < 25)
										  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @elseif($presentase < 50)
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @elseif($presentase < 75)
											<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @else
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @endif
									    {{ $candidate->match($job->id) }}%
									  </div>
									</div>
				                </td>
				                <td>
				                	<div>
										<div class="va-table">
											<div class="va-middle">
												<form method='POST' action='{{route("fail")}}' style="margin-right: 5px;">
													{{csrf_field()}}
													<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
													<input type="hidden" name="job_id" value="{{$job->id}}">
													<input type="hidden" name="step_id" value="0">
													<input type="hidden" name="shortlisted" value="1">
													<button class='btn btn-danger'>Gagal&nbsp;<i class="fa fa-close"></i></button>
												</form>
											</div>
											<div class="va-middle">
												
												<div class="dropdown dropdown-candidate" style="margin-top: -2px;">
												  <button class="btn blue dropdown-toggle" type="button" id="pass-not-checked" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												    Lolos
												    <span class="caret"></span>
												  </button>
												  <ul class="dropdown-menu" aria-labelledby="pass-not-checked">
												    <li>
														<form method='POST' action='{{route("pass")}}'>
															{{csrf_field()}}
															<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
															<input type="hidden" name="job_id" value="{{$job->id}}">
															<input type="hidden" name="step_id" value="0">
															<button class='btn blue'><i class="fa fa-video-camera"></i>&nbsp;&nbsp;Loloskan ke Tahap PVI</button>
														</form>
												    </li>
												    <li>
												    	<form method='POST' action='{{route("pass")}}'>
															{{csrf_field()}}
															<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
															<input type="hidden" name="job_id" value="{{$job->id}}">
															<input type="hidden" name="step_id" value="1">
															<button class='btn blue'><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;Loloskan ke Tahap Tes Online</button>
														</form>
												    </li>
												    <li>
												    	<form method='POST' action='{{route("pass")}}'>
															{{csrf_field()}}
															<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
															<input type="hidden" name="job_id" value="{{$job->id}}">
															<input type="hidden" name="step_id" value="2">
															<button class='btn blue'><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Loloskan ke Tahap Interview</button>
														</form>
												    </li>
												  </ul>
												</div>

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
		<div class="list-item tab-pane" role='tabpanel' id='shortlisted-pass'>
			<div class="item">
				<table id="table-shortlisted-pass" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
			            	<th width="3%" class="all"></th>
			                <th width="20%" class="all">NAMA</th>
			                <th width="20%" class="min-tablet">LOKASI</th>
			                <th width="10%" class="min-tablet">PENDIDIKAN</th>
			                <th width="10%" class="min-tablet">PENGALAMAN</th>
			                <th width="17%" class="min-tablet">KESESUAIAN</th>
			                <th width="5%" class="min-tablet">KETERANGAN</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgress('>', 0) as $candidate)
				        	<tr>
				                <td align="center">
									<div class="picture" style="height: auto !important;overflow: auto !important;float: none;border-radius: 0px;">
										@if($candidate->photo)
											<img src="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->photo : 'img/no-pic.jpg')}}" style="width: 30px !important;">
										@else
											<img src="{{ asset('img/no-pic.jpg') }}" style="width: 30px !important;">
										@endif
									</div>
				                </td>
				                <td><div><a class='view-profile' onclick="showProfile('{{$candidate->candidate_id}}')" href='#{{$candidate->candidate_id}}' data-candidate='{{$candidate->candidate_id}}'>{{$candidate->user->name}}</a></div></td>
				                <td><div><i class="fa fa-map-marker"></i> {{$candidate->city ? $candidate->city->city.', '.$candidate->province->province : ''}}</div></td>
				                <td><div>{{ $candidate->educations->first() ? $candidate->educations->first()->qualification() : '-'}}</div></td>
				                <td><div>{{ $candidate->experience }} Tahun</div></td>
				                <td>
				                	<!-- <div class="blue-text">97%</div> -->
									<div class="progress">
									  <?php $presentase = $candidate->match($job->id); ?>
									  @if($presentase < 25)
										  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @elseif($presentase < 50)
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @elseif($presentase < 75)
											<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @else
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @endif
									    {{ $candidate->match($job->id) }}%
									  </div>
									</div>
				                </td>
				                <td>
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

		<div class="list-item tab-pane" role='tabpanel' id='shortlisted-fail'>
			<div class="item">
				<table id="table-shortlisted-fail" class="table table-striped table-bordered row-border order-column" style="width:100%">
			        <thead>
			            <tr>
			            	<th width="3%" class="all"></th>
			                <th width="20%" class="all">NAMA</th>
			                <th width="20%" class="min-tablet">LOKASI</th>
			                <th width="10%" class="min-tablet">PENDIDIKAN</th>
			                <th width="10%" class="min-tablet">PENGALAMAN</th>
			                <th width="17%" class="min-tablet">KESESUAIAN</th>
			                <th width="5%" class="min-tablet">KETERANGAN</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($job->candidateProgressStatus('=', 0, 55) as $candidate)
				        	<tr>
				                <td align="center">
									<div class="picture" style="height: auto !important;overflow: auto !important;float: none;border-radius: 0px;">
										@if($candidate->photo)
											<img src="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->photo : 'img/no-pic.jpg')}}" style="width: 30px !important;">
										@else
											<img src="{{ asset('img/no-pic.jpg') }}" style="width: 30px !important;">
										@endif
									</div>
				                </td>
				                <td><div><a class='view-profile' onclick="showProfile('{{$candidate->candidate_id}}')" href='#{{$candidate->candidate_id}}' data-candidate='{{$candidate->candidate_id}}'>{{$candidate->user->name}}</a></div></td>
				                <td><div><i class="fa fa-map-marker"></i> {{$candidate->city ? $candidate->city->city.', '.$candidate->province->province : ''}}</div></td>
				                <td><div>{{ $candidate->educations->first() ? $candidate->educations->first()->qualification() : '-'}}</div></td>
				                <td><div>{{ $candidate->experience }} Tahun</div></td>
				                <td>
				                	<!-- <div class="blue-text">97%</div> -->
									<div class="progress">
									  <?php $presentase = $candidate->match($job->id); ?>
									  @if($presentase < 25)
										  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @elseif($presentase < 50)
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @elseif($presentase < 75)
											<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @else
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $candidate->match($job->id) }}"
										  aria-valuemin="0" aria-valuemax="100" style="width:{{ $candidate->match($job->id) }}%">
									  @endif
									    {{ $candidate->match($job->id) }}%
									  </div>
									</div>
				                </td>
				                <td>
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
        var tablejobs = $('#table-shortlisted-all').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs.buttons().container()
            .appendTo('#table-shortlisted-all_wrapper .col-sm-6:eq(0)');

        var tablejobs = $('#table-shortlisted-pass').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs.buttons().container()
            .appendTo('#table-shortlisted-pass_wrapper .col-sm-6:eq(0)');

        var tablejobs = $('#table-shortlisted-fail').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs.buttons().container()
            .appendTo('#table-shortlisted-fail_wrapper .col-sm-6:eq(0)');
	})

	$('#table-shortlisted-all tbody').on('click', 'td.details-control', function () {
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

	$('#table-shortlisted-pass tbody').on('click', 'td.details-control', function () {
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

	$('#table-shortlisted-fail tbody').on('click', 'td.details-control', function () {
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
