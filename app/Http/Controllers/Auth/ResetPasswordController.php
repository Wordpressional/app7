<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
//Auth Facade
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\SettingsTrait;
use App\user;
use App\Colorsetting;
use App\Compbrand;

class ResetPasswordController extends Controller
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
    use SettingsTrait;

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
        $this->redirectTo = route('cadmin.dashboard');
    }

    //Shows form to request password reset
    public function showResetForm(Request $request, $token = null)
    {
        $data = $this->settingsAll();
        $colorsetting = Colorsetting::all();
        $brand = Compbrand::where('id',1)->first();
        //dd($colorsetting);
        if($colorsetting->count() > 0)
        {  
            
         
         
        } 
        else
        {
            $colorsetting = 'empty';
            $brand = '';
        }
        return view('auth.passwords.reset', [
            'brand' => $brand,
            'colorsetting' => $colorsetting,
            'data' => $data,
            'token' => $token, 
            'email' => $request->email
        ]);
    }
}
