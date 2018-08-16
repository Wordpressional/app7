<?php

namespace App\Providers;

use App\Shortcodes\BoldShortcode;

use Illuminate\Support\ServiceProvider;
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
        Shortcode::register('topmenu', 'App\Shortcodes\TopmenuShortcode@topm');
        Shortcode::register('bloglist', 'App\Shortcodes\BlogShortcode@bloglist');
        Shortcode::register('icohomelist', 'App\Shortcodes\ICOHomeShortcode@icohomelist');
        Shortcode::register('psubscribe', 'App\Shortcodes\PsubscribeShortcode@psubscribe');
        
        
         
        

    }
}
