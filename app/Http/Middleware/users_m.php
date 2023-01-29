<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class users_m
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

        if ($request->session()->get('user')) {
            return $next($request);
        } else {
            return redirect("/users/login");
        }
    }
}
