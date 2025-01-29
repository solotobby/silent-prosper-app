<?php

namespace App\Subscriptions;

use App\Models\Subscription;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPal implements Subscriptions{

    protected $provider;

    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
    }

    public function create(int $plan_id, int $coupon_user_id, string $method, float $amount = 0)
    {
        
        $plan = Subscription::find($plan_id);

        $payload = [
            'plan_id' => $plan->parameters,
            'start_time'=> now(),
            'quantity' => '1',
            'auto_renewal' => true,
            'shipping_amount' => [
                'currency_code' => 'GBP',
                'value' => $plan->price,
            ],
            'subscriber' => [
                'name' => [
                    'given_name' => Auth::user()->name,
                    'surname' => '',
                ],
                'email_address' => Auth::user()->email,
                'shipping_address' => [
                    'name' => [
                        'full_name' => Auth::user()->id . '-' . $coupon_user_id,
                    ],
                    // 'address' => $address,
                ],
            ],
            'application_context' => [
                'brand_name' => env('PAYPAL_PRODUCT_ID'),
                'locale' => 'en-US',
                'shipping_preference' => 'SET_PROVIDED_ADDRESS',
                'user_action' => 'SUBSCRIBE_NOW',
                'payment_method' => [
                    'payer_selected' => 'PAYPAL',
                    'payee_preferred' => 'IMMEDIATE_PAYMENT_REQUIRED',
                ],
                'return_url' => '',//route('payments.paypal.success', [$plan_id]),
                'cancel_url' => '',//route('payments.cancel'),
            ],
        ];


         // Send the request to create the subscription
        return $response = $this->provider->createSubscription($payload);

        // return $payload;


        // Implementation goes here
    }

}