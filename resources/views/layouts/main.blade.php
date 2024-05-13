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
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/rstapn.css') }}" rel="stylesheet">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js" ></script>
	@stack('styles')
</head>
<body class="erec">
	@include('sweetalert::alert')
	@if( Auth::user() == null || !Auth::user()->admin)

	<nav id="navbar-erec" class="navbar navbar-default navbar-transparent {{Route::currentRouteName() != 'home' && Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register'? 'navbar-general' : ''}} {{Route::currentRouteName() == 'login' || Route::currentRouteName() == 'register' ? 'navbar-fixed-top navbar-account' : ''}} pos-rel-m">
	  <div class="container-fluid pad-r-0 pad-l-0" style="background:#31333F;">
	  	@if(Route::currentRouteName() != 'preview-job')

		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand visible-xs-block" href="{{route('home')}}"><img src="{{asset('img/logo-white-only.png')}}"></a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    @if (Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')
		    <div class="collapse navbar-collapse bg-navbar-top" id="bs-example-navbar-collapse-1">
            
                <div class="va-table" style="height:30px; width:100%; position:relative;-webkit-box-shadow: 0px 20px 30px -17px rgba(0,0,0,0.6);-moz-box-shadow: 0px 20px 30px -17px rgba(0,0,0,0.6);box-shadow: 0px 20px 30px -17px rgba(0,0,0,0.6);">
                    <div class="va-middle">
                      <div class='{{Route::currentRouteName() == "home" ? "active" : ""}} hidden-xs' style="text-align:center; margin:0 auto; position:absolute; top:10px; width:50px; left:50%; margin-left:-25px; z-index:2"><a href="{{route('home')}}"><img src="{{asset('img/logo-white-only.png')}}" height="30px"></a></div>
                      <ul class="nav navbar-nav mar-t-0-m mar-b-0-m nav-utama">
                        <!--<li class='{{Route::currentRouteName() == "home" ? "active" : ""}}'><a href="{{route('home')}}"><img src="{{asset('img/logo-white-only.png')}}" height="30px"></a></li>-->
                        <li class='{{Route::currentRouteName() == "jobs" ? "active" : ""}}'><a href="{{route('jobs')}}">Cari Lowongan&nbsp;&nbsp;<i class="fa fa-search"></i><span class="sr-only">(current)</span></a></li>
                        @if(Auth::user())
                        <li class='{{Route::currentRouteName() == "candidate-job" ? "active" : ""}}'><a href="{{route('candidate-job')}}">Beranda&nbsp;&nbsp;<i class="fa fa-home"></i></a></li>
                        <li class='{{Route::currentRouteName() == "candidate-profile" ? "active" : ""}}'><a href="{{route('candidate-profile')}}">Profile&nbsp;&nbsp;<i class="fa fa-user"></i></a></li>
                        @endif
                        <li class="{{Route::currentRouteName() == 'faq' ? 'active' : ''}}"><a href="{{route('faq')}}">FAQ&nbsp;&nbsp;<i class="fa fa-info-circle"></i></a></li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right mar-t-0-m mar-b-0-m nav-utama-d-l">
                          @guest
                            <li><a href="{{route('register')}}" class="bg-daftar-green">Daftar&nbsp;&nbsp;<i class="fa fa-user-plus"></i></a></li>
                            <li><a href="{{route('login')}}" class="bg-login-grey">Masuk&nbsp;&nbsp;<i class="fa fa-sign-in"></i></a></li>
                          @endguest
                          @auth
                            <li class="dropdown">
                              <button class="btn dropdown-toggle mar-l-12px-m width-100-m" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="text-align: left;">
                                <i class="fa fa-user"></i>&nbsp;&nbsp;{{Auth::user()->name}}&nbsp;&nbsp;
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a></li>
                              </ul>
                            </li>
                          @endauth
                      </ul>
                    </div>
                </div>
		    </div><!-- /.navbar-collapse -->
		    @endif
	    @endif
	  </div><!-- /.container-fluid -->
	</nav>
	@endif
	<!-- <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-chevron-up"></i></a> -->
	@yield('content')


	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	
	<script>
		var delay = (function(){
		    var timer = 0;
		    return function(callback, ms){
		        clearTimeout (timer);
		        timer = setTimeout(callback, ms);
		    };
		})();



		$(window).resize(function() {
			var pause = 100;

	        delay(function() {
	        	if( "{{Route::currentRouteName()}}" == 'login' || "{{Route::currentRouteName()}}" == 'register'){

		            var width = $(window).width();
		            if( width >= 768 && width <= 959 ) {
		                // code for tablet view
		            } else if( width >= 480 && width <= 767 ) {
		                // code for mobile landscape
		            } else if( width <= 479 ) {
		                // code for mobile portrait
		                $('#navbar-erec').hide();
		            }
	        	}
	        }, pause );
	    });

	    $(window).resize();
	</script>

	@if (Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')
	<script>

		

    	
	</script>
	@stack('scripts')
	<!--<footer class='dark-grey' style="background:#09283D !important;">-->
		@if(Auth::user() == null || !Auth::user()->admin)
		<footer class='dark-grey' style="background:url('{{asset('img/bg-noline.jpg')}}') center center no-repeat;background-size:cover; bottom: 0; width: 100%;">
			<div class="container pad-l-0-m pad-r-0-m">
				<div class="col-md-3">
	                <div class="va-table mar-0-auto-m height-130 height-auto-m mar-b-2em-m">
	                    <div class="va-middle">
	                        <div><img src="{{asset('img/logo-white.png')}}"></div>
	                    </div>
	                </div>				
				</div>
				<div class="col-md-5 menu-footer">
	                <div class="va-table fs-13 height-130 height-auto-m mar-b-2em-m" style="width:100%; text-align: center; margin:0 auto;">
	                    <div class="va-middle">                        
				            <div class="pad-r-1em"><a href="{{route('jobs')}}">Cari Lowongan</a></div>
	                    </div>
	                    <div class="va-middle">                        
				            <div class="pad-r-1em"><a href="{{route('faq')}}">FAQ</a></div>
	                    </div>
	                    <div class="va-middle">                        
				            <div class="pad-r-1em"><a href="{{route('register')}}">Daftar</a></div>
	                    </div>
	                    <div class="va-middle">                        
				            <div class="pad-r-1em"><a href="{{route('login')}}">Masuk</a></div>
	                    </div>
	                </div>
	                <div class="va-table fs-13 mar-b-1em-m" style="width:100%; text-align: center; margin:0 auto;">
	                    <div style="color:rgba(255,255,255,0.5);" class="fs-12 va-middle">Copyright &copy; PT Aerofood Indonesia 2018</div>
	                </div>
	                
					<!--<div class="site">
						<a href="#">Lorem Ipsum</a>
					</div>
					<div class="site">
						<a href="#">Dolor sit</a>
					</div>
					<div class="site">
						<a href="#">Amet</a>
					</div>
					<div class="site">
						<a href="#">Link</a>
					</div>
					<div class="site">
						<a href="#">Lorem Ipsum</a>
					</div>
					<div class="site">
						<a href="#">Dolor sit</a>
					</div>
					<div class="site">
						<a href="#">Amet</a>
					</div>
					<div class="site">
						<a href="#">Link</a>
					</div>-->
				</div>
				<div class="col-md-4">
	                <div class="va-table" style="height:140px;">
	                    <div class="va-middle">
	                        <div class="fs-13 ta-center-m" style="color:rgba(255,255,255,0.5);">Boasting 40 years of experience as an internationally recognized airline catering provider, Aerofood ACS being a part of national flag carrier Garuda Indonesia has maintained its reputation in delivering premium services with best-in-class food and beverage products.<!-- Aerowisata Group which is also a holding company of Garuda Indonesia Group. Aerofood is a company that serves the procurement of products and logistics needs in flight with domestic and international sizes. --></div>
	                    </div>
	                </div>				
				</div>
			</div>
			
		</footer>
		@endif
	@endif

	<!-- /* BACK TO TOP */ -->
	<a href="#0" class="cd-top js-cd-top">Top</a>
	<script>
		(function(){
		    // Back to Top - by CodyHouse.co
			var backTop = document.getElementsByClassName('js-cd-top')[0],
				// browser window scroll (in pixels) after which the "back to top" link is shown
				offset = 300,
				//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
				offsetOpacity = 1200,
				scrollDuration = 700
				scrolling = false;
			if( backTop ) {
				//update back to top visibility on scrolling
				window.addEventListener("scroll", function(event) {
					if( !scrolling ) {
						scrolling = true;
						(!window.requestAnimationFrame) ? setTimeout(checkBackToTop, 250) : window.requestAnimationFrame(checkBackToTop);
					}
				});
				//smooth scroll to top
				backTop.addEventListener('click', function(event) {
					event.preventDefault();
					(!window.requestAnimationFrame) ? window.scrollTo(0, 0) : scrollTop(scrollDuration);
				});
			}

			function checkBackToTop() {
				var windowTop = window.scrollY || document.documentElement.scrollTop;
				( windowTop > offset ) ? addClass(backTop, 'cd-top--show') : removeClass(backTop, 'cd-top--show', 'cd-top--fade-out');
				( windowTop > offsetOpacity ) && addClass(backTop, 'cd-top--fade-out');
				scrolling = false;
			}
			
			function scrollTop(duration) {
			    var start = window.scrollY || document.documentElement.scrollTop,
			        currentTime = null;
			        
			    var animateScroll = function(timestamp){
			    	if (!currentTime) currentTime = timestamp;        
			        var progress = timestamp - currentTime;
			        var val = Math.max(Math.easeInOutQuad(progress, start, -start, duration), 0);
			        window.scrollTo(0, val);
			        if(progress < duration) {
			            window.requestAnimationFrame(animateScroll);
			        }
			    };

			    window.requestAnimationFrame(animateScroll);
			}

			Math.easeInOutQuad = function (t, b, c, d) {
		 		t /= d/2;
				if (t < 1) return c/2*t*t + b;
				t--;
				return -c/2 * (t*(t-2) - 1) + b;
			};

			//class manipulations - needed if classList is not supported
			function hasClass(el, className) {
			  	if (el.classList) return el.classList.contains(className);
			  	else return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
			}
			function addClass(el, className) {
				var classList = className.split(' ');
			 	if (el.classList) el.classList.add(classList[0]);
			 	else if (!hasClass(el, classList[0])) el.className += " " + classList[0];
			 	if (classList.length > 1) addClass(el, classList.slice(1).join(' '));
			}
			function removeClass(el, className) {
				var classList = className.split(' ');
			  	if (el.classList) el.classList.remove(classList[0]);	
			  	else if(hasClass(el, classList[0])) {
			  		var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
			  		el.className=el.className.replace(reg, ' ');
			  	}
			  	if (classList.length > 1) removeClass(el, classList.slice(1).join(' '));
			}
		})();
	</script>
</body>
</html>