<div class="list-item tab-pane" role="tabpanel" id='step_10'>
	<div class="list-item" role='tab-panel'>
		
		@foreach($job->candidateProgress('=', 10) as $candidate)

		<div class="item">
			<table id="table-hired" class="table table-striped table-bordered row-border order-column" style="width:100%">
	            <thead>
	                <tr>
	                	<th width="3%"></th>
	                    <th width="20%">NAMA</th>
	                    <th width="20%">LOKASI</th>
	                    <th width="10%">PENDIDIKAN</th>
	                    <th width="10%">PENGALAMAN</th>
			            <th width="17%">KESESUAIAN</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($job->candidateProgress('>=', 10) as $candidate)
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
	                </tr>
	            	@endforeach
	            </tbody>
	        </table>
		</div>
		@endforeach
	</div>
</div>


<script type="text/javascript">
	$(function(){
        var tablejobs = $('#table-hired').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            /*scrollX: true,
            scrollCollapse: true,*/
            paging: true
        });

        /*new $.fn.dataTable.FixedHeader(table);*/

        tablejobs.buttons().container()
            .appendTo('#table-hired_wrapper .col-sm-6:eq(0)');
	})
</script>
