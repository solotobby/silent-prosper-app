<?php
//PAYPAL PAYMENT INTEGRATION
//ProductId: PROD-0AT96530RW6034239
//PlanIds: P-9BL233847N5977520M5DYGGA, P-3H104703DN293015CM5DYGGI, P-5LE61173057116243M5DYGGQ

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use Srmklive\PayPal\Services\PayPal as PayPalClient;


if (! function_exists('getAccessToken')) {
    function getAccessToken(){

            $clientId = env('PAYPAL_CLIENT_ID');
            $clientSecret = env('PAYPAL_CLIENT_SECRET');

            // PayPal API endpoint
            $url = env('PAYPAL_URL').'oauth2/token'; // Use live URL for production

            // Encode credentials to Base64
            $base64Credentials = base64_encode("{$clientId}:{$clientSecret}");

            // Make the HTTP request
            $response = Http::withHeaders([
                'Authorization' => "Basic {$base64Credentials}",
                'Content-Type' => 'application/x-www-form-urlencoded',
            ])->asForm()->post($url, [
                'grant_type' => 'client_credentials',
            ]);

            // Check if the request was successful
            if ($response->successful()) {
                return $response->json()['access_token']; // Return the access token and other data
            } else {
                // Handle error
                return [
                    'error' => true,
                    'message' => $response->body(),
                ];
            }


        }
    }


if (! function_exists('getPlans')) {
    function getPlans(){
        // $res = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        // ])->withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'))
        // ->get(env('PAYPAL_URL').'billing/plans')->throw();

        $accessToken = getAccessToken();
        $url = env('PAYPAL_URL').'billing/plans';
        // Make the HTTP request
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
            'Content-Type' => 'application/json',
        ])->get($url)->throw();


        return json_decode($response->getBody()->getContents(), true);
    }
}

if (! function_exists('createProduct')) {
    function createProduct(){

        $accessToken = getAccessToken();
        $url = env('PAYPAL_URL').'catalogs/products';

        $payload =[
            'name' => 'Eclatspad Premium Content Access',
            'description' => 'Subscription to premium stories and features',
            'type' => 'SERVICE', // Type of product: SERVICE or PHYSICAL
            'category' => 'SOFTWARE', // Example category
            'image_url' => 'https://yourapp.com/images/premium-product.png',
            'home_url' => url('/subscriptions'),
        ];

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
            'Content-Type' => 'application/json',
        ])->post($url, $payload)->throw();

        // $res = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        // ])->withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'))
        //   ->post(env('PAYPAL_URL').'catalogs/products', $payload)->throw();

        return json_decode($response->getBody()->getContents(), true);

    }
}

if (! function_exists('createPlans')) {
    function createPlans($plan){

        $url = env('PAYPAL_URL').'billing/plans';
        $accessToken = getAccessToken();

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
                'percentage' => '20', // Tax percentage
                'inclusive' => false,
            ],
        ];

       
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
            'Content-Type' => 'application/json',
        ])->post($url, $payload)->throw();

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

       $accessToken = getAccessToken();

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
                'brand_name' => 'ECLATSPAD',
                'locale' => 'en-GB',
                'shipping_preference' => 'NO_SHIPPING',
                'user_action' => 'SUBSCRIBE_NOW', // Directs the user to confirm the subscription
                'return_url' => url('validate/subscription/plan'), // Redirect after successful approval
                'cancel_url' => url('subscriptions/closed'), // Redirect if user cancels
            ],
        ];

        $url = env('PAYPAL_URL').'billing/subscriptions';
        // Make the HTTP request
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
            'Content-Type' => 'application/json',
        ])->post($url, $payload)->throw();


        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        // ])->withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'))
        // ->post(env('PAYPAL_URL').'billing/subscriptions', $payload)->throw(); //billing/plans/{id}

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