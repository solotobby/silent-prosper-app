<?php

namespace App\Livewire;

use App\Models\Setting;
use App\Models\Subscription;
use Livewire\Component;

class AdminHome extends Component
{

    public $createProduct;
    public $subscriptions;
    public $plans;
    public $setting;
    

    public function mount(){
        $this->subscriptions = Subscription::all();
        $this->setting  = Setting::query()->orderBy('created_at')->first();
    }

    public function createProduct(){
       $this->createProduct = createProduct();
        Setting::create(['paypal_product_id' => $this->createProduct['id'], 'paypal_product_name' => $this->createProduct['name']]);
    }

    public function setupPlan($subId){

        $subscription = Subscription::where('id', $subId)->first();
        $interval = $subscription->color_code == 'warning' ? 'YEAR' : 'MONTH';
        $plan = [
                'id' => $subscription->id,
                'product_id' => $this->setting->paypal_product_id,
                'name' => $subscription->plan_name,
                'description' => 'Subscription charged '.strtolower($interval).'ly',
                'price' => $subscription->price,
                'interval_unit' => $interval,
                'interval_count' => 1, // Every 1 month
        ];

        $processPlan = createPlans($plan);
        $subscription->parameters = $processPlan['id'];
        $subscription->save();

        session()->flash('message', 'Plan Created successfully!');
    }

    public function render()
    {
        return view('livewire.admin-home');
    }
}
