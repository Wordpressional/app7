<?php 

namespace App\Shortcodes;
use App\Form;


class HomepageShortcode {

  public function customhomep($shortcode, $content, $compiler, $name, $viewData)
  {
  	
    $form = Form::where('formname','Home_Page')->first();
    return view('shortcodes.homepage')->with('form', $form);
  }
  
}