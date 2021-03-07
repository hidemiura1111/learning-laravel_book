<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        $items = Board::with('person')->get();
        return view('board.index', ['items' => $items]);
    }

    public function add()
    {
        return view('board.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Board::$rules);
        $person = new Board;
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();

        return redirect('/orm/board');
    }
}
