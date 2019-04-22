<?php

namespace App\Http\Controllers\CAdmin;

use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\Http\Requests\Admin\PostsRequest;
use App\Post;
use App\Role;
use App\User;
use App\Blogcategory;
use App\Tag;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    use BrandsTrait;
    /**
     * Show the application posts index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author_ids = array();
        $data = $this->brandsAll();
         if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
          $tuser = Auth::guard('demo')->user()->displayname;
           
            //$thisuser = User::where('email', Auth::user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
            $tuser = Auth::user()->displayname;
         }
        if($thisuser->isDemo() == "yes") {
           
            $post = Post::where('createdby', $thisuser->id)->withCount('comments', 'likes')->with('author','category')->withTrashed()->latest()->paginate(10);
        }
        else
        {
            
            if($thisuser->isSuperadministrator() == "yes") {
      
            $post = Post::withCount('comments', 'likes')->with('author','category')->withTrashed()->latest()->paginate(10);
           }
           
        
       
         
         //dd($post);

         if($thisuser->isCMSAdmin() == "yes") {
       $users1 = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cms_' . '%');
                                        })->get();
       $users2 = User::with('roles')->where('name', Auth::user()->name)->get();
        //dd($users);
            foreach($users1 as $user)
            {
                array_push($author_ids, $user->id);
            }
            foreach($users2 as $user)
            {
                array_push($author_ids, $user->id);
            }
        
            $post = Post::withCount('comments', 'likes')->with('author','category')->whereIn('author_id', $author_ids)->withTrashed()->latest()->paginate(10);
         }

          if($thisuser->isCMSAuthor() == "yes") {
       $users = User::with('roles')->where('name', Auth::user()->name)->get();
        //dd($users);
            foreach($users as $user)
            {
                array_push($author_ids, $user->id);
            }
        
            $post = Post::withCount('comments', 'likes')->with('author','category')->whereIn('author_id', $author_ids)->withTrashed()->latest()->paginate(10);
         }

          if($thisuser->isCMSEditor() == "yes") {
       $users = User::with('roles')->get();
        //dd($users);
            foreach($users as $user)
            {
                array_push($author_ids, $user->id);
            }
        
            $post = Post::withCount('comments', 'likes')->with('author','category')->whereIn('author_id', $author_ids)->withTrashed()->latest()->paginate(10);
         }


          if($thisuser->isCMSSubscriber() == "yes") {
             
       $users = User::with('roles')->get();
        //dd($users);
            foreach($users as $user)
            {
                array_push($author_ids, $user->id);
            }
        //dd($thisuser->id);
            $post = Post::withCount('comments', 'likes')->whereHas('likes', function($q){
                $thisuser = User::where('email', Auth::user()->email)->first();
            $q->where('author_id',  $thisuser->id);
                                        })->with('author','category')->whereIn('author_id', $author_ids)->withTrashed()->latest()->paginate(10);
         }
         //dd($author_ids);
        //dd($post[0]->author->name);
        //dd($post[0]->author());
         }
        $data = $this->brandsAll();
        return view('cadmin.posts.index', [
            'data' => $data,
            'posts' => $post,
            'tuser' => $tuser,
            'thisuser' => $thisuser
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit($id)
    {
        //dd(User::authors()->pluck('name', 'id'));
        //dd(Auth::user());


        $author_ids = array();
        $post = Post::where('id', $id)->first();
       
        
         $categories = Blogcategory::all();
        
         $data = $this->brandsAll();

          $rolearray = array();
        $roles = Role::where('name', 'like', 'cms_' . '%')->get();
        foreach($roles as $role)
        {
            array_push($rolearray, $role->display_name);
        }
       
         
        
        if($categories->count() == 0)
        {
            //Session::flash('info', 'You Must have Choose At least One Category');

            return redirect()->back()->withErrors('You Must First Create At least One Category');
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

         
           $tthisuser = Auth::guard('demo')->user();
           $ttag = Tag::where('createdby', $thisuser->id)->get();
            $rrole = Role::where('name', 'like', 'cust' . '%')->get();
             $categories = Blogcategory::where('createdby', $thisuser->id)->get();
          } 
          else
          {
            $tthisuser = Auth::user();
            $ttag = Tag::all();
            $rrole = Role::all();
            $categories = Blogcategory::all();
          }


         
        if($thisuser->isDemo() == "yes") {

         
          $userauthor = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cust' . '%');
                                        })->pluck('name', 'id');
          }
         else
         {
             
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
         }

        //dd($userauthor);

        return view('cadmin.posts.edit', [
            'post' => $post,
            'data' => $data,
            'roles' => $rrole,
            'users' => $userauthor,
            'categories'=>$categories,
            'tags'=> $ttag,
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

        $rolearray = array();
        $roles = Role::where('name', 'like', 'cust' . '%')->get();
        foreach($roles as $role)
        {
            array_push($rolearray, $role->display_name);
        }
       //dd($rolearray);
         $data = $this->brandsAll();
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

         
           $tthisuser = Auth::guard('demo')->user();
           $ttag = Tag::where('createdby', $thisuser->id)->get();
            $rrole = Role::where('name', 'like', 'cust' . '%')->get();
             $categories = Blogcategory::where('createdby', $thisuser->id)->get();
          } 
          else
          {
            $tthisuser = Auth::user();
            $ttag = Tag::all();
            $rrole = Role::all();
            $categories = Blogcategory::all();
          }
         
         
         $sthisuser = User::where('id', $tthisuser->id)->authors()->pluck('name', 'id');
         //dd($sthisuser);
       
        if($categories->count() == 0)
        {
            //Session::flash('info', 'You Must have Choose At least One Category');

            return redirect()->back()->withErrors('You Must First Create At least One Category');
        }
         
        if($thisuser->isDemo() == "yes") {

         
          $userauthor = User::whereHas('roles', function($q){
            $q->where('name', 'like', 'cust' . '%');
                                        })->pluck('name', 'id');
          }
         else
         {
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
         }
         //dd($userauthor);
        
        return view('cadmin.posts.create', [
            'users' => $userauthor,
            'categories'=>$categories,
             'roles' => $rolearray,
            'tags'=> $ttag,
            'data' => $data,
            'authors' => $rrole,
            'tuser'=>$thisuser,
            'sthisuser' => $sthisuser,
            'post' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostsRequest $request)
    {
        $post = Post::create($request->only([addslashes('title'), 'excerpt', htmlentities('content'), 'posted_at', 'author_id', 'category_id', 'template', 'pubyear','slug1']));
         if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
         }
        
         if($thisuser->isDemo() == "yes") {
         }
         else{

        $thisuser = User::where('email', Auth::user()->email)->first();
        }    
        $postup = Post::find($post->id);
        $postup->createdby = $thisuser->id;
          
        $postup->save();

        if ($request->hasFile('thumbnail')) {
            $post->storeAndSetThumbnail($request->file('thumbnail'));
        }

        
         $post->tags()->attach($request->tags);
        

        return redirect()->route('cadmin.posts.index', $post)->withSuccess(__('posts.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post)
    {
        
       
        $post->update($request->only([addslashes('title'), 'excerpt', htmlentities(addslashes('content')), 'posted_at', 'author_id', 'category_id', 'template','pubyear','slug1']));

        if ($request->hasFile('thumbnail')) {
            $post->storeAndSetThumbnail($request->file('thumbnail'));
        }
        
       $post->tags()->sync($request->tags);

        return redirect()->route('cadmin.posts.edit', $post->id)->withSuccess(__('posts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Post  $post)
    // {
    //     $post->delete();

    //     return redirect()->route('cadmin.posts.index')->withSuccess(__('posts.deleted'));
    // }

     public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        if($post->trashed())
        {
            $post->forceDelete();
        }
        else
        {
            $post->delete();
        }
        return redirect()->route('cadmin.posts.index')->withSuccess(__('posts.deleted'));
    }

    public function restore($id)
    {

        $post = Post::withTrashed()->where('id',$id)->first();
        if($post->trashed()){
            $post->restore();
        }
       return redirect()->route('cadmin.posts.index')->withSuccess(__('posts.restored'));
    }
}
