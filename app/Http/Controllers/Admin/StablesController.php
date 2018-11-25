<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Tag;
use App\Page;
use App\Cform;

use App\General;

use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Shortcode;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StablesController extends Controller
{
    use BrandsTrait;
    public function index()
    {   
       $data = $this->brandsAll();
        $stables = Cform::withTrashed()->latest()->paginate(50);
        return view('admin.stables.index',compact('stables','data'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->brandsAll();
         return view('admin.cforms.create',compact('data'));
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

        /*$product = new Product;
        $product->getTable(); // products
        $product->setTable('oooops');
        $product->get(); // select * from oooops
        $product->first(); // select * from oooops limit 1*/

     public function fsave(Request $request)
    {
         $pwd = bin2hex(openssl_random_pseudo_bytes(4));
        $cform = new Cform;
        $cform->cformname = $request->cformname;
        $cform->htmlelements = $request->htmlelement;
        $cform->htmlcontents = "nil";
        $cform->colcount = $request->colcount;
         $cform->cshortcode = "c".$pwd;
        $cform->save();
        //Session::flash('success','Form saved successfully');
        return $cform->id;
    }

    public function datacfsave(Request $request)
    {
        $input = array();
        
        $general = new General;
        $general->setTable = $request->table_name;
         $input = $request->all();
         $output = array_except($input, ['_token', 'table_name']);
         foreach($output as $key => $value)
         {
            $key = str_replace("[]","",$key);
            
            $id = DB::table($request->table_name)->insertGetId([$key => $value]);
            break;

         }

            if($id)
            {
                foreach($output as $key => $value)
                {
                    $key = str_replace("[]","",$key);

                    DB::table($request->table_name)->where('id', $id)->update([$key => $value]);
                  

                }
            }
            $check = DB::table($request->table_name)->where('id', $id)->select('*')->get();
            if($check[0]->created_at)
            {
              DB::table($request->table_name)->where('id', $id)->update([
                'updated_at' => Carbon::now()->toDateTimeString()]); 
            }
            else
            {
              DB::table($request->table_name)->where('id', $id)->update(['created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()]); 
            }
        
         
        return $check;
      
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
        $stablescform = Cform::find($id);
        
        
        //$stables = DB::table($stables->cshortcode)->select('*')->get();
        $stablesfields = $stablescform->tabfields;

        $stablef = explode(",", $stablesfields);
        
        $stables = Schema::getColumnListing($stablescform->cshortcode);
        //dd($stables);

        if($stables)
        {
        $index1 = array_search("created_at", $stablef);
        if($index1 !== false){
            unset($stablef[$index1]);
        }

        $index2 = array_search("created_at", $stables);
        if($index2 !== false){
            unset($stables[$index2]);
        }

         $index1 = array_search("updated_at", $stablef);
        if($index1 !== false){
            unset($stablef[$index1]);
        }

        $index2 = array_search("updated_at", $stables);
        if($index2 !== false){
            unset($stables[$index2]);
        }

       
         $alldata = DB::table($stablescform->cshortcode)->select('*')->get();

       }
       else
        {
            $alldata = $stables = "tablenotcreated";
        
        }
        $data = $this->brandsAll();
        return view('admin.stables.edit')->with(['stables' => $stables, 'stablescform' => $stablescform, 'stablef' => $stablef, 'alldata' => $alldata,'data' => $data]);
        
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

    public function updatetablename(Request $request, $id)
    {

        $this->validate($request, [

            'tablename' => 'required|regex:/^[a-zA-Z0-9]+$/u|max:255'

        ]);

        $fromtablename = Cform::find($id);
        

        Schema::rename($fromtablename->cshortcode, $request->tablename);

          $cform = Cform::find($id);
          $cform->cshortcode = $request->tablename;
          
          $cform->save();
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

            'tablename' => 'required|regex:/^[a-zA-Z0-9]+$/u|max:255'

        ]);
        
         $arr = explode(",",$request->cfs);
         $arr1 = explode(",",$request->cfs1);
         
        
         

        $fromtablename = Cform::find($id);
        
        $stables = Schema::getColumnListing($fromtablename->cshortcode);

        $cars = array();

        //for ($rows = 0; $rows < 4; $rows++) {
         
          for ($cols = 0; $cols < count($arr1); $cols++) {
           $cars[0][$cols] = $arr[$cols];
           $cars[1][$cols] = $arr1[$cols];
          }
         
        //}

        //Schema::rename($fromtablename, $request->tablename);
            //dd($fromtablename->htmlelements);
          for ($cols = 0; $cols < count($arr1); $cols++) {
            if($cars[1][$cols] == "")
            {

            }
            else
            {
                DB::statement("ALTER TABLE `".$fromtablename->cshortcode."` CHANGE COLUMN `" .$cars[1][$cols] ."` `".$cars[0][$cols]."` text NOT NULL");
            }
            
          }

          //dd($fromtablename);
          //DB::statement("RENAME TABLE `".$fromtablename->cshortcode."` TO `" .$request->tablename ."`");

          
          Schema::rename($fromtablename->cshortcode, $request->tablename);

          $cform = Cform::find($id);
          $cform->cshortcode = $request->tablename;
          
          $cform->save();

       
        
        return $cars;
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
        //dd($request->formData);

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
    public function removeTable($table_name)
    {
        Schema::dropIfExists($table_name); 
       
        return true;
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


}
