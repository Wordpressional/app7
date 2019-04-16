<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use App\Notifications\EmpResetPasswordNotification;
use Illuminate\Http\Request;
use App\User;
use Validator;
use DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Notifications\Notifiable;


class EmpForgotPasswordController extends Controller
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
    
    use SendsPasswordResetEmails;
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
    public function showempLinkRequestForm()
    {
        return view('auth.passwords.empemail');
    
    }

    public function sendResetLinkEmail2(Request $request)
    {
	    	$validator = Validator::make($request->all(), [
	        'email' => 'required|email'
	    ]);

	    if( ! $validator->fails() )
	    {
	        if( $user = User::where('email', $request->input('email') )->first() )
	        {
	            $token = str_random(64);

	            DB::table(config('auth.passwords.users.table'))->insert([
	                'email' => $user->email, 
	                'token' => $token
	            ]);

	           $user->notify(new EmpResetPasswordNotification($token));

	            return redirect()->back()->with('status', trans(Password::RESET_LINK_SENT));
	        }
	    }
	    
	    return redirect()->back()->withErrors(['email' => trans(Password::INVALID_USER)]);
	}
    	
   
        
        
     
  	
  

    //Password Broker for Seller Model
    public function broker()
    {
         return app('auth.password')->broker('users');
    }
}
