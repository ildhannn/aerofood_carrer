@extends('layouts.dashboard')

@section('breadcrumb')
	<b>Profil</b>
@stop


@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="header-sub">
			<div class="va-table width-100">
				<div class="va-middle width-50">UBAH PROFIL</div>
				<div class="va-middle width-50 ta-right"><i class="fa fa-user-circle-o"></i></div>
			</div>
		</div>
		<div class="panel">
			<form method="POST" action="{{route('change-profile')}}" style="margin: 0px;">
				{{csrf_field()}}
				<input type="hidden" name="user_id" value='{{Auth::user()->id}}'>
				<br>
				<!-- <h3>Ubah Profil</h3> -->
				<div class="container-fluid">
					<div class="row">
						<div class="form-horizontal">
							<div class="form-group">
								<label class='col-sm-2 control-label ta-left'>Nama</label>
								<div class="col-sm-10">
									<input type="text" name="name" value='{{$user->name}}' class='form-control'>
								</div>
							</div>
							<div class="form-group">
								<label class='col-sm-2 control-label ta-left'>Email</label>
								<div class="col-sm-10">
									<input type="email" name="email" value='{{$user->email}}' class='form-control'>
								</div>
							</div>
							<div class="form-group">
								<label class='col-sm-2 control-label ta-left'>Divisi</label>
								<div class="col-sm-10">
									<select class='form-control' id='divition' name='divition_id' >
										<option value=''>Pilih Divisi</option>
										@foreach($divitions as $divition)
											<option value='{{$divition->id}}' {{$divition->id == $user->admin->divition_id ? "selected" : ""}}>{{$divition->divition}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class='col-sm-2 control-label ta-left'>Unit</label>
								<div class="col-sm-10">
									<select class='form-control'  id='unit' name='unit_id' {{$user->admin->unit_id ? '' : 'disabled'}}>
										<option value=''>Pilih Unit</option>
										@foreach($units as $unit)
											<option value='{{$unit->id}}' data-divition='{{$unit->divition_id}}' {{$unit->id == $user->admin->unit_id ? "selected" : ""}}>{{$unit->unit}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button class='btn blue pull-right'>Ubah Profil</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-12">
		<div class="header-sub">
			<div class="va-table width-100">
				<div class="va-middle width-50">UBAH PASSWORD</div>
				<div class="va-middle width-50 ta-right"><i class="fa fa-unlock-alt"></i></div>
			</div>
		</div>
		<div class="panel">	
			<form action="{{route('change-password')}}" method="POST" class="form-horizontal" style="margin: 0px;">
				<br>
				<!-- <h3>Ubah Password</h3> -->
				@if(Session::has('success'))
				<div class="alert alert-info">
					{{Session::get('success')}}
				</div>
				@endif
				<div class="container-fluid">
						{{csrf_field()}}
						<input type="hidden" name="id" value="{{$user->id}}">
						<div class="row">
							<div class="form-group">
								<label class='col-sm-4 control-label ta-left'>Password Lama</label>
								<div class="col-sm-8">
									<input type="password" name="password" class='form-control' required>
								</div>
								@if(Session::has('wrong-old-password'))
								<div class="col-sm-8">
									<label class='control-label text-danger'>{{Session::get('wrong-old-password')}}</label>
								</div>
								@endif
							</div>
							<div class="form-group">
								<label class='col-sm-4 control-label ta-left'>Password Baru</label>
								<div class="col-sm-8">
									<input type="password" name="new_password" class='form-control' required>
								</div>
								@if(Session::has('same-password'))
								<div class="col-sm-8">
									<label class='control-label text-danger'>{{Session::get('same-password')}}</label>
								</div>
								@endif
							</div>
							<div class="form-group">
								<label class='col-sm-4 control-label ta-left'>Konfirmasi Baru</label>
								<div class="col-sm-8">
									<input type="password" name="confirm_new_password" class='form-control' required>
								</div>
								@if(Session::has('same-password'))
								<div class="col-sm-8">
									<label class='control-label text-danger'>{{Session::get('same-password')}}</label>
								</div>
								@endif
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button class='btn blue pull-right'>Ubah Password</button>
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