<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Traits\SettingsTrait;
use App\user;
use App\Colorsetting;
use App\Compbrand;

class ForgotPasswordController extends Controller
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
    use SettingsTrait;
    use SendsPasswordResetEmails;

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
    public function showLinkRequestForm()
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
        return view('auth.passwords.email', [
            'brand' => $brand,
            'colorsetting' => $colorsetting,
            'data' => $data,
        ]);
    }
}
