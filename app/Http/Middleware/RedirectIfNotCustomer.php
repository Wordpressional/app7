<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfNotCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param string $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'checkout')
    {
        
        if (!Auth::guard($guard)->check()) {
            $request->session()->flash('error', 'You must be an customer to see this page');
            return redirect(route('cart.custlogin'));
        }

        return $next($request);
    }
}
