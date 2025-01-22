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
    {{-- <button class="btn btn-primary" wire:click='createPlan'>
        Create Plans 
    </button> --}}

</div>
