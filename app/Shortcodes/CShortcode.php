<?php 

namespace App\Shortcodes;
use App\Form;
use App\Page;

class CShortcode {

  public function custp($shortcode, $content, $compiler, $name, $viewData)
  {
  	//dd($content);
  	$a = array();
  	$fs = array();
  	$page = Page::Where('content', 'like', '%[' . $content . ']'.$content.'[/' . $content . ']%')->first();
  //dd($page->content);
  	 //$forms = Form::all();
  	 //dd($forms);
  /*	 foreach($forms as $form){
  	 	 
  if( strpos( $page->content, $form->shortcode ) !== false) {
  		array_push($a, $form->shortcode);
  
	 
	}
	}*/
  	//dd($a);
  	  
      $forms = Form::Where('shortcode', $content)->first();
      if($forms){
        $fs1 = sprintf('<div>%s</div>', $forms->htmlcontent);
        array_push($fs, $fs1);
        

        $final = implode("", $fs);
        return $final;
      } 
      else
      {

  	   return "no content";
  	
  	 
      }
  	
  
		
		
  }
  
}