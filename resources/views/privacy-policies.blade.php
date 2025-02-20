@extends('layouts.landing_page_resources.master')

@section('content')

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
					<h1> Privacy Policies </h1>
				</div>
			</div>
		</div>
	</div>
</div>

<!--===== CONTACT AREA START=======-->

<div class="contact-page-sec sp">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 m-auto">
				<div class="heading1">
					<h2 class="text-center">  </h2>
					<p class="mt-16"> Eclatspad values your privacy. This Privacy Policy outlines how we collect, use, and protect your personal information.
                    </p>

					<h5 class="mt-2">The Information We Collect From Users</h5>
					<p class="mt-6"> 
                        We collect: <br>
                        Account Information: Name, username(can be changes), email, password. <br>
                        Content Data: Stories, comments.<br>
                        Usage Data: IP address, browser type, device information.<br>
                        
					</p>

					<h5 class="mt-2">How We Use Your Information</h5>
					<p class="mt-6"> 
						We use collected data to: <br>
                        Provide and improve Eclatspad services. <br>
                        Personalize user experiences.<br>
                        Prevent fraud and ensure security.
                	</p>

					<h5 class="mt-2">Sharing of Information</h5>
					<p class="mt-6"> 
						
                        We do not sell user data. However, we may share information: <br>
                        With legal authorities when required. <br>
                        With third-party services necessary for platform functionality.

					</p>

					<h5 class="mt-2">Cookies and Tracking Technologies</h5>
					<p class="mt-6"> 
						
                        We use cookies to enhance user experience and track analytics. You can disable cookies via your browser settings.

					</p>

                    <h5 class="mt-2">Security Measures</h5>
					<p class="mt-6"> 
						
                        We implement security protocols to protect user data, though we cannot guarantee absolute security.

					</p>

                    <h5 class="mt-2">User Rights</h5>
					<p class="mt-6"> 
						
                        Users can: <br>
                        Edit or delete their content. <br>
                        Request data deletion. <br>
                        {{-- Adjust privacy settings within their accounts. <br> --}}

					</p>
                    <h5 class="mt-2">Policy Updates</h5>
					<p class="mt-6"> 
						
                        
                    
                        This Privacy Policy may be updated periodically. Users will be notified of major changes.

		
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


@endsection
