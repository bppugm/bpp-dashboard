<?php

namespace App\Console;

use App\Jobs\UpdateScopusArticle;
use App\Jobs\UpdateScopusProceeding;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new UpdateScopusArticle)
            // ->dailyAt('08:00');
            ->dailyAt(date('H:i'));

        $schedule->job(new UpdateScopusProceeding)
            // ->dailyAt('08:00');
            ->dailyAt(date('H:i'));
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
