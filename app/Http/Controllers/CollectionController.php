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
}
