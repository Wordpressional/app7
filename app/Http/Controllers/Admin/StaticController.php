<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Compbrand;
use Illuminate\Support\Facades\Auth;
use App\Mailconf;
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

    public function rmdir_recursive($dir){
        if(is_dir($dir)){
        $files = scandir($dir);
        if($files){
        foreach ($files as $file) {
        if ($file == '.' OR $file == '..') continue;
        $file = "$dir/$file";
        if (is_dir($file)) {
        $this->rmdir_recursive($file);
        
        //rmdir($file);
        
        } else {
        unlink($file);
        }
        }
        rmdir($dir);
        }
      }
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


	    $dirname = public_path('/downloadedstatic/node_website');
		$zipf = public_path('/downloadedstatic/node_*');
		//dd($zipf);
		//exec('sudo rm -rf '.$zipf);
        if($dirname){
        File::delete(public_path('/downloadedstatic/node_website.tgz'));
        $this->rmdir_recursive($dirname);
	    }
    	$vpath = public_path('jsonfiles/testurl.txt'); // path to your JSON file
    	$html = File::put($vpath, htmlspecialchars_decode($filedata));
        Session::flash('success', 'You succesfully Saved the URLs.');
         return redirect()->route('admin.static.starterform');
    }


    public function indexmailconfig()
    {

         $data = $this->brandsAll();
         $thisuser = User::where('email', Auth::user()->email)->first();
         //dd($thisuser);
         if($thisuser->isSuperadministrator() == "yes" || $thisuser->isCMSAdmin()) {
           $nmailconf = Mailconf::withTrashed()->latest()->paginate(10);
           
         } 
         else 
         {
            if($thisuser)
            {
                
                $nmailconf = Mailconf::where('createdby', $thisuser->id)->withTrashed()->latest()->paginate(10);
            } 

            
         }
         
        return view('admin.mailconfigs.index')->with(['mailconfs' => $nmailconf,'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createmailconfig()
    {
        $data = $this->brandsAll();
        return view('admin.mailconfigs.create',compact('data'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storemailconfig(Request $request)
    {
        $this->validate($request,[

                'mailfname' => 'required|unique:mailconfs',
                'authu' => 'required',
                'authp' => 'required',
                'frome' => 'required',
                'toe' => 'required',
                'texte' => 'required',
                'sube' => 'required',
                'wele' => 'required',


        ]);

        $thisuser = User::where('email', Auth::user()->email)->first();

        $mailconf = new Mailconf();
        $mailconf->mailfname = $request->mailfname;
        $mailconf->authu = $request->authu;
        $mailconf->authp = $request->authp;
        $mailconf->frome = $request->frome;
        $mailconf->toe = $request->toe;
        $mailconf->texte = $request->texte;
        $mailconf->sube = $request->sube;
        $mailconf->wele = $request->wele;
        $mailconf->createdby = $thisuser->id;

        $mailconf->save();

        $filedata = <<<EOF
authu='$request->authu'&authp='$request->authp'&frome='$request->frome'&toe='$request->toe'&texte='$request->texte'&sube='$request->sube'&wele='$request->wele'
EOF;


    
        $fname = public_path('/mailconfs/').$request->mailfname;
        //dd($zipf);
        $outp = shell_exec('sudo cat /dev/null > '.$fname);
    
        $vpath = $fname; // path to your JSON file
        $con = File::put($vpath, $filedata);
        
        $outp = shell_exec('sudo chmod 777 '.$vpath);

        Session::flash('success', 'You succesfully created a mail config file.');
        return redirect()->route('admin.mailconfig.indexmailconfig');


    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editmailconfig($id)
    {
        $data = $this->brandsAll();
        $mailconf = Mailconf::find($id);
       
    
        return view('admin.mailconfigs.edit')->with(['mailconf' => $mailconf, 'data' => $data]);
    }

    public function viewmailconfig($id)
    {
        $data = $this->brandsAll();
        $mailconf = Mailconf::find($id);
        $fname = public_path('/mailconfs/').$mailconf->mailfname;
        $content = File::get($fname);
        return view('admin.mailconfigs.viewm')->with(['mailconf' => $mailconf, 'data' => $data, 'content' => $content]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatemailconfig(Request $request, $id)
    {
        

        $this->validate($request,[

                'mailfname' => 'required',
                'authu' => 'required',
                'authp' => 'required',
                'frome' => 'required',
                'toe' => 'required',
                'texte' => 'required',
                'sube' => 'required',
                'wele' => 'required',


        ]);

       $mailconf = Mailconf::find($id);
        $mailconf->mailfname = $request->mailfname;
        $mailconf->authu = $request->authu;
        $mailconf->authp = $request->authp;
        $mailconf->frome = $request->frome;
        $mailconf->toe = $request->toe;
        $mailconf->texte = $request->texte;
        $mailconf->sube = $request->sube;
        $mailconf->wele = $request->wele;

        $mailconf->save();

        $filedata = <<<EOF
authu='$request->authu'&authp='$request->authp'&frome='$request->frome'&toe='$request->toe'&texte='$request->texte'&sube='$request->sube'&wele='$request->wele'
EOF;


    
        $fname = public_path('/mailconfs/').$request->mailfname;
        //dd($zipf);
        $outp = shell_exec('sudo cat /dev/null > '.$fname);
    
        $vpath = $fname; // path to your JSON file
        $con = File::put($vpath, $filedata);
        


        Session::flash('success', 'You succesfully updated a mail config file.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroymailconfig($id)
    {
        $mailconf = Mailconf::withTrashed()->where('id',$id)->first();
        if($mailconf->trashed()){
            $mailconf->forceDelete();
            
          } else {
            $mailconf->delete();
            
            
          }

        $fname = public_path('/mailconfs/').$mailconf->mailfname;  
        $outp = shell_exec('sudo rm -rf '.$fname);

      Session::flash('success', 'You succesfully deleted a Mail Configuration File.');
        return redirect()->back();
    }

    public function restoremailconfig($id)
    {
        $mailconf = Mailconf::withTrashed()->where('id',$id)->first();
        if($mailconf->trashed()){
            $mailconf->restore();
        }
        Session::flash('success', 'You succesfully restored a Mail Configuration File.');
         return redirect()->back();
    }
}
