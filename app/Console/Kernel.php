<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Person;
use App\Jobs\MyJob;

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
        // $schedule->command('inspire')->hourly();

        // Exec Shell file by php artisan schedule:run
        // $schedule->exec('./mycmd.sh');

        // Exec artisan command by php artisan schedule:run
        // In this case, exec queue
        // $schedule->command('queue:work --stop-when-empty');

        $count = Person::all()->count();
        $id = rand(0, $count) + 1;
        $schedule->call(function() use ($id) {
            $person = Person::find($id);
            // Person::find($id)->delete();
            MyJob::dispatch($person);
        });
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
