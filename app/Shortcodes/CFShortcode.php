<?php 

namespace App\Shortcodes;
use App\Cform;

use App\Page;
use App\Http\Traits\SettingsTrait;
class CFShortcode {
use SettingsTrait;
  public function cfcustp($shortcode, $content, $compiler, $name, $viewData)
  {
    $data = $this->settingsAll();
  	//dd($content);
  	//$a = array();
  	$fs = array();
  	$page = Page::Where('content', 'like', '%[' . $content . ']'.$content.'[/' . $content . ']%')->first();
  //dd($page->content);
  	// $cforms = Cform::all();
  	 //dd($forms);
  /*	 foreach($forms as $form){
  	 	 
  if( strpos( $page->content, $form->shortcode ) !== false) {
  		array_push($a, $form->shortcode);
  
	 
	}
	}*/
  	//dd($a);
  	
  	   $cforms = Cform::Where('cshortcode', $content)->first();
  	
  	  // array_push($fs, $forms);
  	
  	
  	//dd($fs);

    //return view('shortcodes.custp')->with(['forms' => $forms, 'a' => $a]);
    //return $forms->htmlcontent;
  	  // return sprintf('<div>%s</div>', $cforms->htmlelements);

  	   
		//$fs1 = sprintf(' <div>%s</div>', "hi");
		//array_push($fs, $fs1);
		

		//$final = implode("", $fs);
	
    return view('shortcodes.cfcustp')->with(['cforms' => $cforms, 'data' => $data]);
    //return $content;
       
  }
  
}