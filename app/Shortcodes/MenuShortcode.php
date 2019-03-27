<?php 
//https://github.com/harimayco/wmenu-builder
namespace App\Shortcodes;
use App\Blogcategory;
use App\Post;

use Harimayco\Menu\Facades\Menu;

use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class MenuShortcode {

  public function menulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor---------";
    }
  	

    //dd($menuList);
    if($menuList)
    {
      return view('shortcodes.menus.topmenu')->with('menuList', $menuList);
    }
    
    
  }
  



  public function responsivemenulist($shortcode, $content, $compiler, $name, $viewData)
  {
  	$check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
    return view('shortcodes.menus.responsivemenu')->with('menuList', $menuList);
    }
  }

  public function loanmenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
    return view('shortcodes.menus.loanmenu')->with('menuList', $menuList);
    }
  }

 public function politicsmenulist($shortcode, $content, $compiler, $name, $viewData)
  {
      $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
    return view('shortcodes.menus.politicsmenu')->with('menuList', $menuList);
    }
  }

  public function oxygenmenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
    return view('shortcodes.menus.oxygenmenu')->with('menuList', $menuList);
    }
  }

  public function aboutmenulist_transparent($shortcode, $content, $compiler, $name, $viewData)
  {
    $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor and fill container with color---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
       return view('shortcodes.menus.aboutmenu')->with('menuList', $menuList);
    }
  }
  
  public function orangemenulist_transparent($shortcode, $content, $compiler, $name, $viewData)
  {
    $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor and fill container with color---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
      return view('shortcodes.menus.orangemenu')->with('menuList', $menuList);
    }
  }

  public function multimenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
      return view('shortcodes.menus.multimenu')->with('menuList', $menuList);
    }
  }

  public function stickymenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
      return view('shortcodes.menus.stickymenu')->with('menuList', $menuList);
    }
  }

  public function cyanmenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
      return view('shortcodes.menus.cyanmenudynamic')->with('menuList', $menuList);
    }
  }

  public function greenmenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
      return view('shortcodes.menus.greenmenudynamic')->with('menuList', $menuList);
    }
  }

  public function ftabbedmenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
      return view('shortcodes.menus.flattabbedmenu')->with('menuList', $menuList);
    }
  }

  public function fbubblemenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $check = DB::table('admin_menus')->where('name', $content)->select('*')->get();
    
    if(!$check->isEmpty())
    {
       $menuList = Menu::getByName($content);
    }
    else
    {
      return "-----------First build menu using menu builder and specify the menu name in the widget inline editor---------";
    }
    

    //dd($menuList);
    if($menuList)
    {
      return view('shortcodes.menus.fbubblemenu')->with('menuList', $menuList);
    }
  }

}
