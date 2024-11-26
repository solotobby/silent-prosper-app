<?php

use App\Models\SubscriptionPlan;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

$schedule->call(function(){
    
    SubscriptionPlan::where('is_active', true)
    ->where('ends_at', '<', now())
    ->update(['is_active' => false]);

    $this->info('Expired subscriptions have been updated.');
})->daily();

