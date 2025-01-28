<div>
    {{-- In work, do what you enjoy. --}}


        <!-- Modern Design -->
        <h2 class="content-heading">Subscription Plans <small>Same Price different duration</small></h2>
        <div class="row">
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
                    {{-- <br>  <br>
                    <a href="{{ url('create/subscription/'.$plan) }}" class="btn btn-hero btn-{{$plan->color_code}}">
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
