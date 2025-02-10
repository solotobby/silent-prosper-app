<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Eclatspad | Read, Write and Dream</title>

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
		<div class="paginacontainer">
			<div class="progress-wrap">
				<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
					<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
				</svg>
			</div>
		</div>

		<!--=====progress END=======-->

		<!--=====PRELOADER START=======-->

		<div class="sec-preloader">
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
		</div>

		<!--=====PRELOADER START=======-->

		<!-- search popup start -->
		<div class="search__popup">
			<div class="container">
				<div class="row">
					<div class="col-xxl-12">
						<div class="search__wrapper">
							<div class="search__top d-flex justify-content-between align-items-center">
								<div class="search__logo">
									<a href="index.html">
										<img src="assets/img/logo/white-logo.png" alt="vexon" />
									</a>
								</div>
								<div class="search__close">
									<button type="button" class="search__close-btn search-close-btn">
										<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</button>
								</div>
							</div>
							<div class="search__form">
								<form action="#">
									<div class="search__input">
										<input class="search-input-field" type="text" placeholder="Type here to search..." />
										<span class="search-focus-border"></span>
										<button type="submit">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
											</svg>
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- search popup end -->

		<!--=====HEADER START=======-->
        <header>
			<div class="header-area header-area1 d-none d-lg-block" id="header">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="header-elements">
								<div class="site-logo">
									<a href="{{url('/')}}">
										<img src="assets/img/logo/header-logo1.png" alt="vexon" />
									</a>
								</div>

								<div class="main-menu-ex main-menu-ex1">
									<ul>
										

										<li class="dropdown-menu-parrent">
											<a href="{{ url('about')}}" class="main1">Our Story</a>
											
										</li>
                                        <li class="dropdown-menu-parrent">
											<a href="{{ url('login') }}" class="main1">Write</a>
											
										</li>
                                        <li class="dropdown-menu-parrent">
											<a href="{{ url('login') }}" class="main1">Read</a>
											
										</li>
                                        <li class="dropdown-menu-parrent">
											<a href="#" class="main1">Membership</a>
											
										</li>
                                        <li class="dropdown-menu-parrent">
											<a href="{{ url('login') }}" class="main1">Sign In</a>
											
										</li>

									</ul>
								</div>

								<div class="header1-buttons">
									
									<a class="theme-btn1" href="{{ url('register') }}">Get Started</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>


		<!--=====HEADER END=======-->

		<!--=====Mobile header start=======-->
		<div class="mobile-header mobile-header-main d-block d-lg-none">
			<div class="container-fluid">
				<div class="col-12">
					<div class="mobile-header-elements">
						<div class="mobile-logo">
							<a href="{{url('/')}}"><img src="assets/img/logo/header-logo1.png" alt="vexon" /></a>
						</div>
						<div class="mobile-nav-icon">
							<i class="fa-duotone fa-bars-staggered"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="mobile-sidebar d-block d-lg-none">
			<div class="logo-m">
				<a href="{{url('/')}}"><img src="assets/img/logo/header-logo1.png" alt="vexon" /></a>
			</div>
			<div class="menu-close">
				<i class="fa-solid fa-xmark"></i>
			</div>
			<div class="mobile-nav">
				<ul>
					
					<li class="has-dropdowns">
						<a href="#">Our Story</a>
					</li>
                    <li class="has-dropdowns">
						<a href="{{ url('login') }}">Read</a>
					</li>
                    <li class="has-dropdowns">
						<a href="{{ url('login') }}">Write</a>
					</li>
                    <li class="has-dropdowns">
						<a href="#">Membership</a>
					</li>
                    <li class="has-dropdowns">
						<a href="{{ url('login') }}">Sign In</a>
					</li>
					
					
				</ul>

				<div class="mobile-button">
					<a class="theme-btn1" href="{{ url('register') }}">Get Started <i class="fa-solid fa-arrow-right"></i></a>
				</div>

				{{-- <div class="footer-contact-area1 md:pl-0 pl-20 sm:pl-0 mt-30">
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
							<a href="#"
								>123 Innovation Drive,<br />
								Tech City, ST 12345, USA</a
							>
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
				</div> --}}

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
		</div>
		<!--=====Mobile header end=======-->

		<!--===== HERO AREA START=======-->

		<div class="inner-hero bg-cover" style="background-image: url(assets/img/bg/inner-hero-bg.jpg)">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-heading">
							{{-- <div class="page-prog">
								<a href="index.html">Home</a>
								<span><i class="fa-solid fa-angle-right"></i></span>
								<p>Blog</p>
								<span><i class="fa-solid fa-angle-right"></i></span>
								<p class="bold">Contact Us</p>
							</div> --}}
							<h1> About Us </h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--===== HERO AREA END=======-->

		<!--===== CONTACT AREA START=======-->

		<div class="contact-page-sec sp">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto">
						<div class="heading1">
							<h2 class="text-center">Welcome to Eclatspad</h2>
							<p class="mt-16"> Welcome to Éclatspad, the world’s most engaging social storytelling and reading platform, where emerging voices write and share, and readers connect with the serialized stories they love. </p>
                            <h5 class="mt-2">Our Mission</h5>
                            <p class="mt-6"> 
                               
                                At Éclatspad, we believe that stories are dynamic—they live, breathe, and have the power to transform both the storyteller and the reader. Our mission is to set stories free into a world of unbelievable possibility, empowering diverse voices to share their narratives and connect with a global community.

                            </p>
                            <h5 class="mt-2">What We Offer</h5>
                            <p class="mt-6"> 
                                •	For Our Writers: we offer a  user-friendly platform to publish your stories, hear from your audience, and build a dedicated community of readership. <br>
                                •	For Our Readers: A mind blowing library of serialized stories across various genres, allowing you to discover new worlds, new voices and immerse yourself in compelling narratives. <br>
                            </p>
                            <h5 class="mt-2">What We Offer</h5>
                            <p class="mt-6"> 
                                Éclatspad is home to vibrant readers and writers who enjoy spending countless hours every day discovering, sharing, and engaging with stories. Our platform fosters a space where diverse voices from around the world connects.

                            </p>

                            <h5 class="mt-2">Join Us</h5>
                            <p class="mt-6"> 
                                If you are an aspiring writer looking to share your story or a reader seeking your next favorite tale, Éclatspad welcomes you into our beautiful world. Join our community today and be part of a global movement that’s changing the future of entertainment through the power of storytelling.

                            </p>
                            
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--===== CONTACT AREA END=======-->

		<!--===== CTA AREA START=======-->

		<div class="cta1">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="heading1-w">
							<h2>Ready to Elevate Your Social Media Game?</h2>
							<p class="mt-16">Unlock the tools and insights you need to thrive on social media with Vexon. Join our community for expert tips, trending strategies, and resources that empower you to stand out and succeed.</p>
							<div class="form-area">
								<form action="#">
									<input type="email" placeholder="Enter Your Email" />
									<div class="button">
										<button class="theme-btn1">Get Started</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="image text-end sm:text-start md:text-start sm:mt-30 md:mt-30">
							<img src="assets/img/hero/hero1-image.png" alt="vexon" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--===== CTA AREA END=======-->

		<!--===== FOOTER AREA START=======-->

		<div class="footer1 mt-80 md:mt-40 sm:mt-40">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="logo">
							<a href="index.html"><img src="assets/img/logo/header-logo1.png" alt="vexon" /></a>
						</div>
						<div class="heading1 mt-16">
							<p>Vexon is your hub for the latest in digital innovation, technology trends, creative insights. Our mission is to empower creators, businesses, valuable resource.</p>
							<div class="footer-social1">
								<ul>
									<li>
										<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa-brands fa-instagram"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa-regular fa-basketball"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa-brands fa-behance"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 mb-50 sm:mb-30 sm:mt-30">
						<div class="footer-list1 ml-80 md:ml-0 sm:ml-0">
							<h3>Explore Categories</h3>
							<ul>
								<li><a href="#">Digital Marketing </a></li>
								<li><a href="#">Ai & Technology </a></li>
								<li><a href="#">Content Strategy </a></li>
								<li><a href="#">Social Media </a></li>
								<li><a href="#">SEO & Analytics </a></li>
								<li><a href="#">Design & Development </a></li>
							</ul>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="footer-list1 ml-50 md:ml-0 sm:ml-0 mb-50 sm:mb-30">
							<h3>Quick Links</h3>
							<ul>
								<li><a href="#">Home </a></li>
								<li><a href="#">Blog </a></li>
								<li><a href="#">Features </a></li>
								<li><a href="#">Contact us </a></li>
								<li><a href="#">Privacy & policy </a></li>
								<li><a href="#">Terms of Services </a></li>
							</ul>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="footer-contact-list1 mb-50 sm:mb-30">
							<h3>Contact Us</h3>
							<div class="footer-contact-box1">
								<div class="icon">
									<img src="assets/img/icons/footer1-icon1.svg" alt="vexon" />
								</div>
								<div class="text">
									<a href="#">support@vexon.com</a>
								</div>
							</div>

							<div class="footer-contact-box1">
								<div class="icon">
									<img src="assets/img/icons/footer1-icon2.svg" alt="vexon" />
								</div>
								<div class="text">
									<a href="#"
										>8708 Technology Forest Pl <br />
										Suite 125 -G, The Woodlands, <br />
										TX 773</a
									>
								</div>
							</div>

							<div class="footer-contact-box1">
								<div class="icon">
									<img src="assets/img/icons/footer1-icon3.svg" alt="vexon" />
								</div>
								<div class="text">
									<a href="#">123-456-7890</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="coppyrihgt1">
					<div class="row coppyrihgt-border">
						<div class="col-md-6">
							<p class="coppyrihgt">© 2024 Vexon, Inc. All Rights Reserved.</p>
						</div>
						<div class="col-md-6">
							<div class="conditions">
								<a href="#"> Privacy Policy </a>
								<a href="#"> Terms & Conditions </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--===== FOOTER AREA END=======-->

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
