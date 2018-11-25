<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Brand;
use App\Role;
use App\Permission;

use Auth;

class BrandingController extends Controller
{
    

    public function branding()
    {
        $company = Brand::where('id', 1)->first();
        //dd($colorsetting[0]->color);
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
        return view('admin.branding.brand')->with(['company' => $company, 'data' => $data]);
        

    }

    public function storebranding(Request $request)
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
            $newFileName = substr($request->input('filenameorig'), 0 , (strrpos($request->input('filenameorig'), ".")));

            $dir = public_path(). '/uploads/cmp/';
            $filename =  $newFileName . '_' .  time() . '.' . $extension;
            
             

                     
             $mime = $request->file('filed')->getMimeType();
            
            $path = $request->file('filed')->move($dir, $filename);
            $path = '/uploads/cmp/'.$filename;
        }

        
            $branding = Brand::where('id', 1)->first();
            if($branding != "")
            {
                $branding = Brand::find($branding->id);
                $branding->cname = $request->cname;
                $branding->caddr = $request->caddr;
                $branding->cphno = $request->cphno;
                $branding->cemail = $request->cemail;
                $branding->clogo = $path;
                $branding->pagebanner = $request->pagebanner;
                $branding->postbanner = $request->postbanner;
                $branding->footer = $request->footer;
                $branding->homepage = "[homepage]-[/homepage]";
                $branding->save();
            } 
            else
            {
                $branding = new Brand();
                $branding->cname = $request->cname;
                $branding->caddr = $request->caddr;
                $branding->cphno = $request->cphno;
                $branding->cemail = $request->cemail;
                $branding->clogo = $path;
                $branding->pagebanner = $request->pagebanner;
                $branding->postbanner = $request->postbanner;
                $branding->footer = $request->footer;
                $branding->homepage = "[homepage]-[/homepage]";
                $branding->save();
            }
        

    }


}
