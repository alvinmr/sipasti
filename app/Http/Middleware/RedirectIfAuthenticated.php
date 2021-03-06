<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }elseif (Auth::guard('petugas')->check()){
            return redirect('/petugas');
        }elseif (Auth::guard('siswa')->check()){
            return redirect('/siswa');
        }

        return $next($request);
    }
}