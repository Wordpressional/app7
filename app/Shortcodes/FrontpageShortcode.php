<?php 

namespace App\Shortcodes;
use App\Form;
use App\Http\Traits\SettingsTrait;

class FrontpageShortcode {
use SettingsTrait;
 
public function customfrontp($shortcode, $content, $compiler, $name, $viewData)
  {
  	$data = $this->settingsAll();
    $form = Form::where('formname','Front_Page')->first();
    
    return view('shortcodes.homepage')->with(['form'=> $form, 'data' => $data]);
  }
  
}