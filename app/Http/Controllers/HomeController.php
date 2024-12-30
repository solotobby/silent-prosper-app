<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionIntent;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        $user = Auth::user();
        if($user->hasRole('regular')){
            return redirect('user/home');
        }else{
            return redirect('admin/home');
        }
       
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

        $decodedPlan = json_decode($plan, true); // Decode as an associative array

        $res = createSubscription($decodedPlan['parameters']);

        if($res['status'] == 'APPROVAL_PENDING'){
            
            DB::table('subscription_intents')->insert(['user_id' => Auth::id(), 'subscription_id' => $res['id'], 'plan_id'=>$decodedPlan['id'], 'duration'=>$decodedPlan['duration']]);

            return redirect($res['links'][0]['href']);
        }
        
    }

    public function subscribePlan(){
        $url = request()->fullUrl();
        $url_components = parse_url($url);
        parse_str($url_components['query'], $params);

        $id = $params['subscription_id'];

       $validate = SubscriptionIntent::where(['user_id' => Auth::id(), 'subscription_id' => $id])->orderBy('id', 'DESC')->first();
        if($validate){
              // Deactivate old subscription
            SubscriptionPlan::where('user_id', Auth::id())->update(['is_active' => false]);

            // Create new subscription
            SubscriptionPlan::create([
                'user_id' => Auth::id(),
                'subscription_id' => $validate->plan_id,
                'is_active' => true,
                'starts_at' => now(),
                'ends_at' => now()->add($validate->duration),
            ]);

            SubscriptionIntent::where('user_id', Auth::id())->delete();

            session()->flash('success', 'You have successfully subscribed!');
            return redirect()->route('home');
        }
    }
}
