{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Eclatspad | Write, Read and Dream</title>

		<!--=====FAB ICON=======-->
		<link rel="shortcut icon" href="assets/img/logo/title1.svg" type="image/x-icon" />

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

		<!--===== CONTENT AREA START=======-->

		<div class="login-page sp bg-cover" style="background-image: url(assets/img/bg/login-page-bg.jpg)">
			<div class="container">
				
				<div class="row">
					<div class="col-lg-5 m-auto">
						<div class="login-form">
							<h3>Forgot Password</h3>
							
                            
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

							<form method="POST" action="{{ route('password.email') }}">
                                @csrf
                               

                                <div class="mb-3 mt-3">
                                    <label class="form-label" for="dm-post-add-title">Enter Email Address</label>
                                    <input type="email" name="email" class="form-control" required id="dm-post-add-title" placeholder="Enter your email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                

                                <div class="button mt-30">
									<button type="submit" class="theme-btn1">Send Reset Link </button>
								</div>
                               
								{{-- <div class="text-center">
									<p class="text">Don’t have an account? <a href="#">Sign Up Today.</a> <br /><a href="#">Forgot Password</a></p>
									<p class="or"><span>Or</span></p>
									<a href="#" class="google-btn"><img src="assets/img/icons/google.svg" alt="vexon" /> Sign Up With Google</a>
									<a href="#" class="google-btn mt-20"><img src="assets/img/icons/facebook.svg" alt="vexon" /> Sign Up With Facebook</a>
								</div> --}}
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
