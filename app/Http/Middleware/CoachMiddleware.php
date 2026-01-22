<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoachMiddleware
{   
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role == 4 && auth()->user()->status == 1) {
            return $next($request);
        }
        return redirect('/coach/login')->with('error', 'Access Denied OR Deactivated Account');
    }
}
