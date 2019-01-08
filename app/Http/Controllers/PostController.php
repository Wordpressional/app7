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
use App\Http\Traits\SettingsTrait;

class PostController extends Controller
{
    use SettingsTrait;
    private $post1;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->settingsAll();
        return view('posts.index', [
            'data' => $data,
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
         $data = $this->settingsAll();
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();

        return view('posts.show', [
            'data' => $data,
            'post' => $post
        ]);
    }

    public function showsingle(Request $request, Post $post)
    {
        $data = $this->settingsAll();
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        $api_token = Auth::user()->api_token;
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();

        return view('webhome.single', [
            'data' => $data,
            'post' => $post,
            'colorsetting' => $colorsetting,
            'branding' => $branding,
            'api_token' => $api_token
        ])->withShortcodes();
    }

     public function showsingletwo(Request $request, Post $post)
    {
         $data = $this->settingsAll();
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        $api_token = Auth::user()->api_token;
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();

        return view('webhome.singletwo', [
            'data' => $data,
            'post' => $post,
            'colorsetting' => $colorsetting,
            'branding' => $branding,
             'api_token' => $api_token
        ])->withShortcodes();
    }

    public function showbsingle(Request $request, Post $post)
    {
         $data = $this->settingsAll();

        Shortcode::enable();
        $shortcode = App('Shortcode');

        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        $api_token = Auth::user()->api_token;
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();

        return view('webhome.bsingle', [
            'data' => $data,
            'post' => $post,
            'colorsetting' => $colorsetting,
            'branding' => $branding,
             'api_token' => $api_token
        ])->withShortcodes();
    }

    public function allcat(Request $request)
    {
         $data = $this->settingsAll();
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();

        return view('webhome.allcategory', [
            'data' => $data,
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
         $data = $this->settingsAll();
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
            'data' => $data,
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
        $data = $this->settingsAll();

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
            'data' => $data,
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
         $data = $this->settingsAll();
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
            'data' => $data,
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
         $data = $this->settingsAll();
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
            'data' => $data,
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
         $data = $this->settingsAll();
        //dd($cat);
        $catid = Category::where('name', $cat)->first();
        //dd($catid);
        if($catid)
        {
        if($catid->id != "")
        {
        return view('webhome.links', [
            'data' => $data,
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
         $data = $this->settingsAll();
       Shortcode::enable();
        $shortcode = App('Shortcode');

        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        return view('webhome.articles', [
            'data' => $data,
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
         $data = $this->settingsAll();
        Shortcode::enable();
        $shortcode = App('Shortcode');
        
        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        
        return view('webhome.links', [
            'data' => $data,
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
