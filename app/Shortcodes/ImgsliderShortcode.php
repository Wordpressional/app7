<?php 

namespace App\Shortcodes;

class ImgsliderShortcode {

  public function custom1($shortcode, $content, $compiler, $name, $viewData)
  {
    return view('shortcodes/imgslider');
  }
  
}