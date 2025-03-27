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
					<form action="{{ url('search') }}" action="GET">
						<input type="text" name="query" placeholder="Search..." required />
					</form>
				</div>

				{{-- <div class="row">
					<div class="col-md-4">
					  <div class="card">
						<img src="https://freebyz.s3.us-east-1.amazonaws.com/eclatspad/X5ifB8JaodMxBAikDM27W9NEcquGueOih6UyjRkW.jpg" class="card-img-top" alt="Story Image">
						<div class="card-body">
						  <h5 class="card-title">Starlight Hearts</h5>
						  <p class="card-text"><strong>Category:</strong> Romance, Adventure</p>
						  <p class="card-text">A young girl and boy meet under the stars and share an adventure of love, growth, and dreams...</p>
						  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#storyModal">Read More</button>
						</div>
					  </div>
					</div>
				  </div>
				</div> --}}

				<!-- Modal for Story Details -->
				{{-- <div class="modal fade" id="storyModal" tabindex="-1" aria-labelledby="storyModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
						<h5 class="modal-title" id="storyModalLabel">Starlight Hearts - Full Story</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						<img src="https://via.placeholder.com/350x200" class="img-fluid mb-4" alt="Story Image">
						<p><strong>Category:</strong> Romance, Adventure</p>
						<h6>Chapter 1: The Serendipity of the Stars</h6>
						<p>On a clear evening in late autumn, 17-year-old Emily was sitting at her usual spot by the lake in her small town. She loved the peace it brought, especially when the sky was dotted with stars, sparkling like diamonds against the night...</p>
						<h6>Chapter 2: Growing Together</h6>
						<p>Over the next few years, Emily and Jake became inseparable. They shared everything from their deepest fears to their most wild ambitions...</p>
						<h6>Chapter 3: The Test of Time</h6>
						<p>As college came around, Emily and Jake faced the realities of life and the challenges of a long-distance relationship...</p>
						<h6>Chapter 4: Building a Life Together</h6>
						<p>After graduation, Emily and Jake settled into their new life, finding a cozy apartment in the city...</p>
						<h6>Chapter 5: The Legacy of Love</h6>
						<p>Twenty years had passed since that magical night by the lake, and Emily and Jake’s love had only deepened...</p>
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
					</div>
					</div>
				</div> --}}


				<div class="blog1-posts-area">
					<div class="row">
						@if($stories->count() > 0)
							@foreach ($stories as $story)
								<div class="col-md-4 mt-5" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="0" >
									<div class="blog1-single-box">
										<div class="thumbnail image-anime">
											<img src="{{ $story->img }}" alt="vexon" />
										</div>
										<div class="heading1">
											<div class="social-area">
												<a href="#" class="social">{{ @$story->category->name }}</a>
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
