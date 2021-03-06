<?php 

namespace App\Http\Controllers\CAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\Http\Traits\DemoTrait;
use App\User;
use App\Role;
use App\Permission;
use App\Meleuser;
use App\Elemdist;
use App\Usermac;
use App\Elemac;
use Auth;
use App\Http\Requests\CAdmin\UsersRequest;


class UserController extends Controller
{
    use BrandsTrait;
    use DemoTrait;

    public function __construct()
    {
        //$this->middleware('role:users');
    }

    // Index Page for Users
    public function index()
    {
         $data = $this->brandsAll();
         $user = User::where('email', Auth::user()->email)->first();
         if($user->isCMSAdmin() == "yes") {
            $users = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->latest()->paginate(50);
         }

         if($user->isSuperadministrator() == "yes") {
            $users = User::paginate(10);
         }
        
        $params = [
            'title' => 'Users List',
            'users' => $users,
            'data' => $data,
        ];

        return view('cadmin.users.users_list')->with($params);
    }

    // Create User Page
    public function create()
    {
        $user = User::where('email', Auth::user()->email)->first();
         if($user->isCMSAdmin() == "yes") {
            $roles = Role::where('name', 'like', 'cms_' . '%')->get();
         }
         if($user->isSuperadministrator() == "yes") {
            $roles = Role::all();
         }

        
         $data = $this->brandsAll();
        $params = [
            'title' => 'Create User',
            'roles' => $roles,
            'data' => $data,
        ];

        return view('cadmin.users.users_create')->with($params);
    }

    // Store New User
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'displayname' => $request->input('name'),
           // 'password' => bcrypt($request->input('password')),
            'password' => $request->input('password'),
        ]);

       
        $role = Role::find($request->input('role_id'));

        //$user->attachRole($role);
        $user->roles()->attach($role, ['user_type'=>'App/User']);

        $role_permissions = $role->permissions()->get()->pluck('id')->toArray();
        //dd($role_permissions);
        //$user->attachPermissions();
        
        //dd($role_permissions);
             foreach ($role_permissions as $permission_id) {
                $permission = Permission::find($permission_id);
                //dd($permission);
                 $user->attachPermission($permission);
             }

        return redirect()->route('cadmin.users')->with('success', "The user $user->name has successfully been created.");
    }

    // Delete Confirmation Page
    public function show($id)
    {
        $data = $this->brandsAll();
        try {
            $user = User::findOrFail($id);

            $params = [
                'title' => 'Confirm Delete Record',
                'user' => $user,
                'data' => $data,
            ];

            return view('cadmin.users.users_delete')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Editing User Information Page
    public function edit($id)
    {
        try {
            $user = User::with('roles')->findOrFail($id);
            //dd($user->roles->id);
            //$roles = Role::all();
            $particularuser = User::where('email', Auth::user()->email)->first();
         
            if($particularuser->isSuperadministrator() == "yes") {
            if($user->roles === null)
            {
                 $roles = Role::with('permissions')->get();
            }
            else
            {   
                $roles = Role::with('permissions')->get();
                $rolesempty = "";
            }
            }

            if($particularuser->isCMSAdmin() == "yes") {
            if($user->roles === null)
            {
                 $roles = Role::with('permissions')->where('name', 'like', 'cms_' . '%')->get();
            }
            else
            {   
                $roles = Role::with('permissions')->where('name', 'like', 'cms_' . '%')->get();
                $rolesempty = "";
            }
            }

             if($particularuser->isCMSEditor() == "yes") {
            if($user->roles === null)
            {
                 $roles = Role::with('permissions')->where('name', 'like', 'cms_' . '%')->get();
            }
            else
            {   
                $roles = Role::with('permissions')->where('name', 'like', 'cms_' . '%')->get();
                $rolesempty = "";
            }
            }
           
            //dd(count($roles));
            $permissions = Permission::all();
             $data = $this->brandsAll();
            $params = [
                'title' => 'Edit User',
                'user' => $user,
                'roles' => $roles,
                'rolesempty' => $rolesempty,
                'permissions' => $permissions,
                'data' => $data,
            ];

            return view('cadmin.users.users_edit')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Update User Information to DB
    public function update(Request $request, $id)
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

            //$user->attachRole($role);
            $user->roles()->attach($role, ['user_type'=>'App/User']);

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

            return redirect()->route('cadmin.users')->with('success', "The user $user->name has successfully been updated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }


     // Editing User Information Page
    public function editelec($id)
    {
        try {
            $user = User::findOrFail($id);

            //$roles = Role::all();
            $roles = Role::with('permissions')->get();
            $permissions = Permission::all();
             $data = $this->brandsAll();
            $params = [
                'title' => 'Edit User',
                'user' => $user,
                'roles' => $roles,
                'permissions' => $permissions,
                'data' => $data,
            ];

            return view('cadmin.eleusers.users_edit')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Update User Information to DB
    public function updateelec(Request $request, $id)
    {
        //dd("hi");
        try {
            $user = User::findOrFail($id);

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,

            ]);

            if($request->input('password') != "" && $request->input('password') == $request->input('password_confirmation'))
            {
                $user->password = $request->input('password');
            } 
            else if($request->input('password') != "" && $request->input('password') != $request->input('password_confirmation'))
            {
               
                return redirect()->back()->with('error', 'Password mismatch');
            } 
            else
            {

            }

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

            //$user->attachRole($role);
            $user->roles()->attach($role, ['user_type'=>'App/User']);

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

            return redirect()->route('cadmin.polling.displayusers')->with('success', "The user $user->name has successfully been updated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

     // Remove User from DB with detaching Role
    public function destroyelec($id)
    {
        try {
            $user = User::findOrFail($id);

            // Detach from Role
            $roles = $user->roles;

            foreach ($roles as $key => $value) {
                $user->detachRole($value);
            }

            $user->delete();

            return redirect()->route('cadmin.eleusers')->with('success', "The user $user->name has successfully been deleted.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Remove User from DB with detaching Role
    public function destroy($id)
    {
        //dd("hi");
        try {
            $user = User::findOrFail($id);

            // Detach from Role
            $roles = $user->roles;

            foreach ($roles as $key => $value) {
                $user->detachRole($value);
            }

            $user->delete();

            return redirect()->route('cadmin.users')->with('success', "The user $user->name has successfully been deleted.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

     /**
     * Show the application users index.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexa()
    {
        $data = $this->brandsAll();

         $user = User::where('email', Auth::user()->email)->first();
         if($user->isCMSAuthor() == "yes" ) {
            $users = User::where('id',$user->id)->whereHas('roles', function($q){
            $q->where('name', 'cms_author');
                                        })->latest()->paginate(10);
         }
         if($user->isCMSEditor() == "yes" ) {
            $users = User::whereHas('roles', function($q){
            $q->whereIn('name', ['cms_editor', 'cms_author', 'cms_subscriber']);
                                        })->latest()->paginate(10);
         }
         if($user->isSuperadministrator() == "yes") {
            $users = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->latest()->paginate(10);
         }
         if($user->isCMSAdmin() == "yes") {
            $users = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->latest()->paginate(10);
         }

         if($user->isSAdmin() == "yes") {
          $users = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->latest()->paginate(10);
         }

         if($user->isGeneralAdmin() == "yes") {
          $users = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->latest()->paginate(10);
         }

          if($user->isDemo() == "yes") {
          $users = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cust_demo' . '%');
                                        })->latest()->paginate(10);
         }

        return view('cadmin.authors.index', [
            'data' => $data,
            'users' => $users,
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edita($id)
    {
        $user = User::findOrFail($id);
        $thisuser = User::where('email', Auth::user()->email)->first();
         if($thisuser->isCMSAuthor() == "yes") {
           $roles = Role::where('name', 'cms_author')->get();
         }
         if($user->isCMSEditor() == "yes" ) {
            $roles =  Role::whereIn('name', ['cms_editor', 'cms_author', 'cms_subscriber'])->get();
         }
         if($thisuser->isSuperadministrator() == "yes") {
          $roles = Role::all();
         }
         if($thisuser->isCMSAdmin() == "yes") {
          $roles = Role::where('name', 'like', 'cms_' . '%')->get();
         }

         if($thisuser->isSAdmin() == "yes") {
          $roles = Role::where('name', 'like', 'cms_' . '%')->get();
         }
         if($thisuser->isGeneralAdmin() == "yes") {
          $roles = Role::all();
         }

         if($thisuser->isDemo() == "yes") {
           $roles = Role::where('name', 'cust_demo')->get();
         }

       
        $data = $this->brandsAll();
        return view('cadmin.authors.edit', [
            'data' => $data,
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function createa()
    {
        
        $thisuser = User::where('email', Auth::user()->email)->first();

        if($thisuser->isSuperadministrator() == "yes")
        { 
            $roles = Role::all();
        }
        elseif($thisuser->isCMSAdmin() || $thisuser->isSAdmin())
        { 
            $roles = Role::where('name', 'like', 'cms_' . '%')->get();
        }
        elseif($thisuser->isDemo())
        { 
            $roles = Role::where('name', 'like', 'cust_demo' . '%')->get();
        }
        
        else
        {
            $roles = Role::where('name', 'like', 'cms_' . '%')->where('name','!=','cms_administrator')->where('name','!=','cms_superadministrator')->get();
        }
       
        $data = $this->brandsAll();
        return view('cadmin.authors.create', [
            'data' => $data,
           
            'roles' => $roles,
        ]);
    }

    public function storea(Request $request)
    {

        $user = new User;

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'role' => 'required'
            ]);

            if($request->input('password') != "" && $request->input('password') == $request->input('password_confirmation'))
            {
                $user->password = $request->input('password');
            } 
            else if($request->input('password') != "" && $request->input('password') != $request->input('password_confirmation'))
            {
               
                return redirect()->back()->with('error', 'Password mismatch');
            } 
            else
            {

            }

            $user->name = $request->input('name');
            $user->email = $request->input('email');

            $user->save();

            //dd($user->roles);
            //dd($request->input('role_id'));
             // Update role of the user
            $roles = $user->roles;
            //dd($roles);
            foreach ($roles as $key => $value) {
                $user->detachRole($value);
            }

            $role = Role::find($request->input('role'));

            //$user->attachRole($role);
            $user->roles()->attach($role, ['user_type'=>'App/User']);

             $role_permissions = $role->permissions()->get()->pluck('id')->toArray();
        //dd($role_permissions);
             foreach ($role_permissions as $permission_id) {
                $permission = Permission::find($permission_id);
                //dd($permission);
                 $user->detachPermission($permission);
                 $user->attachPermission($permission);
             }
            //dd($request->get('roles', ['cms_author']));

        //$role_ids = array_values($request->get('roles', []));
        //$user->roles()->sync($role_ids);
        
        return redirect()->route('cadmin.authors.index', $user)->withSuccess(__('User created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatea(Request $request, $id)
    {

        $user = User::findOrFail($id);

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,

            ]);

            if($request->input('password') != "" && $request->input('password') == $request->input('password_confirmation'))
            {
                $user->password = $request->input('password');
            } 
            else if($request->input('password') != "" && $request->input('password') != $request->input('password_confirmation'))
            {
               
                return redirect()->back()->with('error', 'Password mismatch');
            } 
            else
            {

            }

            $user->name = $request->input('name');
            $user->email = $request->input('email');

            $user->save();

            //dd($user->roles);
            //dd($request->input('role_id'));
             // Update role of the user
            $roles = $user->roles;
            //dd($roles);
            foreach ($roles as $key => $value) {
                $user->detachRole($value);
            }

            $role = Role::find($request->input('role_id'));

            //$user->attachRole($role);

            $user->roles()->attach($role, ['user_type'=>'App/User']);

             $role_permissions = $role->permissions()->get()->pluck('id')->toArray();
        //dd($role_permissions);
             foreach ($role_permissions as $permission_id) {
                $permission = Permission::find($permission_id);
                //dd($permission);
                 $user->detachPermission($permission);
                 $user->attachPermission($permission);
             }
            //dd($request->get('roles', ['cms_author']));

        //$role_ids = array_values($request->get('roles', []));
        //$user->roles()->sync($role_ids);
        
        return redirect()->route('cadmin.authors.edita', $user)->withSuccess(__('users.updated'));
    }

    function csvToArray($filename = '', $delimiter = ',', $csvname)
    {
        $filename = public_path('phpcsv/'.$csvname);
        //return $filename;
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public function importCsv(Request $request)
    {

        $file = public_path('phpcsv/'.$request->csvname);

        $customerArr = $this->csvToArray($file,',',$request->csvname);
        //dd($customerArr[0]);
       
        $Elemac = new Elemac;
        $Elemac->setConnection('mongodb');
        $ac = $Elemac->where('acid', (int) $request->acid)->first();
        //dd($request->acid);
        for ($i = 0; $i < count($customerArr); ++$i)
        {
            User::firstOrCreate($customerArr[$i]);
            /*$user = User::create([
            'name' => $customerArr[$i]['name'],
            'email' => $customerArr[$i]['email'],
           // 'password' => bcrypt($request->input('password')),
            'password' => $customerArr[$i]['password'],
            ]);*/

            $user = User::where('email', $customerArr[$i]['email'])->first();
            //dd($user->id);

            $userroleid = (int) $request->role_id;
            $role = Role::find($userroleid);
            //dd($role);
             $roleid = Role::find($role->id);
             //dd($roleid);
            //$user->attachRole($role);
             $user->roles()->attach($role, ['user_type'=>'App/User']);

        $role_permissions = $role->permissions()->get()->pluck('id')->toArray();
       //dd($role_permissions);
             foreach ($role_permissions as $permission_id) {
                $permission = Permission::find($permission_id);
               
                 $user->attachPermission($permission);
             }

            $usermac = new Usermac();
            $usermac->userid = $user->id;
            $usermac->acid = $request->acid;
            $usermac->save();
            

        }
        $url = '/cadmin/createeleusers/';
       return redirect()->to($url)->with('message', 'Successfully imported CSV file to database');

    }

    public function profile()
    {
        
        if(Auth::guard('demo')->user())
         {
           $user = User::where('id', Auth::guard('demo')->user()->id)->first();
         } 
         else 
         {
             $user = User::where('id', Auth::user()->id)->first();
         }
       //dd($user);
         if(Auth::guard('demo')->user())
         {
           $thisuser = User::with('roles')->where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
             $thisuser = User::with('roles')->where('email', Auth::user()->email)->first();
         }

        if($user->isDemo() == "yes" ) {

            //$thisuser = User::with('roles')->where('email', Auth::guard('demo')->user()->email)->first();
            $data = $this->demoAll();
        } 
        else
        {
            
            $data = $this->brandsAll();

        }
        //dd($thisuser->roles[0]->display_name);
        return view('cadmin.dashboard.profile')->with(['data' =>$data, 'thisuser' => $thisuser]);
    }

    

}
