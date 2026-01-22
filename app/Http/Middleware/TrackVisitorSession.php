<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitorSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check karte hain ki 'first_visit' session variable set hai ya nahi
        if (!$request->session()->has('first_visit')) {
            
            $request->session()->put('first_visit', time());
            $request->session()->put('visitor_ip', $request->ip());
            
            // Optional: Message for debugging
            // \Log::info('New session created for IP: ' . $request->ip());
        }
  
        return $next($request);
    }
}