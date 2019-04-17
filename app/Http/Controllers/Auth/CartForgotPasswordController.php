<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails as CartSendsPasswordResetEmails;
use App\Shop\Customers\Customer;
use App\Notifications\Cart1ResetPasswordNotification;
use Illuminate\Http\Request;
use App\User;
use Validator;
use DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Notifications\Notifiable;

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
     use Notifiable;

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

    public function sendResetLinkEmaile1(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if( ! $validator->fails() )
        {
            if( $cust = Customer::where('email', $request->input('email') )->first() )
            {
                $token = str_random(64);

                DB::table(config('auth.passwords.customers.table'))->insert([
                    'email' => $cust->email, 
                    'token' => $token
                ]);

               $cust->notify(new Cart1ResetPasswordNotification($token));

                return redirect()->back()->with('status', trans(Password::RESET_LINK_SENT));
            }
        }
        
        return redirect()->back()->withErrors(['email' => trans(Password::INVALID_USER)]);
    }
        

    //Password Broker for Seller Model
    public function broker()
    {
         return app('auth.password')->broker('customers');
    }
}
