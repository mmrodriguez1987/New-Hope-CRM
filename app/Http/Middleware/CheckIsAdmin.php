<?php

namespace newhopecrm\Http\Middleware;

use Closure;

class CheckIsAdmin
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
        if(Auth::user()->role === 2) {
            return $next($request);
        }

        else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
