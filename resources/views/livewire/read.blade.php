<div>
    {{-- In work, do what you enjoy. --}}

    <!-- Hero -->
    <div class="bg-image" style="background-image: url('{{asset('src/assets/media/photos/photo13@2x.jpg')}}');">
        <div class="bg-black-75">
          <div class="content content-top content-full text-center">
            <h1 class="fw-bold text-white mt-5 mb-3">
              {{ $chapter->title }}
            </h1>
            <h2 class="h3 fw-normal text-white-75 mb-5">{{$chapter->story->title}}</h2>
            <p>
              <span class="badge rounded-pill bg-primary fs-base px-3 py-2 me-2 m-1">
                <i class="fa fa-user-circle me-1"></i> by  {{ $chapter->user->name }}
              </span>
              <span class="badge rounded-pill bg-primary fs-base px-3 py-2 m-1">
                <i class="fa fa-clock me-1"></i> {{ readTime($chapter->read_time) }} read
              </span>
            </p>
          </div>
        </div>
      </div>
      <!-- END Hero -->


      <div class="row justify-content-center">
        <div class="col-sm-8 py-5">
          <!-- Story -->
          <!-- Magnific Popup (.js-gallery class is initialized in Helpers.jqMagnific()) -->
          <!-- For more info and examples you can check out http://dimsemenov.com/plugins/magnific-popup/ -->
          <article class="js-gallery story">
             {!! nl2br(e($chapter->body)) !!}
           </article>
          <!-- END Story -->

          <a class="nav-link" href="javascript:void(0)" wire:click="toggleLike({{ $chapter->id }})">
           
          </a>

          <!-- Actions -->
          <div class="mt-5 d-flex justify-content-between push">
            <div class="btn-group" role="group">
              {{-- <button type="button" class="btn btn-alt-secondary" data-bs-toggle="tooltip" title="Like Story">
                <i class="fa fa-thumbs-up text-primary"></i>
              </button> --}}
              <a wire:click="toggleLike({{ $chapter->id }})" class="btn btn-alt-secondary" data-bs-toggle="tooltip" title="Like Story">
               
                
                @if ($chapter->isLikedByUser(auth()->id()))
                <i class="fa fa-heart text-danger"></i>
                
                    {{-- <i class="fa fa-thumbs-down opacity-50 me-1"></i>  --}}
                @else
                <i class="fa fa-heart"></i>
                    {{-- <i class="fa fa-thumbs-up opacity-50 me-1"></i>  --}}
                @endif
                {{-- {{ $chapter->like_count }} --}}

              </a>

             

            </div>
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-alt-secondary dropdown-toggle" id="dropdown-blog-story" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-share-alt opacity-50 me-1"></i> Share
              </button>
              <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="dropdown-blog-story">
                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ url('read/'.$chapter->slug) }}" target="_blank">
                  <i class="fab fa-fw fa-facebook me-1"></i> Facebook
                </a>
                <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ url('read/'.$chapter->slug) }}" target="_blank">
                  <i class="fab fa-fw fa-twitter me-1"></i> Twitter
                  {{-- &text={{ url('read/'.$chapter->title) }}" --}}
                </a>
                <a class="dropdown-item" href="https://www.linkedin.com/sharing/share-offsite/?url={{ url('read/'.$chapter->slug) }}" target="_blank">
                  <i class="fab fa-fw fa-linkedin me-1"></i> LinkedIn
                </a>
              </div>
            </div>
          </div>
          <!-- END Actions -->

          <!-- Comments -->
          <div class="px-4 pt-4 rounded bg-body-extra-light">
            @if($chapter->like_count > 0)
           
            <p class="fs-sm">
              {{-- <i class="fa fa-thumbs-up text-info"></i> --}}
              <i class="fa fa-heart text-danger"></i>
              {!! $chapter->getLikesSummary() !!}
            </p>
            @endif
              <form wire:submit.prevent="addComment({{ $chapter->id }})">
                <input type="text" class="form-control form-control-alt" wire:model="comment" placeholder="Write a comment..">
              </form>
            <div class="pt-3 fs-sm">

              
             
              @forelse ($chapter->comments->sortByDesc('created_at')->take($perPageComments) as $comment)
                        
              <div class="d-flex">
                  <a class="flex-shrink-0 img-link me-2" href="{{ url('profile/'.$comment->user->id) }}">
                  <img class="img-avatar img-avatar32 img-avatar-thumb" src="{{ asset('src/assets/media/avatars/avatar2.jpg')}}" alt="">
                  </a>
                  <div class="flex-grow-1">
                  <p class="mb-1">
                      <a class="fw-semibold" href="{{ url('profile/'.$comment->user->id) }}">{{ $comment->user->name }}</a>
                      {{ $comment->content }}
                      <br>
                      <small class="text-muted d-block">Posted on {{ $comment->created_at->format('M d, Y h:i A') }}</small>
                  </p>
                  <p>
                      {{-- <a href="javascript:void(0)"  wire:click="toggleCommentLike({{ $comment->id }})" class="me-1">
                          @if ($comment->isLikedByUser(auth()->id()))
                              Unlike
                          @else
                              Like
                          @endif
                          ({{ $comment->count }})
                      </a> --}}

                    
                  </p>
                  
                  </div>
              </div>
              @empty
                  <li>No comments yet. Be the first to comment!</li>
                  <br>
              @endforelse

               <!-- Load More Button -->
              @if ($chapter->comments->count() > $perPageComments)
                <a wire:click="loadMoreComments" class="mb-5" href="javascript:void(0)">Load More Comments</a>
                <br><br>
                  {{-- <button class="btn btn-primary btn-sm mb-3" wire:click="loadMoreComments">Load More Comments</button> --}}
              @endif 

              {{-- <div class="d-flex">
                <a class="flex-shrink-0 img-link me-2" href="javascript:void(0)">
                  <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/avatar3.jpg" alt="">
                </a>
                <div class="flex-grow-1">
                  <p class="mb-1">
                    <a class="fw-semibold" href="javascript:void(0)">Betty Kelley</a>
                    Vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit.
                  </p>
                  <p>
                    <a class="me-1" href="javascript:void(0)">Like</a>
                    <a href="javascript:void(0)">Comment</a>
                  </p>
                  
                </div>
              </div> --}}

             
            </div>
          </div>
          <!-- END Comments -->

          @if($nextChapter)
              <a href="{{ url('read/'.$nextChapter->slug) }}" class="btn btn-primary mt-3">
                Continue to Next Chapter
              </a>
          @else
            <a  class="btn btn-primary mt-3 disabled">
              Story has ended
            </a>
          @endif
         
        </div>
       
      </div>

</div>


</div>
