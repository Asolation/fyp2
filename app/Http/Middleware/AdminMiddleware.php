<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }
        if (auth()->user()->roles()->where('title', 'user')->count() > 0) {
            return redirect('/')->with('error', 'You do not have the necessary permissions to access this page.');
        }

        return $next($request);
    }
}
