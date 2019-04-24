<?php

namespace App\Http\Controllers;

use App\Post;
use App\Form;
use App\Compbrand;
use App\User;
use App\Role;
use App\Theme;
use App\Colorsetting;
use Illuminate\Http\Request;
use Imagecow\Image;
use Shortcode;
use File;
use Illuminate\Support\Facades\DB;
use App\Events\TestEvent;
use App\Http\Traits\SettingsTrait;
use Auth;
use App\Custtheme;
use App\Shop\Customers\Customer;

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
    
    $branding = Compbrand::where('id', 1)->first();
     $formshortcode = Form::where('formname', 'Home_Page')->first();
     //dd($formshortcode->htmlcontent);
    if(!$branding || $formshortcode->htmlcontent == "")
        {  
            $html =  "Welcome <br> <a href='admin/dashboard'>Login and goto dashboard to design this page</a>";

         return $html;
         
        } 
        else
        {
            return view('webhome.pyrupayindex')->with(['branding' => $branding, 'colorsetting' => $colorsetting, 'colortest' => $colortest, 'formshortcode' => $formshortcode])->withShortcodes();
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

   
    public function sendMailfromNodemailer()
    {
       

        
        $fpath = public_path('nodejswithphp');
        
        
        $output1 = shell_exec('node '.$fpath .'/mail.js 2>&1');
       
        
        return "success";
    }

    

    public function updatemailconfig(Request $request)
    {
        //dd($request->imgsliderw);
        //dd("ggg");

        //dd(htmlspecialchars_decode($request->imgsliderw));
        //dd($request->mfileconfname);
        if($request->mfileconfname != "undefined")
        {
        
            
            $mpath = base_path().'/public/mailconfs/'.$request->mfileconfname;
           //dd($vpath);
       
            //dd($vpath);
            //File::delete($mpath);
            $html = File::put($mpath,$request->dataf);
        
        $conread = File::get($mpath);

        
        return $conread;
        
        } 
        else
        {
            return "false";
        }
     
    
    }
    
    public function uploadimgfromfe(Request $request)
    {
        //dd($request->file('filed')->getClientOriginalName());
       if($request->hasFile('filed')){

           $input = $request->file('filed');
            //dd("hi");
           //dd($input);
            $extension3 = $request->file('filed')->getClientOriginalExtension(); // getting image extension

            $fine3 = $request->file('filed')->getClientOriginalName();

       

            $dir3 = public_path(). '/frontendimgs/';

             $newFileName = substr($request->file('filed')->getClientOriginalName(), 0 , (strrpos($request->file('filed')->getClientOriginalName(), ".")));
             
            $filename3 =  $newFileName."_".$request->input('imgid').".".$extension3;
                   
             $mime3 = $request->file('filed')->getMimeType();
            
            $path3 = $request->file('filed')->move($dir3, $filename3);
            
            $url = url('/frontendimgs')."/".$filename3;

            return $url;
        }
        
        

      
    }

    public function subscribersignup(Request $request)
    {
        $data = $this->settingsAll();
        $colorsetting = Colorsetting::all();
        $brand = Compbrand::where('id',1)->first();
        //dd($colorsetting);
        if($colorsetting->count() > 0)
        {  
            
         
         
        } 
        else
        {
            $colorsetting = 'empty';
            $brand = '';
        }

        
         return view('signup.subscribersignup', [
            'brand' => $brand,
            'colorsetting' => $colorsetting,
            'data' => $data,
        ]);
       
    }

    public function store_registration(Request $request)
    {
         $this->validate($request, [

            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);

        $user = User::create($request->all());

        //dd($user);
        $subrole = Role::where('name', 'cms_subscriber')->first();

        $user->roles()->attach($subrole, ['user_type'=>'App/User']);

    
        Auth::login($user);
        return redirect()->to('/cadmin/dashboard');
    }

    public function previewcarttheme(Request $request)
    {
        
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $theme = Theme::where('tname', $request->name)->first();

       
        return view('cadmin.formbuilder.themecartpreview')->with(['theme'=> $theme])->withShortcodes();
    }

    public function preview1cart(Request $request)
    {
        
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $theme = Theme::where('tname', $request->name)->first();
        return view('cadmin.formbuilder.preview1cart')->with(['theme'=> $theme])->withShortcodes();
    }

    public function createprofile(Request $request)
    {
        //dd("hi");
        $customer = Customer::where('email', Auth::guard('checkout')->user()->email)->first();

        $user = User::create([
            'name' => $customer->name,
            'email' => $customer->email,
            'password' => bcrypt($customer->password),
        ]);

        $role = Role::where('name', 'cust_demo')->first();
        $user->roles()->attach($role, ['user_type'=>'App/User']);

        $mytheme = Theme::where('tname', 'Personal Theme - T2')->first();

        $ctheme = new Custtheme;
        $ctheme->tname = $mytheme->tname;
        $ctheme->tcontent = $mytheme->tcontent;

        $ctheme->tstatus = "inactive";
        $ctheme->custid = $user->id;

        $ctheme->save();
        
        $customer->users()->attach($user->id);
        
       return redirect()->back()->with('message', 'Demo Account Created Successfully');;
      }

    /*public function showprofile()
    {
         if(Auth::guard('checkout')->user())
         {
           $thisuser = User::with('roles')->where('email', Auth::guard('checkout')->user()->email)->first();
         } 
         else 
         {
             $thisuser = User::with('roles')->where('email', Auth::user()->email)->first();
         }

       
            
            $data = $this->settingsAll();

        

        return view('front.customers.profileform')->with(['data' =>$data, 'thisuser' => $thisuser]);
    }*/

   
}
