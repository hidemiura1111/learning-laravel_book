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
            $msg = old('name') . ', ' . old('mail') . ', ' . old('tel');
            $data = [
                'msg' => 'Inputted',
                'keys' => $keys,
                'values' => $values,
            ];
            $request->flash();
            return view('req_res.index', $data);
        }
        $data = [
            'msg' => $msg,
            'keys' => $keys,
            'values' => $values,
        ];
        $request->flash();
        return view('req_res.index', $data);
    }

    public function query(Request $request, Response $response)
    {
        $name = $request->query('name');
        $mail = $request->query('mail');
        $tel = $request->query('tel');
        $msg = $request->query('msg');
        $keys = [];
        $values = [];
        if ($request->isMethod('post'))
        {
            $form = $request->only('name', 'mail', 'tel');
            $keys = array_keys($form);
            $values = array_values($form);
            $data = [
                'msg' => $msg,
                'keys' => $keys,
                'values' => $values,
            ];
            $request->flash();
            return view('req_res.index', $data);
        }
        $data = [
            'msg' => $msg,
            'keys' => $keys,
            'values' => $values,
        ];
        $request->flash();
        return view('req_res.index', $data);
    }

    public function add_query()
    {
        $data = [
            'name' => 'Hans',
            'mail' => 'hans@muller',
            'tel' => '43 664 5566 4433',
        ];
        $query_str = http_build_query($data);
        $data['msg'] = $query_str;
        return redirect()->route('query', $data);
    }
}
