<?php 

namespace App\Shortcodes;

class TopmenuShortcode {

  public function topm($shortcode, $content, $compiler, $name, $viewData)
  {
    return view('shortcodes/topmenu');
  }
  
}