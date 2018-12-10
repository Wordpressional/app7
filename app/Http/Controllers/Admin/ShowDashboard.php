<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\Post;
use App\User;
use App\Brand;
use App\Role;
use App\Permission;

use Auth;

class ShowDashboard extends Controller
{
    use BrandsTrait;
    /**
     * Show the application admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function __invoke()
    {
        return view('admin.dashboard.index', [
            'comments' =>  Comment::lastWeek()->get(),
            'posts' => Post::lastWeek()->get(),
            'users' => User::lastWeek()->get(),
        ]);
    }*/

    public function __invoke()
    {
       $data = $this->brandsAll();
        //dd($data['n_companyname']->cname);


       $user = User::where('email', $data['n_loggeduser'])->first();

        if($user->isCEO() == "yes" || ($user->isPO() == "yes" || $user->isRO() == "yes")) {
            return view('admin.dashboard.index_ceohome', [
               
                'data' => $data,
            ]);
        } else if($user->isSuperadministrator() == "yes") {
             return view('admin.dashboard.index_home', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
            ]);
        } else {      
           return "You do not have permission to access this page";
       }
    }

    

}
