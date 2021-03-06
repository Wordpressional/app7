<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Auth\Middleware\Authenticate as xyz;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
 public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

   
public function handle($request, Closure $next, $guard = "demo")
{
    //dd($guard);
    //if(!Auth::check()) {
      //      return redirect()->route('mylogin');
    //} 
  if(Auth::guard($guard)->check()){    
    return $next($request);
  } else if(Auth::check()) {
    $guard = null;
    return $next($request);
  } else {
    return redirect()->route('mylogin');
  }
   
  
}
}