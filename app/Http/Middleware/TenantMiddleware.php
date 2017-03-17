<?php

namespace App\Http\Middleware;

use Closure;

class TenantMiddleware
{
    /**
     * Handle an incoming request. User must be logged in to do admin check
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()->role == 'tenant')
        {
            return $next($request);
        }

        return redirect()->guest('/');
    }
}
