<?php

namespace App\Providers;

use App\Shortcodes\BoldShortcode;
use App\Shortcodes\MenuShortcode;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

use Shortcode;
use App\Form; 
use App\Cform;

class ShortcodesServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        //if(env('DB_DATABASE')!='')
           // {
                if (Schema::hasTable('forms')) {
           

                $forms = Form::all();
                foreach($forms as $fo)
                {
                    Shortcode::register($fo->shortcode, 'App\Shortcodes\CShortcode@custp');
                }

                $cforms = Cform::all();
                foreach($cforms as $cfo)
                {
                    
                    Shortcode::register($cfo->cshortcode, 'App\Shortcodes\CFShortcode@cfcustp');
                }

        }
          
        //}
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        Shortcode::register('b', BoldShortcode::class);
        Shortcode::register('i', 'App\Shortcodes\ItalicShortcode@custom');
        Shortcode::register('imgslider', 'App\Shortcodes\ImgsliderShortcode@custom1');
        Shortcode::register('homepage', 'App\Shortcodes\HomepageShortcode@customhomep');
        Shortcode::register('frontpage', 'App\Shortcodes\FrontpageShortcode@customfrontp');
        Shortcode::register('topmenu', 'App\Shortcodes\TopmenuShortcode@topm');
        Shortcode::register('bloglist', 'App\Shortcodes\BlogShortcode@bloglist');
        Shortcode::register('menulist', 'App\Shortcodes\MenuShortcode@menulist');
        Shortcode::register('responsivemenulist', 'App\Shortcodes\MenuShortcode@responsivemenulist');
        Shortcode::register('icohomelist', 'App\Shortcodes\ICOHomeShortcode@icohomelist');
        Shortcode::register('psubscribe', 'App\Shortcodes\PsubscribeShortcode@psubscribe');
        Shortcode::register('loanmenulist', 'App\Shortcodes\MenuShortcode@loanmenulist');
        Shortcode::register('politicsmenulist', 'App\Shortcodes\MenuShortcode@politicsmenulist');
        Shortcode::register('oxygenmenulist', 'App\Shortcodes\MenuShortcode@oxygenmenulist');
        Shortcode::register('aboutmenulist_transparent', 'App\Shortcodes\MenuShortcode@aboutmenulist_transparent');
        Shortcode::register('orangemenulist_transparent', 'App\Shortcodes\MenuShortcode@orangemenulist_transparent');
        Shortcode::register('multimenulist', 'App\Shortcodes\MenuShortcode@multimenulist');
        Shortcode::register('stickymenulist', 'App\Shortcodes\MenuShortcode@stickymenulist');
        Shortcode::register('cyanmenulist', 'App\Shortcodes\MenuShortcode@cyanmenulist');
        Shortcode::register('greenmenulist', 'App\Shortcodes\MenuShortcode@greenmenulist');

        Shortcode::register('fbubblemenulist', 'App\Shortcodes\MenuShortcode@fbubblemenulist');
        Shortcode::register('ftabbedmenulist', 'App\Shortcodes\MenuShortcode@ftabbedmenulist');

        Shortcode::register('ecommtheme1', 'App\Shortcodes\EcommerceShortcode@ecommtheme1');

        Shortcode::register('thememegamenu', 'App\Shortcodes\EcommerceShortcode@thememegamenu');
        

        for($i=1;$i<=110;$i++){
            $name = "customplain_".$i;
        Shortcode::register($name, 'App\Shortcodes\CustomplainShortcode@'.$name);
        }    
        

    }
}
