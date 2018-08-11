<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;
use App\Category;
use App\Form;
use Illuminate\Http\Request;
use Shortcode;


class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function thispage(Request $request, Page $page)
    {	
       //
         
       Shortcode::enable();
        $shortcode = App('Shortcode');
    
		      
     
            
            
          return view('pages.customtemplate1', [
            'page' => $page,
            
           
            

        ])->withShortcodes();
        

    }

     public function artpage(Request $request, Page $page)
    {   
               
          return view('pages.customtemplate3', [
            'page' => $page
            

        ]);
        

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

    


}
