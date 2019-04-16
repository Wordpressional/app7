<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
//Auth Facade
use Illuminate\Support\Facades\Auth;


class CartResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    

    /**
     * Where to redirect users after reset password.
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
        $this->middleware('guest');
        $this->redirectTo = route('accounts');
    }

    //Shows form to request password reset
    public function showCartResetForm(Request $request, $token = null)
    {
        
        return view('auth.passwords.cartreset', [
            
            'token' => $token, 
            'email' => $request->email
        ]);
    }

    public function showCartResete1Form(Request $request, $token = null)
    {
        
        return view('auth.passwords.carte1reset', [
            
            'token' => $token, 
            'email' => $request->email
        ]);
    }

     //returns Password broker of seller
    public function broker()
    {
        return app('auth.password')->broker('customers');
    }

    //returns authentication guard of seller
    protected function guard()
    {
        return Auth::guard('checkout');
    }
}
