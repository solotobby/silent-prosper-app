<div>
    {{-- Be like water. --}}

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h3>Paypal Subscription mgt</h3>
    @if(!$setting)
        <a class="btn btn-primary" wire:click="setupProduct">
            Setup Product
        </a>
    @else
       Paypal Product ID: {{ $setting->paypal_product_id }}
    @endif
    <br><br>
    <div class="row">
        @foreach ($subscriptions as $sub)
        <div class="col-md-4">
            PlanID: <b>{{ $sub->parameters }}</b><br>
            Plan name: {{ $sub->plan_name }}<br>
            Amount: {{ $sub->price }}<br>
            Color Code: {{ $sub->color_code }}<br>
            Duration: {{ $sub->duration }}<br>
            <button class="btn btn-secondary btn-sm" wire:click='setupPlan({{ $sub->id }})'>
                Setup Plan 
            </button>
        </div>
        @endforeach
    </div>

   
    <!-- Simple -->
    <h2 class="content-heading">Simple</h2>
    <div class="row">
        <div class="col-md-6 col-xl-3">
        <a class="block block-rounded block-link-pop" href="javascript:void(0)">
            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
            <div>
                <i class="fa fa-2x fa-arrow-up text-primary"></i>
            </div>
            <div class="ms-3 text-end">
                <p class="fs-3 fw-medium mb-0">
                {{ $stories }}
                </p>
                <p class="text-muted mb-0">
                Stories
                </p>
            </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a class="block block-rounded block-link-pop" href="javascript:void(0)">
            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
            <div>
                <i class="far fa-2x fa-user-circle text-success"></i>
            </div>
            <div class="ms-3 text-end">
                <p class="fs-3 fw-medium mb-0">
                {{ $storyRead }}
                </p>
                <p class="text-muted mb-0">
                    Read
                </p>
            </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a class="block block-rounded block-link-pop" href="javascript:void(0)">
            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
            <div class="me-3">
                <p class="fs-3 fw-medium mb-0">
                960
                </p>
                <p class="text-muted mb-0">
                Read Time
                </p>
            </div>
            <div>
                <i class="fa fa-2x fa-chart-area text-danger"></i>
            </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a class="block block-rounded block-link-pop" href="javascript:void(0)">
            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
            <div class="me-3">
                <p class="fs-3 fw-medium mb-0">
                359
                </p>
                <p class="text-muted mb-0">
                Projects
                </p>
            </div>
            <div>
                <i class="fa fa-2x fa-box text-warning"></i>
            </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
            {{-- bg-primary --}}
        <a class="block block-rounded block-link-shadow " href="javascript:void(0)">
            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
            <div>
                <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighters"></i>
            </div>
            <div class="ms-3 text-end">
                <p class="fs-3 fw-medium mb-0">
                {{ $users }}
                </p>
                <p class="text-whites-75 mb-0">
                Users 
                </p>
            </div>
            </div>
        </a>
        </div>
        @foreach ($subscriptionsPlans as $plan)
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow bg-{{$plan->color_code}}" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                    <div>
                        <i class="far fa-2x fa-user text-success-light"></i>
                    </div>
                    <div class="ms-3 text-end">
                        <p class="text-white fs-3 fw-medium mb-0">
                            {{$plan->total_users}}
                        </p>
                        <p class="text-white-75 mb-0">
                            {{$plan->plan_name}}
                        </p>
                    </div>
                    </div>
                </a>
            </div>
        @endforeach
        
        {{-- <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-link-shadow bg-danger" href="javascript:void(0)">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                <div class="me-3">
                    <p class="text-white fs-3 fw-medium mb-0">
                    450
                    </p>
                    <p class="text-white-75 mb-0">
                    6 Months Subs
                    </p>
                </div>
                <div>
                    <i class="fa fa-2x fa-chart-line text-black-50"></i>
                </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-link-shadow bg-warning" href="javascript:void(0)">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                <div class="me-3">
                    <p class="text-white fs-3 fw-medium mb-0">
                    63
                    </p>
                    <p class="text-white-75 mb-0">
                    Annual Subs
                    </p>
                </div>
                <div>
                    <i class="fa fa-2x fa-boxes text-black-50"></i>
                </div>
                </div>
            </a>
        </div> --}}


        {{-- <div class="col-md-6">
            <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full">
                <div class="row text-center">
                    <div class="col-4 border-end">
                    <div class="py-3">
                        <div class="item item-circle bg-body-light mx-auto">
                        <i class="fa fa-briefcase text-primary"></i>
                        </div>
                        <p class="fs-3 fw-medium mt-3 mb-0">
                        61
                        </p>
                        <p class="text-muted mb-0">
                        Projects
                        </p>
                    </div>
                    </div>
                    <div class="col-4 border-end">
                    <div class="py-3">
                        <div class="item item-circle bg-body-light mx-auto">
                        <i class="fa fa-chart-line text-primary"></i>
                        </div>
                        <p class="fs-3 fw-medium mt-3 mb-0">
                        50
                        </p>
                        <p class="text-muted mb-0">
                        Sales
                        </p>
                    </div>
                    </div>
                    <div class="col-4">
                    <div class="py-3">
                        <div class="item item-circle bg-body-light mx-auto">
                        <i class="fa fa-users text-primary"></i>
                        </div>
                        <p class="fs-3 fw-medium mt-3 mb-0">
                        15
                        </p>
                        <p class="text-muted mb-0">
                        Clients
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </a>
        </div> --}}
        {{-- <div class="col-md-6">
            <a class="block block-rounded bg-gd-sublime" href="javascript:void(0)">
                <div class="block-content block-content-full">
                <div class="row text-center">
                    <div class="col-4 border-end border-black-op">
                    <div class="py-3">
                        <div class="item item-circle bg-black-25 mx-auto">
                        <i class="fa fa-briefcase text-white"></i>
                        </div>
                        <p class="text-white fs-3 fw-medium mt-3 mb-0">
                        61
                        </p>
                        <p class="text-white-75 mb-0">
                        Projects
                        </p>
                    </div>
                    </div>
                    <div class="col-4 border-end border-black-op">
                    <div class="py-3">
                        <div class="item item-circle bg-black-25 mx-auto">
                        <i class="fa fa-chart-line text-white"></i>
                        </div>
                        <p class="text-white fs-3 fw-medium mt-3 mb-0">
                        50
                        </p>
                        <p class="text-white-75 mb-0">
                        Sales
                        </p>
                    </div>
                    </div>
                    <div class="col-4">
                    <div class="py-3">
                        <div class="item item-circle bg-black-25 mx-auto">
                        <i class="fa fa-users text-white"></i>
                        </div>
                        <p class="text-white fs-3 fw-medium mt-3 mb-0">
                        15
                        </p>
                        <p class="text-white-75 mb-0">
                        Clients
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </a>
        </div> --}}
    </div>
    <!-- END Simple -->
   
   

</div>
