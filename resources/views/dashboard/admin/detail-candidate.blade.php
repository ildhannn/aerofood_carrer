@extends('layouts.dashboard')

@section('breadcrumb')
	<b><a href="{{route('dashboard-candidate')}}">Kandidat</a></b> &gt; Mukti Unggul Sejati
@stop


@section('content')
<div class="panel candidate-profile">
	<div class="profile-header">
		<div class="container-fluid">
			<div class="general-info row">
				<div class="profile-pic col-md-2">
					<img src="{{asset('img/no-pic.jpg')}}" class='img-responsive'>

					<b>Kelengkapan profil</b>
					<div class="progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
					    60%
					  </div>
					</div>
				</div>
				<div class="col-md-10">
					<div class="row">
						<div class="info pull-left">
							<h3>Mukti Unggul Sejati</h3>
							<span><b>S1 Teknologi Informasi</b></span>
						</div>
						<div class="pull-left">
							 <button class='btn blue'>Undang Kandidat</button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="item"><i class="fa fa-venus-mars"></i> Laki-laki</div>
							<div class="item"><i class="fa fa-birthday-cake"></i> 29 Juli 1993 (24 Tahun)</div>
							<div class="item"><i class="fa fa-heart-o"></i> Belum menikah</div>
							<div class="item"><i class="fa fa-money"></i> 8 juta</div>
						</div>
						<div class="col-md-6">
							<div class="item"><i class="fa fa-envelope"></i> mukti.unggul.sejati@gmail.com</div>
							<div class="item"><i class="fa fa-phone"></i> 08976252931</div>
							<div class="item"><i class="fa fa-location-arrow"></i> Jl Al hidayah Gg boni</div>
							<div class="item"><i class="fa fa-map-marker"></i> DKI Jakarta</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="profile-content">
		<h4>Ringkasan</h4>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ex enim, laoreet et elit a, elementum iaculis dui. Integer facilisis at tortor ut sollicitudin. Fusce nibh tellus, porta eu sem fermentum, sagittis fermentum felis. Fusce ac neque eget risus congue dignissim. Sed velit ante, elementum vel tincidunt at, aliquam in dui. In mattis facilisis sem eu tristique. Duis facilisis metus sed bibendum finibus. Suspendisse nec magna ultricies mi semper eleifend. Fusce mi ex, malesuada non sapien at, porttitor consectetur odio. Integer ultricies nisi vitae erat viverra varius. Morbi mattis, lectus eu vehicula consequat, sem magna commodo mauris, consectetur porta lacus quam et elit. Sed euismod diam diam, et elementum leo ultricies nec. Fusce eu tellus dui.
					</p>
					<p>
						Praesent rhoncus augue nec tortor rhoncus, et ultrices nibh ornare. Pellentesque eu augue ac dui tincidunt tempor. Pellentesque consectetur turpis felis, a sodales eros mattis at. Aliquam sit amet lacus vel diam euismod bibendum id eget erat. Phasellus venenatis ac velit at pharetra. Nam sit amet dolor nec purus gravida tincidunt. Donec sed pretium nisi, ut mattis elit. Morbi ut erat quam. Nam sit amet condimentum metus.
					</p>
				</div>
			</div>
		</div>
		<h4>Riwayat Pekerjaan</h4>
		<div class="container-fluid">
			<div class="general-info row">
				<div class="item col-md-12">
					<h5><big><b>PT Meetchange Kolaborasi</b></big><br>sebagai FrontEnd Developer <br><sub>(Desember 2016 - Desember 2017)</sub></h5>

					<p>
						Praesent rhoncus augue nec tortor rhoncus, et ultrices nibh ornare. Pellentesque eu augue ac dui tincidunt tempor. Pellentesque consectetur turpis felis, a sodales eros mattis at. Aliquam sit amet lacus vel diam euismod bibendum id eget erat. Phasellus venenatis ac velit at pharetra. Nam sit amet dolor nec purus gravida tincidunt. Donec sed pretium nisi, ut mattis elit. Morbi ut erat quam. Nam sit amet condimentum metus.
					</p>
				</div>

				<div class="item col-md-12">
					<h5><big><b>PT Meetchange Kolaborasi</b></big><br>sebagai FrontEnd Developer <br><sub>(Desember 2016 - Desember 2017)</sub></h5>

					<p>
						Praesent rhoncus augue nec tortor rhoncus, et ultrices nibh ornare. Pellentesque eu augue ac dui tincidunt tempor. Pellentesque consectetur turpis felis, a sodales eros mattis at. Aliquam sit amet lacus vel diam euismod bibendum id eget erat. Phasellus venenatis ac velit at pharetra. Nam sit amet dolor nec purus gravida tincidunt. Donec sed pretium nisi, ut mattis elit. Morbi ut erat quam. Nam sit amet condimentum metus.
					</p>
				</div>

				<div class="item col-md-12">
					<h5><big><b>PT Meetchange Kolaborasi</b></big><br>sebagai FrontEnd Developer <br><sub>(Desember 2016 - Desember 2017)</sub></h5>

					<p>
						Praesent rhoncus augue nec tortor rhoncus, et ultrices nibh ornare. Pellentesque eu augue ac dui tincidunt tempor. Pellentesque consectetur turpis felis, a sodales eros mattis at. Aliquam sit amet lacus vel diam euismod bibendum id eget erat. Phasellus venenatis ac velit at pharetra. Nam sit amet dolor nec purus gravida tincidunt. Donec sed pretium nisi, ut mattis elit. Morbi ut erat quam. Nam sit amet condimentum metus.
					</p>
				</div>
			</div>
		</div>
		<h4>Riwayat Pendidikan</h4>
		<div class="container-fluid">
			<div class="general-info row">
				<div class="item col-md-12">
					<h5><big><b>Universitas Indonesia</b></big><br>Sistem Informasi <br><sub>(2011-2015)</sub></h5>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@push('scripts')
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endpush