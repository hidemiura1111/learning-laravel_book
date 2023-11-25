<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class HorizonTestJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(2);
        Log::info('Job with ID: ' . $this->user->id);

        // Tested the failed job
        throw new \Exception('Something went wrong');
    }

    public function tags()
    {
        return ['HorizonTestJob_user-' . $this->user->id]; // Test Monitor 2 
        // return ['HorizonTestJob']; // Test Monitor

        // return ['HorizonTestJob', 'user-' . $this->user->id]; // Monitor cannot catch this tag
    }
}
