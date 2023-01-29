<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class agents_auth
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
        if ($request->session()->get('agents')) {
            return $next($request);
        } else {
            return redirect("/agents");
        }
    }
}
