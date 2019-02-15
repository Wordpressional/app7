<!DOCTYPE html>
<html lang="en">
<head>
        @include('layouts.compscripts.headstyle')
        @yield('css')
 </head>
    <body class="bg-light">
        <div id="app">
       @yield('contentfrontend')

         </div>    
      
    @include('layouts.compscripts.general')
 

    @include('layouts.compscripts.themeone')
    @yield('scripts')
    @include('layouts.compscripts.serviceworker')
        
         
    @stack('inline-scripts')
   
    </body>      
</html>
