<?php

namespace App\Http\Controllers\CAdmin;

use Session;
use App\Tag;
use App\Page;
use App\Form;
use App\Theme;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use Illuminate\Support\Facades\Auth;
use App\Compbrand;
use Illuminate\Http\Request;
use Shortcode;
use App\Custsnippet;


class FormbuilderController extends Controller
{
    use BrandsTrait;

    public function index()
    {   
       

         $formshortcode = Form::where('formname', 'Home_Page')->first();
        if($formshortcode != "")
        {
        } 
        else
        {
        if($formshortcode['formname'] != 'Home_Page')
        {
            $formshortcode = new Form;
            $formshortcode->formname = "Home_Page";
            $formshortcode->shortcode = "-";
            $formshortcode->save();
        }
        }

         $formshortcode = Form::where('formname', 'Front_Page')->first();
        if($formshortcode != "")
        {
        } 
        else
        {
        if($formshortcode['formname'] != 'Front_Page')
        {
            $formshortcode = new Form;
            $formshortcode->formname = "Front_Page";
            $formshortcode->shortcode = "-";
            $formshortcode->save();
        }
        }
         $data = $this->brandsAll();

          if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
         }
         //dd($thisuser);
         if($thisuser->isSuperadministrator() == "yes" || $thisuser->isCMSAdmin()) {
            $forms = Form::withTrashed()->latest()->paginate(10);
           
         } 
         else 
         {
            if($thisuser)
            {
                $forms = Form::where('createdby', $thisuser->id)->withTrashed()->latest()->paginate(10);
            } 

            
         }
    
        return view('cadmin.formbuilder.index',compact('forms','data'));
    }

    public function smanagement()
    {   
       

         $formshortcode = Form::where('formname', 'Home_Page')->first();
        if($formshortcode != "")
        {
        } 
        else
        {
        if($formshortcode['formname'] != 'Home_Page')
        {
            $formshortcode = new Form;
            $formshortcode->formname = "Home_Page";
            $formshortcode->shortcode = "-";
            $formshortcode->save();
        }
        }

         $formshortcode = Form::where('formname', 'Front_Page')->first();
        if($formshortcode != "")
        {
        } 
        else
        {
        if($formshortcode['formname'] != 'Front_Page')
        {
            $formshortcode = new Form;
            $formshortcode->formname = "Front_Page";
            $formshortcode->shortcode = "-";
            $formshortcode->save();
        }
        }
         $data = $this->brandsAll();
        
         $thisuser = User::where('email', Auth::user()->email)->first();
         //dd($thisuser);
         if($thisuser->isSuperadministrator() == "yes" || $thisuser->isCMSAdmin()) {
            $forms = Form::withTrashed()->latest()->paginate(10);
           
         } 
         else 
         {
            if($thisuser)
            {
                $forms = Form::where('createdby', $thisuser->id)->withTrashed()->latest()->paginate(10);
            } 

            
         }
        return view('cadmin.formbuilder.management',compact('forms','data'));
    }

    public function updateshortcode(Request $request, $id)
    {

        $this->validate($request, [

            'shortcode' => 'required|regex:/^[a-zA-Z0-9]+$/u|max:255'

        ]);

       

          $form = Form::find($id);
          $form->shortcode = $request->shortcode;
          
          $form->save();
    }

    public function shortedit($id)
    {
        $form = Form::find($id);
       $data = $this->brandsAll();
        return view('cadmin.formbuilder.shortedit')->with(['data' => $data, 'form' => $form]);
    } 


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data = $this->brandsAll();
          if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
         }
         //dd($thisuser);
         if($thisuser->isSuperadministrator() == "yes" || $thisuser->isCMSAdmin() || $thisuser->isSAdmin() == "yes" ) {
            $surl = "cadmin.forms.snippets";
           
         } 

         if($thisuser->isCMSEditor() == "yes" || $thisuser->isCMSAuthor() == "yes" || $thisuser->isDemo() == "yes") {
            $surl = "cadmin.forms.snippetsspecific";
           
         } 
         
        return view('cadmin.formbuilder.create')->with(['data'=> $data , 'surl'=> $surl]);
         //return view('cadmin.formbuilder.create',compact('data'));
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
         if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
         }
        $pwd = bin2hex(openssl_random_pseudo_bytes(4));
        $form = new Form;
        $form->formname = $request->formname;
        $form->htmlcontent = $request->htmlcontent;
        $form->shortcode = $pwd;
        $form->createdby = $thisuser->id;
        $form->save();
        //Session::flash('success','Form saved successfully');
        return "success";
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
        $form = Form::find($id);
         $data = $this->brandsAll();
          if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
         }
         //dd($thisuser);
         if($thisuser->isSuperadministrator() == "yes" || $thisuser->isCMSAdmin() || $thisuser->isSAdmin() == "yes" ) {
            $surl = "cadmin.forms.snippets";
           
         } 

         if($thisuser->isCMSEditor() == "yes" || $thisuser->isCMSAuthor() == "yes" || $thisuser->isDemo() == "yes") {
            $surl = "cadmin.forms.snippetsspecific";
           
         } 
         
        return view('cadmin.formbuilder.edit')->with(['form'=> $form, 'data'=> $data , 'surl'=> $surl]);
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
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $form = Form::find($id);
        return view('cadmin.formbuilder.preview')->with(['form'=> $form, 'data' => $data])->withShortcodes();
    }

    public function previewfull($id)
    {
        $data = $this->brandsAll();
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $form = Form::find($id);
        return view('cadmin.formbuilder.previewfull')->with(['form'=> $form, 'data' => $data])->withShortcodes();
    }

    public function preview1($id)
    {
        $data = $this->brandsAll();
        Shortcode::enable();
        $shortcode = App('Shortcode');
        $form = Form::find($id);
        return view('cadmin.formbuilder.preview1')->with(['form'=> $form, 'data' => $data])->withShortcodes();
    }

    

    public function snippets()
    {
        
        return view('cadmin.formbuilder.snippets');
    }

     public function snippetsspecific()
    {
           if(Auth::guard('demo')->user())
         {
          $thisuser = User::where('email', Auth::guard('demo')->user()->email)->first();
         } 
         else 
         {
            $thisuser = User::where('email', Auth::user()->email)->first();
         }

         $snippet = Custsnippet::where('custid', $thisuser->id)->get();
            //dd( $snippet);
        return view('cadmin.formbuilder.snippetsspecific')->with(['snippets'=> $snippet]);
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

            'formname' => 'required'

        ]);
        $form = Form::find($id);
        if($form->formname == "Front_Page")
        {
            $form->formname = "Front_Page";
        }
        else
        {
            $form->formname = $request->formname;
        }
        
        $form->htmlcontent = $request->htmlcontent;
        $form->save();

        if($form->formname == "Front_Page")
        {
        $theme = Theme::where('tstatus', 'active')->first();
        if(substr($theme->tname,0,8) == "Altered_")
        {

        }
        else
        {
            $theme->tname = "Altered_".$theme->tname;
            $th = new Theme;
            $th->tname = "Backup_".$theme->id;
            $th->tcontent = $theme->tcontent;
            $th->save();
        }
        
        
        $theme->tcontent = $form->htmlcontent;
        
        $theme->save();

        
        }

        
        

        
        return "success";
    }

    public function updatepre(Request $request, $id)
    {
        //dd("hi");
        $form = Form::find($id);
        //dd($form);
        $form->htmlcontent = $request->htmlcontent;
        $form->save();

             
        
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
         $form = Form::withTrashed()->where('id', $id)->first();
         
          
            if($form->trashed()){
               $form->forceDelete();
                Session::flash('success', 'Form deleted permanently');
                return redirect()->back();
            } 
            else
            {    
                $form->delete();
                Session::flash('success', 'Form deleted');
                return redirect()->back();
            }
         

        
    }
     public function restore($id)
    {
        $form = Form::withTrashed()->where('id',$id)->first();
        if($form->trashed()){
            $form->restore();
        }
        Session::flash('success', 'You succesfully restored a form.');
         return redirect()->back();
    }

    public function menubuilder()
    {
         $data = $this->brandsAll();
         return view('cadmin.formbuilder.menubuilder')->with(['data'=> $data]);
    }

    public function clonewidget($id)
    {
        //dd($id);
        $form = Form::where('id',$id)->first();
        $rand = bin2hex(openssl_random_pseudo_bytes(4));
         $newform = new Form;
         $newform->formname = $id."_dup_".$rand;
         $newform->shortcode = "dup".$rand;
         $newform->htmlcontent = $form->htmlcontent;
         $newform->createdby = $form->createdby;
         $newform->save();

        return redirect()->back()->with("success", "Duplicate widget was created successfully");
    }

}
