<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{

    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::user()->role != 'admin') return redirect(route('dashboard'));
        return $next($request);
    }

}