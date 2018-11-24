<?php

namespace App\Http\Controllers\Auth;

use App\Colorsetting;
use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Schema;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   

        
        $this->middleware('guest')->except('logout');
        $this->redirectTo = route('admin.dashboard');
        
    }

    
    

    public function mylogin()
    {
    
        $colorsetting = Colorsetting::all();
        $brand = Brand::where('id',1)->first();
        //dd($colorsetting);
        if($colorsetting->count() > 0)
        {  
            
         
         
        } 
        else
        {
            $colorsetting = 'empty';
            $brand = '';
        }

        
        
         //dd($colorsetting);
         return view('auth.login', [
            'brand' => $brand,
            'colorsetting' => $colorsetting,
        ]);
    }
}
