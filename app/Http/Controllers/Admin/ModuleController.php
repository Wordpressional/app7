<?php

namespace App\Http\Controllers\Admin;

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
        DB::unprepared(file_get_contents($sqlpermodule));

         return redirect('/admin/modules');

    }


    public function loadmodules()
    {
    	$data = $this->brandsAll();
        $module = Module::all();
        return view('admin.modules.loadmodule',compact('module','data'));

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
         $role = Role::where('name', "elec_superadmin")->first();

        if($role)
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
