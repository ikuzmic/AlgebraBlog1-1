<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // da li je user uopće logiran
        if ($request->user() === null) {
            // ako nije abortiraj
            abort(403);
        }

        // ako user ima rolu prosljeđenu kroz middleware propusti ga
        if ($request->user()->hasRole($role)) {
            return $next($request);
        }

        return abort(401);
    }
}
