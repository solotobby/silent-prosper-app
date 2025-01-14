{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Alias')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <select name="gender" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select> 
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
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

		{{-- <div class="mobile-sidebar d-block d-lg-none">
			<div class="logo-m">
				<a href="index.html"><img src="assets/img/logo/header-logo1.png" alt="vexon" /></a>
			</div>
			<div class="menu-close">
				<i class="fa-solid fa-xmark"></i>
			</div>
			<div class="mobile-nav">
				<ul>
					<li class="has-dropdown">
						<a href="#">Home </a>
						<ul class="sub-menu">
							<li><a href="index.html">Home 1</a></li>
							<li><a href="index2.html">Home 2</a></li>
							<li><a href="index3.html">Home 3</a></li>
							<li><a href="index4.html">Home 4</a></li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="#">Blog</a>
						<ul class="sub-menu">
							<li><a href="blog.html">Blog 01</a></li>
							<li><a href="blog2.html">Blog 02</a></li>
							<li><a href="blog3.html">Blog 03</a></li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="#">Single Posts</a>
						<ul class="sub-menu">
							<li><a href="blog-details1.html">Standard Format</a></li>
							<li><a href="blog-details2.html">Split Format</a></li>
							<li><a href="blog-details3.html">Overlay Format</a></li>
							<li><a href="blog-details-sidebar-left.html">Sidebar Left</a></li>
							<li><a href="blog-details-sidebar-right.html">Sidebar Right</a></li>
							<li><a href="blog-single.html">Single Post</a></li>
						</ul>
					</li>

					<li class="has-dropdown">
						<a href="#">Pages</a>
						<ul class="sub-menu">
							<li><a href="author.html">Author</a></li>
							<li><a href="search.html">Search Result</a></li>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="social-media.html">Social Media</a></li>
							<li><a href="404.html">404</a></li>
						</ul>
					</li>

					<li class="has-dropdown has-dropdown1">
						<a href="#" class="main">Account</a>
						<ul class="sub-menu">
							<li><a href="blog.html">Blog 01</a></li>
							<li><a href="blog2.html">Blog 02</a></li>
							<li><a href="blog-details-sidebar-left.html">Details Left</a></li>
							<li><a href="blog-details-sidebar-right.html">Details Right</a></li>
							<li><a href="blog-single.html">Single Blog</a></li>
						</ul>
					</li>
					<li><a href="contact.html">Contact Us</a></li>
				</ul>

				<div class="mobile-button">
					<a class="theme-btn1" href="contact.html">Get A Quote <i class="fa-solid fa-arrow-right"></i></a>
				</div>

				<div class="footer-contact-area1 md:pl-0 pl-20 sm:pl-0 mt-30">
					<h3 class="text-24 leading-26 font-semibold title1 pb-10">Get in touch</h3>
					<div class="contact-box d-flex">
						<div class="icon">
							<img src="assets/img/icons/footer1-icon1.svg" alt="vexon" />
						</div>
						<div class="text">
							<a href="mailto:contact@vexon.com">contact@vexon.com</a>
						</div>
					</div>

					<div class="contact-box d-flex">
						<div class="icon">
							<img src="assets/img/icons/footer1-icon2.svg" alt="vexon" />
						</div>
						<div class="text">
							<a href="#">
								123 Innovation Drive,<br />
								Tech City, ST 12345, USA
							</a>
						</div>
					</div>

					<div class="contact-box d-flex">
						<div class="icon">
							<img src="assets/img/icons/footer1-icon3.svg" alt="vexon" />
						</div>
						<div class="text">
							<a href="tel:123-456-7890">123-456-7890</a>
						</div>
					</div>
				</div>

				<div class="contact-infos">
					<h3>Our Social Network</h3>
					<ul class="social-icon">
						<li>
							<a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa-brands fa-x-twitter"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa-brands fa-youtube"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa-brands fa-instagram"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div> --}}

		<!--=====Mobile header end=======-->

		<!--===== CONTENT AREA START=======-->

		<div class="login-page sp bg-cover" style="background-image: url(assets/img/bg/login-page-bg.jpg)">
			<div class="container">
				
				<div class="row">
					<div class="col-lg-5 m-auto">
						<div class="login-form">
							<h3>Create an Account</h3>
							<p>Get started  by filling the form</p>
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

							<form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="dm-post-add-title">Name</label>
                                    <input type="text" name="name" class="form-control" id="dm-post-add-title" placeholder="Enter your name">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="dm-post-add-title">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="dm-post-add-title" placeholder="Enter your email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="dm-post-add-title">Password</label>
                                    <input type="password" name="password" class="form-control" id="dm-post-add-title" placeholder="Enter your email">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="dm-post-add-title">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="dm-post-add-title" placeholder="Enter your email">
                                    {{-- @error('email') <span class="text-danger">{{ $message }}</span> @enderror --}}
                                </div>

								
                                {{-- <div class="mb-4">
									
                                    <select name="gender" class="form-control"  required>
                                        <option value=""> Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
									
								</div> --}}

                                <div class="button mt-30">
									<button type="submit" class="theme-btn1">Sign Up</button>
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