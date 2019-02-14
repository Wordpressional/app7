<?php 

namespace App\Shortcodes;
use App\Category;
use App\Post;


class BlogShortcode {

  public function bloglist($shortcode, $content, $compiler, $name, $viewData)
  {
  	//dd($content);
  	$catid = Category::where('name', $content)->first();
    $posts = Post::where('category_id', $catid->id)
                            ->get();

    //dd($posts);
    return view('shortcodes.blog')->with('posts', $posts);
  }

   
}