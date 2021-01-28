<?php

namespace App\Http\Controllers;

use App\MyClasses\MyService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // public function my_service(MyService $myService) // Make MyService instance by argument
    public function my_service(int $id = -1)
    {
        // Make MyService instance. which are same.
        // $myService = app('App\MyClasses\MyService');
        // $myService = app()->make('App\MyClasses\MyService');
        // $myService = resolve('App\MyClasses\MyService');

        $myService = app()->makewith('App\MyClasses\MyService', ['id' => $id]);
        $data = [
            'msg' => $myService->say(),
            'data' => $myService->alldata()
        ];

        return view('service.index', $data);
    }
}
