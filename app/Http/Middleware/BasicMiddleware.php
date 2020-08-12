<?php

namespace App\Http\Middleware;

use Closure;

class BasicMiddleware
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
        if(auth()->check() && auth()->user()->badmin==0)
        {
             return $next($request);
        }
        else
            return redirect('/dashboard');


       
    }
}
