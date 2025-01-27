<?php

namespace App\Console\Commands;

use App\Models\SubscriptionPlan;
use Illuminate\Console\Command;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        SubscriptionPlan::where('is_active', true)
        ->where('ends_at', '<', now())
        ->update(['is_active' => false]);

        $this->info('Expired subscriptions have been updated.');



    }
}
