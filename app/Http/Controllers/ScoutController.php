<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class ScoutController extends Controller
{
    public function index()
    {
        $msg = 'Show people record.';
        $result = Person::get();

        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result
        ];
        return view('scout.index', $data);
    }

    public function send(Request $request)
    {
        $input = $request->input('find');
        $msg = 'search: ' . $input;
        $result = Person::search($input)->get();

        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result
        ];
        return view('scout.index', $data);
    }
}
