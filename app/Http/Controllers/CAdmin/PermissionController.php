<?php

namespace App\Http\Controllers\CAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\User;
use App\Role;
use App\Permission;
use App\Permodule;
use Illuminate\Support\Facades\DB;

use Auth;

class PermissionController extends Controller
{
    use BrandsTrait;
    // Permission Listing Page
    public function index()
    {
        //
        $user = User::where('email', Auth::user()->email)->first();
        if($user->isSuperadministrator() == "yes") {
        $permissions = Permission::paginate(10);
        //dd($users);
        
        }

        if($user->isCMSAdmin() == "yes") {
        $permissions = Permission::where('name', 'like', 'cms_' . '%')->paginate(10);
        //dd($users);
        
        }

        if($user->isCMSAdmin() == "yes") {
        $permissions = Permission::where('name', 'like', 'cms_' . '%')->paginate(10);
        //dd($users);
        
        }

        if($user->isSuperAdmin() == "yes") {
        $permissions = Permission::where('name', 'like', 'elec_' . '%')->paginate(10);
        //dd($users);
        
        }

        $data = $this->brandsAll();
        $params = [
            'title' => 'Permissions List',
            'permissions' => $permissions,
            'data' => $data,
            
        ];

         if($user->isSuperadministrator() == "yes") {
            return view('cadmin.permission.perm_list')->with($params);
        }
        //dd($params['permodules']);
        if($user->isCMSAdmin() == "yes") {
            return view('cadmin.permission.perm_listcms')->with($params);
        }
    }

    // Permission Create Page
    public function create()
    {
        //
        $data = $this->brandsAll();
        $params = [
            'title' => 'Create Permission',
            'data' => $data,
        ];

        return view('cadmin.permission.perm_create')->with($params);
    }

    // Permission Store to DB
    public function store(Request $request)
    {
        //
         $user = User::where('email', Auth::user()->email)->first();
        $this->validate($request, [
            'name' => 'required|unique:permissions',
            'display_name' => 'required',
            'description' => 'required',
        ]);
        if($user->isSuperadministrator() == "yes") {
            $permission = Permission::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);
        }
        if($user->isCMSAdmin() == "yes") {
            $permission = Permission::create([
            'name' => "cms_".$request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);
        }
        return redirect()->route('permission.index')->with('success', "The Permission $permission->name has successfully been created.");
    }

    // Permission Delete Confirmation Page
    public function show($id)
    {
        //
         $data = $this->brandsAll();
        try {
            $permission = Permission::findOrFail($id);

            $params = [
                'title' => 'Delete Permission',
                'permission' => $permission,
                'data' => $data,
            ];


            return view('cadmin.permission.perm_delete')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Permission Editing Page
    public function edit($id)
    {
        //
         $data = $this->brandsAll();
        try {
            $permission = Permission::findOrFail($id);

            $params = [
                'title' => 'Edit Permission',
                'permission' => $permission,
                'data' => $data,
            ];

            //dd($role_permissions);
            
            return view('cadmin.permission.perm_edit')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Permission update to DB
    public function update(Request $request, $id)
    {
        //
        try {
            $permission = Permission::findOrFail($id);

            $this->validate($request, [
                'display_name' => 'required',
                'description' => 'required',
            ]);

            $permission->name = $request->input('name');
            $permission->display_name = $request->input('display_name');
            $permission->description = $request->input('description');

            $permission->save();

            return redirect()->route('permission.index')->with('success', "The permission $permission->name has successfully been updated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Permission Delete from DB
    public function destroy($id)
    {
         $data = $this->brandsAll();
        //
        try {
            $permission = Permission::findOrFail($id);
            DB::table("permission_role")->where( 'permission_id', $id)->delete();
            $permission->delete();
            
            return redirect()->route('permission.index')->with(['data' => $data,'success' => "The Role $permission->name has successfully been deleted."]);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }
}