<?php

namespace App\Livewire;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubscriptionPlans extends Component
{

    public $plans = [
        ['id' => 1, 'name' => 'Monthly', 'price' => 1.50, 'duration' => '1 month'],
        ['id' => 2, 'name' => 'Bi-annualy', 'price' => 9.00, 'duration' => '6 months'],
        ['id' => 3, 'name' => 'Yearly', 'price' => 18.00, 'duration' => '1 year']
    ];

    public function mount(){
        $this->plans = Subscription::all();
    }

    public function subscribe($plan){

        $user = Auth::user();
        
        // Deactivate old subscription
        SubscriptionPlan::where('user_id', $user->id)->update(['is_active' => false]);

        // Create new subscription
        SubscriptionPlan::create([
            'user_id' => $user->id,
            'subscription_id' => $plan['id'],
            'is_active' => true,
            'status' => 'active',
            'starts_at' => now(),
            'ends_at' => now()->add($plan['duration']),
        ]);

        session()->flash('success', 'You have successfully subscribed!');
        return redirect()->route('home');
    }


    public function render()
    {
        return view('livewire.subscription-plans');
    }
}
