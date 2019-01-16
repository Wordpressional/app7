
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
      @include('layouts.compscripts.headstyle')
      @yield('css')
 </head>
    <body>
 
    @yield('content')
    
    <div id="app">
    </div>
 

   @include('layouts.compscripts.general')
 


   @yield('scripts')
   @include('layouts.compscripts.serviceworker')
        
         
    
    </body>       
</html>
