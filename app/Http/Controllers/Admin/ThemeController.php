<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Tag;
use App\Page;
use App\Cform;
use App\Form;
use App\Theme;
use App\Brand;
use App\General;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Shortcode;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ThemeController extends Controller
{

    public function index()
    {   
       
        $cforms = Cform::withTrashed()->latest()->paginate(50);
        return view('admin.cforms.index',compact('cforms'));
    }


    public function themes()
    {   
       $themes = Theme::all();
       if(!empty($themes[0]))
       {
        
       }
       else
       {
        $themes = "empty";
       }

       //dd($themes);
        $themeone = view('admin.themes.themeone')->render();
        $themetwo = view('admin.themes.themetwo')->render();
        $themethree = view('admin.themes.themethree')->render();
        $themefour = view('admin.themes.themefour')->render();
        $themefive = view('admin.themes.themefive')->render();
        $themesix = view('admin.themes.themesix')->render();
        

       

        return view('admin.themes.loadtheme',compact('themeone', 'themetwo','themethree','themefour','themefive','themesix','themes'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.cforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
        

    //     $this->validate($request,[

    //             'tag' => 'required'


    //     ]);

    //     $tag = new Tag;
    //     $tag->tag = $request->tag;
    //     $tag->save();
    //     Session::flash('success', 'You succesfully created a tag.');
    //     return redirect()->route('admin.tags');


    // }

     public function fsave(Request $request)
    {
         $pwd = bin2hex(openssl_random_pseudo_bytes(4));
        $cform = new Cform;
        $cform->cformname = $request->cformname;
        $cform->htmlelements = $request->htmlelement;
        $cform->htmlcontents = "nil";
        $cform->colcount = $request->colcount;
         $cform->cshortcode = "c".$pwd;

          $obj = json_decode($request->htmlelement);
        $cc = array();


       
       //dd($cform->htmlelements);

        for($i=0; $i < count($obj); $i++)
        {

           if(isset($obj[$i]->name))
            { 
                array_push($cc, $obj[$i]->name);
            } 
            else
            {
                array_push($cc, $obj[$i]->type);
            }  
        
        }

        array_push($cc, 'created_at');
        array_push($cc, 'updated_at');
       

        $cc1 = implode(",", $cc);

        $cform->tabfields = $cc1;
        $cform->save();
        //Session::flash('success','Form saved successfully');
        return $cform->id;
    }

    public function array_search_partial($arr, $keyword) {
        $iarr = array();
    foreach($arr as $index => $string) {
    if (strpos($string, $keyword) !== FALSE)
        array_push($iarr, $index); 
        
    }
    return $iarr;
    }


    

     public function createshortcode(Request $request, $id)
    {
        
        $cform = Cform::find($id);
        
        
       
        $cform->htmlcontents = $request->htmlcontent;
        $cform->save();
        //Session::flash('success','Form saved successfully');
        return $cform->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cform = Cform::find($id);
        return view('admin.cforms.edit')->with('cform', $cform);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function preview($id)
    {
        
        $cform = Cform::find($id);
        return view('admin.cforms.preview')->with('cform', $cform);
    }

    public function snippets()
    {
        
        return view('admin.cforms.snippets');
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'cformname' => 'required'

        ]);

         $cform = Cform::find($id);
        $cform->cformname = $request->cformname;
        $cform->htmlelements = $request->htmlelement;

        $cform->colcount = $request->colcount;
        
        
       
        $obj = json_decode($cform->htmlelements);
        $cc = array();
        $c = array();
        $result1 = array();
        $result2 = array();
        $result3 = array();


       
       //dd($cform->htmlelements);

        for($i=0; $i < count($obj); $i++)
        {

           if(isset($obj[$i]->name))
            { 
                array_push($cc, $obj[$i]->name);
            } 
            else
            {
                array_push($cc, $obj[$i]->type."_".$i);
            }  
        
        }

        array_push($cc, 'created_at');
        array_push($cc, 'updated_at');
       

        $cc1 = implode(",", $cc);

        

        $stables = Schema::getColumnListing($cform->cshortcode);

        $c = array_diff($stables,$cc);

        $result1 = array_intersect($stables,$cc);

        $result2 = array_diff($cc, $result1);

        //dd($result1);
        $fieldscre = $result2;

        $fields = $c;
        $table_name = $cform->cshortcode;

         Schema::table($table_name, function (Blueprint $table) use ($table_name, $fields) {
           if (count($fields) > 0) {
                    foreach ($fields as $key => $field) {
                        if($field == "id")
                        {

                        }
                        else
                        {
                             $table->dropColumn($field);
                        }
                       
                    }
                }
        });

         Schema::table($table_name, function (Blueprint $table) use ($table_name, $fieldscre) {

                if (count($fieldscre) > 0) {
                    foreach ($fieldscre as $key => $field) {
                        if($field == "id")
                        {

                        }
                        else
                        {
                             $table->text($field);
                        }
                       
                    }
                }
                
        });

         $result3 = array_merge($result1, $result2);
         $rescc1 = implode(",", $result3);
         //dd($result3);
         $cform->tabfields = $rescc1;
       
        $cform->save();
        
        return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $cform = Cform::withTrashed()->where('id', $id)->first();
         
          
            if($cform->trashed()){
               $cform->forceDelete();
                Session::flash('success', 'Form deleted permanently');
                return redirect()->back();
            } 
            else
            {    
                $cform->delete();
                Session::flash('success', 'Form deleted');
                return redirect()->back();
            }
         

        
    }
     public function restore($id)
    {
        $cform = Cform::withTrashed()->where('id',$id)->first();
        if($cform->trashed()){
            $cform->restore();
        }
        Session::flash('success', 'You succesfully restored a form.');
         return redirect()->back();
    }


     /**
     * Create dynamic table along with dynamic fields
     *
     * @param       $table_name
     * @param array $fields
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ctablescreate($table_name, $fields = [])
    {
        // check if table is not already exists
        if (!Schema::hasTable($table_name)) {
            Schema::create($table_name, function (Blueprint $table) use ($fields, $table_name) {
                $table->increments('id');
                if (count($fields) > 0) {
                    foreach ($fields as $field) {
                        $table->{$field['type']}($field['name']);
                    }
                }
                $table->timestamps();
            });
 
            return response()->json(['message' => 'Given table has been successfully created!'], 200);
        }
 
        return response()->json(['message' => 'Given table is already exists.'], 200);
    }



    public function operate(Request $request, $id)
    {
        
        // set dynamic table name according to your requirements
       
        $table_name = $request->cshortcode;

        // set your dynamic fields (you can fetch this data from database this is just an example)
        //dd($request->fieldnames);


        $fields = array();
        
        // for example
        for ($i = 0; $i < $request->colcount; ++$i) {
            if($request->fieldnames[$i] != "")
            {
                $fields[$i] = ['name' => $request->fieldnames[$i], 'type' => 'text'];
            }
        }
       
        $cform = Cform::find($id);
        $cform->cstatus = "Table_Created";
      
        $cform->save();
       /* $fields = [
            ['name' => 'field_1', 'type' => 'string'],
            ['name' => 'field_2', 'type' => 'text'],
            ['name' => 'field_3', 'type' => 'integer'],
            ['name' => 'field_4', 'type' => 'longText']
        ];*/

        return $this->ctablescreate($table_name, $fields);
        
    }

    public function addcoltotable(Request $request, $id)
    {
        $table_name = $request->cshortcode;
        
        
        $fields = array();
        $start = $request->colcount;
        $max = $request->diff + $request->colcount;
        // for example
        for ($i = $start; $i <= $max; ++$i) {
         $fields[$i] = ['name' => 'field_'.$i, 'type' => 'text'];
        }
        
            return $this->ctablesupdate($table_name, $fields);
        
        
    }

    public function ctablesupdate($table_name, $fields = [])
    {
        Schema::table($table_name, function (Blueprint $table) use ($table_name, $fields) {
           if (count($fields) > 0) {
                    foreach ($fields as $field) {
                        $table->{$field['type']}($field['name']);
                    }
                }
        });

    }
    public function ctablescolremove($table_name, $fields = [])
    {

        
        Schema::table($table_name, function (Blueprint $table) use ($table_name, $fields) {
           if (count($fields) > 0) {
                    foreach ($fields as $field) {
                        $table->dropColumn($field['name']);
                    }
                }
        });

    }

    public function remcolftable(Request $request, $id)
    {
        $table_name = $request->cshortcode;
        $fieldname = $request->fieldname;
        Schema::table($table_name, function (Blueprint $table) use ($table_name, $fieldname) {
           
            $table->dropColumn($fieldname);
                  
        });

         $this->update($request, $id);
    }

      /**
     * To delete the tabel from the database 
     * 
     * @param $table_name
     *
     * @return bool
     */
    public function loadthemes(Request $request)
    {
        //dd($request->themeone);
        $theme = new Theme;
        $theme->tname = "themeone";
        $theme->tcontent = $request->themeone;

        $theme->tstatus = "inactive";
        $theme->save();
        $theme = new Theme;
        $theme->tname = "themetwo";
        $theme->tcontent = $request->themetwo;

        $theme->tstatus = "inactive";
        $theme->save();
        $theme = new Theme;
        $theme->tname = "themethree";
        $theme->tcontent = $request->themethree;

        $theme->tstatus = "inactive";
        $theme->save();
        $theme = new Theme;
        $theme->tname = "themefour";
        $theme->tcontent = $request->themefour;

        $theme->tstatus = "inactive";
        $theme->save();
        $theme = new Theme;
        $theme->tname = "themefive";
        $theme->tcontent = $request->themefive;

        $theme->tstatus = "inactive";
        $theme->save();
        $theme = new Theme;
        $theme->tname = "themesix";
        $theme->tcontent = $request->themesix;

        $theme->tstatus = "inactive";
        $theme->save();
        

        return "success";
    }

    public function activatetheme(Request $request)
    {
        //dd($request->tid);
        $themefs = Theme::all();

        foreach($themefs as $tf)
        {

        $tf->tstatus = "inactive";
        $tf->save();

        }
        $theme = Theme::where('id', $request->tid)->first();
        //$theme->tname = $request->ntname;
        //$theme->tcontent = $request->newtheme;

        $theme->tstatus = "active";
        $theme->save();

        $themef = Form::where('formname', "Front_Page")->first();
       
        $themef->htmlcontent = $request->newtheme;

        $themef->status = "active";
        $themef->save();

        $branding = Brand::where('id', 1)->first();
           
                
        $branding->homepage = "[frontpage]-[/frontpage]";
        $branding->save();
       
        return "success";
    }

    public function deactivatetheme(Request $request)
    {
        //dd($request->tid);

        $themefs = Theme::all();

        foreach($themefs as $tf)
        {

        $tf->tstatus = "inactive";
        $tf->save();

        }
        $theme = Theme::where('id', $request->tid)->first();
        //$theme->tname = $request->ntname;
        //$theme->tcontent = $request->newtheme;

        $theme->tstatus = "disabled";
        $theme->save();

        $themef = Form::where('formname', "Front_Page")->first();
       
        $themef->htmlcontent = "";

        $themef->status = "inactive";
        $themef->save();

        $branding = Brand::where('id', 1)->first();
           
                
        $branding->homepage = "[homepage]-[/homepage]";
        $branding->save();
       
        return "success";
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ucolcount(Request $request, $id)
    {
        $table_name = $request->cshortcode;
        $fieldname = $request->fieldname;
        
        $cform = Cform::find($id);
        $cform->colcount = $request->colcount;
      
        $cform->save();
        return $this->ctablesinglecreate($table_name, $fieldname);
        //return "success";
    }

     public function ctablesinglecreate($table_name, $fieldname)
    {

        if($fieldname == ""){
         return response()->json(['message' => 'Column already exists.'], 200);  
        }
        // check if table is not already exists
        else if (!Schema::hasTable($table_name)) {
            Schema::create($table_name, function (Blueprint $table) use ($fieldname, $table_name) {
                $table->increments('id');
                
                $table->text($fieldname);
                  
                $table->timestamps();
            });
 
            return response()->json(['message' => 'Given table has been successfully created!'], 200);
        } 
        else
        {
             Schema::table($table_name, function (Blueprint $table) use ($table_name, $fieldname) {
                $table->text($fieldname);
        });
        }
 
        return response()->json(['message' => 'Given table  already exists.'], 200);
    }

    public function widgeteditor()
    {

        $vpath = array();
        $filename = array();
        $arrayfile = array();
        $arrayfileb = array();
        $cc = array();
        $cc1 = array();

        $dirPath = base_path().'/resources/views/shortcodes/plainhtml/';
        if (is_dir($dirPath)){
          if ($dh = opendir($dirPath)){
        while (($file = readdir($dh)) !== false)
        {
            if($file == "." || $file == "..")
            {

            }
            else
            {
                //echo "<option value=\"" . trim($file) . "\">" . $file . "\n";
                array_push($filename, $file);
                array_push($vpath, $dirPath.$file);
                $cc = str_replace(".blade.php","",$file);
                array_push($cc1, $cc);
            }
           
        }
        }
        }
        closedir($dh);
        //dd($cc1);
        //dd($filename);

        

        for($i=0;$i<count($cc1);$i++)
        {
            //$cc = chop($filename[$i],".blade.php");

         if($cc1[$i] == 'undefined')
         {
            $cc1[$i] = $cc1[0];
         } 
        

        $arrayfileb[$i] =  view('shortcodesbackup.'.$cc1[$i])->render();
        $arrayfile[$i] =  view('shortcodes.plainhtml.'.$cc1[$i])->render();
        //dd($imgslider);
        
        }

        //dd($arrayfile);

        return view('admin.widgeteditor.weditor')->with(['arrayfile'=> $arrayfile, 'arrayfileb'=> $arrayfileb]);
    
    }

    public function updatew(Request $request)
    {
        //dd($request->imgsliderw);
        //dd("ggg");

        //dd(htmlspecialchars_decode($request->imgsliderw));
        //dd($request->filewname);
        if($request->filewname != "undefined")
        {
        
            
            $vpath = base_path().'/resources/views/shortcodes/plainhtml/'.$request->filewname;
           //dd($vpath);
       
            //dd($vpath);
            $html = File::put($vpath, htmlspecialchars_decode($request->filew));
       
        return "success";
        } 
        else
        {
            return "false";
        }
     
    
    }


}