<?php

namespace App\Http\Middleware;

// use Closure;
use Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use PhpParser\Node\Expr\Closure;
// use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // public function handle($request, Closure $next){
    //     if (! Auth::check()) {
    //         return redirect()->route('login');
    //     }
    //     $user = Auth::user();
    //     return $next($request);
    // }
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
