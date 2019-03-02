<?php 
//https://github.com/harimayco/wmenu-builder
namespace App\Shortcodes;
use App\Category;
use App\Post;

use Harimayco\Menu\Facades\Menu;

use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;



class MenuShortcode {

  public function menulist($shortcode, $content, $compiler, $name, $viewData)
  {
  	$menuList = Menu::getByName($content);

    //dd($posts);
    return view('shortcodes.menus.topmenu')->with('menuList', $menuList);
  }
  



  public function responsivemenulist($shortcode, $content, $compiler, $name, $viewData)
  {
  	$menuList = Menu::getByName($content);

    //dd($posts);
    return view('shortcodes.menus.responsivemenu')->with('menuList', $menuList);
  }

  public function loanmenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $menuList = Menu::getByName($content);

    //dd($posts);
    return view('shortcodes.menus.loanmenu')->with('menuList', $menuList);
  }

 public function politicsmenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $menuList = Menu::getByName($content);

    //dd($posts);
    return view('shortcodes.menus.politicsmenu')->with('menuList', $menuList);
  }

  public function oxygenmenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $menuList = Menu::getByName($content);

    //dd($posts);
    return view('shortcodes.menus.oxygenmenu')->with('menuList', $menuList);
  }

  public function aboutmenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $menuList = Menu::getByName($content);

    //dd($posts);
    return view('shortcodes.menus.aboutmenu')->with('menuList', $menuList);
  }
  
  public function orangemenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $menuList = Menu::getByName($content);

    //dd($posts);
    return view('shortcodes.menus.orangemenu')->with('menuList', $menuList);
  }

  public function multimenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $menuList = Menu::getByName($content);

    //dd($posts);
    return view('shortcodes.menus.multimenu')->with('menuList', $menuList);
  }

  public function stickymenulist($shortcode, $content, $compiler, $name, $viewData)
  {
    $menuList = Menu::getByName($content);

    //dd($posts);
    return view('shortcodes.menus.stickymenu')->with('menuList', $menuList);
  }
}
