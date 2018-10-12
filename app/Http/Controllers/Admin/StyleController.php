<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Colorsetting;


class StyleController extends Controller
{
    

    public function style()
    {
		$colorsetting = Colorsetting::all();
		//dd($colorsetting[0]->color);
		
        return view('styles.style')->with('colorsetting', $colorsetting);
    	

    }

    public function storecolors(Request $request)
    {

        $input = $request->all();
        //dd("hi");
        //dd($input);
        foreach($input as $key => $value)
        {
        
	        $colorsetting = Colorsetting::where('propname', $key)->first();
	        if($colorsetting != "")
	        {
	        	$colorsetting = Colorsetting::find($colorsetting->id);
       			$colorsetting->color = $value;
        		$colorsetting->save();
	        } 
	        else
	        {
	        	$colorsetting = new Colorsetting();
			    $colorsetting->propname = $key;
			    $colorsetting->color = $value;
			    $colorsetting->save();
	        }
        }

    }


}
