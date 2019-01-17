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

use App\Cmsactivitylog;
use Illuminate\Http\Request;
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

         else if($user->isCMSAdmin() == "yes") {
            $data = $this->brandsAll();
             return view('admin.dashboard.index_home', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
                
            ]);
         }

         else if($user->isCMSEditor() == "yes") {
            $data = $this->brandsAll();
             return view('admin.dashboard.index_cms_general', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
                
            ]);
         }

         else if($user->isCMSAuthor() == "yes") {
            $data = $this->brandsAll();
             return view('admin.dashboard.index_cms_general', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
                
            ]);
         }

         else if($user->isCMSSubscriber() == "yes") {
            $data = $this->brandsAll();
             return view('admin.dashboard.index_cms_general', [
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

    public function cmsactivitylogs(Request $request){
        $data = $this->brandsAll();
        $Cmsactivitylog = new Cmsactivitylog;
        $Cmsactivitylog->setConnection('mongodb');
        $cmsactivitylogdetails = $Cmsactivitylog->all();
        //dd($elemactivitylogdetails[0]);
         return view('admin.cms.cmsactivitylogs', compact('cmsactivitylogdetails', 'data'));
    }

    public function cmsdisplayusers(){
         $data = $this->brandsAll();
        //$users = User::paginate(10);
        $users = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->paginate(50);
        $params = [
            'title' => 'Users Login List',
            'users' => $users,
            'data' => $data,
        ];

       // dd($users[0]->roles[0]->name);
        return view('admin.cms.cmsdisplayusers')->with($params);
    }

     public function cmsSwitchUser(Request $request)
    {
         $request->session()->put('existing_user_id', Auth::user()->id);
         $request->session()->put('user_is_switched', true);

         $newuserId = $request->input('new_user_id');



        $timestamp = date("Y-m-d H:i:s");
        $userid = Auth::user()->id;
        $newuserId = $request->input('new_user_id');

        $request->session()->put('user_is_switched_with_id', $newuserId);

        //dd($userid);
        $user = User::with('roles')->where( 'id', $userid)->first();
        //dd($user->roles->first()->id);
        //dd($request->header('User-Agent'));
        $role = Role::where( 'id', $user->roles->first()->id)->first();
        //dd($role);
        

        
        //dd($elemblodetails);
        $Cmsactivitylog = new Cmsactivitylog;
        $Cmsactivitylog->setConnection('mongodb');

            
            $Cmsactivitylog->username = $user->name;
            $Cmsactivitylog->useremail = $user->email;
            $Cmsactivitylog->userrole = $user->roles->first()->name;
            $Cmsactivitylog->eventname = "admin switched to user ".$user->roles->first()->display_name;
            $Cmsactivitylog->devicedetails = $request->header('User-Agent');
            $Cmsactivitylog->userid = $newuserId;
            $Cmsactivitylog->suserid = $userid;
            $Cmsactivitylog->timestamp = $timestamp;

            $Cmsactivitylog->save();



         //$my_selected_job_id = $request->input('my_selected_job_id');
         $url = '/admin/dashboard/';
         Auth::loginUsingId($newuserId);
         return redirect()->to($url);
     }

     public function cmsRestoreUser(Request $request) {
  

         $oldUserId = $request->session()->get('existing_user_id');
         $newUserId = $request->session()->get('user_is_switched_with_id');
         //dd($newUserId);
         Auth::loginUsingId($oldUserId);
         $request->session()->forget('existing_user_id');
         $request->session()->forget('user_is_switched');

        

        $timestamp = date("Y-m-d H:i:s");
        $userid = Auth::user()->id;
        //$newuserId = $request->input('user_is_switched');
        //dd($userid);

        $user = User::with('roles')->where( 'id', (int) $newUserId)->first();

        //dd($user->roles->first()->id);
        //dd($request->header('User-Agent'));
        $role = Role::where( 'id', (int) $newUserId)->first();
        //dd($role);
       
        //dd($Elemblo);
        $Cmsactivitylog = new Cmsactivitylog;
        $Cmsactivitylog->setConnection('mongodb');

            
            $Cmsactivitylog->username = $user->name;
            $Cmsactivitylog->useremail = $user->email;
            $Cmsactivitylog->userrole = $user->roles->first()->name;
            $Cmsactivitylog->eventname = "admin switched back from user ". $user->roles->first()->display_name;
            $Cmsactivitylog->devicedetails = $request->header('User-Agent');
            $Cmsactivitylog->userid = $userid;
            $Cmsactivitylog->suserid =  $newUserId;
            $Cmsactivitylog->timestamp = $timestamp;

            $Cmsactivitylog->save();

         $url = '/admin/dashboard/';
         return redirect()->to($url);
     }

}
