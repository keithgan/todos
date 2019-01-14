<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {

        if (Auth::guard($guard)->check() == false) {
            return redirect( route('login'));
            // return redirect(route('todos.index'));
            // dd(Auth::guard($guard)->check());
        }

        return $next($request);
    }
}
