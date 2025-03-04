@extends('layouts.landing_page_resources.master')


@section('content')


<div class="hero1">
	<div class="container">
		<div class="hero1-bg bg-cover" style="background-image: url({{ asset('assets/img/bg/hero1-bg.jpg')}})">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<div class="main-image reveal">
						<img src="{{ asset('assets/img/hero/hero1-image.png') }}" alt="vexon" />
					</div>
				</div>
				<div class="col-lg-6">
					<div class="main-heading1">
						<h1 class="text-anime-style-3">Hi, welcome to Eclatspad!</h1>
						<p class="mt-16" data-aos="fade-left" data-aos-duration="400" data-aos-delay="100"> A platform where both writers and readers can connect with each other, explore, create,  and share captivating stories.</p>
						
						<p class="bottom-content" data-aos="fade-left" data-aos-duration="1100" data-aos-delay="100">❊ Write, Read, & Dream</p>

						<a href="{{ url('register') }}" class="btn btn-primary btn-lg theme-btn1 mt-5">Start Reading</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--===== HERO AREA END=======-->

<!--===== BLOG AREA START=======-->

<div class="blog1 sp bg1 _relative">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="sidebar-widget_1 _search-area1 mb-3">
					<h3>Search</h3>
					<form action="#">
						<input type="text" placeholder="Search..." />
					</form>
				</div>

				<div class="blog1-posts-area">
					<div class="row">
						@if($stories->count() > 0)
						@foreach ($stories as $story)
							<div class="col-md-4" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="0">
								<div class="blog1-single-box">
									<div class="thumbnail image-anime">
										<img src="{{ $story->img }}" alt="vexon" />
									</div>
									<div class="heading1">
										<div class="social-area">
											<a href="#" class="social">{{ $story->category->name }}</a>
											<a href="" class="time"><img src="{{ asset('assets/img/icons/time1.svg')}}" alt="vexon" /> 3 min read</a>
										</div>
										<h4><a href="{{ url('details/'.$story->slug) }}">{{$story->title}}</a></h4>
										<p class="mt-16">{{$story->description}}</p>
										<div class="author-area">
											<div class="author">
												
												<div class="author-tumb">
													@if($story->user->avarta == null)
														<img src="{{ asset('assets/img/blog/blog1-author1.png') }}" alt="vexon" />
													@else 
														<img src="{{$story->user->avarta}}" alt="vexon" />
													@endif
												</div>

												<a href="#" class="author-text">{{$story->user->name}}</a>
											</div>
											{{-- <div class="date">
												<a href="#"><img src="assets/img/icons/date1.svg" alt="vexon" /> Oct 26, 2024 </a>
											</div> --}}
										</div>
									</div>
								</div>
							</div>
						@endforeach
						@else
							<div class="alert alert-info">
								There are no stories at the moment.
							</div>
						@endif
				</div>

					<div class="space60"></div>

					{{-- <div class="row" data-aos-offset="50" data-aos="fade-up" data-aos-duration="400">
						<div class="col-12 m-auto">
							<div class="theme-pagination text-center">
								<ul>
									<li>
										<a href="#"><i class="fa-solid fa-angle-left"></i></a>
									</li>
									<li><a class="active" href="#">01</a></li>
									<li><a href="#">02</a></li>
									<li>...</li>
									<li><a href="#">12</a></li>
									<li>
										<a href="#"><i class="fa-solid fa-angle-right"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div> --}}

				</div>
			</div>
		</div>
	</div>
</div>


<!--===== CTA AREA START=======-->

{{-- <div class="cta1">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="heading1-w">
					<h2>Ready to Elevate Your Social Media Game?</h2>
					<p class="mt-16">Unlock the tools and insights you need to thrive on social media with Vexon. Join our community for expert tips, trending strategies, and resources that empower you to stand out and succeed.</p>
					
				</div>
			</div>

			<div class="col-lg-6">
				<div class="image text-end sm:text-start md:text-start sm:mt-30 md:mt-30">
					<img src="assets/img/hero/hero1-image.png" alt="vexon" />
				</div>
			</div>
		</div>
	</div>
</div> --}}

<!--===== CTA AREA END=======-->

@endsection
