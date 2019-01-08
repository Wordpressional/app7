
<!DOCTYPE html>
<html lang="en">
    <head>
      @include('layouts.compscripts.headstyle')
        @yield('css')
 </head>
    <body>
    <div id="app">
    <div class="bg-mycolor1">     
   <div class="rempm">
    
   
    
    @yield('content')
  </div>
  
   
       
    </div>
  </div>
   
 
@include('layouts.compscripts.general')
 
@include('layouts.compscripts.themeone')

   @yield('scripts')
    @include('layouts.compscripts.serviceworker')
        
         

</body>       
</html>
