<?php 

namespace App\Shortcodes;
use App\Form;
use App\Http\Traits\SettingsTrait;

class HomepageShortcode {

use SettingsTrait;

  public function customhomep($shortcode, $content, $compiler, $name, $viewData)
  {
  	$data = $this->settingsAll();
    $form = Form::where('formname','Home_Page')->first();
    return view('shortcodes.homepage')->with(['form'=> $form, 'data' => $data]);
  }
  
}