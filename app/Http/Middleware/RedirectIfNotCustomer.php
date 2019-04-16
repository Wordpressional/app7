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
        //dd($request->input('from'));
        if (!Auth::guard($guard)->check()) {
            $request->session()->flash('error', 'You must be an customer to see this page');
            if($request->input('from') == "cart1")
            return redirect(route('cart.custe1login'));
            else 
            return redirect(route('cart.custlogin'));
        }

        return $next($request);
    }
}
