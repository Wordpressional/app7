<?php 

namespace App\Shortcodes;
use App\Form;


class CustompageShortcode {

  public function custompages($shortcode, $content, $compiler, $name, $viewData)
  {
  	
  	$carr = explode(", ",$content);
    $forms = Form::whereIn('shortcode', $carr)->get();
     //dd($forms);
    return view('shortcodes.custompages')->with('forms', $forms);
    //return $forms;
  }
  
}