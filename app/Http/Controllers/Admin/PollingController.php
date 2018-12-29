<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Tag;
use App\Page;

use App\Cform;
use App\Form;
use App\User;
use App\Brand;
use App\General;
use File;

use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Shortcode;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Meleuser;
use App\Elemdist;
use App\Elemac;
use App\Elemblo;
use App\Elempart;
use App\Mycollection;
use App\Elemuser;
use App\Elemactivitylog;

use Illuminate\Support\Facades\Input;

use App\Role;
use App\Elecaccount;

class PollingController extends Controller
{
	use BrandsTrait;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   

   
    public function showpollingform()
    {
    	$data = $this->brandsAll();
        $user = User::where('email', $data['n_loggeduser'])->first();
        if($user->can('pollingformshow')  && ($user->isCEO() == "yes" || $user->isPO() == "yes" || $user->isRO() == "yes")) {
       //dd($data['n_loggeduser']);
        return view('admin.ec.pollingform',compact('data'));
        } else {
        return "You do not have permission to access this page"; 
        }

    }

    public function showpollingdataperhr()
    {
        $data = $this->brandsAll();
        $user = User::where('email', $data['n_loggeduser'])->first();
        if($user->can('pollingformshow')  && ($user->isCEO() == "yes" || $user->isPO() == "yes" || $user->isRO() == "yes")) {
       //dd($data['n_loggeduser']);
        return view('admin.ec.pollingdataentry',compact('data'));
        } else {
        return "You do not have permission to access this page"; 
        }

    }

    public function showpollingexceptiondata()
    {
        $data = $this->brandsAll();
        $user = User::where('email', $data['n_loggeduser'])->first();
        if($user->can('pollingformshow')  && ($user->isCEO() == "yes" || $user->isPO() == "yes" || $user->isRO() == "yes")) {
       //dd($data['n_loggeduser']);
        return view('admin.ec.pollingexception',compact('data'));
        } else {
        return "You do not have permission to access this page"; 
        }

    }

    public function showpollingvoterdata()
    {
        $data = $this->brandsAll();
        $user = User::where('email', $data['n_loggeduser'])->first();
        if($user->can('pollingformshow')  && ($user->isCEO() == "yes" || $user->isPO() == "yes" || $user->isRO() == "yes")) {
       //dd($data['n_loggeduser']);
        return view('admin.ec.pollingvoterdata',compact('data'));
        } else {
        return "You do not have permission to access this page"; 
        }

    }

     public function showpollingstarted()
    {
        $data = $this->brandsAll();
        $user = User::where('email', $data['n_loggeduser'])->first();
        if($user->can('pollingformshow')  && ($user->isCEO() == "yes" || $user->isPO() == "yes" || $user->isRO() == "yes")) {
       //dd($data['n_loggeduser']);
        return view('admin.ec.pollingstarted',compact('data'));
        } else {
        return "You do not have permission to access this page"; 
        }

    }

    public function showpollingstartedreport()
    {

    }

    public function showuserregreport()
    {
         $data = $this->brandsAll();

         $user = User::where('email', $data['n_loggeduser'])->first();
        if($user->can('pollingformshow')  && ($user->isCEO() == "yes" || $user->isPO() == "yes" || $user->isRO() == "yes")) {
         return view('admin.ec.pollinguserregreport',compact('data'));
     }
        //return "hi";
    }

    public function someMethod()
    {
       
       /* $Meleuser = new Meleuser;

        $Meleuser->setConnection('mongodb');*/

        /*$Meleuser->username = "testuser";
        $Meleuser->phonenumber = "12345678";
        $Meleuser->uid = "1";
        $Meleuser->save();*/

        $elemdist = new Elemdist;
        $elemdist->setConnection('mongodb');
        $something = $elemdist->where('did', 1)->first();
        //dd($something);

        return $something;
        //return view('admin.dashboard.index_ceohome',compact('something'));
    }

    public function createusersfromceo(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
           // 'password' => bcrypt($request->input('password')),
            'password' => $request->input('password'),
        ]);

        $Elemuser = new Elemuser;
        $Elemuser->setConnection('mongodb');

        $Elemuser->username = $request->input('name');
        $Elemuser->email = $request->input('email');
        $Elemuser->phone = $request->input('phone');
        $Elemuser->userid = $user->id;
        $Elemuser->save();

       
        $role = Role::find($request->input('role_id'));

        $user->attachRole($role);

        $role_permissions = $role->permissions()->get()->pluck('id')->toArray();
        //dd($role_permissions);
        //$user->attachPermissions();
        
        //dd($role_permissions);
             foreach ($role_permissions as $permission_id) {
                $permission = Permission::find($permission_id);
                //dd($permission);
                 $user->attachPermission($permission);
             }

        return redirect()->route('admin.displayusers')->with('success', "The user $user->name has successfully been created.");

    }

    public function createeleusers()
    {
         $data = $this->brandsAll();
         $roles = Role::all();

        return view('admin.ec.createeleusersform',compact('data', 'roles'));
    }

    public function displayusers()
    {
        $data = $this->brandsAll();
        //$users = User::paginate(10);
        $users = User::with('roles')->paginate(50);
        $params = [
            'title' => 'Users Listing',
            'users' => $users,
            'data' => $data,
        ];

       // dd($users[0]->roles[0]->name);
        return view('admin.ec.displayusers')->with($params);

    }

    public function editusers($id)
    {

    }

    public function updateusers()
    {

        //dd("hi");
        try {
            $user = User::findOrFail($id);

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
            ]);

            $user->name = $request->input('name');
            $user->email = $request->input('email');

            $user->save();

            // Update role of the user
            $roles = $user->roles;
            //dd($roles);
            foreach ($roles as $key => $value) {
                $user->detachRole($value);
            }

            $role = Role::find($request->input('role_id'));

            $user->attachRole($role);

             $role_permissions = $role->permissions()->get()->pluck('id')->toArray();
        //dd($role_permissions);
             foreach ($role_permissions as $permission_id) {
                $permission = Permission::find($permission_id);
                //dd($permission);
                 $user->detachPermission($permission);
                 $user->attachPermission($permission);
             }
            // Update permission of the user
            //$permission = Permission::find($request->input('permission_id'));
            //$user->attachPermission($permission);

            return redirect()->route('admin.users')->with('success', "The user $user->name has successfully been updated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    

    }

    public function jsonuser(){

        /*$users = User::all();
        foreach($users as $key => $user)
        {
        $params[] = [
            'id' => $user->id,
            'user' => $user->name,
            'email' => $user->email
        ];
        }

        $json_data = array(
        "draw"            => 1,   
        "recordsTotal"    => count($users),  
        "recordsFiltered" => count($users),
        "data"            => $params
    );
        return $json_data;*/

        $mycollections = Mycollection::all();
        foreach($mycollections as $key => $mycollection)
        {
        $params[] = [
            'id' => $mycollection->id,
            'user' => $mycollection->name,
            'email' => $mycollection->email
        ];
        }

        $json_data = array(
        "draw"            => 1,   
        "recordsTotal"    => count($mycollection),  
        "recordsFiltered" => count($mycollection),
        "data"            => $params
    );
        return $json_data;
    }





    /**
     * Show the application selectAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectAjaxDist(Request $request, $id)
    {
        
        $Elemdist = new Elemdist;
        $Elemdist->setConnection('mongodb');

        $id = (int) $id;
            $dists = $Elemdist->pluck("distname","did")->all();
           //dd($dists);
            $data = view('admin.ec.ajax-select-dist',compact('dists'))->render();
            return response()->json(['options'=>$data]);
        
    }

    public function selectAjaxAC(Request $request, $id)
    {
        
        $Elemac = new Elemac;
        $Elemac->setConnection('mongodb');

        $id = (int) $id;
            $acs = $Elemac->where('did', $id)->pluck("acname","acid")->all();
           //dd($acs);
            $data = view('admin.ec.ajax-select-ac',compact('acs'))->render();
            return response()->json(['options'=>$data]);
        
    }

    public function selectAjaxPart(Request $request, $id)
    {
        
        $Elempart = new Elempart;
        $Elempart->setConnection('mongodb');

        $id = (int) $id;
            $parts = $Elempart->where('acid', $id)->pluck("partname","partid")->all();
           //dd($parts);
            $data = view('admin.ec.ajax-select-part',compact('parts'))->render();
            return response()->json(['options'=>$data]);
        
    }

    public function selectAjaxBlo(Request $request, $id)
    {
               
            //return response()->json(['options'=>"hi"]);
        $part_array = array();

        $Elemblo = new Elemblo;
        $Elemblo->setConnection('mongodb');

        $id = (int) $id;
            $blos = $Elemblo->where('acid', $id)->get();

        $Elempart = new Elempart;
        $Elempart->setConnection('mongodb');

       
        foreach($blos as $blo ){
            $part = $Elempart->where('partid', $blo->bloid)->first();
            $blo = $Elemblo->where('bloid', $blo->bloid)->first();
            array_push($part_array,$part->partname);
            
        }
        $blo1 = "no";
           //dd($part_array);
            $data = view('admin.ec.ajax-select-blo',compact(['blos','part_array', 'blo1']))->render();
            return response()->json(['result'=>$data]);
        
    }

    public function selectAjaxBloPart(Request $request, $pid)
    {
               
            //return response()->json(['options'=>"hi"]);
        $part_array = array();

        $Elemblo = new Elemblo;
        $Elemblo->setConnection('mongodb');

        $pid = (int) $pid;
            $blos = $Elemblo->where('partid', $pid)->first();

        $Elempart = new Elempart;
        $Elempart->setConnection('mongodb');

        
            $part = $Elempart->where('partid', $blos->bloid)->first();
            
            array_push($part_array,$part->partname);
            
        
        $blo1 = "ok";
           //dd($part_array);
            $data = view('admin.ec.ajax-select-blo',compact(['blos','part_array', 'blo1']))->render();
            return response()->json(['result'=>$data]);
        
    }

    public function userSearch(Request $request){
    //dd("ko");
     $q =  Input::get ( 'q' );
    
    //dd($q);
     $data = $this->brandsAll();
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
        return view ( 'admin.ec.displayusers' )->with($params)->withQuery ( $q );
    }
    }
        return view ( 'admin.ec.displayusers' )->withMessage ( 'No Details found. Try to search again !' );


    
    }

    public function bloSearch(Request $request){
    //dd("ko");

        $part_array = array();

        $Elemblo = new Elemblo;
        $Elemblo->setConnection('mongodb');

     $acid = (int) $request->acid;
     //dd($acid);

     $q =  Input::get ( 'q' );
    //dd($q);
        $Elempart = new Elempart;
        $Elempart->setConnection('mongodb');
    //dd($q);
     $data = $this->brandsAll();
   
    if($q != ""){
        
          $partnos = $Elempart->where('partname', 'LIKE', '%' . $q . '%')->orWhere ( 'partname',  $q )->get();

          //dd($partnos);
          //dd($partnos);
    
$blos = $Elemblo->where( 'bloname', 'LIKE', '%' . $q . '%' )->orWhere( 'bloname',  $q)->orWhere( 'blophno',  (int) $q)->get();

//$blos = $Elemblo->where( 'blophno',  (int) $q)->get();
//dd($blos);
$t = count($blos);

//dd($t);
    if(count($partnos) > 0)
    {

    foreach($partnos as $partn ){
           $blos = $Elemblo->whereIn( 'partno', $partn->bloid )->get();
            
            foreach($blos as $blo ){
           $part = $Elempart->where('partno', $blo->partno)->first();
            array_push($part_array,$part->partname);
            
        }
            
    }
    } else if($t==1) {
      //  dd($t);
       //dd($blos);
    $part = $Elempart->where('partid', $blos[0]->partid)->first();
    array_push($part_array,$part->partname);
    $blos = $blos[0];
    //dd($blos);
    }
    else
    {
         //dd($t);
     foreach($blos as $blo ){
       $part = $Elempart->where('partid', $blo->partid)->first();
       array_push($part_array,$part->partname);
       
    }   
         
    } 
    //dd(count ( $blos ));
   // dd($blos);
   // dd($part_array);
   /* $pagination = $blos->appends ( array (
                'q' => Input::get ( 'q' ) 
        ) );
   */

  

    if ($t == 1) {
        //return view ( 'admin.ec.ajax-select-blo' )->with($params)->withQuery ( $q );
        $blo1 = "ok";
         
//dd($blo1);
         $data1 = view('admin.ec.ajax-select-blo',compact(['blo1','part_array','data', 'blos']))->render();
            
        return response()->json(['result'=>$data1]);
    }
    else if ($t > 1) {
        //return view ( 'admin.ec.ajax-select-blo' )->with($params)->withQuery ( $q );
        $blo1 = "no";
        

         $data1 = view('admin.ec.ajax-select-blo',compact(['blos','part_array','data', 'blo1']))->render();
            
        return response()->json(['result'=>$data1]);
    }
    }
        //return view ( 'admin.ec.ajax-select-blo' )->withMessage ( 'No Details found. Try to search again !' );

     $data1 = ( 'No Details found.' );
    //return view('admin.ec.pollinguserregreport',compact('data'));
            return response()->json(['result'=>$data1]);

    
    }


    public function eleSwitchUser(Request $request)
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
        $Elemblo = new Elemblo;
        $Elemblo->setConnection('mongodb');

        $elemblodetails = $Elemblo->where( 'userid', $userid )->first();
        //dd($elemblodetails);
        $Elemactivitylog = new Elemactivitylog;
        $Elemactivitylog->setConnection('mongodb');

            
            $Elemactivitylog->username = $user->name;
            $Elemactivitylog->useremail = $user->email;
            $Elemactivitylog->userrole = $user->roles->first()->name;
            $Elemactivitylog->eventname = "ceo switched to user ".$user->roles->first()->displayname;
            $Elemactivitylog->devicedetails = $request->header('User-Agent');
            $Elemactivitylog->userid = $newuserId;
            $Elemactivitylog->bloid = $elemblodetails->bloid;
            $Elemactivitylog->timestamp = $timestamp;

            $Elemactivitylog->save();



         //$my_selected_job_id = $request->input('my_selected_job_id');
         $url = '/admin/dashboard/';
         Auth::loginUsingId($newuserId);
         return redirect()->to($url);
     }

     public function eleRestoreUser(Request $request) {
  

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
        $Elemblo = new Elemblo;
        $Elemblo->setConnection('mongodb');

        $elemblodetails = $Elemblo->where( 'userid', (int) $newUserId )->first();
        //dd($Elemblo);
        $Elemactivitylog = new Elemactivitylog;
        $Elemactivitylog->setConnection('mongodb');

            
            $Elemactivitylog->username = $user->name;
            $Elemactivitylog->useremail = $user->email;
            $Elemactivitylog->userrole = $user->roles->first()->name;
            $Elemactivitylog->eventname = "ceo switched back from user ". $user->roles->first()->displayname;
            $Elemactivitylog->devicedetails = $request->header('User-Agent');
            $Elemactivitylog->userid = $userid;
            $Elemactivitylog->bloid =  $newUserId;
            $Elemactivitylog->timestamp = $timestamp;

            $Elemactivitylog->save();

         $url = '/admin/dashboard/';
         return redirect()->to($url);
     }

   
   public function activitylogs(Request $request) {
    $data = $this->brandsAll();
        $Elemactivitylog = new Elemactivitylog;
        $Elemactivitylog->setConnection('mongodb');
        $elemactivitylogdetails = $Elemactivitylog->all();
        //dd($elemactivitylogdetails[0]);
         return view('admin.ec.activitylogs', compact('elemactivitylogdetails', 'data'));
   }

   public function storecsv(Request $request)
    {

        $input = $request->all();
        //dd("hi");
        //dd($input);

        if($request->hasFile('csvfile')){

           //$input = $request->file('filed');
            //dd("hi");
           //dd($input);
            $extension = $request->file('csvfile')->getClientOriginalExtension(); // getting image extension

            $fine = $request->file('csvfile')->getClientOriginalName();

        //dd($extension);
            $newFileName = $fine;

            $dir = public_path(). '/phpcsv/';
                 
             $mime = $request->file('csvfile')->getMimeType();
            
            $path = $request->file('csvfile')->move($dir, $newFileName);

            $url = '/admin/createeleusers/';
            return redirect()->to($url)->with('message', 'Successfully uploaded CSV file to server');
           
        }
    }

    public function accountSettings(Request $request)
    {
         $data = $this->brandsAll();

          $account = Elecaccount::where('id', 1)->first();
        //dd($colorsetting[0]->color);
        //dd($this->commomindex());
        $data = $this->brandsAll();

        return view('admin.branding.account', compact('data', 'account'));
    }

    public function storeelecaccount(Request $request)
    {

        $input = $request->all();
        //dd("hi");
        //dd($input);

        if($request->hasFile('filed')){

           //$input = $request->file('filed');
            //dd("hi");
           //dd($input);
            $extension = $request->file('filed')->getClientOriginalExtension(); // getting image extension

            $fine = $request->file('filed')->getClientOriginalName();

        //dd($fine);
            $newFileName = $fine;

            $dir = public_path(). '/uploads/cmp/';
           
             $mime = $request->file('filed')->getMimeType();
            
            $path = $request->file('filed')->move($dir, $fine);
            $path = '/uploads/cmp/'.$fine;
        }

        if($request->hasFile('filed2')){

           //$input = $request->file('filed');
            //dd("hi");
           //dd($input);
            $extension2 = $request->file('filed2')->getClientOriginalExtension(); // getting image extension

            $fine2 = $request->file('filed2')->getClientOriginalName();

        //dd($fine);
            $newFileName2 = $fine2;

            $dir2 = public_path(). '/uploads/cmp/';
            $filename2 =  $fine2;
                   
             $mime2 = $request->file('filed2')->getMimeType();
            
            $path2 = $request->file('filed2')->move($dir2, $filename2);
            $path2 = '/uploads/cmp/'.$filename2;
        }

        if($request->hasFile('filed3')){

           //$input = $request->file('filed');
            //dd("hi");
           //dd($input);
            $extension3 = $request->file('filed3')->getClientOriginalExtension(); // getting image extension

            $fine3 = $request->file('filed3')->getClientOriginalName();

        //dd($fine);
            $newFileName3 = $fine2;

            $dir3 = public_path(). '/uploads/cmp/';
            $filename3 =  $fine3;
                   
             $mime3 = $request->file('filed3')->getMimeType();
            
            $path3 = $request->file('filed3')->move($dir3, $filename3);
            $path3 = '/uploads/cmp/'.$filename3;
        }

        
            $myaccount = Elecaccount::where('id', 1)->first();
            if($myaccount != "")
            {
                $myaccount = Elecaccount::find($myaccount->id);
                $myaccount->cname = $request->cname;
                $myaccount->caddr = $request->caddr;
                $myaccount->cphno = $request->cphno;
                $myaccount->cemail = $request->cemail;
                $myaccount->clogo = $path;
                $myaccount->favicon = $path2;
                $myaccount->timezone = $request->timezone;
                $myaccount->defaultprofileimg = $path3;

                $myaccount->save();
            } 
            else
            {
                $myaccount = new Elecaccount();
                $myaccount->cname = $request->cname;
                $myaccount->caddr = $request->caddr;
                $myaccount->cphno = $request->cphno;
                $myaccount->cemail = $request->cemail;
                $myaccount->clogo = $path;
                $myaccount->favicon = $path2;
                $myaccount->timezone = $request->timezone;
                $myaccount->defaultprofileimg = $path3;
                
                $myaccount->save();
            }
        

    }

    public function showuserroreport()
    {
        $acblo_array = array();
        $lc = array();

        $data = $this->brandsAll();
         
        $Elemblo = new Elemblo;
        $Elemblo->setConnection('mongodb');

        $Elemac = new Elemac;

        $Elemac->setConnection('mongodb');

        $Elemaclists = $Elemac::all();
         //dd($Elemaclists[4]);

          $user = User::with('roles')->get();

        //dd($user->roles->first()->name);
        //dd($request->header('User-Agent'));

        foreach($user as $key => $u)
        {
            if($u->roles->first()->name == "elec_returningofficer")
            {
                 $rc[$key] = $u->id;
            }
        }
        //dd($rc);

        foreach($Elemaclists as $key => $list)
        {
           
          
            $Elemblolists = $Elemblo::where('acno', $list->acno)->whereIn('userid', $rc)->get();

            $Elemblolists2 = $Elemblo::where('acno', $list->acno)->get();

            $lc[$list->acno] = count($Elemblolists);

            $lc2[$list->acno] = count($Elemblolists2);
            
        

        }

       
        //dd($lc2);
        
         
         return view('admin.ec.reports.roreport',compact('data', 'lc', 'Elemaclists','lc2'));
     }


   public function showuserporeport()
    {
        $acblo_array = array();
        $lc = array();

        $data = $this->brandsAll();
         
        $Elemblo = new Elemblo;
        $Elemblo->setConnection('mongodb');

        $Elemac = new Elemac;

        $Elemac->setConnection('mongodb');

        $Elemaclists = $Elemac::all();
         //dd($Elemaclists[4]);

          $user = User::with('roles')->get();

        //dd($user->roles->first()->name);
        //dd($request->header('User-Agent'));

        foreach($user as $key => $u)
        {
            if($u->roles->first()->name == "elec_presidingofficer")
            {
                 $rc[$key] = $u->id;
            }
        }
        //dd($rc);

        foreach($Elemaclists as $key => $list)
        {
           
          
            $Elemblolists = $Elemblo::where('acno', $list->acno)->whereIn('userid', $rc)->get();

            $Elemblolists2 = $Elemblo::where('acno', $list->acno)->get();

            $lc[$list->acno] = count($Elemblolists);

            $lc2[$list->acno] = count($Elemblolists2);
            
        

        }

       
        //dd($lc2);
        
         
         return view('admin.ec.reports.poreport',compact('data', 'lc', 'Elemaclists','lc2'));
     }

     

   
    
}


