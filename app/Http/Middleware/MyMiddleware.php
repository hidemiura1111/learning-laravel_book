<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Facades\MyService;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Before
        $id = rand(0, count(MyService::allData()));
        MyService::setId($id);
        $merge_data = [
            'id' => $id,
            'msg' => MyService::say(),
            'alldata' => MyService::alldata(),
        ];
        $request->merge($merge_data);

        $response = $next($request);

        // After
        $content = $response->content();
        $content .= "
            <style>
                body { background-color: #bef; }
                p { font-size: 18px; }
                li { cplor: red; font-weight:bold }
            </style>
        ";
        $response->setContent($content);

        return $response;



    }
}
