<?php 

namespace App\Shortcodes;
use App\Form;


class PsubscribeShortcode {

  public function psubscribe($shortcode, $content, $compiler, $name, $viewData)
  {
  	
    $form = Form::where('formname','Home_Page')->first();
    return view('shortcodes.psubscribe')->with('form', $form);
  }
  
}