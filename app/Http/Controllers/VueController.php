<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueController extends Controller
{
    public function index()
    {
        $msg = 'Message';
        // $result = Person::get();

        $data = [
            // 'input' => '',
            'msg' => $msg,
            // 'data' => $result,
        ];

        return view('vue.index', $data);
    }
}
