<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PagesRequest;
use App\Page;
use App\Post;
use App\User;
use App\Category;
use App\Tag;



use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the application posts index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
		$pages = Page::with('author')->withTrashed()->latest()->paginate(50);
        return view('admin.pages.index',compact('pages'));
        
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Page $page)
    {
        //dd(User::authors()->get());
        //dd(Auth::user());
        

         $thisuser = Auth::user();
         $categories = Category::all();
        
   
     
       
        return view('admin.pages.edit', [
            'page' => $page,
            'users' => User::authors()->pluck('displayname', 'id'),
            'tuser'=>$thisuser

            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {

       
        
        return view('admin.pages.create', [
            'users' => User::authors()->pluck('displayname', 'id')
           

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PagesRequest $request)
    {
        $page = Page::create($request->only(['display_name', 'content', 'author_id']));
  

        return redirect()->route('admin.pages.edit', $page)->withSuccess(__('pages.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PagesRequest $request, Page $page)
    {
       
       
        $page->update($request->only(['display_name', 'content', 'author_id']));

        return redirect()->route('admin.pages.edit', $page)->withSuccess(__('pages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::withTrashed()->where('id',$id)->first();
        if($page->trashed())
        {
            $page->forceDelete();
        }
        else
        {
            $page->delete();
        }
        return redirect()->route('admin.pages.index')->withSuccess(__('pages.deleted'));
    }

    public function restore($id)
    {

        $page = Page::withTrashed()->where('id',$id)->first();
        if($page->trashed()){
            $page->restore();
        }
       return redirect()->route('admin.pages.index')->withSuccess(__('pages.restored'));
    }

    

}
