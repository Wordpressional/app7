<!DOCTYPE html>
<html lang="en">
    <head>
     @include('layouts.compscripts.headstyle')
        @yield('css')
		
 </head>
    <body>
       
      
 
@include('layouts.compscripts.general')
 @yield('scripts')
    @include('layouts.compscripts.themeone')
    @include('layouts.compscripts.serviceworker')
       
         @include ('layouts.shortcode-layout')
         @stack('inline-scripts')
		
    </body>       
</html>
