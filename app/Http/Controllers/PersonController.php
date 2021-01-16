<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    public function hasMessage()
    {
        $hasItems = Person::has('boards')->get();
        $noItems = Person::doesntHave('boards')->get();
        $param = ['hasItems' => $hasItems, 'noItems' => $noItems];

        return view('person.has_index', $param);
    }

    public function find_id()
    {
        return view('person.find_id', ['input' => '']);
    }

    public function search_id(Request $request)
    {
        $item = Person::find($request->input);
        $param = ['input' => $request->input, 'item' =>$item];

        return view('person.find_id', $param);
    }

    public function find_name()
    {
        return view('person.find_name', ['input' => '']);
    }

    public function search_name(Request $request)
    {
        $item = Person::where('name', $request->input)->first();
        $param = ['input' => $request->input, 'item' =>$item];

        return view('person.find_name', $param);
    }

    public function scope_find_name()
    {
        return view('person.scope_find_name', ['input' => '']);
    }

    public function scope_search_name(Request $request)
    {
        $item = Person::nameEqual($request->input)->first();
        $param = ['input' => $request->input, 'item' =>$item];

        return view('person.scope_find_name', $param);
    }

    public function scope_find_age()
    {
        return view('person.scope_find_age', ['input' => '']);
    }

    public function scope_search_age(Request $request)
    {
        $min = $request->input;
        $max = $min + 10;
        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = ['input' => $request->input, 'item' =>$item];

        return view('person.scope_find_age', $param);
    }

    public function add()
    {
        return view('person.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = new Person;
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();

        return redirect('/orm/person');
    }

    public function edit(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.edit', ['form' => $person]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = Person::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();

        return redirect('/orm/person');
    }

    public function delete(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.del', ['form' => $person]);
    }

    public function remove(Request $request)
    {
        $person = Person::find($request->id)->delete();
        return redirect('/orm/person');
    }
}
