<?php

namespace App\Http\Controllers\CAdmin;

use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\Http\Requests\Admin\PagesRequest;
use App\Page;
use App\Post;
use App\User;
use App\Blogcategory;
use App\Tag;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    use BrandsTrait;
    /**
     * Show the application posts index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = $this->brandsAll();

         $thisuser = User::where('email', Auth::user()->email)->first();
         //dd($thisuser);
         
            $pages = Page::with('author')->withTrashed()->latest()->paginate(10);
           
        
		
        return view('cadmin.pages.index',compact('pages', 'data', 'thisuser'));
        
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Page $page)
    {
        //dd(User::authors()->get());
        //dd(Auth::user());
        

         $thisuser = Auth::user();
         $categories = Blogcategory::all();
        
   
         $data = $this->brandsAll();
        
        $thisuser = User::where('email', Auth::user()->email)->first();
         if($thisuser->isCMSAuthor() == "yes") {
            $userauthor = User::with('roles')->where('name', Auth::user()->name)->pluck('name', 'id');
            //dd($userauthor);
           //$userauthor = User::authors()->pluck('name', 'id');
           //dd($userauthor);
         }
         if($thisuser->isSuperadministrator() == "yes") {
           $userauthor = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->pluck('name', 'id');
         }
         if($thisuser->isCMSAdmin() == "yes") {
           $userauthor = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->pluck('name', 'id');

         }

         if($thisuser->isCMSEditor() == "yes") {
           $userauthor = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->pluck('name', 'id');

         }

        return view('cadmin.pages.edit', [
            'page' => $page,
            'users' => $userauthor,
            'tuser'=>$thisuser,
            'data'=>$data,

            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {

        
         $data = $this->brandsAll();
         $thisuser = Auth::user();
         
         $sthisuser = User::where('id', $thisuser->id)->authors()->pluck('name', 'id');
         //dd($sthisuser);
        

         $thisuser = User::where('email', Auth::user()->email)->first();
         if($thisuser->isCMSAuthor() == "yes") {
            $userauthor = User::with('roles')->where('name', Auth::user()->name)->pluck('name', 'id');
            //dd($userauthor);
           //$userauthor = User::authors()->pluck('name', 'id');
           //dd($userauthor);
         }
         if($thisuser->isSuperadministrator() == "yes") {
           $userauthor = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->pluck('name', 'id');
         }
         if($thisuser->isCMSAdmin() == "yes") {
           $userauthor = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->pluck('name', 'id');
         }

         if($thisuser->isCMSEditor() == "yes") {
           $userauthor = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->pluck('name', 'id');
         }

        return view('cadmin.pages.create', [
            'users' => $userauthor,
            'data'=>$data,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PagesRequest $request)
    {
        $page = Page::create($request->only(['display_name', 'content', 'author_id','ptitlecolor', 'ptitlebgcolor', 'pcontbgcolor', 'headercode', 'footercode','name1']));
            
        $thisuser = User::where('email', Auth::user()->email)->first();    
        $pageup = Page::find($page->id);
        $pageup->createdby = $thisuser->id;
          
        $pageup->save();

        return redirect()->route('cadmin.pages.edit', $page)->withSuccess(__('pages.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PagesRequest $request, Page $page)
    {
       
       
        $page->update($request->only(['display_name', 'content', 'author_id','ptitlecolor', 'ptitlebgcolor', 'pcontbgcolor', 'headercode', 'footercode','name1']));

        return redirect()->route('cadmin.pages.edit', $page)->withSuccess(__('pages.updated'));
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
        return redirect()->route('cadmin.pages.index')->withSuccess(__('pages.deleted'));
    }

    public function restore($id)
    {

        $page = Page::withTrashed()->where('id',$id)->first();
        if($page->trashed()){
            $page->restore();
        }
       return redirect()->route('cadmin.pages.index')->withSuccess(__('pages.restored'));
    }

    

}
