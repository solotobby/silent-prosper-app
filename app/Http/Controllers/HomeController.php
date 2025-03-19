<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\Story;
use App\Models\SubCategory;
use App\Models\SubscriptionIntent;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

    public function publishStory($slug){
        $story = Story::where('slug', $slug)->first();
        $story->is_published = 1;
        $story->save();
        return redirect('admin/story/list/published');
    }

    public function test(){
        return getAccessToken();
        // return createProduct();
        // return getPlans();
        // return createPlans();
        //  return showPlanDetails('P-3H104703DN293015CM5DYGGI'); 
        // return createSubscription('P-3H104703DN293015CM5DYGGI');
        // return getSubscription('I-RDT2YTRE9J6A');
    }

    public function editStory($slug){
        return $slug;
    }



    public function subscribe($plan){

        $decodedPlan = json_decode($plan, true); // Decode as an associative array

         $res = createSubscription($decodedPlan['parameters']);

        if($res['status'] == 'APPROVAL_PENDING'){
            
            DB::table('subscription_intents')->insert(['user_id' => Auth::id(), 'subscription_id' => $res['id'], 'plan_id'=>$decodedPlan['id'], 'duration'=>$decodedPlan['interval'], 'created_at' => now(), 'updated_at' => now()]);

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
            SubscriptionPlan::where('user_id', Auth::id())->update(['status' => 'inactive']);

            // Create new subscription
            SubscriptionPlan::create([
                'user_id' => Auth::id(),
                'subscription_id' => $validate->plan_id,
                'status' => 'active',
                'paypal_subscription_id' => $id,
                'starts_at' => now(),
                'ends_at' => now()->add($validate->duration),
            ]);

            SubscriptionIntent::where('user_id', Auth::id())->delete();
            return redirect()->route('home');
            session()->flash('success', 'You have successfully subscribed!');
            
        }
    }

    public function subscriptionClosed(){
        $url = request()->fullUrl();
        $url_components = parse_url($url);
        parse_str($url_components['query'], $params);
        $id = $params['subscription_id'];
        SubscriptionIntent::where('user_id', Auth::id())->where('subscription_id', $id)->delete();
        return redirect()->route('subscription.page')->with(['info', 'Subscription Exited!']);
        // session()->flash('success', 'Subscription Exited!');
    }


    public function updateStoryCompleted($slug){
        setStoryCompleted($slug);
        return back()->with('success', 'Story Updated Successfully');
    }

    public function getSubcategories($id)
    {
        
        // Retrieve subcategories for the given category id
        $subcategories = SubCategory::where('category_id', $id)->get();
        
        // Return the subcategories as JSON
        return response()->json($subcategories);
    }

    public function sendEmail()
    {
        
        Mail::to('solotobby@gmail.com')->send(new TestEmail());

        return "Email sent successfully!";
    }
}
