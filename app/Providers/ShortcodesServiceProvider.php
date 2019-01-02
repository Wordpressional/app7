<?php

namespace App\Providers;

use App\Shortcodes\BoldShortcode;

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
                //if (Schema::hasTable('forms')) {
           

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

            //}
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
        Shortcode::register('icohomelist', 'App\Shortcodes\ICOHomeShortcode@icohomelist');
        Shortcode::register('psubscribe', 'App\Shortcodes\PsubscribeShortcode@psubscribe');

        for($i=0;$i<12;$i++){
            $name = "customplain_".$i;
        Shortcode::register($name, 'App\Shortcodes\CustomplainShortcode@'.$name);
        }
         
        
        
         
        

    }
}
