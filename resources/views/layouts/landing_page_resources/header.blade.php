
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
                                        {{-- <li class="dropdown-menu-parrent">
											<a href="#" class="main1">Membership</a>
											
										</li> --}}
                                        <li class="dropdown-menu-parrent">
											<a href="{{ url('login') }}" class="main1">Sign In</a>
											
										</li>

										
										{{-- <li class="dropdown-menu-parrent">
											<a href="#" class="main1">Account <i class="fa-solid fa-angle-down"></i></a>
											<ul>
												<li><a href="login.html">Login</a></li>
												<li><a href="sigup.html">Sign Up</a></li>
												<li><a href="forgot.html">Forgot</a></li>
												<li><a href="reset.html">Reset Password</a></li>
												<li><a href="verify.html">Verify</a></li>
											</ul>
										</li> --}}
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
						<a href="{{ url('about') }}">Our Story</a>
					</li>
                    <li class="has-dropdowns">
						<a href="{{ url('login') }}">Read</a>
					</li>
                    <li class="has-dropdowns">
						<a href="{{ url('login') }}">Write</a>
					</li>
                    {{-- <li class="has-dropdowns">
						<a href="#">Membership</a>
					</li> --}}
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
						{{-- <li>
							<a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
						</li> --}}
						<li>
							<a href="#"><i class="fa-brands fa-x-twitter"></i></a>
						</li>
						{{-- <li>
							<a href="#"><i class="fa-brands fa-youtube"></i></a>
						</li> --}}
						<li>
							<a href="#"><i class="fa-brands fa-instagram"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!--=====Mobile header end=======-->