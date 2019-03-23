<?php

namespace App\Http\Controllers\CAdmin;

use Session;
use App\Tag;
use App\Page;
use App\Cform;
use App\Form;
use App\Module;
use App\Brand;
use App\General;
use App\Role;
use App\Permodule;
use App\Permission;
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
use App\User;

class ModuleController extends Controller
{
	use BrandsTrait;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function dumpmodules()
    {
        //path to sql file
        $sqlmodule = public_path('dumpmodule.sql');
        $sqlpermodule = public_path('permodules.sql');
        //dd($sql);
        //collect contents and pass to DB::unprepared
        DB::unprepared(file_get_contents($sqlmodule));
        $role_elec = Role::where('name', "elec_superadmin")->first();
        if($role_elec)
        {
        } 
        else
        {
        DB::unprepared(file_get_contents($sqlpermodule));
        }
         return redirect('/admin/modules');

    }


    public function loadmodules()
    {
    	$data = $this->brandsAll();
        $user = User::where('email', Auth::user()->email)->first();
        if($user->isCMSAdmin() == "yes") {
            $module = Module::where('modulename', 'cms')->get();
        }
        
        if($user->isSuperadministrator() == "yes") {
        $module = Module::all();
        }
        return view('cadmin.modules.loadmodule',compact('module','data'));

    }

    public function activate(Request $request)
    {
        $module = Module::where('id', $request->id)->first();
       
        $module->mmstatus = "active";
        $module->save();



         return redirect('/admin/modules');

    }
    public function deactivate(Request $request)
    {
       // dd($request);
        $module = Module::where('id', $request->id)->first();
       
        $module->mmstatus = "inactive";
        $module->save();

         return redirect('/admin/modules');

    }
    public function install(Request $request)
    {
        $module = Module::where('id', $request->id)->first();
       
        $module->mstatus = "installed";
        $module->save();
        $role_elec = Role::where('name', "elec_superadmin")->first();
        $role_cms = Role::where('name', "cms_administrator")->first();

        /*create permission if already not created */
        if($role_elec)
        {
        } 
        else
        {
        $permodule = Permodule::all();
        foreach($permodule as $permodule)
        {
        	$per = new Permission;
            $per->name = $permodule->pername;
            $per->display_name = $permodule->pername;
            $per->description = $permodule->pername;
            $per->save();
        }
        
       

        	$roles = new Role;
            $roles->name = "elec_superadmin";
            $roles->display_name = "Super Admin";
            $roles->description = "Election Commission Super Admin";
            $roles->save();
            $roles = new Role;
            $roles->name = "elec_ceo";
            $roles->display_name = "Chief Executive Officer";
            $roles->description = "Election Commission Chief Executive Officer";
            $roles->save();
            $roles = new Role;
            $roles->name = "elec_returningofficer";
            $roles->display_name = "Returning Officer";
            $roles->description = "Election Commission Returning Officer";
            $roles->save();
            $roles = new Role;
            $roles->name = "elec_presidingofficer";
            $roles->display_name = "Presiding Officer";
            $roles->description = "Election Commission Presiding Officer";
            $roles->save();
            $roles = new Role;
            $roles->name = "elec_sectorofficer";
            $roles->display_name = "Sector Officer";
            $roles->description = "Election Commission Sector Officer";
            $roles->save();
            $roles = new Role;
            $roles->name = "elec_asistantreturningofficer";
            $roles->display_name = "Assistant Returning Officer";
            $roles->description = "Election Commission Assistant Returning Officer";
            $roles->save();
            $roles = new Role;
            $roles->name = "elec_bootlevelofficer";
            $roles->display_name = "Assistant Returning Officer";
            $roles->description = "Election Commission Assistant Returning Officer";
            $roles->save();
        }

        /*create permission if already not created */
        if($role_cms)
        {
        } 
        else
        {
             
       

            $roles = new Role;
            $roles->name = "cms_administrator";
            $roles->display_name = "Administrator";
            $roles->description = "CMS Administrator";
            $roles->save();
            $roles = new Role;
            $roles->name = "cms_editor";
            $roles->display_name = "Editor";
            $roles->description = "CMS Editor";
            $roles->save();
            $roles = new Role;
            $roles->name = "cms_author";
            $roles->display_name = "Author";
            $roles->description = "CMS Author";
            $roles->save();
            $roles = new Role;
            $roles->name = "cms_subscriber";
            $roles->display_name = "Subscriber";
            $roles->description = "CMS Subscriber";
            $roles->save();
            
        }
           
        
        return redirect('/admin/modules');

    }
    public function uninstall(Request $request)
    {
        $module = Module::where('id', $request->id)->first();
       
        $module->mstatus = "uninstalled";
        $module->save();

       /* $permodule = Permodule::where('modulename', $module->modulename)->get();

        //dd($permodule);
      	foreach($permodule as $permodule)
        {
        	Permission::where('name', $permodule->pername)->delete();
        }

        Role::where('name', 'elec_superadmin')->delete();
        Role::where('name', 'elec_ceo')->delete();
        Role::where('name', 'elec_returningofficer')->delete();
        Role::where('name', 'elec_presidingofficer')->delete();
        Role::where('name', 'elec_sectorofficer')->delete();
        Role::where('name', 'elec_asistantreturningofficer')->delete();
        Role::where('name', 'elec_boothlevelofficer')->delete();*/

         return redirect('/admin/modules');

    }

   
}
