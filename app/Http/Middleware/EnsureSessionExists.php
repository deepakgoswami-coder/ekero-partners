<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSessionExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check karte hain ki 'first_visit' session variable set hai ya nahi.
        // Agar yeh set nahi hai, iska matlab user ka session ya toh expire ho gaya hai, 
        // ya woh direct hit kar raha hai bina website visit kiye.
        if (!$request->session()->has('first_visit')) {
            // dd("inner");

            // Agar session nahi hai, toh home page ('/') par redirect kar denge.
            return redirect('/');
        }
        
        // Agar session hai, toh request ko aage badha denge.
        return $next($request);
    }
}