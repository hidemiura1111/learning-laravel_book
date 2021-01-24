<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReqResController extends Controller
{
    public function response(Request $request, Response $response)
    {
        $msg = 'Please input text.';
        $keys = [];
        $values = [];
        if ($request->isMethod('post'))
        {
            $form = $request->all();
            $result = '<html><body>';
            foreach($form as $key => $value) {
                $result .= $key . ': ' . $value . "<br>";
            }
            $result .= '</body></html>';
            $response->setContent($result);
            return $response;
        }
        $data = [
            'msg' => $msg,
            'keys' => $keys,
            'values' => $values,
        ];
        return view('req_res.index', $data);
    }

    public function req_only(Request $request, Response $response)
    {
        $msg = 'Please input text.';
        $keys = [];
        $values = [];
        if ($request->isMethod('post'))
        {
            $form = $request->only('name', 'mail');
            $keys = array_keys($form);
            $values = array_values($form);
            $data = [
                'msg' => 'Inputted',
                'keys' => $keys,
                'values' => $values,
            ];
            return view('req_res.index', $data);
        }
        $data = [
            'msg' => $msg,
            'keys' => $keys,
            'values' => $values,
        ];
        return view('req_res.index', $data);
    }
}
