<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostsRequest;
use App\Post;
use App\User;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Show the application posts index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::withCount('comments', 'likes')->with('author','category')->withTrashed()->latest()->paginate(50)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Post $post)
    {
        //dd(User::authors()->get());
        //dd(Auth::user());
         $thisuser = Auth::user();
         $categories = Category::all();
        

        return view('admin.posts.edit', [
            'post' => $post,
            'users' => User::authors()->pluck('displayname', 'id'),
            'categories'=>$categories,
            'tags'=>Tag::all(),
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

        $categories = Category::all();
        if($categories->count() == 0)
        {
            //Session::flash('info', 'You Must have Choose At least One Category');

            return redirect()->back()->withErrors('You Must First Create At least One Category');
        }
        
        return view('admin.posts.create', [
            'users' => User::authors()->pluck('displayname', 'id'),
            'categories'=>$categories,
            'tags'=>Tag::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostsRequest $request)
    {
        $post = Post::create($request->only(['title', 'excerpt', 'content', 'posted_at', 'author_id', 'category_id', 'template', 'pubyear']));

        if ($request->hasFile('thumbnail')) {
            $post->storeAndSetThumbnail($request->file('thumbnail'));
        }

        
         $post->tags()->attach($request->tags);

        return redirect()->route('admin.posts.edit', $post)->withSuccess(__('posts.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post)
    {
        
       
        $post->update($request->only(['title', 'excerpt', 'content', 'posted_at', 'author_id', 'category_id', 'template', 'pubyear']));

        if ($request->hasFile('thumbnail')) {
            $post->storeAndSetThumbnail($request->file('thumbnail'));
        }
        
       $post->tags()->sync($request->tags);

        return redirect()->route('admin.posts.edit', $post)->withSuccess(__('posts.updated'));
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

    //     return redirect()->route('admin.posts.index')->withSuccess(__('posts.deleted'));
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
        return redirect()->route('admin.posts.index')->withSuccess(__('posts.deleted'));
    }

    public function restore($id)
    {

        $post = Post::withTrashed()->where('id',$id)->first();
        if($post->trashed()){
            $post->restore();
        }
       return redirect()->route('admin.posts.index')->withSuccess(__('posts.restored'));
    }
}
