<?php

namespace App\Http\Controllers;

// use App\MyClasses\MyService;
use Illuminate\Http\Request;
use App\MyClasses\MyServiceInterface;
use App\Facades\MyService;

class ServiceController extends Controller
{
    // function __construct(MyService $myService)
    function __construct()
    {
        // $myService = app('App\MyClasses\MyService');
    }

    // public function my_service(MyService $myService) // Make MyService instance by argument
    // public function my_service(MyService $myService, int $id = -1)
    public function my_service(MyServiceInterface $myService, int $id = -1)
    {
        // Make MyService instance. which are same.
        // $myService = app('App\MyClasses\MyService');
        // $myService = app()->make('App\MyClasses\MyService');
        // $myService = resolve('App\MyClasses\MyService');

        // Make instance with argument
        // $myService = app()->makewith('App\MyClasses\MyService', ['id' => $id]);

        // Set ID in AppServiceProvider::boot() or MyServiceProvider
        // $myService->setId($id);

        // Set ID by using Facade
        MyService::setId($id);
        $data = [
            'msg' => $myService->say(),
            'data' => $myService->alldata()
        ];

        return view('service.index', $data);
    }
}
