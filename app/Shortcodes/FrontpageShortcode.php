<?php 

namespace App\Shortcodes;
use App\Form;


class FrontpageShortcode {

  public function customfrontp($shortcode, $content, $compiler, $name, $viewData)
  {
  	
    $form = Form::where('formname','Front_Page')->first();
    
    return view('shortcodes.homepage')->with('form', $form);
  }
  
}