
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
 

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('webhome/js/jquery-3.2.1.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('webhome/js/popper.min.js') }}"></script>
        <script src="{{ asset('webhome/js/bootstrap.min.js') }}"></script>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
         <script src="{{ asset('webhome/js/form-builder.min.js') }}"></script>
        <script src="{{ asset('webhome/js/form-render.min.js') }}"></script>
        
       <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
       <script src="{{ asset('webhome/editjs/editablejs.js') }}" type="text/javascript"></script>
       @yield('scripts')
    </body>       
</html>
