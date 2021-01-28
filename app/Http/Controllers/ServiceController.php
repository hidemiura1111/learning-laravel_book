<?php

namespace App\Http\Controllers;

use App\MyClasses\MyService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function my_service(MyService $myService)
    {
        $data = [
            'msg' => $myService->say(),
            'data' => $myService->data()
        ];

        return view('service.index', $data);
    }
}
