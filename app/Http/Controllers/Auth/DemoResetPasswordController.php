<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
//Auth Facade
use Illuminate\Support\Facades\Auth;
use App\Notifications\DemoResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use App\user;

class DemoResetPasswordController extends Controller
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
   use Notifiable;


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
        $this->redirectTo = route('demo.dashboard');
    }

    //Shows form to request password reset
    public function showDemoResetForm(Request $request, $token = null)
    {
        
        return view('auth.passwords.demoreset', [
            
            'token' => $token, 
            'email' => $request->email
        ]);
    }

    protected function resetPassword(Request $request)
	{
	
	$user = User::where('email', $request->email)->first();

    $user->password = $request->password;

    $user->save();

    //Auth::login($user, true);
    	return redirect()->route('demologin');
	}

     

     //returns Password broker of seller
    public function broker()
    {
        return app('auth.password')->broker('users');
    }

    //returns authentication guard of seller
    protected function guard()
    {
        return Auth::guard('demo');
    }
}
