<?php

namespace App\Subscriptions;

use app\Subscriptions\Subscriptions;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalSubscriptions implements Subscriptions {

    private $provider;

    public function __construct()
    {
        $this->provider = new PayPalClient();

        $this->provider->setApiCredentials(config('paypal'));

    }


    public function create(int $plan_id, int $coupon_user_id, string $method, float $amount = 0)
    {

        return $plan_id;
        // Implementation goes here
    }

    public function cancel(?string $subscription_id = null)
    {
        
    }

    public function resume(?string $subscription_id = null)
    {
        
    }

    public function pause(?string $subscription_id = null)
    {
        
    }





}