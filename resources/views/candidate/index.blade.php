@extends('layouts.candidate')

@section('profile-content')

@if(!Auth::user()->candidate->isProfileComplete())
<div class="alert alert-warning" role="alert">
  <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Profile Anda belum lengkap. Silahkan lengkapi profile Anda agar bisa melamar lowongan.
</div>
@endif

<div class="profile-header" style="padding:13px 20px;position:relative;">
    <div class="panel mar-b-0" style="border:none;">
        <div class="va-table mar-t-3em-m pad-t-1em-m">
            <div class="va-middle">
                <div class="photo"><img src="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->photo : 'img/no-pic.jpg')}}" class="img-responsive"></div>
            </div>
            <div class="va-middle">
                <div class="general-info">
                    <div class="name"><b>{{Auth::user()->name}}</b></div>
                    <div class="education">{!! $candidate->educations->first() ? $candidate->educations->first()->major.', '.$candidate->educations->first()->institute : '' !!}</div>
                    <div class="info">
                        <span><i class="fa fa-phone"></i> {{$candidate->phone ?: '-'}}</span><br>
                        <span><i class="fa fa-envelope"></i> {{Auth::user()->email}}</span><br>
                        <span><i class="fa fa-map-marker"></i> {{$candidate->city ? $candidate->city->city.', '.$candidate->province->province : '-'}}</span><br>
                        <span><i class="fa fa-question-circle-o"></i> Why  hire me? {{$candidate->why_hire_me}}</span><br>
                    </div>
                </div>
            </div>
        </div>
        <div style="position:absolute;top:0px;right:0px;" class="width-100-m">
            <a target="_blank" href="{{asset($candidate->cv ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->cv : '#')}}" class="btn btn-success width-100-m" style="padding:15px 20px; text-transform:uppercase;"><i class="fa fa-cloud-download"></i> Unduh CV/Resume</a>
        </div>
    </div>
</div>
<div class="divider mar-0"></div>
<div class="profile-section pad-0">
    <div class="va-table width-100" style="padding:20px 30px;background:#dcdcdc;">
        <div class="va-middle"><h4 style=" margin:0px;">PROFIL</h4></div>
        <div class="va-middle" style="text-align:right;"><h4 style="margin:0px;"><i class="fa fa-user"></i></h4></div>
    </div>	
	<div class="section-content" style="padding:20px 30px;margin:0px;">
		<div class="info">
			<span class="label"><b>No. KTP</b></span> : {{$candidate->ktp ?: '-'}}<br>
			<span class="label"><b>No. NPWP</b></span> : {{$candidate->npwp ?: '-'}}<br>
			<span class="label"><b>No. BPJS</b></span> : {{$candidate->bpjs ?: '-'}}<br>
			<span class="label"><b>Tanggal Lahir</b></span> : {{Converts::formatUsia($candidate->birth_date)}}<br>
			<span class="label"><b>Jenis Kelamin</b></span> : {{$candidate->jk == 1 ? 'Laki-laki' : 'Perempuan'}}<br>
			<span class="label"><b>Gaji yang diharapkan</b></span> : {{Converts::formatRupiah($candidate->expected_salary)}}<br>
			<span class="label"><b>Kewarganegaraan</b></span> : {{Converts::formatNegara($candidate->nationality)}} <br>
			<span class="label"><b>Alamat</b></span> : {{$candidate->address ?: '-'}}<br>
		</div>
		<div class="summary">
			{!! $candidate->summary !!}
		</div>
	</div>
</div>
<div class="divider mar-0"></div>
<div class="profile-section pad-0">
    <div class="va-table width-100" style="padding:20px 30px;background:#dcdcdc;">
        <div class="va-middle"><h4 style=" margin:0px;">PENGALAMAN</h4></div>
        <div class="va-middle" style="text-align:right;"><h4 style="margin:0px;"><i class="fa fa-briefcase"></i></h4></div>
    </div>	
    <div class="section-content pad-20-30 mar-0 pad-1em-m">
        <div class="portlet-body">                
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
                    <i class="text-muted">(Tidak memiliki pengalaman)</i>
                @endif
        </div>            
	</div>
    
</div>
<div class="divider mar-0"></div>
<div class="profile-section pad-0">
    <div class="va-table width-100" style="padding:20px 30px;background:#dcdcdc;">
        <div class="va-middle"><h4 style=" margin:0px;">PENDIDIKAN</h4></div>
        <div class="va-middle" style="text-align:right;"><h4 style="margin:0px;"><i class="fa fa-graduation-cap"></i></h4></div>
    </div>
    <div class="section-content pad-20-30 mar-0 pad-1em-m">
                @if($candidate->educations->count() > 0)
        <div class="portlet-body">                
                    @foreach($candidate->educations as $education)
                <div class="timeline">

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
            </div>
            @endforeach
        </div>            
		@else
			<i class="text-muted">(Tidak memiliki pendidikan)</i>
		@endif
	</div>
</div>
<div class="divider mar-0"></div>
<div class="profile-section pad-0">
    <div class="va-table width-100" style="padding:20px 30px;background:#dcdcdc;">
        <div class="va-middle"><h4 style=" margin:0px;">KEAHLIAN</h4></div>
        <div class="va-middle" style="text-align:right;"><h4 style="margin:0px;"><i class="fa fa-star"></i></h4></div>
    </div>
	<div class="section-content" style="padding:20px 30px;margin:0px;">
		@if($candidate->skills->count() > 0)
				<div class="info mar-b-0 mar-t-0">
					<p class="mar-b-0">
			@foreach($candidate->skills as $skill)
					<span class="tag">{{$skill->name}}</span>
			@endforeach
			</p>
				</div>
		@else
			<i class="text-muted">(Tidak memiliki keahlian)</i>
		@endif
	</div>
</div>
<div class="divider mar-0"></div>
<div class="profile-section pad-0">
    <div class="va-table width-100" style="padding:20px 30px;background:#dcdcdc;">
        <div class="va-middle"><h4 style=" margin:0px;">INFO LAIN</h4></div>
        <div class="va-middle" style="text-align:right;"><h4 style="margin:0px;"><i class="fa fa-list"></i></h4></div>
    </div>
	<div class="section-content" style="padding:20px 30px;margin:0px;">
		{!! $candidate->other_info ?: '<i class="text-muted">(Tidak ada info tambahan)</i>' !!}
	</div>
</div>
@stop

@push('scripts')
<script type="text/javascript">
	$(function(){
		$('.thousand').each(function(index, element){
		  $(element).text('Rp' + parseInt($(element).text()).toLocaleString('id-ID'))
		})
	})
</script>
@endpush