<?php

namespace App\Console;

use App\Console\Commands\TestJobCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        Log::info("Running command");
        // $schedule->command('inspire')->hourly();
        // $schedule->command('test:job')->everyMinute();
        // $schedule->command('test:job')->cron('*/1 * * * *');
        // $schedule->command(TestJobCommand::class)->cron('*,30 * * * *');
        // $schedule->command(TestJobCommand::class)->cron('* * * * *');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
