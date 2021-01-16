<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page;
        if (isset($request->id)) {
            $id = ['id' => $request->id];
            $items = DB::table('people')->where('id', $id)->get();
        } if (isset($request->page)) {
            $items = DB::table('people')
                ->offset($page * 3)
                ->limit(3)
                ->orderBy('age', 'asc')
                ->get();
        } else {
            $items = DB::table('people')->get();
        }
        return view('database.query.index', ['items' => $items]);
    }

    public function bigger(Request $request)
    {
        if (isset($request->id)) {
            $id = ['id' => $request->id];
            $items = DB::table('people')->where('id', '>=', $id)->get();
        } else {
            $items = NULL;
        }
        return view('database.query.index', ['items' => $items]);
    }

    public function search_word(Request $request)
    {
        if (isset($request->word)) {
            $word = $request->word;
            $items = DB::table('people')
                ->where('name', 'like', '%' . $word . '%')
                ->orWhere('mail', 'like', '%' . $word . '%')
                ->get();
        } else {
            $items = NULL;
        }
        return view('database.query.index', ['items' => $items]);
    }

    public function search_age(Request $request)
    {
        $min = $request->min;
        $max = $request->max;
        if (isset($request->min) && isset($request->max)) {
            $items = DB::table('people')
                ->whereRaw('age >= ? and age <= ?', [$min, $max])
                ->get();
        } else {
            $items = NULL;
        }
        return view('database.query.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('database.query.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        DB::table('people')->insert($param);

        return redirect('/database/query');
    }

    public function edit(Request $request)
    {
        $item = DB::table('people')
            ->where('id', $request->id)
            ->first();

        return view('database.query.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')
            ->where('id', $request->id)
            ->update($param);

        return redirect('/database/query');
    }

    public function delete(Request $request)
    {
        $item = DB::table('people')
            ->where('id', $request->id)
            ->first();

        return view('database.query.delete', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        DB::table('people')
            ->where('id', $request->id)
            ->delete();

        return redirect('/database/query');
    }
}
