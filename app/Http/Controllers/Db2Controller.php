<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Db2Controller extends Controller
{
    public function query($id = -1)
    {
        $msg = 'Database Access';
        if ($id < 0) {
            // pluck
            $name = DB::table('people')->pluck('name');
            $msg = implode(', ', $name->toArray());
            // Get All
            $result = DB::table('people')->get();
            // $result = DB::select('select * from people');
            // $result = DB::table('people')->select('id', 'name', 'mail', 'age')->get();
        } else {
            // Where and whereRaw
            // $result = DB::table('people')->where('name', 'like', '%' . $id . '%')->get();
            // $result = DB::table('people')->whereRaw('name like ?', ['%' . $id . '%'])->get();

            // First and Last
            // $first = DB::table('people')->first();
            // $last = DB::table('people')->orderBy('id', 'desc')->first();
            // $result = [$first, $last];

            // Find
            $msg = 'get name like ' . $id;
            $result = [DB::table('people')->find($id)];
        }

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('database2.index', $data);
    }


    public function chunk($id)
    {
        $data = ['msg' => '', 'data' => []];
        $msg = 'get: ';
        $result = [];
        // chunkById
        // DB::table('people')->chunkById(
        //     2,
        //     function ($items) use (&$msg, &$result) {
        //         foreach ($items as $item) {
        //             $msg .= $item->id . ' ';
        //             $result += array_merge($result, [$item]);
        //             break;
        //         }
        //         return true;
        //     }
        // );

        // chunk and orderBy
        // DB::table('people')->orderBy('name', 'asc')->chunk(
        //     2,
        //     function ($items) use (&$msg, &$result) {
        //         foreach ($items as $item) {
        //             $msg .= $item->id . ':' . $item->name . ', ';
        //             $result = array_merge($result, [$item]);
        //             break;
        //         }
        //         return true;
        //     }
        // );

        // Extract part of data
        $count = 0;
        DB::table('people')->chunkById(
            2,
            function ($items) use (&$msg, &$result, &$id, &$count) {
                if ($count == $id) {
                    foreach ($items as $item) {
                        $msg .= $item->id . ':' . $item->name . ', ';
                        $result = array_merge($result, [$item]);
                    }
                    return false;
                }
                $count++;
                return true;
            }
        );

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('database2.index', $data);
    }

    public function where($id)
    {
        $ids = explode(',', $id);
        $msg = 'Get people: ';

        // where between a to b
        // $result = DB::table('people')->whereBetween('id', $ids)->get();

        // where a, b c and...
        $result = DB::table('people')->whereIn('id', $ids)->get();

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('database2.index', $data);
    }
}
