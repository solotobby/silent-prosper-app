<?php
//PAYPAL PAYMENT INTEGRATION
//ProductId: PROD-0AT96530RW6034239
//PlanIds: P-9BL233847N5977520M5DYGGA, P-3H104703DN293015CM5DYGGI, P-5LE61173057116243M5DYGGQ

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

if (! function_exists('getPlans')) {
    function getPlans(){
        $res = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'))
        ->get(env('PAYPAL_URL').'billing/plans')->throw();

        return json_decode($res->getBody()->getContents(), true);
    }
}

if (! function_exists('createProduct')) {
    function createProduct(){

        $payload =[
            'name' => 'Premium Content Access',
            'description' => 'Subscription to premium stories and features',
            'type' => 'SERVICE', // Type of product: SERVICE or PHYSICAL
            'category' => 'SOFTWARE', // Example category
            'image_url' => 'https://yourapp.com/images/premium-product.png',
            'home_url' => url('/subscriptions'),
        ];

        $res = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'))
        ->post(env('PAYPAL_URL').'catalogs/products', $payload)->throw();

        return json_decode($res->getBody()->getContents(), true);

    }
}

if (! function_exists('createPlans')) {
    function createPlans($plan){

        // $plans = [
        //     [
        //         'name' => 'Monthly Plan',
        //         'description' => 'Subscription charged monthly.',
        //         'price' => '1.5',
        //         'interval_unit' => 'MONTH',
        //         'interval_count' => 1, // Every 1 month
        //     ],
        //     [
        //         'name' => '6-Months Plan',
        //         'description' => 'Subscription charged every 6 months.',
        //         'price' => '9',
        //         'interval_unit' => 'MONTH',
        //         'interval_count' => 6, // Every 6 months
        //     ],
        //     [
        //         'name' => 'Yearly Plan',
        //         'description' => 'Subscription charged yearly.',
        //         'price' => '18',
        //         'interval_unit' => 'YEAR',
        //         'interval_count' => 1, // Every 1 year
        //     ],
        // ];

        $payload =  [
            "product_id"=> $plan['product_id'],
            'name' => $plan['name'],
            'description' => $plan['description'],
            'status' => 'ACTIVE',
            'billing_cycles' => [
            [
                'frequency' => [
                    'interval_unit' => $plan['interval_unit'],
                    'interval_count' => $plan['interval_count'],
                ],
                'tenure_type' => 'REGULAR',
                'sequence' => 1,
                'total_cycles' => 0, // 0 for unlimited billing
                'pricing_scheme' => [
                    'fixed_price' => [
                        'value' => $plan['price'],
                        'currency_code' => 'GBP',
                    ],
                ],
            ],
        ],
            'payment_preferences' => [
                'auto_bill_outstanding' => true,
                'setup_fee' => [
                    'value' => '0',
                    'currency_code' => 'GBP',
                ],
                'setup_fee_failure_action' => 'CONTINUE',
                'payment_failure_threshold' => 6,
            ],
            'taxes' => [
                'percentage' => '0', // Tax percentage
                'inclusive' => false,
            ],
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'))
        ->post(env('PAYPAL_URL').'billing/plans', 
            $payload
        )->throw();

        return json_decode($response->getBody()->getContents(), true);
       
    }
}

if (! function_exists('showPlanDetails')) {
    function showPlanDetails($planId){


        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'))
        ->get(env('PAYPAL_URL').'billing/plans/'.$planId)->throw(); //billing/plans/{id}

         return json_decode($response->getBody()->getContents(), true);



    }
}

if (! function_exists('createSubscription')) {
    function createSubscription($planId){
        $user = Auth::user();
        $payload = [
            'plan_id' => $planId,
            'subscriber' => [
                'name' => [
                    'given_name' => $user->name, //$subscriberDetails['first_name'],
                    'surname' => $user->name, //$subscriberDetails['last_name'],
                ],
                'email_address' => $user->email, //$subscriberDetails['email'],
            ],
            'application_context' => [
                'brand_name' => 'Your App Name',
                'locale' => 'en-GB',
                'shipping_preference' => 'NO_SHIPPING',
                'user_action' => 'SUBSCRIBE_NOW', // Directs the user to confirm the subscription
                'return_url' => url('validate/subscription/plan'), // Redirect after successful approval
                'cancel_url' => url('subscriptions'), // Redirect if user cancels
            ],
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'))
        ->post(env('PAYPAL_URL').'billing/subscriptions', $payload)->throw(); //billing/plans/{id}

         return json_decode($response->getBody()->getContents(), true);


    }
}

if (! function_exists('getSubscription')) {
    function getSubscription($subscriptionId){
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'))
        ->get(env('PAYPAL_URL').'billing/subscriptions/'.$subscriptionId)->throw(); //billing/plans/{id}

         return json_decode($response->getBody()->getContents(), true);

    }
}