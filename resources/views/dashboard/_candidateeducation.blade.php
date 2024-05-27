<div class="table-responsive">
	<table id="tabel-akun" class="table table-striped table-bordered row-border order-column" style="width:100%">
		<thead>
			<tr>
				<th width="20%">NAMA</th>
				<th width="20%">EMAIL</th>
				<th width="10%">TELEPON</th>
				<th width="10%">USIA</th>
			</tr>
		</thead>
		<tbody>
			@foreach($list as $r)
			<tr>
				<td><div>{{$r->name}}</div></td>
				<td><div><i class="fa fa-envelope"></i> {{$r->email}}</div></td>
				<td><div>{{$r->phone}}</div></td>
				<td><div>{{$r->age }} Tahun</div></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<script type="text/javascript">
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
