<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    use BrandsTrait;
    // Roles Listing Page
    public function index()
    {
        //
          $data = $this->brandsAll();
        $roles = Role::paginate(10);

        $params = [
            'title' => 'Roles Listing',
            'roles' => $roles,
            'data' => $data,
        ];

        return view('admin.roles.roles_list')->with($params);
    }

    // Roles Creation Page
    public function create()
    {
        //
        $permissions = Permission::all();
         $data = $this->brandsAll();
        $params = [
            'title' => 'Create Roles',
            'permissions' => $permissions,
            'data' => $data,
        ];

        return view('admin.roles.roles_create')->with($params);
    }

    // Roles Store to DB
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:roles',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('roles.index')->with('success', "The role $role->name has successfully been created.");
    }

    // Roles Delete Confirmation Page
    public function show($id)
    {
        //
         $data = $this->brandsAll();
        try {
            $role = Role::findOrFail($id);

            $params = [
                'title' => 'Delete Role',
                'role' => $role,
                'data' => $data,
            ];

            return view('admin.roles.roles_delete')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Roles Editing Page
    public function edit($id)
    {
        //
        try {
            $role = Role::findOrFail($id);
            $permissions = Permission::all();
            $role_permissions = $role->permissions()->get()->pluck('id')->toArray();
             $data = $this->brandsAll();
            $params = [
                'title' => 'Edit Role',
                'role' => $role,
                'permissions' => $permissions,
                'role_permissions' => $role_permissions,
                'data' => $data,
            ];

            return view('admin.roles.roles_edit')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Roles Update to DB
    public function update(Request $request, $id)
    {
        //
        try {
            $role = Role::findOrFail($id);

            $this->validate($request, [
                'display_name' => 'required',
                'description' => 'required',
            ]);

            $role->name = $request->input('name');
            $role->display_name = $request->input('display_name');
            $role->description = $request->input('description');

            $role->save();

            DB::table("permission_role")->where("permission_role.role_id", $id)->delete();
            // Attach permission to role
            foreach ($request->input('permission_id') as $key => $value) {
                $role->attachPermission($value);
            }

            return redirect()->route('roles.index')->with('success', "The role $role->name has successfully been updated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Delete Roles from DB
    public function destroy($id)
    {
        //
        try {
            $role = Role::findOrFail($id);

            //$role->delete();

            // Force Delete
            $role->users()->sync([]); // Delete relationship data
            $role->permissions()->sync([]); // Delete relationship data

            $role->forceDelete(); // Now force delete will work regardless of whether the pivot table has cascading delete

            return redirect()->route('roles.index')->with('success', "The Role $role->name has successfully been archived.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }
}