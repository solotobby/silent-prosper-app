<div>
    {{-- Stop trying to control. --}}

     <div class="row">
             <h2 class="content-heading">BookShelf - {{ $stories->count() }}</h2>
        <div class="col-xl-12">
            <!-- Story -->
            @foreach ($stories as $story)
                
                <div class="block block-rounded">
                    <div class="block-content p-0 overflow-hidden">
                      <div class="row g-0">
                        <div class="col-md-4 col-lg-5 overflow-hidden d-flex align-items-center">
                          <a href="{{url('show/'.$story->slug)}}">
                            <img class="img-fluid img-link" src="{{ asset('src/assets/media/photos/photo19.jpg') }} " alt="">
                          </a>
                        </div>
                        <div class="col-md-8 col-lg-7 d-flex align-items-center">
                          <div class="px-4 py-3">
                            <h4 class="mb-1">
                              <a class="text-dark" href="{{url('show/'.$story->slug)}}">{{ $story->title }} </a>
                            </h4>
                            <div class="fs-sm mb-2">
                              <a href="{{ url('profile/'.$story->user->id)}}">{{  $story->user->id == auth()->user()->id ? 'Me' : $story->user->name}}</a> on {{ $story->created_at->format('M d, Y') }} · <em class="text-muted">13 min</em>
                            </div>
                            <p class="mb-0">
                                {!! \Illuminate\Support\Str::words($story->description, 35) !!}
                            
                              
                              <a href="{{url('show/'.$story->slug)}}">Read on</a>
                            </p>

                            <div class="block-contenlt block-content-fullk mt-2">
                                <a class="btn btn-alt-secondary" href="javascript:void(0)" data-bs-toggle="tooltip" title="views">
                                  <i class="fa fa-fw fa-eye"></i> {{$story->views_count}}
                                </a>
                                <a class="btn btn-alt-secondary" href="javascript:void(0)" data-bs-toggle="tooltip" title="comments">
                                  <i class="fa fa-fw fa-comments"></i> {{$story->comments_count}}
                                </a>
                                <a class="btn btn-alt-secondary" href="javascript:void(0)" data-bs-toggle="tooltip" title="Likes">
                                  <i class="fa fa-fw fa-heart"></i> {{$story->likes_count}}
                                </a>
                                @if($story->user->id == auth()->user()->id)
                                    {{-- <a class="btn btn-alt-secondary" href="javascript:void(0)" data-bs-toggle="tooltip" title="Edit">
                                        <i class="fa fa-fw fa-"></i>
                                    </a> --}}

                                     <a class="btn btn-alt-secondary" href="javascript:void(0)" data-bs-toggle="tooltip" title="Set Completed">
                                        <i class="fa fa-fw fa-check"></i>
                                    </a>

                                @endif
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
            
            <!-- END Story -->

        </div>

</div>
