<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Validators\EvenNumberValidator;
use Validator;
class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer(
        //     'hello.index', function($view){
        //         $view->with('view_message', 'composer message!!');
        //     }
        // );

        View::composer(
            'hello.index', 'App\Http\Composers\HelloComposer'
        );

        $validator = $this->app['validator'];
        $validator->resolver(function($translator, $data, $rules, $messages) {
            return new EvenNumberValidator($translator, $data, $rules, $messages);
        });

        Validator::extend('oddnumber', function($attribute, $value, $parameters, $validator) {
            return $value % 2 == 1;
        });
    }
}
