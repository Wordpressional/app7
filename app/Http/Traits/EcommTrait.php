<?php
namespace App\Http\Traits;
use App\Post;
use App\User;
use App\Shop\Employees\Employee;
use App\Compbrand;
use App\Role;
use App\Permission;

use Auth;

trait EcommTrait {
    public function ebrandsAll() {
        // Get all the brands from the Brands Table.
       
        $data = [];
        $n_users = User::all()->count();
        $n_roles = Role::all()->count();
        $n_perms = Permission::all()->count();
        $n_logged = Auth::guard('employee')->user()->name;

        //dd($n_logged);

         $n_loggeduser = Auth::guard('employee')->user()->email;
         //dd($n_loggeduser);
          
         $n_companyname = Compbrand::where('id',1)->first();
         //$n_userrole = Auth::guard('employee')->user()->roles()->name;
         //dd($n_userrole);

        $data = [
            'n_users' => $n_users,
            'n_roles' => $n_roles,
            'n_perms' => $n_perms,
            'n_logged' => $n_logged,
            'n_loggeduser' => $n_loggeduser,
            'n_companyname' => $n_companyname,
            //'n_userrole' => $n_userrole,

        ];
        //$this->data = $data;
        //dd($this->data);
        return $data;
    }
}