<?php
namespace App\Http\Traits;
use App\Post;
use App\User;
use App\Compbrand;
use App\Role;
use App\Permission;
use App\Shop\Customers\Customer;
use Auth;

trait DemoTrait {
    public function demoAll() {
        // Get all the brands from the Brands Table.
       
        $data = [];
        $n_users = User::all()->count();
        $n_roles = Role::all()->count();
        $n_perms = Permission::all()->count();
        $n_companyname = Compbrand::where('id',1)->first();

        if(Auth::guard('demo')->check()){
         $n_logged = Auth::guard('demo')->id();
  //dd(Auth::guard('demo')->user()->email);
         $n_loggeduser = Auth::guard('demo')->user()->email;
         
         $n_userrole = Auth::guard('demo')->user()->roles[0]->name;
         } 
         else if(Auth::guard('checkout')->check()){
         $c_logged = Auth::guard('checkout')->id();
         $customer = Customer::where('id',$c_logged)->first();
  //dd(Auth::guard('demo')->user()->email);
         $n_logged = Customer::where('email',$customer->email)->first();
         $n_loggeduser = $customer->email;
         //dd($n_logged);
         $n_userrole = 'cust_demo';
         } 
         else 
         {

         $n_logged = Auth::user()->id;
  //dd(Auth::guard('demo')->user()->email);
         $n_loggeduser = Auth::user()->email;
         
         $n_userrole = Auth::user()->roles[0]->name;

         }

        $data = [
            'n_users' => $n_users,
            'n_roles' => $n_roles,
            'n_perms' => $n_perms,
            'n_logged' => $n_logged,
            'n_loggeduser' => $n_loggeduser,
            'n_companyname' => $n_companyname,
            'n_userrole' => $n_userrole,

        ];
        //$this->data = $data;
        //dd($this->data);
        return $data;
    }
}