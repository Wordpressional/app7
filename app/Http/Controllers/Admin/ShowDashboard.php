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
       if($user->can('pollingformshow') && $user->hasRole('superadministrator')
       {
            return view('admin.dashboard.index_home', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
            ]);
        }

       if($user->can('pollingitemlink') && $user->hasRole('elec_ceo')
       {
            return view('admin.dashboard.index_ceohome'[
                'data' => $data,
            ]);
        }
    }

    

}
