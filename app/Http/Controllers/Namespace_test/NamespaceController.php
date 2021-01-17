<?php

namespace App\Http\Controllers\Namespace_test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NamespaceController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'msg' => 'Namespace-hello',
        ];
        return view('routing.index', $data);
    }

    public function other(Request $request)
    {
        $data = [
            'msg' => 'Namespace-other',
        ];
        return view('routing.index', $data);
    }
}
