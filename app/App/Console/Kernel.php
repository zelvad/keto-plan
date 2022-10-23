<?php

namespace App\Console;

use Domain\Subscription\Commands\SubscriptionExpiredChargeCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    public $commands = [
        SubscriptionExpiredChargeCommand::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->command('subscriptions:charge')->dailyAt('02:00');
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
