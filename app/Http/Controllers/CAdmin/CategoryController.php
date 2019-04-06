<?php

namespace App\Http\Controllers\CAdmin;
use Session;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use Illuminate\Http\Request;
use App\Blogcategory;
use App\Compbrand;
use App\User;
use App\Role;
use Auth;

class CategoryController extends Controller
{
     use BrandsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category_def = Blogcategory::where('name', 'Default_Cat')->first();
        if($category_def != "")
        {
        } 
        else
        {
        if($category_def['name'] != 'Default_Cat')
        {
            $category = new Blogcategory();
            $category->name = "Default_Cat";
            $category->save();
        }
        }

         $data = $this->brandsAll();
         if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
         }
         if($thisuser->isDemo() == "yes") {
        $uall = User::with('roles')->where('name', Auth::guard('demo')->user()->name)->first();
        //dd($uall);
         $catall = Blogcategory::whereIn('createdby', [$uall->id, 'nil'])->withTrashed()->latest()->paginate(10);
         } else {
            $catall = Blogcategory::withTrashed()->latest()->paginate(10);
         }
        return view('cadmin.categories.index')->with(['categories' => $catall,'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->brandsAll();
        return view('cadmin.categories.create',compact('data'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

                'name' => 'required'


        ]);

        $category = new Blogcategory();
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'You succesfully created a category.');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->brandsAll();
        $category = Blogcategory::find($id);
       
    
        return view('cadmin.categories.edit')->with(['category' => $category, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Blogcategory::find($id);
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'You succesfully updated a category.');
        return redirect()->route('cadmin.categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Blogcategory::withTrashed()->where('id',$id)->first();
        if($category->trashed()){
            $category_def = Blogcategory::where('name', 'Default_Cat')->first();
            //echo $category_def;
            foreach ($category->posts as $post) {
                $post->where('id', $post->id)->update(['category_id' => $category_def->id]);
              }

            $category->forceDelete();
          } else {
            $category->delete();
            
          }

        
      Session::flash('success', 'You succesfully deleted a category.');
        return redirect()->back();
    }
     public function restore($id)
    {
        $category = Blogcategory::withTrashed()->where('id',$id)->first();
        if($category->trashed()){
            $category->restore();
        }
        Session::flash('success', 'You succesfully restored a category.');
         return redirect()->back();
    }
}
