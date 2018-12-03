<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use Illuminate\Http\Request;
use App\Colorsetting;


class StyleController extends Controller
{
    use BrandsTrait;

    public function style()
    {
		$colorsetting = Colorsetting::all();
		//dd($colorsetting[0]->color);
		$data = $this->brandsAll();
        return view('styles.style')->with(['colorsetting' => $colorsetting, 'data' => $data]);
    	

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
