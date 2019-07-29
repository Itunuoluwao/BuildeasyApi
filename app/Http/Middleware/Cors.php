<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', 'http://buildeasy-supplier.herokuapp.com')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Credentials', true)
            ->header("Access-Control-Allow-Headers: content-type, origin, accept, X-API-KEY")
            ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization')
            ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-CSRF-Token, Authorization');
    }
}
