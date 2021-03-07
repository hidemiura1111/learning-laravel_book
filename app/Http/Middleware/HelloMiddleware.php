<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HelloMiddleware
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
        $data = [
            ['name' => 'taro', 'mail' => 'taro@ex.com'],
            ['name' => 'john', 'mail' => 'john@ex.com'],
            ['name' => 'hans', 'mail' => 'hans@ex.com'],
        ];

        $request ->merge(['data'=>$data]);
        return $next($request);
    }
}
