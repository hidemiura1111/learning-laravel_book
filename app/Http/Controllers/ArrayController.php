<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArrayController extends Controller
{
    public function show(Request $request, $id1 = 'empty')
    {
        $data = [
            'msg1'  =>  'message 1',
            'msg2'  =>  'message 2',
            'id1'   =>  $id1,
            'id2'   =>  $request->id,
        ];
        // Ex. http://127.0.0.1:8080/array/1?id=2

        return view('array.index', $data);
    }

    public function loop()
    {
        $data = ['ein', 'zwei', 'drei', 'vier', 'funf'];
        return view('array.loop', ['data'=>$data]);
    }
}
