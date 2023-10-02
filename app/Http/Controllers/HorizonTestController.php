<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use App\Models\User;
use App\Jobs\HorizonTestJob;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Throwable;

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

    public function batch_run()
    {
        $batch = Bus::batch([
            new HorizonTestJob(User::find(1)),
            new HorizonTestJob(User::find(2)),
            new HorizonTestJob(User::find(3)),
            new HorizonTestJob(User::find(4)),
            new HorizonTestJob(User::find(5)),
        ])->then(function (Batch $batch) {
            // すべてのジョブが正常に完了
        })->catch(function (Batch $batch, Throwable $e) {
            // バッチジョブの失敗をはじめて検出
        })->finally(function (Batch $batch) {
            // バッチの実行が終了
        })->dispatch();

        return $batch->id;
    }
}
