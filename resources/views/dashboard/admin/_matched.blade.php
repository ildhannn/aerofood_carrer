<div class="list-item tab-pane" role="tabpanel" id="matched">
	<div class="visible-xs-block"><h2><i class="fa fa-check-circle"></i>&nbsp;MATCHED</h2></div>
	<ul class="nav nav-tabs sub-tab text-center" role='tab-list'>
	  <li role="presentation" class="active"><a href="#not-shortlisted">Belum Tershortlist ({{$job->candidateProgressStatus('=', 0, 1)->count()}})</a></li>
	  <li role="presentation"><a href="#matched-suitable">Suitable ({{$job->candidateProgressStatus('=', 0, 2)->count() + $job->candidateProgressStatus('=', 0, 55)->count() + $job->candidateProgress('>', 0)->count()}})</a></li>
	  <li role="presentation"><a href="#matched-not-suitable">Not Suitable ({{$job->candidateProgressStatus('=', 0, 44)->count()}})</a></li>
	</ul>

	<div class="tab-content">
		<div class="list-item tab-pane active" role='tab-panel' id='not-shortlisted'>
			<div class="item">
				<table id="table-not-shortlisted" class="table table-striped table-bordered row-border order-column" style="width:100%">
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
		            	@foreach($job->candidateProgressStatus('=', 0, 1) as $candidate)
		            	<tr>
		                    <td align="center">
								<!-- <div class="picture" style="height: auto !important;overflow: auto !important;float: none;border-radius: 0px;">
									@if($candidate->photo)
										<img src="{{$candidate->photo}}" style="width: 30px !important;">
									@else
										<img src="{{ asset('img/no-pic.jpg') }}" style="width: 30px !important;">
									@endif
								</div> -->
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
		                    <td align="center">
		                    	<div>
									@if($candidate->pivot->progress == 0)
									<div class="va-table">
										<div class="va-middle">
											<form method='POST' action='{{route("fail")}}'>
												{{csrf_field()}}
												<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
												<input type="hidden" name="job_id" value="{{$job->id}}">
												<input type="hidden" name="matched" value='1'>
												<input type="hidden" name="step_id" value="0">
												<button class='btn btn-danger' style="font-size: 10px;">Not Suitable&nbsp;<i class="fa fa-close"></i></button>
											</form>
										</div>
										<div class="va-middle">
											<form method='POST' action='{{route("pass")}}'>
												{{csrf_field()}}
												<input type="hidden" name="candidate_id" value="{{$candidate->id}}">
												<input type="hidden" name="job_id" value="{{$job->id}}">
												<input type="hidden" name="matched" value='1'>
												<input type="hidden" name="step_id" value="0">
												<button class='btn btn-success' style="font-size: 10px;">Suitable&nbsp;<i class="fa fa-check-circle"></i></button>
											</form>
										</div>
									</div>
									@else
										@if($candidate->pivot->status == 33 && $candidate->pivot->progress == 0)
											<span class="label label-danger"><i>Not Suitable</i></span>
										@elseif($candidate->pivot->progress >= 1)
											<span class="label label-info">Suitable</span>
										@endif
									@endif
								</div>
		                    </td>
		                </tr>
		            	@endforeach
		            </tbody>
		        </table>
			</div>
		</div>
		<div class="list-item tab-pane" role='tab-panel' id='matched-suitable'>
			<div class="item">
				<table id="table-matched-suitable" class="table table-striped table-bordered row-border order-column" style="width:100%">
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
			        	@foreach($job->candidateProgress('>=', 0) as $candidate)
				        	@if($candidate->pivot->status == 2 || $candidate->pivot->status == 55 || ($candidate->pivot->status == 0 && $candidate->pivot->progress > 0) || ($candidate->pivot->status == 33 && $candidate->pivot->progress > 0))
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
										<span class="label label-success"><i class="fa fa-check-circle"></i>&nbsp;Suitable</span>
									</div>
				                </td>
				            </tr>
				            @endif
			        	@endforeach
			        </tbody>
			    </table>
			</div>
		</div>

		<div class="list-item tab-pane" role='tab-panel' id='matched-not-suitable'>
			<div class="item">
				<table id="table-matched-not-suitable" class="table table-striped table-bordered row-border order-column" style="width:100%">
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
			        	@foreach($job->candidateProgressStatus('=', 0, 44) as $candidate)
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
										<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;<i>Not Suitable</i></span>
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
        var tablejobs = $('#table-not-shortlisted').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs.buttons().container()
            .appendTo('#table-not-shortlisted_wrapper .col-sm-6:eq(0)');

        var tablejobs2 = $('#table-matched-suitable').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs2.buttons().container()
            .appendTo('#table-matched-suitable_wrapper .col-sm-6:eq(0)');

        var tablejobs2 = $('#table-matched-not-suitable').DataTable({
	    	responsive: true,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs2.buttons().container()
            .appendTo('#table-matched-not-suitable_wrapper .col-sm-6:eq(0)');
	})

	$('#table-not-shortlisted tbody').on('click', 'td.details-control', function () {
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

	$('#table-matched-suitable tbody').on('click', 'td.details-control', function () {
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

	$('#table-matched-not-suitable tbody').on('click', 'td.details-control', function () {
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
