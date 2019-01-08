<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Brand;


class BrandingController extends Controller
{
    use BrandsTrait;
    
    public function branding()
    {
        $company = Brand::where('id', 1)->first();
        //dd($colorsetting[0]->color);
        //dd($this->commomindex());
        $data = $this->brandsAll();
        return view('admin.branding.brand')->with(['company' => $company, 'data' => $data]);
        

    }

    public function storebranding(Request $request)
    {
        $branding = Brand::where('id', 1)->first();
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
        else
            {
                 if($branding == "")
                {
                    $path = '-';
                }
                else
                {
                    $path = $branding->clogo;
                }
            }

         if($request->hasFile('filed2')){

           //$input = $request->file('filed');
            //dd("hi");
           //dd($input);
            $extension2 = $request->file('filed2')->getClientOriginalExtension(); // getting image extension

            $fine2 = $request->file('filed2')->getClientOriginalName();

        //dd($fine);
            $newFileName2 = $fine2;

            $dir2 = public_path(). '/uploads/cmp/';
            $filename2 =  $fine2;
                   
             $mime2 = $request->file('filed2')->getMimeType();
            
            $path2 = $request->file('filed2')->move($dir2, $filename2);
            $path2 = '/uploads/cmp/'.$filename2;
        }
        else
            {
                if($branding == "")
                {
                    $path2 = '-';
                }
                else
                {
                    $path2 = $branding->favicon;
                }
            }

        if($request->hasFile('filed3')){

           //$input = $request->file('filed');
            //dd("hi");
           //dd($input);
            $extension3 = $request->file('filed3')->getClientOriginalExtension(); // getting image extension

            $fine3 = $request->file('filed3')->getClientOriginalName();

        //dd($fine);
            $newFileName3 = $fine2;

            $dir3 = public_path(). '/uploads/cmp/';
            $filename3 =  $fine3;
                   
             $mime3 = $request->file('filed3')->getMimeType();
            
            $path3 = $request->file('filed3')->move($dir3, $filename3);
            $path3 = '/uploads/cmp/'.$filename3;
        }
        else
            {
                if($branding == "")
                {
                    $path3 = '-';
                }
                else
                {
                    $path3 = $branding->defaultprofileimg;
                }
            }


        
           
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
                $branding->favicon = $path2;
                $branding->timezone = $request->timezone;
                $branding->defaultprofileimg = $path3;
               
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
                $branding->favicon = $path2;
                $branding->timezone = $request->timezone;
                $branding->defaultprofileimg = $path3;
                
                $branding->save();
            }
        

    }


}
