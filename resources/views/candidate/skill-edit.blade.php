<!-- @extends('layouts.candidate')

@section('profile-content')
<div class="profile-section pad-0 minHeight">
	<div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
		<div class="va-middle pad-b-1em-m ta-center-m"><h4 style=" margin:0px;"><i class="fa fa-briefcase"></i>&nbsp;PENGALAMAN KERJA</h4></div>
		<div class="va-middle dis-tab-row-m ta-right ta-center-m"><a href="{{route('candidate-experience')}}" class='btn btn-success'><i class="fa fa-chevron-left" style="width:auto !important;"></i>&nbsp;&nbsp;KEMBALI</a></div>
	</div>


	<div class="section-content">
		<form method="POST" action="{{route('update-candidate-skill')}}" class='form-horizontal'>
			
        	{{csrf_field()}}
        	<input type="hidden" name="id" value='{{$skill->id}}'>
			<div class="form-group">
				<label for="field_id" class='col-sm-3 control-label'>Bidang Keahlian</label>
				<div class="col-sm-5">
					<select class='form-control' id='field_id' name='field_id'>
						<option value=''>Pilih Bidang Keahlian</option>
						@foreach($fields as $field)
						<option value='{{$field->id}}' {{$skill->field_id == $field->id ? 'selected' : ''}}>{{$field->field}}</option>
						@endforeach
					</select>
				</div>

				@if ($errors->has('field_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('field_id') }}</strong>
                    </span>
                @endif
			</div>
			
			<div class="form-group" style="margin-top: 20px">
				<label for='skill' class="control-label col-md-2" style="font-weight:normal;">Lainnya</label>
				<div class="col-md-7">
					<div class="mb-3">
						<textarea id="skill" class="form-control" name="skill_lainnya"
							placeholder="Tulis keahlian anda dengan bidang terkait di sini" rows=5></textarea>

						@if ($errors->has('skill_lainnya'))
							<span class="help-block">
								<strong>{{ $errors->first('skill') }}</strong>
							</span>
						@endif

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-9 text-right">
					<button class='btn blue'>Simpan Keahlian</button>
				</div>
			</div>
		</form>
	</div>
</div>
@stop -->