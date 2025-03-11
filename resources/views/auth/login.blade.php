{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" checked>
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
 --}}


 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Eclatspad | Write, Read and Dream</title>

		<!--=====FAB ICON=======-->
		<link rel="shortcut icon" href="{{ asset('images/fav.svg') }}" type="image/x-icon" />

		<!--=====CSS=======-->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/fontawesome.css" />
		<link rel="stylesheet" href="assets/css/magnific-popup.css" />
		<link rel="stylesheet" href="assets/css/nice-select.css" />
		<link rel="stylesheet" href="assets/css/slick-slider.css" />
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
		<link rel="stylesheet" href="assets/css/aos.css" />
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
		<link rel="stylesheet" href="assets/css/mobile-menu.css" />
		<link rel="stylesheet" href="assets/css/utility.css" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<!--=====JQUERY=======-->
		<script src="assets/js/jquery-3-7-1.min.js"></script>
	</head>
	<body>
		{{-- <div class="paginacontainer">
			<div class="progress-wrap">
				<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
					<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
				</svg>
			</div>
		</div> --}}

		<!--=====progress END=======-->

		<!--=====PRELOADER START=======-->

		

		<!--=====PRELOADER START=======-->

		<!-- search popup start -->
		
		<!-- search popup end -->

		<!--=====HEADER START=======-->
		

		<!--=====HEADER END=======-->

		<!--=====Mobile header start=======-->
		{{-- <div class="mobile-header mobile-header-main d-block d-lg-none">
			<div class="container-fluid">
				<div class="col-12">
					<div class="mobile-header-elements">
						<div class="mobile-logo">
							<a href="index1.html"><img src="assets/img/logo/header-logo1.png" alt="vexon" /></a>
						</div>
						<div class="mobile-nav-icon">
							<i class="fa-duotone fa-bars-staggered"></i>
						</div>
					</div>
				</div>
			</div>
		</div> --}}

		

		<!--=====Mobile header end=======-->

		<!--===== CONTENT AREA START=======-->

		<div class="login-page sp bg-cover" style="background-image: url(assets/img/bg/login-page-bg.jpg)">
			<div class="container">
				
				<div class="row">
					
					<div class="col-lg-5 m-auto">
						<center>
						<a href="{{url('/')}}">
							<img src="{{ asset('images/eclatspad_logo.png')}}" alt="eclatspad" height="68" />
						</a>
						</center>
						<div class="login-form">
							<h3>Welcome Back</h3>
							<p>Please fill your email and password to sign in.</p>
							<form method="POST" action="{{ route('login') }}">
                                @csrf
								<div class="mb-3">
                                    <label class="form-label" for="dm-post-add-title">Email Address</label>
                                    <input type="email" name="email" class="form-control" required id="dm-post-add-title" placeholder="Enter your email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="dm-post-add-title">Password</label>
                                    <input type="password" name="password" class="form-control" required id="dm-post-add-title" placeholder="Enter password">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

								
                                <input id="remember_me" type="hidden" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" value="1">
                				

								<div class="d-grid gap-2">
									<button class="btn btn-primary theme-btn1" type="submit">Sign In</button>
								</div>

                                <div class="text-center">
                                    <p class="text">Don't have an account? <a href="{{ url('register') }}">Sign Up Today.</a></p>
									@if (Route::has('password.request'))
										<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
											{{ __('Forgot your password?') }}
										</a>
									@endif
                                </div>
								<div class="text-center">
									<p class="or"><span>Or</span></p>
									<div class="d-grid gap-2">
										<a href="{{  route('auth.google') }}" class="btn btn-outline-secondary"> <img src="assets/img/icons/google.svg" alt="vexon" />   Sign In With Google</a>
									</div>
	
									{{-- <a href="{{  route('auth.google') }}" class="google-btn"><img src="assets/img/icons/google.svg" alt="vexon" /> </a> --}}
									{{-- <a href="#" class="google-btn mt-20"><img src="assets/img/icons/facebook.svg" alt="vexon" /> Sign Up With Facebook</a> --}}
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--===== CONTENT AREA END=======-->

		<!--=== js === -->
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/fontawesome.js"></script>
		<script src="assets/js/mobile-menu.js"></script>
		<script src="assets/js/jquery.magnific-popup.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/jquery.countup.js"></script>
		<script src="assets/js/slick-slider.js"></script>
		<script src="assets/js/circle-progress.js"></script>
		<script src="assets/js/jquery.nice-select.js"></script>
		<script src="assets/js/gsap.min.js"></script>
		<script src="assets/js/ScrollTrigger.min.js"></script>
		<script src="assets/js/swiper-bundle.js"></script>
		<script src="assets/js/Splitetext.js"></script>
		<script src="assets/js/text-animation.js"></script>
		<script src="assets/js/aos.js"></script>
		<script src="assets/js/SmoothScroll.js"></script>
		<script src="assets/js/jaquery-ripples.js"></script>
		<script src="assets/js/jquery.lineProgressbar.js"></script>
		<script src="assets/js/animation.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>
