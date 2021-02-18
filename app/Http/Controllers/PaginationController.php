<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Http\Pagination\MyPaginator;

class PaginationController extends Controller
{
    public function paginate(Request $request)
    {
        $id = $request->query('page');
        $msg = 'Show page: ' . $id;

        // paginate from DB method
        $result = DB::table('people')->paginate(3, ['*'], 'page', $id);
        // Paginate only previous and next
        // $result = DB::table('people')->simplePaginate(3);
        // Use Eloquent
        // $result = Person::paginate(3);

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('pagination.index', $data);
    }

    public function myPaginate(Request $request)
    {
        $id = $request->query('page');
        $msg = 'Show page: ' . $id;
        $result = Person::paginate(3);

        $paginator = new MyPaginator($result);

        $data = [
            'msg' => $msg,
            'data' => $result,
            'paginator' => $paginator,
        ];
        return view('pagination.my_paginate', $data);
    }
}
