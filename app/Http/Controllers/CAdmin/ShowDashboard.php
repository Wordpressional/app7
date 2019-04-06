<?php

namespace App\Http\Controllers\CAdmin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\Http\Traits\DemoTrait;
use App\Http\Traits\AccountsTrait;
use App\Post;
use App\User;
use App\Compbrand;
use App\Role;
use App\Permission;

use App\Meleuser;
use App\Elemdist;
use App\Account;

use App\Cmsactivitylog;
use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\Input;

class ShowDashboard extends Controller
{
    use BrandsTrait;
    use DemoTrait;
    use AccountsTrait;
    /**
     * Show the application admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function __invoke()
    {
        return view('cadmin.dashboard.index', [
            'comments' =>  Comment::lastWeek()->get(),
            'posts' => Post::lastWeek()->get(),
            'users' => User::lastWeek()->get(),
        ]);
    }*/

    public function __invoke()
    {

        //dd($data['n_companyname']->cname);
        if(Auth::guard('demo')->user())
         {
          $user = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $user = User::where('email', Auth::user()->email)->first();
         }
         
       
       
       
        if($user->isCEO() == "yes" || $user->isPO() == "yes" || $user->isRO() == "yes" || $user->isSuperAdmin() == "yes" || $user->isAERO() == "yes") {
            $data = $this->accountsAll();
            return view('cadmin.dashboard.index_ceohome', [
               
                'data' => $data,
                
            ]);
        } 

        else if($user->isSuperadministrator() == "yes") {
            $data = $this->brandsAll();
             return view('cadmin.dashboard.index_home', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
                
            ]);
         }

         else if($user->isSAdmin() == "yes") {
            $data = $this->brandsAll();
             return view('cadmin.dashboard.index_home', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
                
            ]);
         }

         else if($user->isCMSAdmin() == "yes") {
            $data = $this->brandsAll();
             return view('cadmin.dashboard.index_home', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
                
            ]);
         }

         else if($user->isCMSEditor() == "yes") {
            $data = $this->brandsAll();
             return view('cadmin.dashboard.index_cms_general', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
                
            ]);
         }

         else if($user->isCMSAuthor() == "yes") {
            $data = $this->brandsAll();
             return view('cadmin.dashboard.index_cms_general', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
                
            ]);
         }

         else if($user->isCMSSubscriber() == "yes") {
            $data = $this->brandsAll();
             return view('cadmin.dashboard.index_cms_general', [
                'comments' =>  Comment::lastWeek()->get(),
                'posts' => Post::lastWeek()->get(),
                'users' => User::lastWeek()->get(),
                'data' => $data,
                
            ]);
         }
         else if($user->isDemo() == "yes") {
            $data = $this->brandsAll();
              
            return view('cadmin.dashboard.index_demohome', [
               
                'data' => $data,
                
            ]);
         }

        
         else if($user->isBoothOfficer() == "yes") {
            $data = $this->accountsAll();
             return view('cadmin.dashboard.index_ceohome', [
                
                'data' => $data,
                
            ]);
        } else {      
           return "You do not have permission to access this page";
       }
       
    }

    public function demoindex()
    {
        
        
        $user = User::where('id', Auth::guard('demo')->id())->first();
       //dd($user);
        if($user->isDemo() == "yes" ) {
            $data = $this->demoAll();
            return view('cadmin.dashboard.index_demohome', [
               
                'data' => $data,
                
            ]);
        } 
    }

    public function cmsactivitylogs(Request $request){
        $data = $this->brandsAll();
        $Cmsactivitylog = new Cmsactivitylog;
        $Cmsactivitylog->setConnection('mongodb');
        $cmsactivitylogdetails = $Cmsactivitylog->all();
        //dd($elemactivitylogdetails[0]);
         return view('cadmin.cms.cmsactivitylogs', compact('cmsactivitylogdetails', 'data'));
    }

    public function cmsdisplayusers(){
         $data = $this->brandsAll();
        //$users = User::paginate(10);
          $thisuser = User::where('email', Auth::user()->email)->first();

         $tusers = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->get();
        $users = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->paginate(10);
        $params = [
            'title' => 'Users Login List',
            'users' => $users,
            'data' => $data,
            'totalusers' => count($tusers),
            'thisuser' => $thisuser,
        ];

       // dd($users[0]->roles[0]->name);
        return view('cadmin.cms.cmsdisplayusers')->with($params);
    }

     public function displayallusers(){
         $data = $this->brandsAll();
        //$users = User::paginate(10);
          $thisuser = User::where('email', Auth::user()->email)->first();

         $totalusers = User::with('roles')->get();

        $users = User::with('roles')->paginate(10);

        //dd($users[0]->roles[0]->display_name);
        $params = [
            'title' => 'Users Login List',
            'users' => $users,
            'data' => $data,
            'totalusers' => count($totalusers),
            'thisuser' => $thisuser,
        ];

       // dd($users[0]->roles[0]->name);
        return view('cadmin.cms.cmsdisplayusers')->with($params);
    }

     public function cmsSwitchUser(Request $request)
    {

        $user = User::where('email', Auth::user()->email)->first();
        
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
        
        $nuser = User::with('roles')->where( 'id', (int) $newuserId)->first();

        //dd($user->roles->first()->id);
        //dd($request->header('User-Agent'));
        $nrole = Role::where( 'id', (int) $newuserId)->first();
        
        //dd($elemblodetails);
        if($user->isSuperadministrator() == "yes") {

        } else {
        $Cmsactivitylog = new Cmsactivitylog;
        $Cmsactivitylog->setConnection('mongodb');

            
            $Cmsactivitylog->username = $user->name;
            $Cmsactivitylog->useremail = $user->email;
            $Cmsactivitylog->userrole = $user->roles->first()->name;
            $Cmsactivitylog->eventname = "admin switched to user ".$nuser->roles->first()->display_name;
            $Cmsactivitylog->devicedetails = $request->header('User-Agent');
            $Cmsactivitylog->userid = $newuserId;
            $Cmsactivitylog->suserid = $userid;
            $Cmsactivitylog->timestamp = $timestamp;

            $Cmsactivitylog->save();

        }

         //$my_selected_job_id = $request->input('my_selected_job_id');
         $url = '/cadmin/dashboard/';
         Auth::loginUsingId($newuserId);
         return redirect()->to($url);
         
     }

     public function cmsRestoreUser(Request $request) {
  
        $user = User::where('email', Auth::user()->email)->first();

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
        if($user->isSuperadministrator() == "yes") {

        } else {
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
        }

         $url = '/cadmin/dashboard/';
         return redirect()->to($url);
     }

     public function cmsuserSearch(Request $request){
    //dd("ko");
     $q =  Input::get ( 'q' );
    
    //dd($q);
     $data = $this->accountsAll();
     //dd($data);
     $roles = Role::with('permissions')->get();
  //dd("kk"); 
    if($q != ""){
        
        
    $users = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath('');
    $pagination = $users->appends ( array (
                'q' => Input::get ( 'q' ) 
        ) );
    //dd($users);
     $params = [
                'title' => 'Users List',
                'users' => $users,
                'roles' => $roles,
               'data' => $data,
                
            ];
    if (count ( $users ) > 0) {
        return view ( 'cadmin.cms.cmsdisplayusers' )->with($params)->withQuery ( $q );
    }
    }
   
        return back()->with('message', 'No Details found. Try to search again !' );


    
    }

    public function commactivitylogs(Request $request){
        $data = $this->brandsAll();
        $Cmsactivitylog = new Cmsactivitylog;
        $Cmsactivitylog->setConnection('mongodb');
        $cmsactivitylogdetails = $Cmsactivitylog->all();
        //dd($elemactivitylogdetails[0]);
         return view('cadmin.cms.cmsactivitylogs', compact('cmsactivitylogdetails', 'data'));
    }

     
}
