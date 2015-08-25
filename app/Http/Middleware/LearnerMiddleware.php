<?php

namespace App\Http\Middleware;

use Closure;

class LearnerMiddleware
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
        if (auth()->check() && auth()->user()->role == 'learner') {
            return $next($request);
        } else {
            return redirect()->guest('user/login');
        }
        
    }
}
