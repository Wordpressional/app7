
<!DOCTYPE html>
<html lang="en">
    <head>
      @include('layouts.compscripts.headstyle')
        @yield('css')
 </head>
    <body>
    <div id="app">
    </div>
   
   @yield('content')
 
  
    
 
@include('layouts.compscripts.general')
 
@include('layouts.compscripts.themeone')


   @yield('scripts')
    @include('layouts.compscripts.serviceworker')
        
         

</body>       
</html>
