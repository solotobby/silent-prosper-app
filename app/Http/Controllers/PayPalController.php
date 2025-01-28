<?php

namespace App\Http\Controllers;

use App\Subscriptions\PayPalSubscriptions;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    protected $paypalSubscriptions;

    public function __construct(PayPalSubscriptions $paypalSubscriptions)
    {
        dd($paypalSubscriptions);
        $this->paypalSubscriptions = $paypalSubscriptions;
    }

    public function createSubscription($subscribe){
        return $subscribe;
        // $this->paypalSubscriptions->create();
    }
}
