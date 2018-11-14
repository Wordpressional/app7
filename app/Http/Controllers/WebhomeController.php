<?php

namespace App\Http\Controllers;

use App\Post;
use App\Form;
use App\Brand;
use App\Colorsetting;
use Illuminate\Http\Request;
use Imagecow\Image;
use Shortcode;
use File;

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
   
    $branding = Brand::where('id', 1)->first();

    if($branding)
        {  
            $html =  "Welcome <br> <a href='mylogin'>Login to design this page</a>";

         return $html;
         
        } 
        else
        {
            return view('webhome.pyrupayindex')->with(['branding' => $branding ])->withShortcodes();
        }
      

    }

    public function download()
    {
        
    }

    public function test33()
    {
        $vpath = base_path().'/resources/views/shortcodes/imgslider.blade.php';
       
        //$html = view('shortcodes.imgslider')->render();

        

        $html = File::get(base_path().'/resources/views/shortcodes/imgslider.blade.php');

        return html_entity_decode($html);
    }

    

   
}
