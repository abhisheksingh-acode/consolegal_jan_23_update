<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OrderAuth
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

        if ($request->session()->has("user") || $request->session()->has("frans")) {
            return $next($request);
        } else {
            return redirect("/users/login");
        }
    }
}
