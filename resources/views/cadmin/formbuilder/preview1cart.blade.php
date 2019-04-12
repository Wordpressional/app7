<!DOCTYPE html>
<html lang="en">
    <head>
         @include('cadmin.layouts.compscripts.previewcsscart')
    @yield('css') 
 </head>
    <body>
   

    {!! $theme->tcontent !!} 
    <div id="app">
 </div>  
 
     
    @include('layouts.compscripts.general')
    @include('layouts.compscripts.themeone')
   
     @include ('layouts.shortcode-layout')
         @stack('inline-scripts')
    @include('layouts.compscripts.serviceworker')
       
        



</body>       
</html>
