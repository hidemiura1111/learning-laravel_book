<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutingController extends Controller
{
    public function index()
    {
        $data = [
            'msg' => 'This is sample message.',
        ];
        return view('routing.index', $data);
    }

    public function name_routing_test()
    {
        return redirect()->route('routing_home');
    }
}
