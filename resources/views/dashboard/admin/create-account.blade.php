@extends('layouts.dashboard')

@section('breadcrumb')
	<a href="{{route('dashboard-account')}}">Akun</a>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b>Buat Baru</b>
@stop


@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="header-sub">
			<div class="va-table width-100">
				<div class="va-middle width-50">TAMBAH AKUN</div>
				<div class="va-middle width-50 ta-right">
					<div><i class="fa fa-user-plus"></i></div>
				</div>
			</div>
		</div>
		<div class="panel">
			<form method="POST" action="{{route('create-account')}}">
				{{csrf_field()}}
				<!-- <h3>Profil</h3> -->
				<div class="container-fluid">
					<div class="row">
						<div class="form-horizontal">
							<div class="form-group">
								<label class='col-sm-4 control-label ta-left'>Nama</label>
								<div class="col-sm-8">
									<input type="text" name="name" value='' class='form-control' required>
								</div>
							</div>
							<div class="form-group">
								<label class='col-sm-4 control-label ta-left'>Email</label>
								<div class="col-sm-8">
									<input type="email" name="email" value='' class='form-control' required>
								</div>
							</div>
							<div class="form-group">
								<label class='col-sm-4 control-label ta-left'>Divisi</label>
								<div class="col-sm-8">
									<select class='form-control' id='divition' name='divition_id' >
										<option value=''>Pilih Divisi</option>
										@foreach($divitions as $divition)
											<option value='{{$divition->id}}'>{{$divition->divition}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class='col-sm-4 control-label ta-left'>Unit</label>
								<div class="col-sm-8">
									<select class='form-control'  id='unit' name='unit_id'>
										<option value=''>Pilih Unit</option>
										@foreach($units as $unit)
											<option value='{{$unit->id}}' data-divition='{{$unit->divition_id}}'>{{$unit->unit}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="form-horizontal">
							<div class="form-group">
								<label class='col-sm-4 control-label ta-left'>Password</label>
								<div class="col-sm-8">
									<input type="password" name="password" class='form-control'>
								</div>
							</div>
							<div class="form-group">
								<label class='col-sm-4 control-label ta-left'>Konfirmasi Password</label>
								<div class="col-sm-8">
									<input type="password" name="password" class='form-control'>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button class='btn blue pull-right'>Simpan Akun</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop

@push('scripts')
<script type="text/javascript">
	$('#divition').on('change', function(){
        	var divition = $(this).val()
        	if (divition === '') {
	        	$('#unit').val('')
	        	$('#unit').prop('disabled', true)
        	} else {
	        	$('#unit').prop('disabled', false)
	        	$('#unit').val('')
	        	$('#unit').find('option').hide()
	        	$('#unit').find('option:first').show()
	        	$('#unit').find('[data-divition="' + divition + '"]').show()
        	}
        })
</script>
@endpush