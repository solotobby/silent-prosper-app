<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'alias',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function stories(){
        return $this->hasMany(Story::class);
    }

    public function subscriptionPlans()
    {
        return $this->hasMany(SubscriptionPlan::class);
    }

    public function currentSubscriptionPlan()
    {
        return $this->subscriptionPlans()
            ->where('is_active', true)
            ->where('ends_at', '>', now()) // Ensure it's not expired
            ->with('subscription') // Load related subscription details
            ->first(); // Return the latest active plan
    }

    public function getSubscriptionDetails()
    {
        $subscriptionPlan = $this->currentSubscriptionPlan();

        if ($subscriptionPlan) {
            return [
                'is_subscribed' => true,
                'plan_name' => $subscriptionPlan->subscription->plan_name,
                'color_code' => $subscriptionPlan->subscription->color_code,
                'price' => $subscriptionPlan->subscription->price,
                'ends_at' => $subscriptionPlan->ends_at, // Format the date
                'status' => $subscriptionPlan->is_active,
            ];
        }

        return [
            'is_subscribed' => false,
            'plan_name' => null,
            'ends_at' => null,
        ];
    }

    // public function subscriptions(){
    //     return $this->belongsToMany(Subscription::class, 'subscription_plans', 'user_id');
    // }

    // public function isSubscribed(){
    //     return $this->subscriptionPlan()->where('is_active', true)->exists()  && $this->subscriptionPlan[0]['ends_at']->isFuture();
    // }
   
    public function scopeWithPostStats(Builder $query, $userId)
    {

        return $query->where('id', $userId)
            ->withCount(['stories as total_likes' => function ($query) {
                $query->select(DB::raw('sum(likes_count)'));
           
            }])
            ->withCount(['stories as total_views' => function ($query) {
                        
                $query->select(DB::raw('sum(views_count)'));
            }])
            ->withCount(['stories as total_comments' => function ($query) {
                        
                $query->select(DB::raw('sum(comments_count)'));
            }]);
    }

  

   
        // $hasActiveSubscription = $this->subscription && $this->subscription->ends_at->isFuture();
        // // $hasActiveSubscription = $user->subscription && $user->subscription->ends_at->isFuture();
        // if($hasActiveSubscription){
        //     return true;
        // }else{
        //     return false;
        // }
   
}
