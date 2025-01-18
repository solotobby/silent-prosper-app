<div>
    {{-- Success is as dangerous as failure. --}}
<style>

.avatar-success {
    width: 150px; /* Set the desired size */
    height: 150px; /* Set the desired size */
    border-radius: 50%; /* Make it round */
    border: 4px solid #5075ba; /* Success color (green) border */
    object-fit: cover; /* Ensures the image fits within the container without stretching */
}
</style>

    <div class="rounded border overflow-hidden push">
        <div class="bg-image pt-9" style="background-image: url('{{asset('src/assets/media/photos/photo19@2x.jpg')}}');"></div>
            <div class="px-4 py-3 bg-body-extra-light d-flex flex-column flex-md-row align-items-center">
                <a class="d-block img-link mt-n5" href="#">
                    <img class="img-avatar img-avatar128 img-avatar-thumb border border-{{ isset($subscription['color_code']) ? $subscription['color_code'] : "" }} " src="{{asset('src/assets/media/avatars/avatar13.jpg')}}" alt="">
                </a>
            <div class="ms-3 flex-grow-1 text-center text-md-start my-3 my-md-0">
                <h1 class="fs-4 fw-bold mb-1">{{ $user->name }}</h1>
                <h2 class="fs-sm fw-medium text-muted mb-0">
                <a href="javascript:void(0)" class="text-muted">{{$user->followers()->count() ?? 0}} Followers</a> &bull; 
                <a href="javascript:void(0)" class="text-muted">{{ $user->followings()->count() ?? 0}} Following</a> &bull;
                <a href="javascript:void(0)" class="text-muted"> {{ $user->total_views ?? 0 }} Views</a> &bull;
                <a href="javascript:void(0)" class="text-muted"> {{ $user->total_likes ?? 0 }} Likes</a> &bull;
                <a href="javascript:void(0)" class="text-muted">{{ $user->total_comments ?? 0 }} Comments</a>

                </h2>
                <h2 class="fs-sm fw-medium text-muted mt-2">
                  
                    {{-- Referral Link: {{ url('/reg?referral_code='.auth()->user()->referral_code) }} --}}
                </h2>
               
            </div>
            <div class="space-x-1">
                @if (auth()->id() !== $user->id)
                    <a href="javascript:void(0)" wire:click="toggleFollow" class="btn btn-sm btn-alt-{{ $isFollowing ? 'secondary' : 'primary' }} space-x-1">
                        <i class="fa fa-user-alt opacity-50"></i>
                        <span> {{ $isFollowing ? 'Following' : 'Follow' }}</span>
                    </a>
                @else
                    <a href="{{ url('settings') }}" class="btn btn-sm btn-alt-secondary space-x-1">
                        <i class="fa fa-pencil-alt opacity-50"></i>
                        <span>Edit Profile</span>
                    </a>
                @endif

                

                {{-- @if(auth()->user()->id == $user->id)
                <a href="{{ url('settings') }}" class="btn btn-sm btn-alt-secondary space-x-1">
                <i class="fa fa-pencil-alt opacity-50"></i>
                <span>Edit Profile</span>
                </a>
                @endif --}}
            </div>
        </div>
    </div>

    <div class="row">
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

        {{-- <div class="col-md-12 col-sm-12">

            @include('layouts.resources.stories', $stories)

        </div> --}}
{{-- 
        <div class="col-md-4 col-sm-4">

            sidebar
        </div> --}}
    </div>
</div>
