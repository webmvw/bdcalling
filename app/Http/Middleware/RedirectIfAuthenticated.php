<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->role->id == 1) {
                return redirect()->route('owner.dashboard');
            }elseif (Auth::guard($guard)->check() && Auth::user()->role->id == 2) {
                return redirect()->route('superadmin.dashboard');
            }elseif (Auth::guard($guard)->check() && Auth::user()->role->id == 3) {
                return redirect()->route('franchiseowner.dashboard');
            }elseif(Auth::guard($guard)->check() && Auth::user()->role->id == 4){
                return redirect()->route('admin.dashboard');
            }elseif(Auth::guard($guard)->check() && Auth::user()->role->id == 7){
                return redirect()->route('user.dashboard');
            }elseif(Auth::guard($guard)->check() && Auth::user()->role->id == 5){
                return redirect()->route('kamsales.dashboard');
            }elseif(Auth::guard($guard)->check() && Auth::user()->role->id == 6){
                return redirect()->route('kamoperation.dashboard');
            }
        }

        return $next($request);
    }
}
