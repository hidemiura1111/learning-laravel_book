<?php

namespace App\Providers;

use App\Mail\JobFailedMailable;
use App\Services\CustomMaintenanceMode;
use Illuminate\Support\ServiceProvider;
use App\MyClasses\MyService;
use App\MyClasses\PowerMyService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Foundation\MaintenanceModeManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
        
        $this->app->extend(
            MaintenanceModeManager::class,
            function (MaintenanceModeManager $manager) {
                // Add the custom driver to the maintenance mode manager, telling the
                $manager->extend('custom', function (Container $container) {
                    return new CustomMaintenanceMode(
                        $container->make(FilesystemManager::class),
                        $container->make(Repository::class)->get('maintenance.driver'),
                    );
                });

                return $manager;
            }
        );
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

        // Failig for Horizon test
        Queue::failing(function (JobFailed $event) {
            Mail::send(new JobFailedMailable($event));
        });
    }
}
