<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;


class BrandingController extends Controller
{
    

    public function branding()
    {
        $company = Brand::where('id', 1)->first();
        //dd($colorsetting[0]->color);
        
        return view('admin.branding.brand')->with('company', $company);
        

    }

    public function storebranding(Request $request)
    {

        $input = $request->all();
        //dd("hi");
        //dd($input);

        if($request->hasFile('filed')){

           //$input = $request->file('filed');
            //dd("hi");
           //dd($input);
            $extension = $request->file('filed')->getClientOriginalExtension(); // getting image extension

            $fine = $request->file('filed')->getClientOriginalName();

        //dd($fine);
            $newFileName = substr($request->input('filenameorig'), 0 , (strrpos($request->input('filenameorig'), ".")));

            $dir = public_path(). '/uploads/cmp/';
            $filename =  $newFileName . '_' .  time() . '.' . $extension;
            
             

                     
             $mime = $request->file('filed')->getMimeType();
            
            $path = $request->file('filed')->move($dir, $filename);
            $path = '/uploads/cmp/'.$filename;
        }

        
            $branding = Brand::where('id', 1)->first();
            if($branding != "")
            {
                $branding = Brand::find($branding->id);
                $branding->cname = $request->cname;
                $branding->caddr = $request->caddr;
                $branding->cphno = $request->cphno;
                $branding->cemail = $request->cemail;
                $branding->clogo = $path;
                $branding->pagebanner = $request->pagebanner;
                $branding->postbanner = $request->postbanner;
                $branding->footer = $request->footer;
                $branding->homepage = "[homepage]-[/homepage]";
                $branding->save();
            } 
            else
            {
                $branding = new Brand();
                $branding->cname = $request->cname;
                $branding->caddr = $request->caddr;
                $branding->cphno = $request->cphno;
                $branding->cemail = $request->cemail;
                $branding->clogo = $path;
                $branding->pagebanner = $request->pagebanner;
                $branding->postbanner = $request->postbanner;
                $branding->footer = $request->footer;
                $branding->homepage = "[homepage]-[/homepage]";
                $branding->save();
            }
        

    }


}
