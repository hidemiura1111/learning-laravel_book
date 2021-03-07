<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

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

    public function where($id)
    {
        $data = [
            'msg' => 'id= '. $id,
        ];
        return view('routing.index', $data);
    }

    public function hello(Request $request)
    {
        $data = [
            'msg' => $request->hello,
        ];
        return view('routing.index', $data);
    }

    public function bye(Request $request)
    {
        $data = [
            'msg' => $request->bye,
        ];
        return view('routing.index', $data);
    }

    public function binding_model_route($person) // ->RouteServiceProvider.php::boot()
    {
        $data = [
            'msg' => $person,
        ];
        return view('routing.index', $data);
    }
}
