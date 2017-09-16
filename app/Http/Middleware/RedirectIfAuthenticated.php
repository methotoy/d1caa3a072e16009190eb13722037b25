<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $to = '/';
        if (Auth::guard($guard)->check()) {
            if ($guard == 'admin') {
                $to = '/admin/home';
            }

            if ($guard == 'owner') {
                $to = '/owner/home';
            }

            return redirect($to);
        }

        return $next($request);
    }
}
