<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class CheckLogin
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
        //dd(Route::getCurrentRoute()->uri);
        if(empty(\Auth::user()) && Route::getCurrentRoute()->uri != "login"){
            return redirect()->route('user.login');
        }elseif (!empty(\Auth::user()) && Route::getCurrentRoute()->uri == "login"){
            return redirect()->route('user.dashboard');
        }
        return $next($request);
    }
}
