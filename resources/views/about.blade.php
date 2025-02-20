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
					<h1> About Us </h1>
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


@endsection
