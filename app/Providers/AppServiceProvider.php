<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MyClasses\MyService;
use App\MyClasses\PowerMyService;

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
        // app()->bind('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');

        // Show Bind events and objects by resolving
        // app()->resolving(function ($obj, $app) {
        //     if (is_object($obj)) {
        //         echo get_class($obj) . '<br>';
        //     } else {
        //         echo $obj . '<br>';
        //     }
        // });
        // app()->resolving(PowerMyService::class, function ($obj, $app) {
        //     $newdata = ['Push Up', 'Chin Up', 'Dipps', 'Leg Up'];
        //     $obj->setData($newdata);
        //     $obj->setId(rand(0, count($newdata)));
        // });
        // app()->singleton('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');
    }
}
