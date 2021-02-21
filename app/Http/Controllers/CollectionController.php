<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        $msg = 'Show people records.';
        $result = Person::get();
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('collection.index', $data);
    }
}
