<div>
    {{-- In work, do what you enjoy. --}}

<!-- Hero -->
<div class="bg-image" style="background-image: url('{{asset('src/assets/media/photos/photo11@2x.jpg')}}');">
  <div class="bg-black-75">
    <div class="content content-boxed text-center">
      <div class="py-5">
        <h1 class="fs-2 fw-normal text-white mb-2">
          <i class="fa fa-arrow-up me-1"></i> Upgrade Plan
        </h1>
        <h2 class="fs-4 fw-normal text-white-75">Get Unlimited Access to stories. Same Price different duration!</h2>
      </div>
    </div>
  </div>
</div>
<!-- END Hero -->

        <!-- Modern Design -->
        <h2 class="content-heading"></h2>
        <div class="row">
          {{-- @if (session()->has('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif --}}

          @if (session('info'))
              <div class="alert alert-info" role="alert">
                  {{ session('info') }}
              </div>
          @endif


            @foreach ($plans as $plan)
            <div class="col-md-6 col-xl-4">
                <!-- Freelancer Plan -->
                <a class="block block-link-pop block-rounded text-center" href="javascript:void(0)">
                  <div class="block-header">
                    <h3 class="block-title">{{$plan->plan_name}}</h3>
                  </div>
                  <div class="block-content bg-{{$plan->color_code}}">
                    <div class="py-2">
                      <p class="h1 fw-bold mb-2 text-white">${{ $plan->price }}</p>
                      <p class="h6 text-muted text-white">{{ $plan->duration }}</p>
                    </div>
                  </div>
                  <div class="block-content">
                    <div class="py-2">
                      <p>
                        <strong>Unlimited</strong> Read
                      </p>
                      <p>
                        <strong>Unlimited</strong> Bookmark
                      </p>
                      <p>
                        <strong>View Stories Read</strong> 
                      </p>
                      <p>
                        <strong>Get Rewarded on Each post</strong>
                      </p>
                      <p>
                        <strong>Email</strong> Support
                      </p>
                    </div>
                  </div>
                  <div class="block-content block-content-full bg-body-light">
                    <a href="{{ url('subscribe/'.$plan) }}" class="btn btn-hero btn-{{$plan->color_code}}">
                      Get Started
                    </a>
                    
                    {{-- <a href="{{ url('create/subscription/'.$plan->id) }}" class="btn btn-hero btn-{{$plan->color_code}}">
                      Get Started(New)
                    </a> --}}
                    
                    {{-- <button wire:click="subscribe({{ json_encode($plan) }})" class="btn btn-hero btn-{{$plan->color_code}} px-4">
                        Get Started
                    </button> --}}
                    {{-- <span class="btn btn-hero btn-secondary px-4">Get Started</span> --}}
                  </div>
                 
                </a>
                <!-- END Freelancer Plan -->
              </div>
            @endforeach
          
        </div>


</div>
