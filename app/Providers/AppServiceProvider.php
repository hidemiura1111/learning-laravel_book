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

        // Bind with argument
        // app()->when('App\MyClasses\MyService')
        //     ->needs('$id')
        //     ->give(2);

        // Bind MyServiceInterface as MyService
        app()->bind('App\MyClasses\MyServiceInterface', 'App\MyClasses\MyService');

        // Bind MyServiceInterface as PowerMyService
        app()->bind('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');
    }
}
