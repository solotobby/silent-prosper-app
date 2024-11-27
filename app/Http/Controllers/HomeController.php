<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        return redirect('user/home');
        // return view('dashboard');
    }

    public function test(){
        // return createProduct();
        // return getPlans();
        // return createPlans();
        //  return showPlanDetails('P-3H104703DN293015CM5DYGGI'); 
        // return createSubscription('P-3H104703DN293015CM5DYGGI');
        // return getSubscription('I-RDT2YTRE9J6A');
    }

    public function subscribe($plan){
        
    }
}
