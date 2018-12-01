<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Tag;
use App\Page;
use App\Cform;
use App\Form;
use App\User;
use App\Brand;
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


class PollingController extends Controller
{
	use BrandsTrait;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   

   
    public function showpollingform()
    {
    	$data = $this->brandsAll();
        $user = User::where('email', $data['n_loggeduser'])->first();
        if($user->can('pollingformshow')  && $user->isCEO() == "yes" ) {
       //dd($data['n_loggeduser']);
        return view('admin.ec.pollingform',compact('data'));
        } else {
        return "You do not have permission to access this page"; 
        }

    }

    

   
}
