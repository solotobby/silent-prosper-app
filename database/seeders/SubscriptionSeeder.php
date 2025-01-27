<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscriptions = [
            ['id' => 1, 'plan_name' => 'Monthly', 'price' => '2', 'color_code' => 'info', 'interval' => '1 month'],
            ['id' => 2, 'plan_name' => 'Bi-Annual', 'price' => '12', 'color_code' => 'warning', 'interval' => '6 months'],
            ['id' => 3, 'plan_name' => 'Annual', 'price' => '24', 'color_code' => 'success', 'interval' => '12 months'],
        ];

        foreach($subscriptions as $sub){
            Subscription::create($sub);
        }
    }
}
