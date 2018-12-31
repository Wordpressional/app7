<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\Http\Traits\AccountsTrait;
use App\Post;
use App\User;
use App\Brand;
use App\Role;
use App\Permission;

use App\Meleuser;
use App\Elemdist;
use App\Account;
use Auth;

class ShowDashboard extends Controller
{
    use BrandsTrait;
    use AccountsTrait;
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
        $user = User::where('email', Auth::user()->email)->first();

        //dd($data['n_companyname']->cname);

         
       
       
       
        if($user->isCEO() == "yes" || $user->isPO() == "yes" || $user->isRO() == "yes" || $user->isSuperAdmin() == "yes" || $user->isAERO() == "yes") {
            $data = $this->accountsAll();
            return view('admin.dashboard.index_ceohome', [
               
                'data' => $data,
                
            ]);
        } else if($user->isSuperadministrator() == "yes") {
            $data = $this->brandsAll();
             return view('admin.dashboard.index_home', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
                
            ]);
         }
             else if($user->isBoothOfficer() == "yes") {
            $data = $this->accountsAll();
             return view('admin.dashboard.index_ceohome', [
                
                'data' => $data,
                
            ]);
        } else {      
           return "You do not have permission to access this page";
       }
    }

    

}
