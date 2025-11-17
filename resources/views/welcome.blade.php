@extends('layouts.landing_page_resources.master')

@section('style')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<style>
	.story-card {
		transition: transform 0.3s;
		cursor: pointer;
	}
	.story-card:hover {
		transform: translateY(-5px);
	}
	.card-img-top {
		height: 200px;
		object-fit: cover;
	}
	.category-badge {
		position: absolute;
		top: 10px;
		right: 10px;
	}
</style>
@endsection

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
				{{-- <div class="sidebar-widget_1 _search-area1 mb-3">
					<h3>Search</h3>
					<form action="{{ url('search') }}" action="GET">
						<input type="text" name="query" placeholder="Search..." required />
					</form>
				</div> --}}
				
				@if($stories->count() > 0)
				<div class="row">

					@foreach ($stories as $story)
						<div class="col-md-6 col-lg-4 mb-4">
							<div class="card story-card" data-bs-toggle="modal" data-bs-target="#storyModal-{{$story->_id}}">
								{{-- https://source.unsplash.com/random/800x600 --}}
								<img src="{{ asset('storage/' . $story->img) }}" class="card-img-top" alt="Story Image">
								<span class="badge bg-primary category-badge">{{ @$story->category->name }}</span>
								<div class="card-body">
									<h5 class="card-title">{{$story->title}}</h5>
									<p class="card-text text-muted">  {!! \Illuminate\Support\Str::words($story->description, 20) !!}</p>
									<div class="d-flex justify-content-between align-items-center">
										<small class="text-muted">
											<i class="bi bi-person"></i> {{@$story->user->name}}
										</small>
										{{-- <small class="text-muted">
											<i class="bi bi-clock"></i> 3 min read
										</small> --}}
									</div>
								</div>
								<div class="card-footer d-flex justify-content-between">
									<small><i class="bi bi-eye"></i> {{$story->views_count}} views</small>
									<small><i class="bi bi-chat"></i> {{$story->comments_count}} comments</small>
								</div>
							</div>
						</div>

						{{-- modals --}}

						<!-- Story Detail Modal -->
						<div class="modal fade" id="storyModal-{{$story->_id}}" tabindex="-1">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h2 class="modal-title">{{ $story->title }} </h2>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									<div class="modal-body">
										<div class="row mb-4">
											<div class="col-md-8">
												<div class="d-flex align-items-center mb-3">


													<img 
														@if($story->user->avarta == null)
															src="{{ asset('assets/img/blog/blog1-author1.png') }}" 
														@else
															src="{{$story->user->avarta}}" 
														@endif

														class="rounded-circle me-3" 
														alt="Author" 
														style="width: 50px; height: 50px;">
														
													<div>
														<h5 class="mb-0">{{@$story->user->name}}</h5>
														{{-- <small class="text-muted">Published 3 days ago</small> --}}
													</div>
												</div>
												<div class="d-flex gap-3">
													<span class="badge bg-primary">{{@$story->category->name}}</span>
													{{-- <span class="badge bg-secondary">Travel</span> --}}
												</div>
											</div>
											<div class="col-md-4 text-end">
												<div class="text-muted">
													<span class="me-3"><i class="bi bi-eye"></i>  {{$story->views_count}}</span>
													<span><i class="bi bi-chat"></i>  {{$story->comments_count}}</span>
												</div>
											</div>
										</div>

										<img src="{{ $story->img }}" 
											class="img-fluid mb-4 rounded" 
											alt="Story Image">

										<div class="story-content">
											<p>{{$story->description}}</p>
										</div>

										{{-- <div class="tags mt-4">
											<h6>Tags:</h6>
											<a href="#" class="badge bg-light text-dark me-1">mountains</a>
											<a href="#" class="badge bg-light text-dark me-1">hiking</a>
											<a href="#" class="badge bg-light text-dark">adventure</a>
										</div> --}}
									</div>
									<div class="modal-footer">
										{{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
										<a class="btn btn-primary" href="{{ url('register') }}">
											<i class="bi bi-arrow"></i> Start Reading
										</a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
