<?php

namespace App\Http\Middleware;

use Closure;

class guestMiddle
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
		if (Auth::user()->role=="admin" || Auth::user()->role=="member"  || Auth::user()->role=="guest") {
			return $next($request);
		}

		return redirect()->route("login");
    }
}
