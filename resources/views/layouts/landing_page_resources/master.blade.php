<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Eclatspad |  Write, Read and Dream</title>

        <meta name="description" content="A platform where both writers and readers can connect with each other, explore, create,  and share captivating stories.">
        <meta name="author" content="Eclatspad">
        <meta name="robots" content="index, follow, money, post, posts, comments, comment, views, view">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Eclatspad | Read, Write and Dream">
        <meta property="og:site_name" content="Payhankey">
        <meta property="og:description" content="A platform where both writers and readers can connect with each other, explore, create,  and share captivating stories.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https:eclatspad.com">
        <meta property="og:image" content="">
    

		<!--=====FAB ICON=======-->
		<link rel="shortcut icon" href="{{ asset('images/fav.svg')}}" type="image/x-icon" />

		<!--=====CSS=======-->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/slick-slider.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" />
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
		<link rel="stylesheet" href="{{ asset('assets/css/mobile-menu.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/utility.css') }} " />
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }} "/>

		<!--=====JQUERY=======-->
		<script src="{{ asset('assets/js/jquery-3-7-1.min.js') }}"></script>
		
        <meta name="google-site-verification" content="8RaIFC4lLLLKzYQN7h-kQXi7wQrmZTWXCIOhfSxIiak" />
	</head>
	
	<body>
		<div class="paginacontainer">
			<div class="progress-wrap">
				<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
					<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
				</svg>
			</div>
		</div>

		<!--=====progress END=======-->

		<!--=====PRELOADER START=======-->

		{{-- <div class="sec-preloader">
			<div class="overlay-preloader flex cac vac" id="preloader">
				<div>
					<div class="loader preloader flex vac">
						<svg width="200" height="200">
							<circle class="background" cx="90" cy="90" r="80" transform="rotate(-90, 100, 90)" />
							<circle class="outer" cx="90" cy="90" r="80" transform="rotate(-90, 100, 90)" />
						</svg>
						<span class="circle-background"></span>
						<span class="logo animated fade-in"> </span>
					</div>
				</div>
			</div>
		</div> --}}

		<!--=====PRELOADER START=======-->

		
        @include('layouts.landing_page_resources.header')

		<!--===== HERO AREA START=======-->

        @yield('content')


		<!--===== FOOTER AREA START=======-->

		@include('layouts.landing_page_resources.footer')

		<!--===== FOOTER AREA END=======-->

		<!--=== js === -->
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/fontawesome.js') }}"></script>
		<script src="{{ asset('assets/js/mobile-menu.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
		<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.countup.js') }}"></script>
		<script src="{{ asset('assets/js/slick-slider.js') }}"></script>
		<script src="{{ asset('assets/js/circle-progress.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.nice-select.js') }}"></script>
		<script src="{{ asset('assets/js/gsap.min.js') }}"></script>
		<script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
		<script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
		<script src="{{ asset('assets/js/Splitetext.js') }}"></script>
		<script src="{{ asset('assets/js/text-animation.js') }}"></script>
		<script src="{{ asset('assets/js/aos.js') }}"></script>
		<script src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
		<script src="{{ asset('assets/js/jaquery-ripples.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.lineProgressbar.js') }}"></script>
		<script src="{{ asset('assets/js/animation.js') }}"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>
	</body>
</html>
