@extends('layouts.dashboard')

@section('breadcrumb')
	<b>Akun</b>
@stop


@section('content')
<div class="lists candidate accounts">
		<!-- <div class='edit-job'>
			<a href="{{route('dashboard-create-account')}}" class='btn blue'><i class="fa fa-plus"></i> Tambah akun</a>
		</div> -->
	<div class="list-content">
<!-- 		<div class="list-filter">
	<div class="container-fluid">
		<div class="row">
			<form class="form-inline">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Cari nama akun" />
				</div>
				<div class="form-group pull-right">
					<label>Urutkan</label>
					<select class=form-control>
						<option>Terbaru</option>
						<option>Terlama</option>
						<option>Status</option>
					</select>
					<select class=form-control>
						<option>Pilih Lokasi</option>
						<option>Jakarta</option>
						<option>Jawa Tengah</option>
					</select>
				</div>
			</form>
		</div>
	</div>
</div> -->
		<div class="header-sub">
			<div class="va-table width-100">
				<div class="va-middle width-50">UBAH PROFIL</div>
				<div class="va-middle width-50 ta-right">
					<div><a href="{{route('dashboard-create-account')}}" class='btn blue' style="width: auto;"><i class="fa fa-plus"></i> Tambah akun</a></div>
				</div>
			</div>
		</div>
		<div class="list-item">
			<!-- <div class="item item-header">
				<div class="container-fluid">
					<div class="user-info">Nama</div>
					<div class="user-info">Email</div>
					<div class="user-info">Divisi</div>
					<div class="user-info">Unit</div>
					<div class="user-info">
						&nbsp;
					</div>
				</div>
			</div> -->
			
			<div class="item">
				<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="text-align:center;background:#dcdcdc;    ">
                              Konfirmasi Hapus Akun
                            </div>
                            <div class="modal-body" style="text-align:center">
                                <span style="text-transform: capitalize;">Anda yakin akan menghapus akun <span id='namaAkun'></span>?</span>
                            </div>
                            <div class="modal-footer">

                                <form method="POST" action="{{route('delete-account')}}">
									{{csrf_field()}}
									<input type="hidden" id='inputID' name="id" value='' class='form-control'>
                                	<a class='btn btn-danger cancel-apply' href='#' style='width: 100px;'><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
									<button class='btn btn-success' type="submit">Hapus Akun</button>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
				<table id="tabel-akun" class="table table-striped table-bordered row-border order-column" style="width:100%">
		            <thead>
		                <tr>
		                    <th width="20%">NAMA</th>
		                    <th width="20%">EMAIL</th>
		                    <th width="10%">POSISI</th>
		                    <th width="10%">UNIT</th>
		                    <th width="5%">ACTION</th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach($admins as $admin)
		            	@if($admin->user->status == 1)
		            	<tr>
		                    <td><div>{{$admin->user->name}}</div></td>
		                    <td><div><i class="fa fa-envelope"></i> {{$admin->user->email}}</div></td>
		                    <td><div>{{$admin->divition->divition ?: '-'}}</div></td>
		                    <td><div>{{$admin->unit ? $admin->unit->unit : '-'}}</div></td>
		                    <td align="center">
		                    	<a href="{{route('dashboard-edit-account', $admin->id)}}" data-toggle="tooltip" title="Ubah"><span class="btn btn-primary"><i class="fa fa-pencil"></i></span></a>
		                    	<a onclick="deleteAccount({{$admin->user->id}},'{{$admin->user->name}}')" class='deleteAccount' data-toggle="tooltip" title="Hapus"><span class="btn btn-danger"><i class="fa fa-close"></i></span></a>
		                    </td>
		                </tr>
		                @endif
		            	@endforeach
		            </tbody>
		        </table>

				<!-- <div class="container-fluid">
					<div class="user-info">{{$admin->user->name}}</div>
					<div class="user-info"><i class="fa fa-envelope"></i> {{$admin->user->email}}</div>
					<div class="user-info">{{$admin->divition->divition ?: '-'}}</div>
					<div class="user-info">{{$admin->unit ? $admin->unit->unit : '-'}}</div>
				</div>
				<div class="action">
					<div class="dropdown">
					  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    <i class="fa fa-circle"></i>
					    <i class="fa fa-circle"></i>
					    <i class="fa fa-circle"></i>
					  </button>
					  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
					    <li><a href="{{route('dashboard-edit-account', $admin->id)}}"><i class="fa fa-pencil"></i> Ubah</a></li>
					    <li><a href="#"><i class="fa fa-close"></i> Hapus</a></li>
					  </ul>
					</div>
				</div> -->
			</div>
			
		</div>
	</div>
</div>
@stop

@push('scripts')
<script type="text/javascript">
$(function () {
	$('[data-toggle="tooltip"]').tooltip()

	$('.cancel-apply').click(function(e) {
		$('#konfirmasi').modal('hide');
	});
})

function deleteAccount(id, nama){
	$('#inputID').val(id);
	$('#namaAkun').html(nama);
	$('#konfirmasi').modal('show');
}

$(function(){
    var tablejobs = $('#tabel-akun').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis'],
        /*scrollX: true,
        scrollCollapse: true,*/
        paging: true
    });

    /*new $.fn.dataTable.FixedHeader(table);*/

    tablejobs.buttons().container()
        .appendTo('#tabel-akun_wrapper .col-sm-6:eq(0)');
})
</script>
@endpush