
<!DOCTYPE html>
<html lang="en">
    <head>
         @include('cadmin.layouts.compscripts.previewcss')
    @yield('css') 
 </head>
    <body>
   

    {!! $form->htmlcontent !!} 
    <div id="app">
 </div>  
    
  
 

     
    @include('layouts.compscripts.general')
    @include('layouts.compscripts.themeone')
    @include('layouts.compscripts.independentcomponents')
     @include ('layouts.shortcode-layout')
         @stack('inline-scripts')
    @include('layouts.compscripts.serviceworker')
       
        



</body>       
</html>
