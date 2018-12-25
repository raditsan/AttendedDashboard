<?php

namespace App\Http\Middleware;

use Closure;

class isEmployee
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
        if(auth()->user()->IsEmployee()) {
            return $next($request);
        }
        return redirect('home');
    }
}
