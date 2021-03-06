<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;

class IsAdmin
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
        if (Auth::guard('admin')->check()) {
            if (Auth::guard('admin')->user()->IsAdmin()){ 
                return $next($request);
            }
        }
        return redirect()->route('admin-login')->with('unsuccess',"You don't have access to that section");
        // return redirect()->route('admin-dashboard')->with('unsuccess',"You don't have access to that section");
    }
}
