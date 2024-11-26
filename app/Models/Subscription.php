<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [ 'plan_name', 'price', 'color_code', 'duration', 'parameter'];

    protected $casts = [
        'ends_at' => 'datetime',
    ];

    public function isActive()
    {
        return $this->ends_at && $this->ends_at->isFuture();
    }

    public function plans()
    {
        return $this->hasMany(SubscriptionPlan::class);
    }


   

    // public function isActive()
    // {
    //     return $this->ends_at && Carbon::now()->lessThan($this->ends_at);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
