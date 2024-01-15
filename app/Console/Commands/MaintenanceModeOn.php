<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MaintenanceModeOn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:on';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Turn on maintenance mode';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('maintenance')->update(['start_time' => now()]);
        $this->call('down');
        $this->info('Maintenance mode is ON.');
    }
}
