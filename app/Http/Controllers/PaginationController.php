<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaginationController extends Controller
{
    public function paginate(Request $request)
    {
        $id = $request->query('page');
        $msg = 'Show page: ' . $id;
        $result = DB::table('people')->paginate(3, ['*'], 'page', $id);

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('pagination.index', $data);
    }
}
