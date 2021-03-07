<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Person;

class HelloController extends Controller
{
    // Composer that has methods for view
    public function composer() {
        $data = [
            ['name' => 'aaa', 'bio' =>'aaa is aaa'],
            ['name' => 'bbb', 'bio' =>'bbb is bbb'],
            ['name' => 'ccc', 'bio' =>'ccc is ccc'],
        ];

        return view('hello.index', ['data' => $data], ['message' => 'Hello!!']);
    }

    // Middleware before Controller
    public function mdware(Request $request)
    {
        return view('hello.mdware', ['data'=>$request->data]);
    }

    // Middleware after Controller
    public function mdware2(Request $request)
    {
        return view('hello.mdware2');
    }

    // Validation with validate()
    public function validation(Request $request)
    {
        return view('hello.validation', ['msg' => 'Input form']);
    }

    public function validation_post(Request $request)
    {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];

        $this->validate($request, $validate_rule);
        return view('hello.validation', ['msg' => 'Input Correctly']);
    }

    // Validation with FormRequest
    public function validation_request()
    {
        return view('hello.request', ['msg' => 'Input form']);
    }

    public function validation_request_post(HelloRequest $request)
    {
        return view('hello.request', ['msg' => 'Input Correctly']);
    }

    // Validator can be customized, such as redirect.
    public function validator(Request $request)
    {
        $validator = Validator::make($request->query(),
        [
            'id' => 'required',
            'pass' => 'required',
        ]);

        if ($validator->fails()) {
            $msg = 'Query has a problem.';
        } else {
            $msg = 'Input form';
        }

        return view('hello.validator', ['msg' => $msg]);
    }

    public function validator_post(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];

        $messages = [
            'name.required' => '名前は必須入力です。',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        // When 3rd argument is false, the rule is added. In this case, age is integer.
        $validator->sometimes('age', 'min:0', function($input){
            return !is_int($input->age);
        });

        $validator->sometimes('age', 'max:200', function($input){
            return !is_int($input->age);
        });

        if ($validator->fails()) {
            return redirect('hello/validation/validator')
                    ->withErrors($validator)
                    ->withInput();
        }

        return view('hello.validator', ['msg' => 'Input Correctly']);
    }

    // Cookie
    public function cookie(Request $request)
    {
        if ($request->hasCookie('msg')) {
            $msg = 'Cookie: ' . $request->cookie('msg');
        } else {
            $msg = 'No Cookie.';
        }

        return view('hello.cookie', ['msg' => $msg]);
    }

    public function cookie_post(Request $request)
    {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = response()->view('hello.cookie', ['msg' => 'Stored Cookie "' . $msg . '"']);
        $response->cookie('msg', $msg, 1); // Store 1 minute

        return $response;
    }

    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    //session
    public function session_get(Request $request)
    {
        $session_data = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $session_data]);
    }

    public function session_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('/hello/session');
    }

    public function paginate(Request $request)
    {
        // $items = DB::table('people')->orderBy('age', 'asc')->simplePaginate(1);
        if(isset($request->sort)){
            $sort = $request->sort;
        } else {
            $sort = 'name';
        }
        // $items = Person::orderBy($sort, 'asc')->simplePaginate(1);
        $items = Person::orderBy($sort, 'asc')->paginate(1);
        $param =['items' => $items, 'sort' => $sort];
        return view('hello.paginate', $param);
    }

    public function auth()
    {
        $user = Auth::user();
        return view('hello.auth', ['user' => $user]);
    }

    public function getAuth(Request $request)
    {
        $param = ['message' => 'Please login.'];
        return view('hello.myauth', $param);
    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $msg = 'Login by ' . Auth::user()->name;
        } else {
            $msg = 'Fail to login.';
        }
        return view('hello.myauth', ['message' => $msg]);
    }
}
