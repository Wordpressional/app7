<?php

namespace App\Http\Controllers\CAdmin;
use Session;
use App\Tag;
use App\Page;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    use BrandsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->brandsAll();
        return view('cadmin.tags.index')->with(['tags' => Tag::withTrashed()->latest()->paginate(10), 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data = $this->brandsAll();
         return view('cadmin.tags.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request ,[
                    
        //             'tag' => 'required'

        // ]);
        // Tag::create([
        //         'tag' => $request->tag
        // ]);
        // Session::flash('success','Tag created successfully');
        // return redirect()->back();

        $this->validate($request,[

                'tag' => 'required'


        ]);

        $tag = new Tag;
        $tag->tag = $request->tag;
        $tag->save();
        Session::flash('success', 'You succesfully created a tag.');
        return redirect()->route('cadmin.tags');


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
        $tag = Tag::find($id);
        return view('cadmin.tags.edit')->with(['tag'=>$tag, 'data'=>$data]);
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
        $this->validate($request, [

            'tag' => 'required'

        ]);
        $tag = Tag::find($id);
        $tag->tag = $request->tag;
        $tag->save();
        Session::flash('success','Tag Updated successfully');
        return redirect()->route('cadmin.tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $tagid = Tag::withTrashed()->where('id', $id)->first();
         $page = Page::where('display_name', $tagid->tag)->first();
         if($page){
             if($tagid->tag == $page->display_name){
                
                Session::flash('success', 'Tag cannot be deleted, First delete the page with the same name');
               return redirect()->back();
             } 
        } 
      else 
         {
            $tag = Tag::withTrashed()->where('id',$id)->first();
            if($tag->trashed()){
               $tag->forceDelete();
                Session::flash('success', 'Tag deleted permanently');
                return redirect()->back();
            } 
            else
            {    
                $tag->delete();
                Session::flash('success', 'Tag deleted');
                return redirect()->back();
            }
         }

        
    }
     public function restore($id)
    {
        $tag = Tag::withTrashed()->where('id',$id)->first();
        if($tag->trashed()){
            $tag->restore();
        }
        Session::flash('success', 'You succesfully restored a tag.');
         return redirect()->back();
    }
}
