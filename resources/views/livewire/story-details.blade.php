<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
        <!-- Hero -->
        <div class="bg-image" style="background-image: url('{{asset('src/assets/media/photos/photo13@2x.jpg')}} ');">
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

                  <h2 class="h3 fw-light text-white-75"> by {{$story->user->name}}</h2>
                  @if(!$story->isBookShelfedByUser(auth()->user()->id))
                        <button class="btn btn-warning" wire:click="addBookShelf({{ $story->id }})">Add to BookShelf</button>
                  @else
                        <button class="btn btn-warning" wire:click="addBookShelf({{ $story->id }})">Remove from BookShelf</button>
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
              <div class="js-task-list">
                @foreach ($story['chapters'] as $chapter)
                    <!-- Task -->
                    <a href="{{ url('read/'.$chapter->slug) }}">
                        <div class="js-task block block-rounded mb-2 animated fadeIn" data-task-id="9" data-task-completed="false" data-task-starred="false">
                            <table class="table table-borderless table-vcenter mb-0">
                            <tr>
                                @if (!in_array($chapter->id, $reads))
                                    <td class="text-center pe-0" style="width: 38px;">
                                        <div class="js-task-status form-check">
                                            <input type="checkbox" class="form-check-input" id="tasks-cb-id9" disabled>
                                            <label class="form-check-label" for="tasks-cb-id9"></label>
                                        </div>
                                    </td>
                                @else
                                    <td class="text-center pe-0" style="width: 38px;">
                                        <div class="js-task-status form-check">
                                            <input type="checkbox" class="form-check-input" id="tasks-cb-id9"  checked disabled>
                                            <label class="form-check-label" for="tasks-cb-id9"></label>
                                        </div>
                                    </td>
                                @endif

                               
                                <td class="js-task-content fw-semibold ps-0" style="width: 500px;">
                                {{$chapter->title}}
                                </td>
                                <td class="text-end" style="width: 300px;">
                                    {{-- <button type="button" class="js-task-star btn btn-sm btn-link text-warning">
                                        <i class="far fa-star fa-fw"></i>
                                    </button> --}}
                                <button type="button" class="js-task-remove btn btn-sm btn-link text-danger">
                                    {{ \Carbon\Carbon::parse($chapter->created_at)->format('M d, Y') }}
                                </button>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </a>
                    <!-- END Task -->
                @endforeach

               
                @if(auth()->user()->id == $story->user->id && !$story->is_completed)
                    <a href="{{ url('write/'.$story->slug) }}" class="btn btn-primary btn-sm">Continue Writing</a>
                @endif

                
            </div>
            <!-- END Tasks -->
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
