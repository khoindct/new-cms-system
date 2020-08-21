<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role_name)
    {
        if (!auth()->user()->userHasRole($role_name)) {
            abort(403, 'You don\'t have permission to be here');
        }
        return $next($request);
    }
}
