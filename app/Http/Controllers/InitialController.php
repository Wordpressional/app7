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

class InitialController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function createconfig()
    {
		      
         return view('initial.index');

    }*/

    /*public function generateconfig(Request $request)
    {
        if($request->domain_name)
        {
            $webname = $request->domain_name;
        }
        else
        {
            $webname = $request->app_name;
        }
        $check = "sudo /var/www/html/".$webname."/checkserver.sh $webname 2>&1";
        //dd($check);
        //$webname = $request->foldername;
        //$webname = 'staticweb';
        $output = shell_exec("sudo /var/www/html/".$webname."/checkserver.sh $webname 2>&1");
        echo "<pre>$output</pre>";
        echo "jo";
        return redirect()->route('createdatabase');

    }*/

    public function createdatabase()
    {
              
         return view('initial.cdb');

    }

    public function generatedatabase(Request $request)
    {
        if($request->domain_name)
        {
            $webname = $request->domain_name;
        }
        else
        {
            $webname = $request->app_name;
        }
        $check = "sudo /var/www/html/".$webname."/checkserver.sh $webname 2>&1";
        //dd($check);
        //$webname = $request->foldername;
        //$webname = 'staticweb';
        $output = shell_exec("sudo /var/www/html/".$webname."/checkserver.sh $webname 2>&1");
        echo "<pre>$output</pre>";
        echo "jo";
        return redirect()->route('install');

    }

}
