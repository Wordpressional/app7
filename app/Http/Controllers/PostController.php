<?php

namespace App\Http\Controllers;
use App\Page;
use App\Post;
use App\Blogcategory;
use App\Tag;
use App\Colorsetting;
use App\Compbrand;
use Illuminate\Http\Request;
use Shortcode;
use Auth;
use App\Http\Traits\SettingsTrait;
use App\Role;
use App\User;

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
        $colortest = Colorsetting::find(1);
        $branding = Compbrand::where('id', 1)->first();
        
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();
        
        return view('webhome.single', [
            'data' => $data,
            'post' => $post,
            'colorsetting' => $colorsetting,
            'colortest' => $colortest,
            'branding' => $branding,
           
        ])->withShortcodes();
    }

     public function showsingletwo(Request $request, Post $post)
    {
         $data = $this->settingsAll();
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $colorsetting = Colorsetting::all();
        $colortest = Colorsetting::find(1);
        $branding = Compbrand::where('id', 1)->first();
       
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();

        return view('webhome.singletwo', [
            'data' => $data,
            'post' => $post,
            'colorsetting' => $colorsetting,
            'colortest' => $colortest,
            'branding' => $branding,
            
        ])->withShortcodes();
    }

    public function showbsingle(Request $request, Post $post)
    {
         $data = $this->settingsAll();

        Shortcode::enable();
        $shortcode = App('Shortcode');

        $colorsetting = Colorsetting::all();
        $branding = Compbrand::where('id', 1)->first();
        $colortest = Colorsetting::find(1);
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();
        
        return view('webhome.bsingle', [
            'data' => $data,
            'post' => $post,
            'colorsetting' => $colorsetting,
            'colortest' => $colortest,
            'branding' => $branding,
            
        ])->withShortcodes();
    }

    public function allcat(Request $request)
    {
         $data = $this->settingsAll();
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $colorsetting = Colorsetting::all();
        $colortest = Colorsetting::find(1);
        $branding = Compbrand::where('id', 1)->first();

        return view('webhome.allcategory', [
            'data' => $data,
            'colorsetting' => $colorsetting,
            'colortest' => $colortest,
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
        $colortest = Colorsetting::find(1);
        $branding = Compbrand::where('id', 1)->first();
        $arry = array();
        //dd($cat);
        $catid = Blogcategory::where('name', $cat)->first();
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
            'colortest' => $colortest,
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

        $role = Role::where('name','superadministrator')->first();
        $user = User::with('roles')->where('id', $role->id)->first();
        //dd($user);
        $data = $this->settingsAll();

        Shortcode::enable();
        $shortcode = App('Shortcode');

        $colorsetting = Colorsetting::all();
         $colortest = Colorsetting::find(1);
        $branding = Compbrand::where('id', 1)->first();
        $arry = array();
        //dd($cat);
        $tagid = Tag::where('tag', $tag)->first();
       
        if($tagid)
        {
        if($tagid->id != "")
        {
            $post = Post::where('author_id', "!=", $user->id)->whereHas('tags', function($q) use ($tagid)
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
            'colortest' => $colortest,
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

        Shortcode::enable();
        $shortcode = App('Shortcode');

         $data = $this->settingsAll();
         $branding = Compbrand::where('id', 1)->first();
        $arry = array();
        //dd($cat);
        $tagid = Tag::where('tag', $tag)->first();
         $page = Page::where('display_name', $tag)->first();
         $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         if($thisuser->isDemo() == "yes") {
            $api_token = Auth::guard('demo')->user()->api_token;
         } else {
        $api_token = Auth::user()->api_token;
        }
         //dd($api_token);
        $colorsetting = Colorsetting::all();
         $colortest = Colorsetting::find(1);
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
              'branding' => $branding,
              'api_token' => $api_token,
              'colorsetting' => $colorsetting,
              'colortest' => $colortest,
           
        ])->withShortcodes();
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
         $colortest = Colorsetting::find(1);
        $branding = Compbrand::where('id', 1)->first();
        $catid = Blogcategory::where('name', $cat)->first();

        if($catid)
        {
        //dd($catid);
        if($catid->id != "")
        {
        return view('webhome.articles', [
            'data' => $data,
            'colorsetting' => $colorsetting,
            'colortest' => $colortest,
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
        $catid = Blogcategory::where('name', $cat)->first();
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
         $colortest = Colorsetting::find(1);
        $branding = Compbrand::where('id', 1)->first();
        return view('webhome.articles', [
            'data' => $data,
            'colorsetting' => $colorsetting,
            'colortest' => $colortest,
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
         $colortest = Colorsetting::find(1);
        $branding = Compbrand::where('id', 1)->first();
        
        return view('webhome.links', [
            'data' => $data,
            'colorsetting' => $colorsetting,
            'colortest' => $colortest,
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
