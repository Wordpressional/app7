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
use App\Events\TestEvent;
use App\Http\Traits\SettingsTrait;

class WebhomeController extends Controller
{
    use SettingsTrait;
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
        $data = $this->settingsAll();
         return view('webhome.pyrupayindex',compact('data'));

    }

     public function home1()
    {
        
         return view('webhome.home1');

    }

     public function test()
    {
        
         return view('test');

    }


    public function broadcasttest()
    {
        event(new TestEvent('The server time is now ' . date('H:i:s')));
        return ('The server time is now ' . date('H:i:s')); 
    }


     public function frontpage()
    {
        
        Shortcode::enable();
        $shortcode = App('Shortcode');
    $colorsetting = Colorsetting::all();
    $colortest = Colorsetting::find(1);
    dd($colortest);
    $branding = Brand::where('id', 1)->first();

    if(!$branding)
        {  
            $html =  "Welcome <br> <a href='admin/dashboard'>GO to dashboard to design this page</a>";

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
