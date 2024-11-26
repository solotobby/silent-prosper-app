@foreach ($stories as $story)
            <div wire:poll.visible.30s class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                  <div>
                    <a class="img-link me-1" href="javascript:void(0)">
                      <img class="img-avatar img-avatar32 img-avatar-thumb" src="{{ asset('src/assets/media/avatars/avatar6.jpg')}}" alt="">
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

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">
                          <i class="fa fa-share-alt opacity-50 me-1"></i> Share
                        </a>
                      </li> --}}
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
                                {{-- <a href="javascript:void(0)" class="me-1">Like</a> --}}

                                <a href="javascript:void(0)"  wire:click="toggleCommentLike({{ $comment->id }})" class="me-1">
                                  @if ($comment->isLikedByUser(auth()->id()))
                                      Unlike
                                  @else
                                      Like
                                  @endif
                                  ({{ $comment->count }})
                                </a>

                                {{-- <a href="javascript:void(0)">Comment</a> --}}
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
            @endforeach


            @if ($stories->hasMorePages())
                <button class="btn btn-primary" wire:click="loadMore">Load More</button>
            @endif