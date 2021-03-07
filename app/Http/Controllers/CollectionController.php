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

    public function reject(Request $request)
    {
        $msg = 'Show people records.';
        $result = Person::get()->reject( function ($person) {
            return $person->age < 25;
        });
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('collection.index', $data);
    }

    public function filter(Request $request)
    {
        $msg = 'Show people records.';
        $result = Person::get()->filter( function ($person) {
            return $person->age < 25;
        });
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('collection.index', $data);
    }

    public function diff(Request $request)
    {
        $msg = 'Show people records.';
        $result = Person::get()->filter( function($person) {
            return $person->age < 45;
        });
        $result2 = Person::get()->filter( function($person) {
            return $person->age < 20;
        });
        $result3 = $result->diff($result2);
        $data = [
            'msg' => $msg,
            'data' => $result3,
        ];

        return view('collection.index', $data);
    }

    public function only(Request $request)
    {
        $msg = 'Show people records.';
        $keys = Person::get()->modelKeys();
        $even = array_filter($keys, function($key) {
            return $key % 2 == 0;
        });
        // Get only even data
        $result = Person::get()->only($even);
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('collection.index', $data);
    }

    public function except(Request $request)
    {
        $msg = 'Show people records.';
        $keys = Person::get()->modelKeys();
        $even = array_filter($keys, function($key) {
            return $key % 2 == 0;
        });
        // Get excepted even data
        $result = Person::get()->except($even);
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('collection.index', $data);
    }

    public function merge(Request $request)
    {
        $msg = 'Show people records.';
        $even_id = Person::get()->filter(function($item) {
            return $item->id % 2 == 0;
        });
        $even_age = Person::get()->filter(function($item) {
            return $item->age % 2 == 0;
        });
        // Get merged data
        $result = $even_id->merge($even_age);
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('collection.index', $data);
    }

    public function unique(Request $request)
    {
        $msg = 'Show people records.';
        $even_id = Person::get()->filter(function($item) {
            return $item->id % 2 == 0;
        });
        $even_age = Person::get()->filter(function($item) {
            return $item->age % 2 == 0;
        });
        // Get merged data
        $result = $even_id->unique($even_age);
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('collection.index', $data);
    }

    public function map(Request $request)
    {
        $msg = 'Show people records.';
        $even = Person::get()->filter(function($item) {
            return $item->id % 2 == 0;
        });

        $map = $even->map(function($item, $key) {
            return $item->id . ':' . $item->name;
        });

        $data = [
            'msg' => $map,
            'data' => $even,
        ];

        return view('collection.index', $data);
    }

    public function fields()
    {
        $result = Person::get();
        $fields = Person::get()->fields();

        $data = [
            'msg' => implode(', ', $fields),
            'data' => $result,
        ];

        return view('collection.index', $data);
    }

    public function accessor()
    {
        $msg = 'Show people records.';
        $result = Person::get();

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('collection.accessor', $data);
    }

    public function save($id, $name)
    {
        $record = Person::find($id);
        $record->name = $name;
        $record->save();
        return redirect()->route('collection');
    }

    public function sample_add()
    {
        $person = new Person;
        $person->all_data = ['sample', 'sample@test.com', 55];
        $person->save();
        return redirect()->route('collection');
    }

    public function json($id = -1)
    {
        if($id === -1) {
            return Person::get()->toJson();
        } else {
            return Person::find($id)->toJson();
        }
    }

    public function json_show()
    {
        return view('collection.json_show');
    }
}
