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

        // Bind and singleton
        // app()->bind('App\MyClasses\MyService', function ($app) {
        // app()->singleton('App\MyClasses\MyService', function ($app) {
        //     $myService = new MyService();
        //     $myService->setId(0);
        //     return $myService;
        // });

        app()->when('App\MyClasses\MyService')
            ->needs('$id')
            ->give(2);
    }
}
