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
        'role',
        'username',
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

    public function bookShelfedStories(){
        return $this->hasMany(BookShelf::class, 'user_id');
    }

    public function hasRole($role = []): bool
    {
        if (is_array($role)) {
            return in_array($this->role, $role);
        }
        return $this->role == $role;
    }

    public function userSubscription()
    {
        return $this->hasOne(SubscriptionPlan::class);
    }

    public function subscriptionPlans()
    {
        return $this->hasMany(SubscriptionPlan::class);
    }

    public function currentSubscriptionPlan()
    {
        return $this->subscriptionPlans()
            ->where('status', 'active')
            ->where('ends_at', '>', now()) // Ensure it's not expired
            ->with('subscription') // Load related subscription details
            ->first(); // Return the latest active plan
    }

    public function getcurrentSubscriptionPlan()
    {
        return $this->hasOne(SubscriptionPlan::class)
            ->where('status', 'active')
            ->where('ends_at', '>', now())
            ->with('subscription') // Include the subscription details
            ->first();
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

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }
   
}
