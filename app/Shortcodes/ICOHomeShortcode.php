<?php 

namespace App\Shortcodes;
use App\Form;
use App\General;
use Illuminate\Support\Facades\DB;




class ICOHomeShortcode {

  public function icohomelist($shortcode, $content, $compiler, $name, $viewData)
  {
  	
  	$input = array();
        
        $general = new General;
        $general->setTable = $content;
         
        $icos = DB::table($content)->select('*')->get();
    //dd($icos);
    return view('shortcodes.icohome')->with('icos', $icos);
  }
  
}