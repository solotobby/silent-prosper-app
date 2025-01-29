<?php

namespace App\Http\Controllers;

use App\Subscriptions\PayPal;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    protected $paypalSubscriptions;

    public function __construct(PayPal $paypalSubscriptions)
    {
        $this->paypalSubscriptions = $paypalSubscriptions;
    }

    public function createSubscription($subscribe){
      
        return $this->paypalSubscriptions->create($subscribe, 0, 'paypal', 0);
    }
}
