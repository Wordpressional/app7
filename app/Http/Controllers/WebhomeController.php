<?php

namespace App\Http\Controllers;

use App\Post;
use App\Form;
use Illuminate\Http\Request;
use Imagecow\Image;
use Shortcode;

class WebhomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
		        
         $image = Image::fromFile(public_path('webhome\img\project-bg.jpg'));
         
         $image->resize(1000)->format('jpg')->save(public_path('webhome\img\project-bg2.jpg')); 
         $image = url('webhome/img/project-bg2.jpg');
         return view('webhome.index1', compact('image'));

    }

    public function index123()
    {
		
         return view('webhome.index');

    }

     public function index()
    {
        
         return view('webhome.pyrupayindex');

    }


     public function frontpage()
    {
        Shortcode::enable();
        $shortcode = App('Shortcode');
    $form = Form::where('formname','Home_Page')->get();
    return view('webhome.pyrupayindex')->with('form', $form)->withShortcodes();
       

    }

    

   
}
