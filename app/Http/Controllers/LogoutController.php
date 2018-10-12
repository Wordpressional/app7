<?php

namespace App\Http\Controllers;



class LogoutController extends Controller
{
    public function logout () {
    //logout user
    auth()->logout();
    // redirect to homepage
    return redirect('/');
    }
}
