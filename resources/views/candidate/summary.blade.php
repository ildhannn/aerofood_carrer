@extends('layouts.candidate')

@section('profile-content')
<div class="profile-section pad-0 minHeight">
    <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
        <div class="va-middle pad-b-1em-m ta-center-m"><h4 style="margin:0px;"><i class="fa fa-user"></i>&nbsp;PROFIL SAYA</h4></div>
        <div class="va-middle dis-tab-row-m ta-right ta-center-m"><a href="{{route('candidate-summary-edit')}}" class='btn btn-success'><i class="fa fa-pencil" style="width:auto !important;"></i>&nbsp;&nbsp;UBAH PROFIL</a></div>
    </div>
    <div class="section-content pad-20-30 mar-0 pad-1em-m">
		<div class="info">
		    <div class="row mar-b-0">
		        <div class="col-md-5">
                    <div class="form-group">
                        <div class="text-muted">Nama</div>
                        <label>{{ Auth::user()->name }}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">No. KTP</div>
                        <label>{{$candidate->ktp ?: '-'}}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">No. NPWP</div>
                        <label>{{$candidate->npwp ?: '-'}}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">No. BPJS</div>
                        <label>{{$candidate->bpjs ?: '-'}}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">Email</div>
                        <label>{{ Auth::user()->email }}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">Nomor Telepon</div>
                        <label>{{$candidate->phone ?: '-'}}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">Tanggal Lahir</div>
                        <label>{{Converts::formatUsia($candidate->birth_date)}}</label>
                    </div>
		        </div>
		        <div class="col-md-5">
		            <div class="form-group">
                        <div class="text-muted">Jenis Kelamin</div>
                        <label>{{$candidate->jk == 1 ? 'Laki-laki' : 'Perempuan'}}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">Gaji yang Diharapkan</div>
                        <label>{{Converts::formatRupiah($candidate->expected_salary)}}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">Kewarganegaraan</div>
                        <label>{{Converts::formatNegara($candidate->nationality)}}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">Lokasi</div>
                        <label>{{$candidate->city ? $candidate->city->city.', '.$candidate->province->province : '-'}}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">Alamat Sesuai Domisili</div>
                        <label>{{$candidate->address ?: '-'}}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">Why Hire Me?</div>
                        <label>{{$candidate->why_hire_me ?: '-'}}</label>
                    </div>
                    <div class="form-group">
                        <div class="text-muted">Ringkasan</div>
                        <label>{{$candidate->summary ?: '-'}}</label>
                    </div>
		        </div>
		        <div class="col-md-2">
                    <div class="form-group">
                        <div class="text-muted">Foto Profil</div>
                        <div style="margin:10px;">
                            @if($candidate->photo)
                            <img src="{{asset($candidate->photo ? 'upload/candidates/'.md5($candidate->candidate_id.'folder').'/'.$candidate->photo : 'img/no-pic.jpg')}}" class='img-responsive'>
                            @else
                                -
                            @endif
                        </div>
                    </div>
		        </div>
		    </div>
		</div>
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
