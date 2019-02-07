<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Brand;
use Session;
use File;

class StaticController extends Controller
{
    use BrandsTrait;
    
    public function downloadStarterStatic()
    {
    	$company = Brand::where('id', 1)->first();
        //dd($colorsetting[0]->color);
        //dd($this->commomindex());
        $data = $this->brandsAll();

        $fileurl = public_path('jsonfiles/testurl.txt'); // path to your JSON file
		$filedata = file_get_contents($fileurl); // put the contents of the file into a variable
		//dd($filedata);
        $fpath = public_path('nodejswithphp');
        $zpath = public_path('downloadedstatic');
		
		$output1 = shell_exec('node '.$fpath .'/multiple_test2.js 2>&1');
		//print_r($output1);
		exec('tar -zcvf '. $zpath.'/node_website.tgz '.$zpath.'/node_website');
		

		$url = url("/downloadedstatic/node_website.tgz");
        return view('admin.static.starterform')->with(['company' => $company, 'data' => $data,'filedata' => $filedata, 'url' => $url]);
    }

    public function StarterStaticForm()
    {
        $company = Brand::where('id', 1)->first();
        //dd($colorsetting[0]->color);
        //dd($this->commomindex());
        $data = $this->brandsAll();

        $fileurl = public_path('jsonfiles/testurl.txt'); // path to your JSON file
		$filedata = file_get_contents($fileurl); // put the contents of the file into a variable
		//dd($filedata);
		$url = "";
        return view('admin.static.starterform')->with(['company' => $company, 'data' => $data, 'filedata' => $filedata, 'url' => $url]);
        

    }

    public function SaveStarterStatic(Request $request)
    {
    	
$filedata = <<<EOF
[
"$request->hpu",
{
"url": "$request->url1",
"filename": "$request->nm1"
},
{
"url": "$request->url2",
"filename": "$request->nm2"
},
{
"url": "$request->url3",
"filename": "$request->nm3"
},
{
"url": "$request->url4",
"filename": "$request->nm4"
},
{
"url": "$request->url5",
"filename": "$request->nm5"
}
]
EOF;


	if($request->filej)
	{
		$zipf = public_path('/downloadedstatic').'/node_*';
		//dd($zipf);
		$outp = shell_exec('sudo rm -rf '.$zipf);
	}
    	$vpath = public_path('jsonfiles/testurl.txt'); // path to your JSON file
    	$html = File::put($vpath, htmlspecialchars_decode($filedata));
        Session::flash('success', 'You succesfully Saved the URLs.');
         return redirect()->back();
    }

    
    
}
