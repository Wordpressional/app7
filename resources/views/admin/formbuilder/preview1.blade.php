
<!DOCTYPE html>
<html lang="en">
    <head>
         @include('admin.layouts.compscripts.previewcss')
    @yield('css') 
 </head>
    <body>
   

    {!! $form->htmlcontent !!} 
   
    
  
 

     
    @include('layouts.compscripts.general')
    @include('layouts.compscripts.themeone')
    @include('layouts.compscripts.independentcomponents')
    @include('layouts.compscripts.serviceworker')
       
         @include ('layouts.shortcode-layout')
         @stack('inline-scripts')



</body>       
</html>
