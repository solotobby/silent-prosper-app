<?php

namespace App\Livewire;

use App\Models\Setting;
use App\Models\Story;
use App\Models\StoryRead;
use App\Models\Subscription;
use App\Models\User;
use Livewire\Component;

class AdminHome extends Component
{

    public $createProduct;
    public $subscriptions;
    public $plans;
    public $setting;
    public $users;
    public $stories;
    public $storyRead;
    public $subscriptionsPlans;
    

    public function mount(){
        $this->subscriptions = Subscription::all();
        $this->setting  = Setting::query()->orderBy('created_at')->first();
        $this->users = User::where('role', 'regular')->count();
        $this->stories = Story::query()->count();
        $this->storyRead = StoryRead::query()->count();

        $this->subscriptionsPlans = \DB::table('subscriptions')
            ->join('subscription_plans', 'subscriptions.id', '=', 'subscription_plans.subscription_id')
            ->select('subscriptions.plan_name', 'subscriptions.color_code', \DB::raw('COUNT(subscription_plans.user_id) as total_users'))
            ->groupBy(['subscriptions.plan_name', 'subscriptions.color_code'])
                // ->select('subscription_id', \DB::raw('COUNT(user_id) as total_users'))
                // ->groupBy('subscription_id')
                ->get();
        

    }

    public function setupProduct(){
        $this->createProduct = createProduct();
        Setting::firstOrCreate(['paypal_product_id' => $this->createProduct['id'], 'paypal_product_name' => $this->createProduct['name']]);
        $this->dispatch('refresh');
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
