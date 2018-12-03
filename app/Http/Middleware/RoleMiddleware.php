<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
       /* dd($role);
        if (! $request->user()->checkHasRole($role) || ! $request->user()->checkHasRole("elec_ceo")) {
            return redirect()->route('home')->withErrors(__('auth.not_authorized'));
        }*/
        

        return $next($request);
    }
}
