<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails as CartSendsPasswordResetEmails;


class CartForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    
    use CartSendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
     //Shows form to request password reset
    public function showcartLinkRequestForm()
    {
        
        return view('auth.passwords.cartemail');
    }

    public function showcartLinkRequeste1Form()
    {
        
        return view('auth.passwords.carte1email');
    }

    //Password Broker for Seller Model
    public function broker()
    {
         return app('auth.password')->broker('customers');
    }
}
