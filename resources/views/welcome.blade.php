@extends('layouts.landing_page_resources.master')


@section('content')


<div class="hero1">
	<div class="container">
		<div class="hero1-bg bg-cover" style="background-image: url(assets/img/bg/hero1-bg.jpg)">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<div class="main-image reveal">
						<img src="assets/img/hero/hero1-image.png" alt="vexon" />
					</div>
				</div>
				<div class="col-lg-6">
					<div class="main-heading1">
						<h1 class="text-anime-style-3">Unlocking The Secrets To Social Media Success</h1>
						<p class="mt-16" data-aos="fade-left" data-aos-duration="400" data-aos-delay="100">Social media is more than just a platform—it’s a powerful tool for building connections, amplifying your brand, and driving growth. At Vexon, we provide insights and strategies to help you stand out in the ever-evolving social media landscape.</p>
						
						<p class="bottom-content" data-aos="fade-left" data-aos-duration="1100" data-aos-delay="100">❊ Connect, engage, & inspire—social media success starts here.</p>
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
						
{{-- 
						<div class="col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="100">
							<div class="blog1-single-box sm:mt-30">
								<div class="thumbnail image-anime">
									<img src="assets/img/blog/blog1-image2.png" alt="vexon" />
								</div>
								<div class="heading1">
									<div class="social-area">
										<a href="social-media.html" class="social">Social Media</a>
										<a href="categories.html" class="time"><img src="assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<h4><a href="blog-single.html">Proven Strategies to Boost Your Social Media Metrics</a></h4>
									<p class="mt-16">Engagement is key to building a loyal following. Learn techniques for crafting posts that invite interaction, encouraging shares.</p>
									<div class="author-area">
										<div class="author">
											<div class="author-tumb">
												<img src="assets/img/blog/blog1-author2.png" alt="vexon" />
											</div>
											<a href="author.html" class="author-text">Kathy Pacheco</a>
										</div>
										<div class="date">
											<a href="#"><img src="assets/img/icons/date1.svg" alt="vexon" /> Oct 21, 2024 </a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="0">
							<div class="blog1-single-box mt-30">
								<div class="thumbnail image-anime">
									<img src="assets/img/blog/blog1-image3.png" alt="vexon" />
								</div>
								<div class="heading1">
									<div class="social-area">
										<a href="social-media.html" class="social">Brand’s</a>
										<a href="categories.html" class="time"><img src="assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<h4><a href="blog-single.html">The Power of Storytelling: How to Make Your Brand’s Voice Stand Out</a></h4>
									<p class="mt-16">Discover ways to create relatable and impactful stories that reinforce your brand and keep followers coming back.</p>
									<div class="author-area">
										<div class="author">
											<div class="author-tumb">
												<img src="assets/img/blog/blog1-author3.png" alt="vexon" />
											</div>
											<a href="author.html" class="author-text">Corina McCoy</a>
										</div>
										<div class="date">
											<a href="#"><img src="assets/img/icons/date1.svg" alt="vexon" /> Nov 2, 2024 </a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="100">
							<div class="blog1-single-box mt-30">
								<div class="thumbnail image-anime">
									<img src="assets/img/blog/blog1-image4.png" alt="vexon" />
								</div>
								<div class="heading1">
									<div class="social-area">
										<a href="social-media.html" class="social">Content</a>
										<a href="categories.html" class="time"><img src="assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<h4><a href="blog-single.html">Mastering Content Calendars: A Guide to Consistent and Strategic.</a></h4>
									<p class="mt-16">Consistency is crucial for success on social media. This guide helps you create an effective content calendar to stay organized.</p>
									<div class="author-area">
										<div class="author">
											<div class="author-tumb">
												<img src="assets/img/blog/blog1-author4.png" alt="vexon" />
											</div>
											<a href="author.html" class="author-text">Rodger Struck</a>
										</div>
										<div class="date">
											<a href="#"><img src="assets/img/icons/date1.svg" alt="vexon" /> Nov 6, 2024 </a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="0">
							<div class="blog1-single-box mt-30">
								<div class="thumbnail image-anime">
									<img src="assets/img/blog/blog1-image5.png" alt="vexon" />
								</div>
								<div class="heading1">
									<div class="social-area">
										<a href="social-media.html" class="social">Trending</a>
										<a href="categories.html" class="time"><img src="assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<h4><a href="blog-single.html">Social Media Trends for 2024: What to Watch and How to Adapt </a></h4>
									<p class="mt-16">The social media landscape evolves quickly. Stay ahead of the curve by understanding key trends for 2024,</p>
									<div class="author-area">
										<div class="author">
											<div class="author-tumb">
												<img src="assets/img/blog/blog1-author5.png" alt="vexon" />
											</div>
											<a href="author.html" class="author-text">Rhonda Rhodes</a>
										</div>
										<div class="date">
											<a href="#"><img src="assets/img/icons/date1.svg" alt="vexon" /> Nov 6, 2024 </a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="100">
							<div class="blog1-single-box mt-30">
								<div class="thumbnail image-anime">
									<img src="assets/img/blog/blog1-image6.png" alt="vexon" />
								</div>
								<div class="heading1">
									<div class="social-area">
										<a href="social-media.html" class="social">Brand Consistency</a>
										<a href="categories.html" class="time"><img src="assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<h4><a href="blog-single.html">Creating a Visual Identity: Tips for Aesthetic and Brand Consistency </a></h4>
									<p class="mt-16">This post covers tips on color schemes, fonts, and visuals to keep your profile visually appealing and cohesive.</p>
									<div class="author-area">
										<div class="author">
											<div class="author-tumb">
												<img src="assets/img/blog/blog1-author5.png" alt="vexon" />
											</div>
											<a href="author.html" class="author-text">Katie Sims</a>
										</div>
										<div class="date">
											<a href="#"><img src="assets/img/icons/date1.svg" alt="vexon" /> Nov 6, 2024 </a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="0">
							<div class="blog1-single-box mt-30">
								<div class="thumbnail image-anime">
									<img src="assets/img/blog/blog1-image7.png" alt="vexon" />
								</div>
								<div class="heading1">
									<div class="social-area">
										<a href="social-media.html" class="social">Gen - Z</a>
										<a href="categories.html" class="time"><img src="assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<h4><a href="blog-single.html">How to Build Authentic Connections with the New Generation</a></h4>
									<p class="mt-16">Gen Z is reshaping digital interaction. Learn what matters to this generation and how to create authentic, meaningful content.</p>
									<div class="author-area">
										<div class="author">
											<div class="author-tumb">
												<img src="assets/img/blog/blog1-author5.png" alt="vexon" />
											</div>
											<a href="author.html" class="author-text">David Elson</a>
										</div>
										<div class="date">
											<a href="#"><img src="assets/img/icons/date1.svg" alt="vexon" /> Oct 26, 2024 </a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="100">
							<div class="blog1-single-box mt-30">
								<div class="thumbnail image-anime">
									<img src="assets/img/blog/blog1-image8.png" alt="vexon" />
								</div>
								<div class="heading1">
									<div class="social-area">
										<a href="social-media.html" class="social">Social Media</a>
										<a href="categories.html" class="time"><img src="assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<h4><a href="blog-single.html">Harnessing Analytics: Using Data to Refine Your Social Media Strategy</a></h4>
									<p class="mt-16">Gen Z is reshaping digital interaction. Learn what matters to this generation and how to create authentic, meaningful content.</p>
									<div class="author-area">
										<div class="author">
											<div class="author-tumb">
												<img src="assets/img/blog/blog1-author5.png" alt="vexon" />
											</div>
											<a href="author.html" class="author-text">Kenneth Allen</a>
										</div>
										<div class="date">
											<a href="#"><img src="assets/img/icons/date1.svg" alt="vexon" /> Oct 26, 2024 </a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="0">
							<div class="blog1-single-box mt-30">
								<div class="thumbnail image-anime">
									<img src="assets/img/blog/blog1-image9.png" alt="vexon" />
								</div>
								<div class="heading1">
									<div class="social-area">
										<a href="social-media.html" class="social">Social Media</a>
										<a href="categories.html" class="time"><img src="assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<h4><a href="blog-single.html">From Follower to Customer: Turning Social Engagement into Sales</a></h4>
									<p class="mt-16">Transforming followers into customers requires a solid strategy. This post offers insights on using social media as a powerful tool convert.</p>
									<div class="author-area">
										<div class="author">
											<div class="author-tumb">
												<img src="assets/img/blog/blog1-author2.png" alt="vexon" />
											</div>
											<a href="author.html" class="author-text">Judith Rodriguez</a>
										</div>
										<div class="date">
											<a href="#"><img src="assets/img/icons/date1.svg" alt="vexon" /> Oct 26, 2024 </a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="100">
							<div class="blog1-single-box mt-30">
								<div class="thumbnail image-anime">
									<img src="assets/img/blog/blog1-image10.png" alt="vexon" />
								</div>
								<div class="heading1">
									<div class="social-area">
										<a href="social-media.html" class="social">Feedback</a>
										<a href="categories.html" class="time"><img src="assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<h4><a href="blog-single.html">Handling Negative Feedback: Maintaining Brand Reputation.</a></h4>
									<p class="mt-16">Dealing with criticism on social media can be challenging. Learn ways to manage negative feedback professionally to protect your brand.</p>
									<div class="author-area">
										<div class="author">
											<div class="author-tumb">
												<img src="assets/img/blog/blog1-author6.png" alt="vexon" />
											</div>
											<a href="author.html" class="author-text">Iva Ryan</a>
										</div>
										<div class="date">
											<a href="#"><img src="assets/img/icons/date1.svg" alt="vexon" /> Oct 26, 2024 </a>
										</div>
									</div>
								</div>
							</div>
						</div> --}}
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

<!--===== BLOG AREA END=======-->

<!--===== BLOG CETEGORYS START=======-->
{{-- <div class="blog1-cetegorys sp">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="heading1">
					<h2 class="text-anime-style-3">All Blog Post Categories</h2>
				</div>
			</div>
			<div class="col-lg-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="350">
				<div class="text-end md:text-start sm:text-start sm:mt-20 md:mt-20">
					<a class="theme-btn1" href="categories.html">Explore All Topic </a>
				</div>
			</div>
		</div>

		<div class="row mt-30 sm:mt-0 md:mt-0">
			<div class="col-lg col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="450">
				<div class="blog1-cetegory-box mt-30 text-center">
					<div class="image image-anime">
						<img src="assets/img/blog/blog1-cetegroy-post1.png" alt="vexon" />
					</div>
					<div class="heading1 mt-16">
						<h4><a href="social-media.html">Social Media </a></h4>
					</div>
				</div>
			</div>

			<div class="col-lg col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="400">
				<div class="blog1-cetegory-box mt-30 text-center">
					<div class="image image-anime">
						<img src="assets/img/blog/blog1-cetegroy-post2.png" alt="vexon" />
					</div>
					<div class="heading1 mt-16">
						<h4><a href="social-media.html">Digital Marketing </a></h4>
					</div>
				</div>
			</div>

			<div class="col-lg col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="350">
				<div class="blog1-cetegory-box mt-30 text-center">
					<div class="image image-anime">
						<img src="assets/img/blog/blog1-cetegroy-post3.png" alt="vexon" />
					</div>
					<div class="heading1 mt-16">
						<h4><a href="social-media.html">Startup Agency </a></h4>
					</div>
				</div>
			</div>

			<div class="col-lg col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="300">
				<div class="blog1-cetegory-box mt-30 text-center">
					<div class="image image-anime">
						<img src="assets/img/blog/blog1-cetegroy-post4.png" alt="vexon" />
					</div>
					<div class="heading1 mt-16">
						<h4><a href="social-media.html">Design & Development </a></h4>
					</div>
				</div>
			</div>

			<div class="col-lg col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="250">
				<div class="blog1-cetegory-box mt-30 text-center">
					<div class="image image-anime">
						<img src="assets/img/blog/blog1-cetegroy-post5.png" alt="vexon" />
					</div>
					<div class="heading1 mt-16">
						<h4><a href="social-media.html">Life style </a></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> --}}

<!--===== BLOG CETEGORYS END=======-->

<!--===== CTA AREA START=======-->

<div class="cta1">
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
</div>

<!--===== CTA AREA END=======-->

@endsection
