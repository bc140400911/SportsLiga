<?php

namespace App\Console;

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


        \App\Console\Commands\TournamentSave::class,


    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->command('tournament:save')->everyThirtyMinutes();
        $schedule->command('team:save')->everyThirtyMinutes();
        $schedule->command('update:matches')->everyThirtyMinutes();
        $schedule->command('standing:save')->everyThirtyMinutes();
        $schedule->command('update:stadium')->everyThirtyMinutes();
        $schedule->command('player:save')->everyThirtyMinutes();
        $schedule->command('save:scoreboard')->everyThirtyMinutes();
        $schedule->command('save:goal')->everyThirtyMinutes();
        $schedule->command('save:card')->everyThirtyMinutes();
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
