<?php

namespace App\Http\Controllers\CAdmin;

use Session;
use App\User;
use App\Tag;
use App\Page;
use App\Cform;
use App\Form;
use App\Theme;
use App\Compbrand;
use App\General;
use File;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Shortcode;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Custtheme;

class ThemeController extends Controller
{
    use BrandsTrait;

    public function index()
    {   
       $data = $this->brandsAll();
        $cforms = Cform::withTrashed()->latest()->paginate(50);
        return view('cadmin.cforms.index',compact('cforms','data'));
    }


    public function themes()
    {   
       $data = $this->brandsAll();
       $user = User::where('email', Auth::user()->email)->first();
       $themes = Theme::all();
       if(!empty($themes[0]))
       {
        
       }
       else
       {
        $themes = "empty";
       }

       //dd($themes);
        $themeone = view('cadmin.themes.themeone')->render();
        $themetwo = view('cadmin.themes.themetwo')->render();
        $themethree = view('cadmin.themes.themethree')->render();
        $themefour = view('cadmin.themes.themefour')->render();
        $themefive = view('cadmin.themes.themefive')->render();
        $themesix = view('cadmin.themes.themesix')->render();
        $themeseven = view('cadmin.themes.themeseven')->render();
        $themebjpone = view('cadmin.themes.bjpthemeonem')->render();
        $themebjptwo = view('cadmin.themes.bjpthemetwoa')->render();
        $themebjpthree = view('cadmin.themes.bjpthemethreepk')->render();
        
         if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
         }



        if($thisuser->isDemo() == "yes") {

          $themef = Form::where('formname', "Demo_Page_".$thisuser->id)->first();
          $widgetid = $themef->id;

          $custthemes = Custtheme::where('custid', $thisuser->id)->get();
          //dd($custthemes);
            return view('cadmin.themes.loadcusttheme',compact('custthemes','data','user','widgetid'));
           
         } 

        return view('cadmin.themes.loadtheme',compact('themeone', 'themetwo','themethree','themefour','themefive','themesix','themeseven','themebjpone','themebjptwo','themebjpthree','themes','data','user'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->brandsAll();
         return view('cadmin.cforms.create',compact('data'));
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
    //     return redirect()->route('cadmin.tags');


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
        return view('cadmin.cforms.edit')->with('cform', $cform);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function preview($id)
    {
         $data = $this->brandsAll();
        $cform = Cform::find($id);
        return view('cadmin.cforms.preview')->with(['cform'=> $cform, 'data' => $data]);
    }

    public function snippets()
    {
        
        return view('cadmin.cforms.snippets');
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
       
        if($request->themeone){
        $theme = new Theme;
        $theme->tname = "Portfolio Theme - T1";
        $theme->tcontent = $request->themeone;

        $theme->tstatus = "inactive";
        $theme->save();
        }

        if($request->themetwo){
        $theme = new Theme;
        $theme->tname = "Personal Theme - T2";
        $theme->tcontent = $request->themetwo;

        $theme->tstatus = "inactive";
        $theme->save();
        }

        if($request->themethree){
        $theme = new Theme;
        $theme->tname = "Loan Theme - T3";
        $theme->tcontent = $request->themethree;

        $theme->tstatus = "inactive";
        $theme->save();
        }

        if($request->themefour){
        $theme = new Theme;
        $theme->tname = "Business Theme - T4";
        $theme->tcontent = $request->themefour;

        $theme->tstatus = "inactive";
        $theme->save();
        }

        if($request->themefive){
        $theme = new Theme;
        $theme->tname = "Politics Theme - T5";
        $theme->tcontent = $request->themefive;

        $theme->tstatus = "inactive";
        $theme->save();
        }

        if($request->themesix){
        $theme = new Theme;
        $theme->tname = "General Theme - T6";
        $theme->tcontent = $request->themesix;

        $theme->tstatus = "inactive";
        $theme->save();
        }

        if($request->themeseven){
        $theme = new Theme;
        $theme->tname = "Basic Theme - T7";
        $theme->tcontent = $request->themeseven;

        $theme->tstatus = "inactive";
        $theme->save();
        }

        if($request->themeeight){
        $theme = new Theme;
        $theme->tname = "BJP Theme - T8";
        $theme->tcontent = $request->themeeight;

        $theme->tstatus = "inactive";
        $theme->save();
        }

        if($request->themenine){

        $theme = new Theme;
        $theme->tname = "BJP Theme - T9";
        $theme->tcontent = $request->themenine;

        $theme->tstatus = "inactive";
        $theme->save();
        }

        if($request->themeten){
        $theme = new Theme;
        $theme->tname = "BJP Theme - T10";
        $theme->tcontent = $request->themeten;

        $theme->tstatus = "inactive";
        $theme->save();
        }

        return "success";
    }

    public function Reloadthemes(Request $request)
    {
        //dd($request->themeone);
        if($request->themeone){
        $theme1 = Theme::where('tname', "Portfolio Theme - T1")->first();
        
        //dd($request->themeone);
        
        $theme1->tcontent = $request->themeone;

        $theme1->tstatus = "inactive";
        $theme1->save();
        }

        else if($request->themetwo){
        $theme2 = Theme::where('tname', "Personal Theme - T2")->first();
        
       
        $theme2->tcontent = $request->themetwo;

        $theme2->tstatus = "inactive";
        $theme2->save();
        }

        else if($request->themethree){
        $theme3 = Theme::where('tname', "Loan Theme - T3")->first();
      
        $theme3->tcontent = $request->themethree;

        $theme3->tstatus = "inactive";
        $theme3->save();
        }

        else if($request->themefour){
        $theme4 = Theme::where('tname', "Business Theme - T4")->first();
       
        $theme4->tcontent = $request->themefour;

        $theme4->tstatus = "inactive";
        $theme4->save();
        }

        else if($request->themefive){
        $theme5 = Theme::where('tname', "Politics Theme - T5")->first();
        
        $theme5->tcontent = $request->themefive;

        $theme5->tstatus = "inactive";
        $theme5->save();
        }

        else if($request->themesix){
        $theme6 = Theme::where('tname', "General Theme - T6")->first();
       
        $theme6->tcontent = $request->themesix;

        $theme6->tstatus = "inactive";
        $theme6->save();
        }

        else if($request->themeseven){
        $theme7 = Theme::where('tname', "Basic Theme - T7")->first();
        
        $theme7->tcontent = $request->themeseven;

        $theme7->tstatus = "inactive";
        $theme7->save();
        }

        else if($request->themeeight){
        $theme8 = Theme::where('tname', "BJP Theme - T8")->first();
        
        $theme8->tcontent = $request->themeeight;

        $theme8->tstatus = "inactive";
        $theme8->save();
        }

        else if($request->themenine){
        $theme9 = Theme::where('tname', "BJP Theme - T9")->first();
        
        $theme9->tcontent = $request->themenine;

        $theme9->tstatus = "inactive";
        $theme9->save();
        }

        else if($request->themeten){
        $theme10 = Theme::where('tname', "BJP Theme - T10")->first();
        
        $theme10->tcontent = $request->themeten;

        $theme10->tstatus = "inactive";
        $theme10->save();
        }

        else {
            
        }

        return "success";
    }



    public function installthemes(Request $request)
    {
        //dd($request->themeone);
        $themefs = Theme::all();

        foreach($themefs as $tf)
        {
            if($tf->tname != $request->tname)
            {

            $current_time = Carbon::now()->toDateTimeString();
            $theme = new Theme;
            $theme->tname = "*".$request->tname;
            $theme->tcontent = $request->newtheme;

            $theme->tstatus = "inactive";
            $theme->save();
           
            

                return "success";
            }
            else
            {
                return "failure";
            }
        }
    }

    public function deletetheme($id)
    {
         $theme = Theme::where('id', $id)->first();

            $theme->delete();       
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

        $branding = Compbrand::where('id', 1)->first();
           
                
        $branding->homepage = "[frontpage]-[/frontpage]";
        $branding->hcontent = $theme->tcontent;
        $branding->save();
       
        return "success";
    }


    public function activatecusttheme(Request $request)
    {

      //dd($request->tid);
       if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
         }

        $custthemes = Custtheme::where('custid', $thisuser->id)->get();

        foreach($custthemes as $tf)
        {

        $tf->tstatus = "inactive";
        $tf->save();

        }
        //$theme->tname = $request->ntname;
        //$theme->tcontent = $request->newtheme;
        $custtheme = Custtheme::where('custid', $thisuser->id)->where('id', $request->tid)->first();

        $custtheme->tstatus = "active";
        $custtheme->save();

        $themef = Form::where('formname', "Demo_Page_".$thisuser->id)->first();

        if($themef->formname == "Demo_Page_".$thisuser->id)
        {

        }
        else
        {
        $formshortcode = new Form();
        $formshortcode->formname = "Demo_Page_".$thisuser->id;
        $formshortcode->shortcode = "demo".$thisuser->id;
        $formshortcode->createdby = $thisuser->id;
        $formshortcode->save();

        }

        


        $themef = Form::where('formname', "Demo_Page_".$thisuser->id)->first();
       
        $themef->htmlcontent = $request->newtheme;

        $themef->status = "active";
        $themef->save();

        
       
        return "success";
    }

    public function Previewtheme(Request $request)
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

        $theme->tstatus = "preview";
        $theme->save();

        $themef = Form::where('formname', "Front_Page")->first();
       
        $themef->htmlcontent = $request->newtheme;

        $themef->status = "preview";
        $themef->save();

        
       
        return "success";
    }

     public function Previewcusttheme(Request $request)
    {

      //dd($request->tid);
        if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
         }

        

       
        $custthemefs = Custtheme::where('custid', $thisuser->id)->get();

        foreach($custthemefs as $tf)
        {

        $tf->tstatus = "inactive";
        $tf->save();

        }
        $custtheme = Custtheme::where('custid', $thisuser->id)->where('id', $request->tid)->first();
        //$theme->tname = $request->ntname;
        //$theme->tcontent = $request->newtheme;

        $custtheme->tstatus = "preview";
        $custtheme->save();

        $themef = Form::where('formname', "Demo_Page_".$thisuser->id)->first();

        if($themef->formname == "Demo_Page_".$thisuser->id)
        {

        }
        else
        {

        
       
        $themef->htmlcontent = $request->newtheme;

        $themef->status = "preview";
        $themef->save();
        
        }

        

        
       
        return "success";
    }

     public function previewintheme()
    {
         $data = $this->brandsAll();
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $form = Form::where('formname', "Front_Page")->first();
        return view('cadmin.formbuilder.themepreview')->with(['form'=> $form, 'data' => $data])->withShortcodes();
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

        $themehome = Form::where('formname', "Home_Page")->first();

        $branding = Compbrand::where('id', 1)->first();
           
                
        $branding->homepage = "[homepage]-[/homepage]";
        $branding->hcontent = $themehome->htmlcontent;
        $branding->save();
       
        return "success";
    }

    public function deactivatecusttheme(Request $request)
    {
        //dd($request->tid);
        if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
         }

        $custthemefs = Custtheme::where('custid', $thisuser->id)->get();

        foreach($custthemefs as $tf)
        {

        $tf->tstatus = "inactive";
        $tf->save();

        }
       $custtheme = Custtheme::where('custid', $thisuser->id)->where('id', $request->tid)->first();
        //$theme->tname = $request->ntname;
        //$theme->tcontent = $request->newtheme;

        $custtheme->tstatus = "disabled";
        $custtheme->save();

        $custthemef = Form::where('formname', "Demo_Page_".$thisuser->id)->first();
       //dd($custthemef);

        if($custthemef->formname == "Demo_Page_".$thisuser->id)
        {

        }
        else
        {
        $custthemef->htmlcontent = "";

        $custthemef->status = "inactive";
        $custthemef->save();
        }
        

       
        return "success";
    }


    public function resettheme(Request $request)
    {
        
        $theme = Theme::where('id', $request->tid)->first();
        $themename = explode("_",$theme->tname);
        //dd($themename[1]);
        $themes = Theme::all();

        foreach($themes as $th)
        {
            $backupidstring = substr($th->tname,7, 5);
        }

        if($backupidstring == $theme->id)
        {
          $themeb = Theme::where('tname', "Backup_".$request->tid)->first();
          $themeb = Theme::where('id', $themeb->id)->first();
           $theme->tname = $themename[1];
           $theme->tcontent = $themeb->tcontent;
           $theme->save();
           $themeb->delete();  

            $themef = Form::where('formname', "Front_Page")->first();
       
            $themef->htmlcontent = $theme->tcontent; 
            $themef->save();    
        }
        
       
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
        $data = $this->brandsAll();
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

        return view('cadmin.widgeteditor.weditor')->with(['arrayfile'=> $arrayfile, 'arrayfileb'=> $arrayfileb, 'data'=>$data]);
    
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
            $html = File::put($vpath,htmlspecialchars_decode($request->filew));
       
        return "success";
        } 
        else
        {
            return "false";
        }
     
    
    }

    public function csseditor()
    {

        $vpath = array();
        $filename = array();
        $arrayfile = array();
        $arrayfileb = array();
        $cc = array();
        $cc1 = array();

        $dirPath = base_path().'/public/webhome/editcss/';
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
                $cc = str_replace(".css","",$file);
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
        
        $vpath = public_path().'/webhome/editcss/'.$cc1[$i].'.css';

        $html = File::get($vpath);
        //dd($html);
        $arrayfile[$i] =  $html;
        //dd($imgslider);
        //dd(public_path());
        //dd($arrayfile[$i]);
        
        }

        //dd($arrayfile);
        $data = $this->brandsAll();
        return view('cadmin.widgeteditor.csseditor')->with(['arrayfile'=> $arrayfile, 'arrayfileb'=> $arrayfileb, 'data'=>$data]);
    
    }

    public function updatecss(Request $request)
    {
        //dd($request->filewname);
        //dd("ggg");

        //dd(htmlspecialchars_decode($request->filew));
        //dd($request->filewname);
        if($request->filewname != "undefined")
        {
        
            
            $vpath = public_path().'/webhome/editcss/'.$request->filewname;
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

     public function widgetcusteditor()
    {

        $vpath = array();
        $filename = array();
        $arrayfile = array();
        $arrayfileb = array();
        $cc = array();
        $cc1 = array();

        $dirPath = base_path().'/resources/views/shortcodes/custom/';
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
       
        $arrayfile[$i] =  view('shortcodes.custom.'.$cc1[$i])->render();
        //dd($imgslider);
         //dd($arrayfile[$i].replace('/\s/g', '&nbsp;'));
        $arrayfile[$i] = preg_replace('/(>*<\/i>)/', '&amp;nbsp;</i>', $arrayfile[$i]); 
        $arrayfile[$i] = preg_replace('/(>*<\/label>)/', '&amp;nbsp;</label>', $arrayfile[$i]); 
       
            //dd($arrayfile[$i]);
        }

        //dd($arrayfile);
        $data = $this->brandsAll();
        return view('cadmin.widgeteditor.wcusteditor')->with(['arrayfile'=> $arrayfile, 'arrayfileb'=> $arrayfileb, 'data'=>$data]);
    
    }

    public function updatewcust(Request $request)
    {
        //dd($request->imgsliderw);
        //dd("ggg");

        //dd(htmlspecialchars_decode($request->imgsliderw));
        //dd($request->filewname);
        if($request->filewname != "undefined")
        {
        
            
            $vpath = base_path().'/resources/views/shortcodes/custom/'.$request->filewname;
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


     public function jseditor()
    {

        $vpath = array();
        $filename = array();
        $arrayfile = array();
        $arrayfileb = array();
        $cc = array();
        $cc1 = array();

        $dirPath = base_path().'/public/webhome/editjs/';
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
                $cc = str_replace(".js","",$file);
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
        
        $vpath = public_path().'/webhome/editjs/'.$cc1[$i].'.js';

        $html = File::get($vpath);
        //dd($html);
        $arrayfile[$i] =  $html;
        //dd($imgslider);
        //dd(public_path());
        //dd($arrayfile[$i]);
        
        }

        //dd($arrayfile);
        $data = $this->brandsAll();
        return view('cadmin.widgeteditor.jseditor')->with(['arrayfile'=> $arrayfile, 'arrayfileb'=> $arrayfileb, 'data'=>$data]);
    
    }

    public function updatejs(Request $request)
    {
        //dd($request->filewname);
        //dd("ggg");

        //dd(htmlspecialchars_decode($request->filew));
        //dd($request->filewname);
        if($request->filewname != "undefined")
        {
        
            
            $vpath = public_path().'/webhome/editjs/'.$request->filewname;
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
