<?php

namespace App\Http\Controllers;

use App\Post;
use App\Form;
use App\Brand;
use App\Colorsetting;
use Illuminate\Http\Request;
use Imagecow\Image;
use Shortcode;
use File;
use Illuminate\Support\Facades\DB;
use App\Events\TestEvent;
use App\Http\Traits\SettingsTrait;

use Harimayco\Menu\Facades\Menu;

use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use App\Category;

class DynamicWidgetsController extends Controller
{
    use SettingsTrait;


    public function Topmenu($id)
    {
        //dd($blog);
  	$menuList = Menu::get(1);

    //dd($posts);
    return view('shortcodes.menus.topmenu')->with('menuList', $menuList);
        

    }

}