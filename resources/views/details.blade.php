@extends('layouts.landing_page_resources.master')

@section('content')

<div class="inner-hero bg-cover" style="background-image: url({{ asset('assets/img/bg/inner-hero-bg.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-heading">
                    <div class="page-prog">
                        <a href="{{url('/')}}">Home</a>
                        <span><i class="fa-solid fa-angle-right"></i></span>
                        <p>{{ $story->category->name }}</p>
                        <span><i class="fa-solid fa-angle-right"></i></span>
                        <p class="bold">{{$story->title}}</p>
                    </div>
                    <h1>{{$story->title}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="blog1 sp bg1 _relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row align-items-center">
                    <div class="col-lg-8 m-auto">
                        <div class="blog-page3-single-box text-center">
                            <div class="heading1">
                                <div class="social-area">
                                    <div class="author-area">
                                        <div class="author">
                                            <div class="author-tumb">
                                                @if($story->user->avarta == null)
                                                <img src="{{ asset('assets/img/blog/blog1-author1.png')}}" alt="vexon" />
                                                @else
                                                <img src="{{$story->user->avarta}}" alt="vexon" />
                                                @endif
                                            </div>
                                            <span class="author-text">{{$story->user->name}}</span>
                                        </div>
                                        {{-- <div class="date">
                                            <span><img src="assets/img/icons/date1.svg" alt="vexon" /> Oct 26, 2024 </span>
                                        </div> --}}
                                    </div>
                                    <a href="#" class="time mt-16"><img src="{{ asset('assets/img/icons/time1.svg')}}" alt="vexon" /> 3 min read</a>
                                </div>
                                <h2>Description</h2>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 m-auto">
                        <div class="thumbnail image-anime _relative mt-20">
                            <img src="{{ $story->img }}" alt="vexon" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="details content-area">
                    {{-- <article>
                        <div class="heading1 mt-30">
                            <p>  </p>
                         </div>
                    </article> --}}

                    

                    <div class="clint-review mt-4">
                        <p>{{ $story->description }}</p>
                       
                    </div>

                    

                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

