<?php

namespace App\Http\Controllers;


use App\Page;
use App\Post;
use App\Category;
use App\Colorsetting;
use App\Form;
use App\Cform;
use Illuminate\Http\Request;
use App\General;
use App\Brand;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Traits\SettingsTrait;

use Harimayco\Menu\Facades\Menu;

use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use Shortcode;

class PageController extends Controller
{
    use SettingsTrait;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function thispage(Request $request, Page $page)
    {	
       //
         $data = $this->settingsAll();
       Shortcode::enable();
        $shortcode = App('Shortcode');

        Shortcode::compile($page);
            //dd($shortcode);
            //$content  = explode(']', $page->content);
             //$content  = $content[0];

		      //$content = substr($content, strpos($content, "[") +1); 
    
   //    $cforms = Cform::Where('cshortcode',$content)->first();   
     
        //$menuList = Menu::get(1);    
        //dd($menuList);
        $colorsetting = Colorsetting::all();
        $colortest = Colorsetting::find(1);
        $branding = Brand::where('id', 1)->first();

        // if($page->headercode == "nil")
        // {
        //     return redirect()->route('page.landingsitepage', $page);
        // }
        
        return view('pages.customtemplate1', [
            'page' => $page,
            'colorsetting' => $colorsetting,
            'colortest' => $colortest,
            'branding' => $branding,
           'data' => $data,
           //'menuList' => $menuList

        ])->withShortcodes();
       
        

    }

    public function staticpage(Request $request, Page $page)
    {   
       //
         $data = $this->settingsAll();
       Shortcode::enable();
        $shortcode = App('Shortcode');
            
            //$content  = explode(']', $page->content);
             //$content  = $content[0];

              //$content = substr($content, strpos($content, "[") +1); 
    
   //    $cforms = Cform::Where('cshortcode',$content)->first();   
     
        //$menuList = Menu::get(1);    
        //dd($menuList);
        $colorsetting = Colorsetting::all();
        $colortest = Colorsetting::find(1);
        $branding = Brand::where('id', 1)->first();
       
        // if($page->headercode == "nil")
        // {
        //     return redirect()->route('page.landingsitepage', $page);
        // }
          return view('pages.customtemplate4', [
            'page' => $page,
            'colorsetting' => $colorsetting,
            'colortest' => $colortest,
            'branding' => $branding,
           'data' => $data,
           //'menuList' => $menuList

        ])->withShortcodes();
        

    }

    public function landingsitepage(Request $request, Page $page)
    {   
       //
         $data = $this->settingsAll();
       Shortcode::enable();
        $shortcode = App('Shortcode');
            
            //$content  = explode(']', $page->content);
             //$content  = $content[0];

              //$content = substr($content, strpos($content, "[") +1); 
    
   //    $cforms = Cform::Where('cshortcode',$content)->first();   
     
        //$menuList = Menu::get(1);    
        //dd($menuList);
        $colorsetting = Colorsetting::all();
        $colortest = Colorsetting::find(1);
        $branding = Brand::where('id', 1)->first();

          return view('pages.customtemplate5', [
            'page' => $page,
            'colorsetting' => $colorsetting,
            'colortest' => $colortest,
            'branding' => $branding,
           'data' => $data,
           //'menuList' => $menuList

        ])->withShortcodes();
        

    }

     public function artpage(Request $request, Page $page)
    {   
         $data = $this->settingsAll();
        Shortcode::enable();
        $shortcode = App('Shortcode');
    
              
               
          return view('pages.customtemplate3', [
            'page' => $page,
            'data' => $data
            

        ])->withShortcodes();
        

    }


   public function replacement($string, array $placeholders, $t)
    {
        $my_array = "";
        $pagec = "conference series";
        $pagedetail = page::where('display_name', 'Conference Series')->first();
       // dd($placeholders);
    $resultString = $string;
    foreach($placeholders as $key => $value) {
   //dd($resultString);
        if($key == '/\[events\]/')
        {
            $cat = 'events';
        }
        elseif ($key == '/\[conferences\]/') 
        {
             $cat = 'conferences';
        }
        else
        {
             $cat = 'projects';
        }
      
            //dd($t);
            if($t != "nopost")
            {
                $my_array  = preg_replace($key,view('pages.p1')->with(['posts' => $value, 'category' => $cat, 'pagec' => $pagec, 'pagedetail' => $pagedetail]),$resultString);
        

                $resultString = $my_array;
            }
        
    }
    //dd($my_array);
    return  $my_array;
    }

    public function eventsfunction()
    {
        $resultString = "nopost";
        $category = Category::where('name', 'Events')->first();
        if($category != "")
        {
         $posts = post::where('category_id', $category->id)->get();
        
        $resultString = array();
        foreach($posts as $k => $v) {
        array_push($resultString, $v);

        }
        }

       return $resultString;
    }

     public function conferencesfunction()
    {
        $resultString = "nopost";
        $category = Category::where('name', 'Conferences')->first();
        if($category != "")
        {
         $posts = post::where('category_id', $category->id)->get();
        
        $resultString = array();
        foreach($posts as $k => $v) {
        array_push($resultString, $v);

        }
        }

       return $resultString;
    }
    public function projectsfunction()
    {
         $resultString = "nopost";
         $category = Category::where('name', 'Projects')->first();
        if($category != "")
        {
        $posts = post::where('category_id', $category->id)->get();
        
        $resultString = array();
        foreach($posts as $k => $v) {
        array_push($resultString, $v);

        }
        }

       return $resultString;
    }

    public function datacfsave(Request $request)
    {

        
        $input = array();
        $output = array();
        $general = new General;
        $general->setTable = $request->table_name;
         $input = $request->all();
        
        
         //dd($input);
         $x = json_decode($input['data']);
         
         //dd($x->table_name);
         $in = $input;
         $output = array_except($in, ['_token', 'table_name', 'files']);
         $output = json_decode($output['data']);
         //dd($output);
          //$out = array_except($ou, ['_token', 'table_name']);
          //dd($out);

         foreach($output as $key => $value)
         {
            $key = str_replace("[]","",$key);
            
            $id = DB::table($x->table_name)->insertGetId([$key => $value]);
            break;

         }

          $stables = Schema::getColumnListing($x->table_name);
          //$m_array = preg_grep('/^files\s.*/', $stables);
          $farr = array();
          $y = $this->array_search_partial($stables, 'file');
          

         foreach($y as $value)
         {
            array_push($farr, $stables[$value]); 
            //$stables[$value];
         }

         //dd($output->fileData);
        /////////////////////////////// dd($farr);
         if($output->files)
         {
         $f = array();
         $f = explode(",",$output->files);
          
         //dd($f);
         //$f1 = $farr[1];
         // $files = $request->file["'".$f1."'"];
          //$path = $request->file('file-1538139171041');
          //dd($request->formData);
         //dd($request->file('file1538139171041'));

        // if($request->hasFile('file1538139171041')) {
        //   $file = $request->file('file1538139171041');
      
        //dd($request->file('file1538139171041')->getClientOriginalName());

         //$x123 = json_decode($input['formData']);
        // $t = explode(",",$input['formData']);
         //dd($input['formData'][1]);

        if($id)
        {

         foreach($farr as $key => $value)
            {
            
                //dd($value);
                //dd($farr[$key]);
                DB::table($x->table_name)->where('id', $id)->update([$value=> $f[$key]]);
                

            }
         }
         }
          //dd($idf);
         //}
           
          //dd($stables[$y]);
            if($id)
            {
                foreach($output as $key => $value)
                {
                    $key = str_replace("[]","",$key);
                    $key = str_replace("_token","",$key);
                    $key = str_replace("table_name","",$key);
                    $key = str_replace("files","",$key);

                    if($key != "")
                    {
                    DB::table($x->table_name)->where('id', $id)->update([$key => $value]);
                    }


                }
            }
            $check = DB::table($x->table_name)->where('id', $id)->select('*')->get();
            if($check[0]->created_at)
            {
              DB::table($x->table_name)->where('id', $id)->update([
                'updated_at' => Carbon::now()->toDateTimeString()]); 
            }
            else
            {
              DB::table($x->table_name)->where('id', $id)->update(['created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()]); 
            }
        
         
        //return $check;
          
            return $check;
        
        
      
    }

     public function array_search_partial($arr, $keyword) {
        $iarr = array();
    foreach($arr as $index => $string) {
    if (strpos($string, $keyword) !== FALSE)
        array_push($iarr, $index); 
        
    }
    return $iarr;
    }


    public function datacfsavemedia(Request $request)
    {

        $input = $request->all();
        $file = $input['fname'];
        //dd($file);

          if($request->hasFile('filed')){

           //$input = $request->file('filed');
            //dd("hi");
           //dd($input);
            $extension = $request->file('filed')->getClientOriginalExtension(); // getting image extension

            $fine = $request->file('filed')->getClientOriginalName();

        //dd($fine);
            $newFileName = substr($request->input('filenameorig'), 0 , (strrpos($request->input('filenameorig'), ".")));

            $dir = public_path(). '/uploads/';
            $filename =  $newFileName . '_' .  time() . '.' . $extension;
            
             

             DB::table($request->input('table_name'))->where($request->input('fname'), $request->input('filenameorig'))->update([$request->input('fname') => $filename]);

        
             $mime = $request->file('filed')->getMimeType();
            
            $path = $request->file('filed')->move($dir, $filename);
            $path = '/uploads/'.$filename;
        }

        $time = time();
        return  $time;
      
     }

}
