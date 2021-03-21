<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Person;
use App\Jobs\MyJob;
use Illuminate\Support\Facades\Storage;

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

        // Closure
        // $schedule->call(function() use ($id) {
        //     $person = Person::find($id);
        //     // Person::find($id)->delete();
        //     MyJob::dispatch($person);
        // });

        $obj = new ScheduleObj($id);
        $schedule->call($obj);
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

Class ScheduleObj
{
    private $person;

    public function __construct($id)
    {
        $this->person = Person::find($id);
    }

    public function __invoke()
    {
        Storage::append('person_access_log.txt', $this->person->all_data);
        MyJob::dispatch($this->person);
        return 'true';
    }
}