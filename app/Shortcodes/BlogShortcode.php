<?php 

namespace App\Shortcodes;
use App\Blogcategory;
use App\Post;


class BlogShortcode {

  public function bloglist($shortcode, $content, $compiler, $name, $viewData)
  {
  	//dd($content);
  	$catid = Blogcategory::where('name', $content)->first();
  	 //dd($catid);
    

   
    if($catid != null)
    {
    	$posts = Post::where('category_id', $catid->id)
                            ->get();
    	return view('shortcodes.blog')->with('posts', $posts);
    }
    else
    {
    	return "---------First create post category and menction the category name in widget inline editor---------";
    }
    
  }

   
}