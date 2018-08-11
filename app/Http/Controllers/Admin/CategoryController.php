<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_def = Category::where('name', 'Default_Cat')->first();
        if($category_def != "")
        {
        } 
        else
        {
        if($category_def['name'] != 'Default_Cat')
        {
            $category = new Category();
            $category->name = "Default_Cat";
            $category->save();
        }
        }
        return view('admin.categories.index')->with('categories',Category::withTrashed()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');

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

        $category = new Category();
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
        $category = Category::find($id);
       
    
        return view('admin.categories.edit')->with('category', $category);
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'You succesfully updated a category.');
        return redirect()->route('admin.categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::withTrashed()->where('id',$id)->first();
        if($category->trashed()){
            $category_def = Category::where('name', 'Default_Cat')->first();
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
        $category = Category::withTrashed()->where('id',$id)->first();
        if($category->trashed()){
            $category->restore();
        }
        Session::flash('success', 'You succesfully restored a category.');
         return redirect()->back();
    }
}
