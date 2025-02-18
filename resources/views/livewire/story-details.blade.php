<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
        <!-- Hero -->
        {{-- <div class="bg-image" style="background-image: url('{{asset('src/assets/media/photos/photo13@2x.jpg')}} ');"> --}}
        
        <div class="bg-image" style="background-image: url('{{$story->img}}');">
            <div class="bg-primary-dark-op">
              <div class="content content-full content-top text-center">
                <div class="pt-4 pb-3">
                  <h1 class="fw-light text-white mb-1">{{$story->title}}</h1>
                  {{-- <p>
                    <span class="badge rounded-pill bg-primary fs-base px-3 py-2 me-2 m-1">
                      <i class="fa fa-user-circle me-1"></i> by Lisa Smith
                    </span>
                    <span class="badge rounded-pill bg-primary fs-base px-3 py-2 m-1">
                      <i class="fa fa-clock me-1"></i> 10 min read
                    </span>
                  </p> --}}

                  <h2 class="h3 fw-light text-white-75"> by <a href="{{ url('profile/'.$story->user->username) }}"> <span class="text-white">{{$story->user->name}}</span></a></h2>

                 
                  @if($story->user->id === auth()->user()->id)
                        {{-- <button class="btn btn-danger" wire:click="deleteStory({{ $story->id }})">Delete Story</button> --}}
                        <a class="btn btn-alt-secondary" href="{{ url('edit/story/'.$story->slug) }}">Edit Story</a>

                  @else
                        @if(!$story->isBookShelfedByUser(auth()->user()->id))
                                <button class="btn btn-alt-secondary" wire:click="addBookShelf({{ $story->id }})">Add to BookShelf</button>
                        @else
                                <button class="btn btn-alt-warning" wire:click="addBookShelf({{ $story->id }})">Remove from BookShelf</button>
                        @endif

                  @endif

                </div>
              </div>
            </div>
        </div>
          <!-- END Hero -->


    <div class="row">

        <div class="col-md-12 mt-3">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session('success'))
                  <div class="alert alert-success" role="alert">
                      {{ session('success') }}
                  </div>
            @endif


            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Description</h3>
                </div>
                <div class="block-content">
                  <p>
                    {{$story->description}}
                  </p>
                  <p class="text-muted">
                    {{ \Carbon\Carbon::parse($story->created_at)->format('M d, Y') }}
                  </p>
                </div>
            </div>

            <!-- Tasks, custom functionality is initialized in js/pages/be_pages_projects_tasks.min.js which was auto compiled from _js/pages/be_pages_projects_tasks.js -->
            <div class="js-tasks">
              <!-- Tasks List -->
              <h2 class="content-heading pb-0 mb-3 border-0 d-flex justify-content-between align-items-center">
                List of Chapters <span class="js-task-badge badge rounded-pill bg-primary animated fadeIn">{{ $story->chapters->count() }}</span>
              </h2>
            </div>

           <!-- Lessons -->
           <div class="block block-rounded block-bordered">
            <div class="block-content">
              <table class="table table-striped table-borderless table-vcenter">
                <tbody>
                    @foreach ($story['chapters'] as $chapter)
                  <tr>
                    @if (!in_array($chapter->id, $reads))
                        <td class="text-center w-25 d-none d-md-table-cell">
                        <a class="item item-circle bg-primary text-white fs-2 mx-auto" href="{{ url('read/'.$chapter->slug) }}">
                            <span class="fa fa-file-alt"></span>
                        </a>
                        </td>
                    @else
                        <td class="text-center w-25 d-none d-md-table-cell">
                        <a class="item item-circle bg-primary text-white fs-2 mx-auto" href="{{ url('read/'.$chapter->slug) }}">
                            <span class="fa fa-check"></span>
                        </a>
                        </td>
                    @endif

                   


                    <td>
                      <div class="py-4">
                        <div class="fs-sm fw-bold text-uppercase mb-2">
                          <span class="text-muted me-3">{{ \Carbon\Carbon::parse($chapter->created_at)->format('M d, Y') }}</span>
                          {{-- <span class="text-primary">
                                <i class="fa fa-clock"></i> 20:34
                          </span> --}}
                        </div>
                        <a class="link-fx h4 mb-2 d-inline-block text-dark" href="{{ url('read/'.$chapter->slug) }}">
                          {{ $chapter->title }}
                        </a>
                        <span class="text-primary">
                            @if (!in_array($chapter->id, $reads))
                                {{-- <i class="fa fa-file"></i> --}}
                            @else
                                <i class="fa fa-check"></i>
                            @endif
                          </span>
                        <p class="text-muted mb-0">
                            {!! \Illuminate\Support\Str::words($chapter->body, 35) !!}
                        </p>
                        @if(auth()->user()->id == $story->user->id)
                            <a href="{{ url('edit/story/chapter/'.$chapter->slug) }}" class="btn btn-primary btn-sm mt-2"> Edit Chapter</a>
                        @endif
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>


              

            </div>

            

          </div>
          <!-- END Lessons -->


          @if(auth()->user()->id == $story->user->id && !$story->is_completed)
              <a href="{{ url('write/'.$story->slug) }}" class="btn btn-primary btn-sm">Continue Writing</a>
              
              <a href=" {{ url('update/story/completed/'.$story->slug) }}" class="btn btn-secondary btn-sm">Set Story as Completed</a>
                {{-- @else
                    <a href="" class="btn btn-secondary btn-sm">Add More Chapters</a> --}}
             @endif
            @if(auth()->user()->id == $story->user->id && $story->is_completed)
            <a href=" {{ url('update/story/completed/'.$story->slug) }}" class="btn btn-alt-primary btn-sm">Unset Story as Completed</a>
            @endif


          </div>

    




        
        
          {{-- <div class="col-md-12 col-sm-12">


            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                <div>
                    <a class="img-link me-1" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32 img-avatar-thumb border border-{{ @$subscriptionPlan->subscription->color_code }}" src="{{ asset('src/assets/media/avatars/avatar6.jpg')}}" alt="">
                    </a>
                    <a class="fw-semibold" href="{{ url('profile/'.$story->user->id) }}"> {{ $story->user->name }} </a>
                    <span class="fs-sm text-muted">{{ $story->created_at->diffForHumans()  }}</span>
                </div>
                <div class="block-options">
                    <div class="dropdown">
                    <button type="button" class="btn-block-option dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="javascript:void(0)">
                        <i class="far fa-fw fa-times-circle text-danger me-1"></i> Hide similar posts
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                        <i class="far fa-fw fa-thumbs-down text-warning me-1"></i> Stop following this user
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)">
                        <i class="fa fa-fw fa-exclamation-triangle me-1"></i> Report this post
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                        <i class="fa fa-fw fa-bookmark me-1"></i> Bookmark this post
                        </a>
                    </div>
                    </div>
                </div>
                </div>
            
                <div class="block-content">
                <a href="{{ url('show/'.$story->_id)}}">
                <span style="color: black"> {{ $story->content }} </span>
                </a>
                <hr>
                <ul class="nav nav-pills fs-sm push">

                    <li class="nav-item me-1">
                    <a class="nav-link" href="javascript:void(0)" wire:click="toggleLike({{ $story->id }})">
                        @if ($story->isLikedByUser(auth()->id()))
                            
                            <i class="fa fa-thumbs-down opacity-50 me-1"></i> 
                        @else
                        
                            <i class="fa fa-thumbs-up opacity-50 me-1"></i> 
                        @endif
                        {{ $story->likes_count }}
                    </a>
                    </li>
                

                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" wire:click="toggleComments({{ $story->id }})">
                        <i class="fa fa-comment-alt opacity-50 me-1"></i> {{ $story->comments_count }}
                    </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">
                            <i class="fa fa-eye opacity-50 me-1"></i> {{$story->views_count}}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" wire:click="bookmarkStory({{ $story->id }})">
                          
                          @if ($story->isBookmarkedBy(auth()->id()))
                              <i class="fa fa-fw fa-bookmark opacity-100 me-1"></i>
                          @else
                              <i class="fa fa-fw fa-bookmark opacity-50 me-1"></i>
                          @endif
                            {{ $story->bookmark_counts }}
                        </a>
                      </li>

                 
                </ul>
                </div>
                

                @if ($commentSectionOpen[$story->id] ?? false)
                <div class="block-content block-content-full bg-body-light">
                
                    <form wire:submit.prevent="addComment({{ $story->id }})">
                    <input type="text" class="form-control form-control-alt" wire:model="comment" placeholder="Write a comment..">
                    </form>
                    <div class="pt-3 fs-sm">

                        @forelse ($story->comments->sortByDesc('created_at')->take($perPageComments) as $comment)
                        
                        <div class="d-flex">
                            <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
                            <img class="img-avatar img-avatar32 img-avatar-thumb" src="{{ asset('src/assets/media/avatars/avatar2.jpg')}}" alt="">
                            </a>
                            <div class="flex-grow-1">
                            <p class="mb-1">
                                <a class="fw-semibold" href="javascript:void(0)">{{ $comment->user->name }}</a>
                                {{ $comment->content }}
                                <br>
                                <small class="text-muted d-block">Posted on {{ $comment->created_at->format('M d, Y h:i A') }}</small>
                            </p>
                            <p>
                                <a href="javascript:void(0)"  wire:click="toggleCommentLike({{ $comment->id }})" class="me-1">
                                    @if ($comment->isLikedByUser(auth()->id()))
                                        Unlike
                                    @else
                                        Like
                                    @endif
                                    ({{ $comment->count }})
                                </a>

                              
                            </p>
                            
                            </div>
                        </div>
                        @empty
                            <li>No comments yet. Be the first to comment!</li>
                        @endforelse


                        <!-- Load More Button -->
                        @if ($story->comments->count() > $perPageComments)
                        <button class="btn btn-primary btn-sm mt-2" wire:click="loadMoreComments">Load More Comments</button>
                        @endif
                            
                        </div>
                    </div>
                @endif
            
                </div>
        

        </div> --}}

       
    </div>

</div>
