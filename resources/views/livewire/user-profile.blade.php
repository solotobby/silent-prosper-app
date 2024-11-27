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
                    <a href="javascript:void(0)" wire:click="toggleFollow" class="btn btn-sm btn-alt-{{ $isFollowing ? 'danger' : 'primary' }} space-x-1">
                        <i class="fa fa-user-alt opacity-50"></i>
                        <span> {{ $isFollowing ? 'Unfollow' : 'Follow' }}</span>
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
        <div class="col-md-12 col-sm-12">

            @include('layouts.resources.stories', $stories)

        </div>
{{-- 
        <div class="col-md-4 col-sm-4">

            sidebar
        </div> --}}
    </div>
</div>
