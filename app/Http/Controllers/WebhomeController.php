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
use Illuminate\Support\Facades\DB;

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

    public function welcome1()
    {
        //path to sql file
        $sql = public_path('dumpmodule.sql');
        //dd($sql);
        //collect contents and pass to DB::unprepared
        DB::unprepared(file_get_contents($sql));

         return view('webhome.welcome1');

    }

     public function index()
    {
        
         return view('webhome.pyrupayindex');

    }

     public function home1()
    {
        
         return view('webhome.home1');

    }


     public function frontpage()
    {
        Shortcode::enable();
        $shortcode = App('Shortcode');
    $colorsetting = Colorsetting::all();
    $branding = Brand::where('id', 1)->first();

    if(!$branding)
        {  
            $html =  "Welcome <br> <a href='mylogin'>Login to design this page</a>";

         return $html;
         
        } 
        else
        {
            return view('webhome.pyrupayindex')->with(['branding' => $branding, 'colorsetting' => $colorsetting])->withShortcodes();
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
