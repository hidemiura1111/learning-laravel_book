<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;

class HorizonController extends Controller
{
    public function redis_test()
    {
        Redis::set('name', 'laracast');
        $name = Redis::get('name');

        dd($name);
        return view('welcome');
    }
}
