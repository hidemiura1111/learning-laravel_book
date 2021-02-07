<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Db2Controller extends Controller
{
    public function index($id = -1)
    {
        if ($id == -1) {
            // Get All
            $result = DB::table('people')->get();
            // $result = DB::select('select * from people');
            // $result = DB::table('people')->select('id', 'name', 'mail', 'age')->get();
        } else {
            // Where and whereRaw
            // $result = DB::table('people')->where('name', 'like', '%' . $id . '%')->get();
            // $result = DB::table('people')->whereRaw('name like ?', ['%' . $id . '%'])->get();

            // First and Last
            $first = DB::table('people')->first();
            $last = DB::table('people')->orderBy('id', 'desc')->first();
            $result = [$first, $last];
        }


        $data = [
            'msg' => 'Database Access',
            'data' => $result,
        ];
        return view('database2.index', $data);
    }
}
