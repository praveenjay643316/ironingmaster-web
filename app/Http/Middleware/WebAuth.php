<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class WebAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user and token exist in session
        if (!Session::has('user') || !Session::has('token')) {
            // Store the intended URL
            if (!$request->expectsJson()) {
                session()->put('url.intended', $request->fullUrl());
            }
            
            return redirect()->route('login')
                ->with('error', 'Please login to continue.');
        }

        // Optional: Add user data to request for easy access
        $request->merge(['auth_user' => Session::get('user')]);

        return $next($request);
    }
}