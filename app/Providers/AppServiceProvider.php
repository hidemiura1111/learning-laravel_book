<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MyClasses\MyService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config([
            'sample.data' => ['Eins', 'Zwei', 'Drei']
        ]);

        app()->bind('App\MyClasses\MyService', function ($app) {
            $myService = new MyService();
            $myService->setId(0);
            return $myService;
        });
    }
}
