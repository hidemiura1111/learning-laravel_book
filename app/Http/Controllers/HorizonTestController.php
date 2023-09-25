<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use App\Models\User;
use App\Jobs\HorizonTestJob;

class HorizonTestController extends Controller
{
    public function redis_test()
    {
        Redis::set('name', 'laracast');
        $name = Redis::get('name');

        dd($name);
        return view('welcome');
    }

    public function jobs($jobs, $user)
    {
        $user = User::find($user);

        for ($i = 0; $i < $jobs; $i++) {
            HorizonTestJob::dispatch($user);
        }
    }
}
