<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Brand;
use App\Role;
use App\Permission;

use Auth;

class ShowDashboard extends Controller
{
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
         $data = [];
        $n_users = User::all()->count();
        $n_roles = Role::all()->count();
        $n_perms = Permission::all()->count();
        $n_logged = Auth::user()->name;
         $n_loggeduser = Auth::user()->email;
         $n_companyname = Brand::where('id',1)->first();
        $data = [
            'n_users' => $n_users,
            'n_roles' => $n_roles,
            'n_perms' => $n_perms,
            'n_logged' => $n_logged,
            'n_loggeduser' => $n_loggeduser,
            'n_companyname' => $n_companyname,

        ];
        //dd($data['n_companyname']->cname);
        return view('admin.dashboard.index_home', [
            'comments' =>  Comment::lastWeek()->get(),
            'posts' => Post::lastWeek()->get(),
            'users' => User::lastWeek()->get(),
            'data' => $data,
        ]);
    }

    

}
