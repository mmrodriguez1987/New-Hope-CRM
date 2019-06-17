<?php

namespace newhopecrm\Http\Middleware;

use Closure;

class CheckIsAdminOrSelf
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
        $requestedUserId = $request->route()->parameter('id');

        if(
            Auth::user()->role === 2 ||
            Auth::user()->id == $requestedUserId
        ) {
            return $next($request);
        }

        else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
