<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if (\auth()->user()->role == 1) {
            return $next($request);
        } else if (\auth()->user()->role == 2) {
            return $next($request);
        } else if (\auth()->user()->role == 3) {
            return $next($request);
        }

        return \redirect('home')->with('error', "You need to login first");
    }
}
