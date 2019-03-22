<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Colorsetting;
use App\Compbrand;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;
use Illuminate\Support\Facades\Schema;
use App\Http\Traits\SettingsTrait;

class RegisterController extends Controller
{
    use SettingsTrait;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
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
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|alpha_dash',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }

    public function signup()
    {
        $data = $this->settingsAll();
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

        
         return view('auth.register', [
            'brand' => $brand,
            'colorsetting' => $colorsetting,
            'data' => $data,
        ]);
       
    }

    
   
}
