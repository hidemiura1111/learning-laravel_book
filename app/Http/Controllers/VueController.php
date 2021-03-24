<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

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

    public function json($id = -1)
    {
        if ($id == -1) {
            return Person::get()->toJson();
        } else {
            return Person::find($id)->toJson();
        }
    }
}
