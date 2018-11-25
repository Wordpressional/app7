<?php
namespace App\Http\Traits;
use App\Post;
use App\User;
use App\Brand;
use App\Role;
use App\Permission;

use Auth;

trait BrandsTrait {
    public function brandsAll() {
        // Get all the brands from the Brands Table.
       
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
        //$this->data = $data;
        //dd($this->data);
        return $data;
    }
}