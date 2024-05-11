<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>e-Recruitment Aerofood</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

	<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
	
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	{{-- <link href="{{ asset('css/bs_new/bootstrap.min.css') }}" rel="stylesheet"> --}}


	@stack('styles')
	<link href="{{ asset('css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/rstapn.css') }}" rel="stylesheet">
	<link href="{{ asset('css/summernote.css') }}" rel="stylesheet">

	<!-- DATATABLE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/datatable/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/datatable/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/button/css/buttons.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/responsive/css/responsive.dataTables.min.css') }}">

	<!-- JQUERY STEP -->
    <!-- <link rel="stylesheet" href="{{asset('jquery-step/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('jquery-step/css/jquery.steps.css')}}"> -->

    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/summernote.js')}}"></script> 
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js" ></script>

    <script type="text/javascript" src="{{ asset('datatable/datatable/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('datatable/button/js/dataTables.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatable/button/js/buttons.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatable/jszip/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatable/button/js/buttons.html5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatable/button/js/buttons.print.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatable/button/js/buttons.colVis.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatable/responsive/js/dataTables.responsive.min.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('datatable/responsive/js/responsive.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatable/responsive/js/dataTables.responsive.js') }}"></script> -->
    <!-- ECHART -->
	
	<!-- JQUERY STEP -->
    <!-- <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>    
    <script src="{{asset('jquery-step/jquery.cookie-1.3.1.js')}}"></script>
    <script src="{{asset('jquery-step/jquery.steps.js')}}"></script> -->
</head>
<body>
	<div id="dashboard">

		{{-- web view menu --}}
		<nav class="sidebar hidden-xs">
		    <div style="position:relative;height:100vh;">
                <div class="logo">
                    <a class="navbar-brand" href="{{route('admin-dashboard')}}"><img src="{{asset('img/logo-white.png')}}" class="img-responsive"></a>
                </div>	
                <ul>
                    @php ($route = Route::currentRouteName())
                    <li class="{{ $route == 'admin-dashboard' ? 'active' : ''}}"><a href="{{route('admin-dashboard')}}"><i class="fa fa-home"></i>Home</a></li>
                    <li class="{{ $route == 'dashboard-jobs' || $route == 'create-job' || $route == 'detail-job' ? 'active' : ''}}"><a href="{{route('dashboard-jobs')}}"><i class="fa fa-briefcase"></i>Lowongan</a></li>
                    <li class="{{ $route == 'dashboard-candidate' || $route == 'detail-candidate' ? 'active' : ''}}"><a href="{{route('dashboard-candidate')}}"><i class="fa fa-list-ul"></i>Kandidat</a></li>
                    <li class="{{ $route == 'dashboard-keahlian' || $route == 'detail-keahlian' ? 'active' : ''}}"><a href="{{route('dashboard-keahlian')}}"><i class="fa fa-list-ul"></i>Keahlian</a></li>
                    <li class="{{ $route == 'dashboard-soal' || $route == 'dashboard-create-soal' ? 'active' : ''}}"><a href="{{route('dashboard-soal')}}"><i class="fa fa-list-ul"></i>Master Soal</a></li>
                    <li class="{{ $route == 'dashboard-profile' ? 'active' : ''}}"><a href="{{route('dashboard-profile')}}"><i class="fa fa-gear"></i>Profil</a></li>
                    @if(session('unit') == 1)
                        <li class="{{ $route == 'dashboard-account' || $route == 'detail-account' ? 'active' : ''}}"><a href="{{route('dashboard-account')}}"><i class="fa fa-user"></i>Akun</a></li>
                    @endif
                </ul>
                <div style="position:absolute;bottom:0px;left:50%;margin-left:-100px; width:200px; color:#666;text-align:center;background-color:#22262E;padding:10px;"><span class="fs-12">Copyright &copy; 2018<br>Aerofood Indonesia</span></div>
            </div>
		</nav>
		
		{{-- mobile menu --}}
	    <nav class="navbar navbar-default visible-xs-block nav-mobile-erec">
	        <div class="container-fluid">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="{{route('admin-dashboard')}}" style="padding-top: 5px !important;"><img src="{{asset('img/logo-white-only.png')}}" class="img-responsive" style="height:37px; "></a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="overflow: hidden;">
	                <ul class="nav navbar-nav mar-t-0-m mar-b-0-m" style="background: #2e333e;">
	                    @php ($route = Route::currentRouteName())
	                    <li class="{{ $route == 'admin-dashboard' ? 'active' : ''}}"><a href="{{route('admin-dashboard')}}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
	                    <li class="{{ $route == 'dashboard-jobs' || $route == 'create-job' || $route == 'detail-job' ? 'active' : ''}}"><a href="{{route('dashboard-jobs')}}"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Lowongan</a></li>
	                    <li class="{{ $route == 'dashboard-candidate' || $route == 'detail-candidate' ? 'active' : ''}}"><a href="{{route('dashboard-candidate')}}"><i class="fa fa-list-ul"></i>&nbsp;&nbsp;Kandidat</a></li>
						<li class="{{ $route == 'dashboard-keahlian' || $route == 'detail-keahlian' ? 'active' : ''}}"><a href="{{route('dashboard-keahlian')}}"><i class="fa fa-list-ul"></i>Keahlian</a></li>
						<li class="{{ $route == 'dashboard-soal' || $route == 'dashboard-create-soal' ? 'active' : ''}}"><a href="{{route('dashboard-soal')}}"><i class="fa fa-list-ul"></i>Master Soal</a></li>
	                    <li class="{{ $route == 'dashboard-profile' ? 'active' : ''}}"><a href="{{route('dashboard-profile')}}"><i class="fa fa-gear"></i>&nbsp;&nbsp;Profil</a></li>
	                    @if(session('unit') == 1)
	                        <li class="{{ $route == 'dashboard-account' || $route == 'detail-account' ? 'active' : ''}}"><a href="{{route('dashboard-account')}}"><i class="fa fa-user"></i>&nbsp;&nbsp;Akun</a></li>
	                    @endif
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container-fluid -->
	    </nav>

		{{-- view profile --}}
		<div class="dashboard-right admin-erec" style="min-height: 100vh;">
			<nav class="navbar navbar-default navbar-transparent navbar-general" style="border-radius:0px;">
			  <div class="container-fluid">

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse visible-xs-block pad-l-2em-m pad-r-2em-m" id="bs-example-navbar-collapse-1">
			      <div class="nav navbar-nav mar-b-0-m">
			        <h4 class="fs-12"><a href="{{route('admin-dashboard')}}"><span style="opacity: 0.5;">Dashboard</span></a>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;@yield('breadcrumb')</h4>
			      </div>
			      <div class="nav navbar-nav navbar-right mar-t-0-m">
			      	<div style="display:table;height: 50px;">
			      		<div style="display:table-cell;vertical-align:middle;">
			      			<div style="margin-right:10px;">
				      			<select class='form-control' id='unit' name='unit' style="text-transform: uppercase !important;">
				      				@foreach(session('units') as $unit)
										<option style="text-transform: uppercase !important;" value="{{$unit->id}}" {{session('unit') == $unit->id? "selected = 'selected'" : "" }}>{{$unit->unit}}</option>
									@endforeach
								</select>
							 </div>
			      		</div>
			      		<div style="display:table-cell;vertical-align:middle;">
			      			<div class="dropdown">
							  <button class="btn btn-default dropdown-toggle" style="background:#dcdcdc; line-height: 20px !important;" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    <i class="fa fa-user"></i>&nbsp;&nbsp;{{Auth::user()->name}}&nbsp;<span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="border:none;">
							    <li><a href="{{route('dashboard-profile')}}"><i class="fa fa-user"></i>&nbsp;&nbsp;Profil</a></li>
							    <li><a href="{{route('dashboard-profile')}}"><i class="fa fa-unlock-alt"></i>&nbsp;&nbsp;Ubah Password</a></li>
							    <li role="separator" class="divider" style="margin:0px;"></li>
							    <li style="background:#C12E27;"><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a></li>
							  </ul>
							</div>
			      		</div>
			      	</div>
			      	
			      </div>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			<div class="content">
				@yield('content')
			</div>
			<div class="loading-screen">
				<div class="container-fluid">
					<div class="row text-center">
						<i class="fa fa-spinner fa-pulse"></i><br>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="visible-xs-block">
		<div style="color: #666;text-align: center;background-color: #22262E;padding: 20px;display: inline-block; width: 100%;">Copyright © 2018 PT Aerofood Indonesia</div>
	</div>	

	<script>
		$(document).ready(function(){
			$('#unit').change(function(){
				var od = [];
				od['unit'] = $('#unit').val();
				$.ajax({
					type: "GET",
					data: {unit: $('#unit').val()},
					url: "{{url('/admin-dashboard/changeUnit')}}",
					dataType: 'json',
					success: function(data){
						//alert($('#unit').val() + data);
						location.reload();
					}
				});
			});

			

		});

		var ckEditorID;

		ckEditorID = 'description';

		function fnConsolePrint()
		{
		  //console.log($('#' + ckEditorID).val());
		  console.log(CKEDITOR.instances[ckEditorID].getData());
		}
		CKEDITOR.config.forcePasteAsPlainText = true;
		CKEDITOR.replace( ckEditorID,
	    {
			toolbar: [
				{ name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },
				{ name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
				{ name: 'scripts', items: [ 'Subscript', 'Superscript' ] },
				{ name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
				{ name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
				{ name: 'links', items: [ 'Link', 'Unlink' ] },
				{ name: 'insert', items: [ 'Image'] },
				{ name: 'spell', items: [ 'jQuerySpellChecker' ] },
				{ name: 'table', items: [ 'Table' ] }
			],

	        /*toolbar :
	        [
	          {
	            items : [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ]
	          },
	          {
	            items : [ 'Format']
	          },
	          {
	            items : [ 'Link','Unlink' ]
	          },
	          {
	            items : [ 'Indent','Outdent','-','BulletedList','NumberedList']
	          },
	          {
	            items : [ 'Undo','Redo']
	          },
	          { 
	          	items: ['colors'] 
	          },
	        ]*/

	    })

		$('.collapse').collapse({'toggle': false});		 
	
	</script>
	@stack('scripts')
</body>
</html>