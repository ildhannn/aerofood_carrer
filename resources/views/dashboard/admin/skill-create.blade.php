@extends('layouts.dashboard')

@section('breadcrumb')
    <b>Buat Keahlian</b>
@stop


@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="header-sub">
			<div class="va-table width-100">
				<div class="va-middle width-50">TAMBAH KEAHLIAN</div>
				<div class="va-middle width-50 ta-right">
					<div><i class="fa fa-user-plus"></i></div>
				</div>
			</div>
		</div>
		<div class="panel">
            <form method="POST" action="{{ route('store-candidate-keahlian-admin') }}" class='form-horizontal'>
				{{csrf_field()}}
				<div class="container-fluid">
					<div class="row">
						<div class="form-horizontal">
							<div class="form-group">
								<label class='col-sm-4 control-label ta-left'>Nama Keahlian</label>
								<div class="col-sm-8">
									<input type="text" name="name" value='' class='form-control' required>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class='btn blue pull-right'>Simpan</button>
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