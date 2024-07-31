<div class="profile-header" style="padding:0px;margin-top: -2em;">
	<div class="va-table width-100">
		<div class="width-100 visible-xs-block ta-center-m">
			<div class="photo mar-r-0-m"><img src="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->photo : 'img/no-pic.jpg')}}" class="img-responsive"></div>
		</div>
		<div class="va-middle pad-b-1em-m ta-center-m dis-tab-row-m">
			<div class="name" style="font-size: 18px;">Kandidat:&nbsp;<b class="text-primary">{{$candidate->user->name}}</b></div>
		</div>
		<div class="va-middle dis-tab-row-m ta-right ta-center-m">
			<div class="download pad-r-2em pad-r-0-m">
				<a href="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->cv : '#')}}" class="btn btn-success {{$candidate->photo ? '':'disabled'}}"><i class="fa fa-cloud-download"></i> Unduh CV/Resume</a>
			</div>
		</div>	
	</div>
	<div class="va-table width-100">
		<div class="va-middle">
			<hr>
		</div>
	</div>
	<div class="va-table width-100">
		<div style="vertical-align: top;" class="width-100 hidden-xs">
			<div class="photo"><img src="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->photo : 'img/no-pic.jpg')}}" class="img-responsive"></div>
		</div>
		<div class="va-middle width-100 dis-tab-row-m">
			<div class="general-info">
				
				<div class="education">
					<!-- {!! $candidate->educations->first() ? $candidate->educations->first()->major.', '.$candidate->educations->first()->institute : '' !!} -->
					@if($candidate->educations->first())
						<span><span class="text-muted">Institute:</span> <b>{{$candidate->educations->first()->institute}}</b></span>,&nbsp;<span><span class="text-muted">Major:</span> <i>{{$candidate->educations->first()->major}}</i></span>
					@endif
				</div>


				<div class="va-table width-100">
					<div class="va-middle width-50 width-100-m">
						<div class="info">
							<span><i class="fa fa-phone"></i> {{$candidate->phone ?: '-'}}</span><br>
							<span><i class="fa fa-envelope"></i> {{$candidate->user->email}}</span><br>
							<span><i class="fa fa-map-marker"></i> {{$candidate->city ? $candidate->city->city.', '.$candidate->province->province : '-'}}</span>
						</div>
					</div>	
					<div class="va-middle width-50 width-100-m dis-tab-row-m mar-b-2em-m">
						<div class="text-muted"><i class="fa fa-question-circle-o"></i>Why  hire me?</div>
						<div style="font-size: 15px; padding-right:1em;">&ldquo;<i>{{$candidate->why_hire_me}}</i>&rdquo;</div>
						<!-- <span><i class="fa fa-question-circle-o"></i> Why  hire me? </span><br> -->
					</div>		
				</div>

			</div>	
		</div>			
	</div>	
	<div class="va-table width-100 visible-xs-block">
		<div class="va-middle">
			<hr>
		</div>
	</div>
</div>


<ul class="nav nav-tabs text-center" role='tab-list' id='tabs'>
  <li role="presentation" class="active"><a href="#candidate-profile" data-toggle="tooltip" title="Profil"><span class="visible-xs-block"><i class="fa fa-user"></i></span><span class="hidden-xs">Profil</span></a></li>
  <li role="presentation"><a href="#experience" data-toggle="tooltip" title="Pengalaman"><span class="visible-xs-block"><i class="fa fa-cubes"></i></span><span class="hidden-xs">Pengalaman</span></a></li>
  <li role="presentation"><a href="#education" data-toggle="tooltip" title="Pendidikan"><span class="visible-xs-block"><i class="fa fa-graduation-cap"></i></span><span class="hidden-xs">Pendidikan</span></a></li>
  <li role="presentation"><a href="#skill" data-toggle="tooltip" title="Keahlian"><span class="visible-xs-block"><i class="fa fa-cog"></i></span><span class="hidden-xs">Keahlian</span></a></li>
  <li role="presentation"><a href="#info" data-toggle="tooltip" title="Info lain"><span class="visible-xs-block"><i class="fa fa-ellipsis-h"></i></span><span class="hidden-xs">Info lain</span></a></li>
  <li role="presentation"><a href="#hasil" data-toggle="tooltip" title="Riwayat"><span class="visible-xs-block"><i class="fa fa-check-square-o"></i></span><span class="hidden-xs">Riwayat</span></a></li>
</ul>

<div class="tab-content" style="padding: 20px;border-top: none;border-right: 1px solid #ccc;border-bottom: 1px solid #ccc;border-left: 1px solid #ccc;">
	<div class="tab-pane active" role="tabpanel" id="candidate-profile">
		<div class="section-content" style="margin-top: 0px;">
			<div class="info">
				<div class="row" style="margin-bottom: 0px;">
					<div class="col-md-8">
						<div class="row" style="margin-bottom: 0px;">
							<div class="col-md-3"><span class="text-muted">No. KTP</span></div>
							<div class="col-md-9">{{$candidate->ktp ?: '-'}}</div>
							<div class="col-md-3"><span class="text-muted">No. NPWP</span></div>
							<div class="col-md-9">{{$candidate->npwp ?: '-'}}</div>
							<div class="col-md-3"><span class="text-muted">No. BPJS</span></div>
							<div class="col-md-9">{{$candidate->bpjs ?: '-'}}</div>
							<div class="col-md-3"><span class="text-muted">Tanggal Lahir</span></div>
							<div class="col-md-9">{{date_format(date_create($candidate->birth_date), "d-m-Y")}} (Usia: {{ (new Datetime($candidate->birth_date))->diff(new DateTime())->format("%Y tahun") }})</div>
							<div class="col-md-3"><span class="text-muted">Gaji yang diharapkan</span></div>
							<div class="col-md-8">Rp {{ number_format($candidate->expected_salary,0,",",".") }}</div>
							<div class="col-md-3"><span class="text-muted">Kewarganegaraan</span></div>
							<div class="col-md-9">{{$candidate->nationality == 1 ? 'Indonesia' : $candidate->country}}</div>
							<div class="col-md-3"><span class="text-muted">Alamat</span></div>
							<div class="col-md-9">{{$candidate->address}}</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row" style="margin-bottom: 0px;">
							<div class="col-md-12">
								<div class="text-muted">Summary</div>
								<div class="summary">{!! $candidate->summary !!}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane" role="tabpanel" id="experience">
		<div class="section-content" style="margin-top: 0px;">
			@if($candidate->experiences->count() > 0)
				<div class="timeline">
				@foreach($candidate->experiences as $experience)
				

				<!-- TIMELINE ITEM -->
                <div class="timeline-item">
                    <div class="timeline-badge">
                        <div class="va-table width-100" style="height:80px;padding:5px;">
                            <div class="va-middle ta-center">
                                <div class="tt-upper" style="line-height:1.1em"><b>{{$experience->position}}</b></div>
                                <hr style="margin:5px 0px;border-top: 1px solid #ccc;">
                                <div class="fs-12 text-muted tt-upper">{{ substr(date('F', strtotime($experience->start_date)), 0, 3) .' '. date('Y', strtotime($experience->start_date)).' - '.substr(date('F', strtotime($experience->end_date)), 0, 3) .' '. date('Y', strtotime($experience->end_date))}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-body">
                        <div>
                            <div class="va-table width-100">
                                <div class="va-middle">
                                    <div style="display:table;">
                                    <div class="timeline-body-head">
                                        <div class="timeline-body-head-caption">
                                            <a href="#" class="timeline-body-title font-blue-madison">{{$experience->company}}</a>
                                            <span class="timeline-body-time text-muted fs-12">
                                            	<?php
                                                        if($experience->nationality == 1){
                                                            if($experience->city){
                                                                echo $experience->city->city;
                                                            } else {
                                                                echo '-';
                                                            }

                                                            if($experience->province){
                                                                echo ', '. $experience->province->province;
                                                            } else {
                                                                echo '-';
                                                            }
                                                        } else {
                                                            echo $experience->aboard_location;
                                                        }
                                                    ?>
                                            </span>
                                        </div>                                
                                    </div>
                                    </div>
                                    <div><span class="text-muted fs-12">Bidang/Industri: <span class="tt-upper"><b>{{$experience->field->field}}</b></span></span></div>
                                    <div><span class="text-muted fs-12">Gaji: <b><span class="thousand">{{$experience->salary}}</span></b></span></div>
                                </div>
                                <div class="va-middle ta-right">
                                	<!--
                                    <span class='action'>
                                        <a href="{{route('edit-candidate-experience', $experience->id)}}" class="btn btn-primary" style="padding:5px 12px;"><i class="fa fa-pencil" title='edit'></i></a>
                                        <form class='delete' method='POST' action="{{route('delete-candidate-experience', $experience->id)}}">
                                            {{csrf_field()}}
                                            <button class="btn btn-danger delete" data-company="{{$experience->company}}" data-id="{{$experience->id}}"><i class="fa fa-trash" title='delete'></i></button>
                                        </form>
                                    </span>
                                	-->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="timeline-body-arrow"></div>
                        
                        <div class="timeline-body-content">
                            <span class="font-grey-cascade">{{$experience->description}}</span>
                        </div>
                    </div>
                </div>
                <!-- END TIMELINE ITEM -->

				@endforeach
				</div>
			@else
				<i>(Tidak memiliki pengalaman)</i>
			@endif
		</div>
	</div>

	<div class="tab-pane" role="tabpanel" id="education">
		<div class="section-content" style="margin-top: 0px;">

			

			@if($candidate->educations->count() > 0)
				<div class="timeline">
				@foreach($candidate->educations as $education)
					<!-- <div class="row">
						<div class="col-md-4">Lulus pada {{date('F Y', strtotime($education->graduation_date))}}</div>
						<div class="col-md-8">
							<big><b>{{$education->major.', '.$education->institute}}</b></big>
							<div class="info">
								@if($education->qualification > 0)
									<b>GPA: </b>{{$education->GPA}} dari {{$education->GPA_max}}
								@else
									<b>Nilai: </b>{{$education->GPA}} dari {{$education->GPA_max}}
								@endif
							</div>
							<p>{{$education->info}}</p>
						</div>
					</div> -->

					<!-- TIMELINE ITEM -->
		            <div class="timeline-item">
		                <div class="timeline-badge">
		                    <div class="va-table width-100" style="height:80px;padding:5px;">
		                        <div class="va-middle ta-center">
		                            <div class="tt-upper" style="line-height:1.1em; margin-bottom:5px;"><i class="fa fa-graduation-cap fs-20"></i></div>
		                            <!--<hr style="margin:5px 0px;border-top: 1px solid #ccc;">-->
		                            <div class="fs-12 text-muted tt-upper">Lulus pada <b>{{ substr(date('F', strtotime($education->graduate_date)), 0, 3) .' '. date('Y', strtotime($education->graduate_date)) }}</b></div>
		                            
		                        </div>
		                    </div>
		                </div>
		                <div class="timeline-body">
		                    <div>
		                        <div class="va-table width-100">
		                            <div class="va-middle">
		                                <div style="display:table;">
		                                    <div class="timeline-body-head">
		                                        <div class="timeline-body-head-caption">
		                                            <a href="#" class="timeline-body-title font-blue-madison">{{$education->major}}</a>,&nbsp;{{$education->institute}}
		                                        </div>                                
		                                    </div>
		                                </div>
		                                <div class="text-muted fs-12">
		                                    @if($education->qualification > 0)
		                                    	@if($education->GPA)
			                                        GPA: <b>{{$education->GPA}}</b> dari <b>{{$education->GPA_max}}</b>
		                                    	@endif
		                                    @else
		                                    	@if($education->GPA)
			                                        Nilai: <b>{{$education->GPA}}</b> dari <b>{{$education->GPA_max}}</b>
		                                    	@endif
		                                    @endif
		                                    <br>
		                                    Bidang Pendidikan: <b>{{$education->field->field}}</b>
		                                </div>
		                            </div>
		                            <div class="va-middle ta-right">
		                            	<!--
		                                <span class='action'>
		                                    <a href="{{route('edit-candidate-education', $education->id)}}" class="btn btn-primary" style="padding:5px 12px;"><i class="fa fa-pencil" title='edit'></i></a>
		                                    <form class='delete' method='POST' action="{{route('delete-candidate-education', $education->id)}}">
		                                        {{csrf_field()}}
		                                        <button class="btn btn-danger delete" data-company="{{$education->institute}}" data-id="{{$education->id}}"><i class="fa fa-trash" title='delete'></i></button>
		                                    </form>
		                                </span>
		                            	-->
		                            </div>
		                        </div>
		                    </div>
		                    <hr>
		                    <div class="timeline-body-arrow"></div>
		                    
		                    <div class="timeline-body-content">
		                        <span class="font-grey-cascade">{{$education->info}}</span>
		                    </div>
		                </div>
		            </div>
		            <!-- END TIMELINE ITEM -->

						@endforeach
					</div>
					@else
				<i>(Tidak memiliki pendidikan)</i>
			@endif
		</div>
	</div>

	<div class="tab-pane" role="tabpanel" id="skill">
		<div class="section-content" style="margin-top: 0px;">
			@if($candidate->skills->count() > 0)
				<div class="info">
					<p>
						@foreach($candidate->skills as $skill)
							<span class="tag">{{$skill->name}}</span>
						@endforeach
					</p>
				</div>
			@else
				<i>(Tidak memiliki keahlian)</i>
			@endif
		</div>
	</div>
	<div class="tab-pane" role="tabpanel" id="info">
		<div class="section-content" style="margin-top: 0px;">
			{!! $candidate->other_info ?: '<i>(Tidak ada info tambahan)</i>' !!}
		</div>
	</div>
	<div class="tab-pane" role="tabpanel" id="hasil">
		<div class="section-content" style="margin-top: 0px;">
			<!-- <button class="btn btn-primary">PVI</button>
			<button class="btn btn-primary">Online Test</button>
			<button class="btn btn-primary">Interview</button>
			<button class="btn btn-primary">MCU</button>
			<button class="btn btn-primary">Offering</button> -->

				<table id="tabel-hasil-tes" class="table table-striped table-bordered row-border order-column" style="width:100%">
		            <thead>
		                <tr>
		                    <th width="30%" class="all">JOB TITLE</th>
		                    <th width="20%" class="all">STATUS</th>
		                    <th width="50%" class="min-tablet">HASIL TES</th>
		                    <!-- <th width="5%">ACTION</th> -->
		                </tr>
		            </thead>
		            <tbody>
						@foreach($candidate->jobs as $job)
		                <tr>
		                    <td width="30%">
								<div class="title">
									<a href="{{route('detail-job', $job->id)}}" style="font-size: 14px;"><b>{{$job->title}}</b></a>
								</div>
		                    </td>
		                    <td width="20%">
		                    	<?php $job_candidate = $job->jobCandidate($candidate->candidate_id)?>

		                    	@if($job_candidate->pivot->status == 33 && $job_candidate->pivot->progress > 0)
									<span class="label label-danger ta-center width-auto width-auto-m white-space-normal-m"><i>Gagal pada {{$job_candidate->progress()}}</i></span>
								@elseif($job_candidate->pivot->status == 33 && $job_candidate->pivot->progress == 0)
									<span class="label label-danger ta-center width-auto width-auto-m white-space-normal-m"><i>Gagal</i></span>
								@elseif($job_candidate->pivot->status == 1 && $job_candidate->pivot->progress == 0)
									<span class="label label-info ta-center width-auto width-auto-m white-space-normal-m">Tahap matched</span>
								@elseif($job_candidate->pivot->status == 2 && $job_candidate->pivot->progress == 0)
									<span class="label label-info ta-center width-auto width-auto-m white-space-normal-m">Tahap shortlisted</span>
								@elseif($job_candidate->pivot->status == 0)
									<span class="label label-info ta-center width-auto width-auto-m white-space-normal-m">Tahap {{$job_candidate->progress()}}</span>
								@endif
		                    </td>
		                    <td width="50%">
								<div class="job-progress">
									<div class="step width-19 width-auto-m" data-toggle="tooltip" data-placement="top" title="PVI">
										<a href="{{route('pvi-candidate', ['job_id'=>$job->job_id, 'candidate_id'=>$candidate->candidate_id])}}" style="text-align: center; color: #fff;width:100%;" class="btn btn-primary pad-l-5-m pad-r-5-m pad-t-0-m pad-t-0-m pad-b-0-m">
											<!-- <span><i class="fa fa-video-camera"></i></span><br> -->
											<span class="name">PVI</span>
										</a>
									</div>
									<div class="step width-19 width-auto-m" data-toggle="tooltip" data-placement="top" title="Online Test">
										<a href="{{route('test-candidate', [$job->job_id, $candidate->candidate_id])}}" style="text-align: center; color: #fff;width:100%;" class="btn btn-primary pad-l-5-m pad-r-5-m pad-t-0-m pad-t-0-m pad-b-0-m">
											<!-- <span><i class="fa fa-globe"></i></span><br> -->
											<span class="name">Online Test</span>
										</a>
									</div>
									<div class="step width-19 width-auto-m" data-toggle="tooltip" data-placement="top" title="Interview">
										<a href="{{route('interview-candidate', [$job->job_id, $candidate->candidate_id])}}" style="text-align: center; color: #fff;width:100%;" class="btn btn-primary pad-l-5-m pad-r-5-m pad-t-0-m pad-t-0-m pad-b-0-m">
											<!-- <span><i class="fa fa-exchange"></i></span><br> -->
											<span class="name">Interview</span>
										</a>
									</div>
									@if($candidate->mcu($job->id))
									<div class="step width-19 width-auto-m" data-toggle="tooltip" data-placement="top" title="MatcMCUhed">
										<a href="{{asset('upload/candidates/'.md5($candidate->candidate_id.'folder')).'/'.$candidate->mcu($job->id)->mcu}}" style="text-align: center; color: #fff;width:100%;" class="btn btn-primary pad-l-5-m pad-r-5-m pad-t-0-m pad-t-0-m pad-b-0-m">
											<!-- <span><i class="fa fa-medkit"></i></span><br> -->
											<span class="name">MCU</span>
										</a>
									</div>
									@endif
									@if($candidate->offering($job->id))
									<div class="step width-19 width-auto-m" data-toggle="tooltip" data-placement="top" title="Offering">
										<a href="{{asset('upload/candidates/'.md5($candidate->candidate_id.'folder')).'/'.$candidate->offering($job->id)->offering}}" style="text-align: center; color: #fff;width:100%;" class="btn btn-primary pad-l-5-m pad-r-5-m pad-t-0-m pad-t-0-m pad-b-0-m">
											<!-- <span><i class="fa fa-folder-open"></i></span><br> -->
											<span class="name">Offering</span>
										</a>
									</div>
									@endif
								</div>
		                    </td>
		                </tr>
						@endforeach
		            </tbody>
		        </table>


		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
	    var tablejobs = $('#tabel-hasil-tes').DataTable({
    		responsive: true,
	        lengthChange: false,
	        buttons: ['copy', 'excel', 'pdf', 'colvis'],
	        paging: true
	    });

	    tablejobs.buttons().container().appendTo('#tabel-hasil-tes_wrapper .col-sm-6:eq(0)');
	})
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip(); 
	});
	$('#tabel-hasil-tes tbody').on('click', 'td.details-control', function () {
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
	});
</script>