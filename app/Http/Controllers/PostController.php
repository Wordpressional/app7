<?php

namespace App\Http\Controllers;
use App\Page;
use App\Post;
use App\Category;
use App\Tag;
use App\Colorsetting;
use App\Brand;
use Illuminate\Http\Request;
use Shortcode;
use Auth;


class PostController extends Controller
{
    private $post1;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('posts.index', [
            'posts' => Post::search($request->input('q'))
                             ->with('author', 'media', 'likes')
                             ->withCount('comments', 'likes')
                             ->latest()
                             ->paginate(20)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post)
    {
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function showsingle(Request $request, Post $post)
    {
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        $api_token = Auth::user()->api_token;
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();

        return view('webhome.single', [
            'post' => $post,
            'colorsetting' => $colorsetting,
            'branding' => $branding,
            'api_token' => $api_token
        ])->withShortcodes();
    }

     public function showsingletwo(Request $request, Post $post)
    {
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        $api_token = Auth::user()->api_token;
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();

        return view('webhome.singletwo', [
            'post' => $post,
            'colorsetting' => $colorsetting,
            'branding' => $branding,
             'api_token' => $api_token
        ])->withShortcodes();
    }

    public function showbsingle(Request $request, Post $post)
    {

        Shortcode::enable();
        $shortcode = App('Shortcode');

        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        $api_token = Auth::user()->api_token;
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();

        return view('webhome.bsingle', [
            'post' => $post,
            'colorsetting' => $colorsetting,
            'branding' => $branding,
             'api_token' => $api_token
        ])->withShortcodes();
    }

    public function allcat(Request $request)
    {
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();

        return view('webhome.allcategory', [
            'colorsetting' => $colorsetting,
            'branding' => $branding,
            'posts' => Post::with('author', 'media', 'likes')
                             ->withCount('comments', 'likes')
                             ->latest()
                             ->paginate(20)
        ])->withShortcodes();
    }

     public function cattype(Request $request, $cat)
    {
        Shortcode::enable();
        $shortcode = App('Shortcode');

        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        $arry = array();
        //dd($cat);
        $catid = Category::where('name', $cat)->first();
        //dd($catid);
        if($catid)
        {
        if($catid->id != "")
        {
            $post = Post::where('category_id', $catid->id)
                             ->with('author', 'media', 'likes', 'tags')
                             ->withCount('comments', 'likes')
                             ->latest()
                             ->paginate(20);
            //$tag = $post->tags;
             $post1 = $post;
             // foreach ($post1 as $posta)
             // {
             //    //$posta->tags;
             //    dd($posta->tags);
             // }
             //$tag = $post1->tags->first()->tag;
//dd($post1);

             $this->post1 = $post1;
             //dd($this->printtags());
        return view('webhome.allcategory', [
            'colorsetting' => $colorsetting,
            'branding' => $branding,
            'posts' => $post,
            'posttags' => $this->printtags()
        ])->withShortcodes();
        }
        } 
        else
        {
            return "create category";
        }
    }

    public function tagtype(Request $request, $tag)
    {

        Shortcode::enable();
        $shortcode = App('Shortcode');

        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        $arry = array();
        //dd($cat);
        $tagid = Tag::where('tag', $tag)->first();
       
        if($tagid)
        {
        if($tagid->id != "")
        {
            $post = Post::whereHas('tags', function($q) use ($tagid)
                                {
                                    $q->where('tag_id', $tagid->id);
                                })
                             ->with('author', 'media', 'likes')
                             ->withCount('comments', 'likes')
                             ->latest()
                             ->paginate(20);
                             
           //dd($post);
        return view('webhome.alltag', [
            'posts' => $post,
            'colorsetting' => $colorsetting,
            'branding' => $branding,
           
           
        ])->withShortcodes();
        }
        } 
        else
        {
            return "create tags";
        }
    }

    public function tagtypeconf(Request $request, $tag)
    {
        $arry = array();
        //dd($cat);
        $tagid = Tag::where('tag', $tag)->first();
         $page = Page::where('display_name', $tag)->first();
        
        //dd($tagid);
        if($tagid)
        {
        if($tagid->id != "")
        {
            $post = Post::whereHas('tags', function($q) use ($tagid)
                                {
                                    $q->where('tag_id', $tagid->id);
                                })
                             ->with('author', 'media', 'likes')
                             ->withCount('comments', 'likes')
                             ->latest()
                             ->paginate(20);
                             
           //dd($post);
        return view('webhome.allconftag', [
            'posts' => $post,
             'page' => $page,
           
        ]);
        }
        } 
        else
        {
            return "create tags";
        }
    }

     public function arttype(Request $request, $cat)
    {
        //dd($cat);
        Shortcode::enable();
        $shortcode = App('Shortcode');

        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        $catid = Category::where('name', $cat)->first();

        if($catid)
        {
        //dd($catid);
        if($catid->id != "")
        {
        return view('webhome.articles', [
            'colorsetting' => $colorsetting,
            'branding' => $branding,
            'posts' => Post::where('category_id', $catid->id)
                             ->with('author', 'media', 'likes')
                             ->withCount('comments', 'likes')
                             ->latest()
                             ->paginate(20)
        ])->withShortcodes();
        }
        }
        else
        {
            return "create category";
        }
    }

     public function linktype(Request $request, $cat)
    {
        //dd($cat);
        $catid = Category::where('name', $cat)->first();
        //dd($catid);
        if($catid)
        {
        if($catid->id != "")
        {
        return view('webhome.links', [
            'posts' => Post::where('category_id', $catid->id)
                             ->with('author', 'media', 'likes')
                             ->withCount('comments', 'likes')
                             ->latest()
                             ->paginate(20)
        ]);
        }
        }
        else
        {
            return "create category";
        }
    }

     public function articles(Request $request)
    {
       Shortcode::enable();
        $shortcode = App('Shortcode');

        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        return view('webhome.articles', [
            'colorsetting' => $colorsetting,
            'branding' => $branding,
            'posts' => Post::with('author', 'media', 'likes')
                             ->withCount('comments', 'likes')
                             ->latest()
                             ->paginate(20)
        ])->withShortcodes();
    }

     public function links(Request $request)
    {
        Shortcode::enable();
        $shortcode = App('Shortcode');
        
        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        
        return view('webhome.links', [
            'colorsetting' => $colorsetting,
            'branding' => $branding,
            'posts' => Post::with('author', 'media', 'likes')
                             ->withCount('comments', 'likes')
                             ->latest()
                             ->paginate(20)
        ])->withShortcodes();
    }

   
    public function printtags()
    {
        $arry = array();
           
        $skips = ["[","]","\""];
        //dd($this->post1);
        foreach($this->post1 as $posta){
            $pval = $posta->tags->pluck('tag');

            $ppval = str_replace($skips, ' ', $pval);
            array_push($arry, $ppval);
        }        
         
        return $arry;
    }

}
