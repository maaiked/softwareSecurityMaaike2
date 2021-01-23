<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyAdmins
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //if (! $request->user()->hasRole($role)) {
        //            // Redirect...
        //        }

        if($request->user()->admin) {
            return $next($request);
        }

        abort(403, 'Access denied');
    }
}
