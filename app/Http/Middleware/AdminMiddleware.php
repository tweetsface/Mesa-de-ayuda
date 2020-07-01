<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class AdminMiddleware
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth=$auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->badmin=='1') 
        {

         return redirect()->to('/dashboard');
        }else{
             return redirect()->to('/panel');
        }
        return $next($request);
        
        
    }
}
