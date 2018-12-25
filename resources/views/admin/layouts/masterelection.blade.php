
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth

    <title>{{ config('app.name', 'Pyrupay') }}</title>

    <!-- Styles -->

    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link href="{{ asset(mix('css/admin.css')) }}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('css/public.css')}}" />
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/publiccommon.css')}}" />
    <link href="{{ asset('webhome/css/customstyle.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('css/bootstrap-colorpicker.min.css')}}" />
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

 <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
 <link rel="stylesheet" href="{{asset('css/dataTables.responsive.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/scroller/1.5.1/css/scroller.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/election.css')}}" />

    <link rel="manifest" href="{{url('/manifest.json')}}">
   <link rel="manifest" href="{{url('/manifest.webmanifest')}}">

</head>
<body class="admin-body">
    <div class="wrapper">

        <div class="adminltehs">
        @include('admin.shared.electionheader')
        @include('admin.shared.electionsidebar')
        </div>
    <div class="content-wrapper bg-light">

    <div id="app1">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    @include('shared/alerts')
                        
                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="{{ asset(mix('js/admin.js')) }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
     <script src="//code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script> 
    <script src="{{ asset('js/bootstrap-colorpicker.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('js/colorcommon.js') }}"></script>
   
   
   
    <script type="text/javascript">
        

    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix  || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };
    
    // Define LFM summernote button
    var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
             container: false,
            contents: '<i class="note-icon-picture"></i>',
            tooltip: 'Insert image with filemanager',
            click: function() {
                //alert("hi");
                lfm({type: 'image', prefix: '/dynamic/laravel-filemanager'}, function(url, path) {
                    context.invoke('insertImage', url);
                });

            }
        });
        return button.render();
    };

    var HelloButton = function (context) {
      var ui = $.summernote.ui;
    
      // create button
      var button = ui.button({
        container: false,
        contents: '<i class="fa fa-child"/> Hello',
        tooltip: 'hello',
        click: function (e) {
          // invoke insertText method with 'hello' on editor module.
          context.invoke('editor.insertText', 'hello');
        }
      });
    
      return button.render();   // return button as jquery object
    }
    
     $(document).ready(function(){
    $('.summernote').summernote({
        toolbar: [   
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph','style']],
                    ['height', ['height']],
                    ['fontname', ['fontname']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video', 'hr']],
                    ['misc', ['codeview', 'fullscreen', 'undo', 'redo', 'help']],
                    ['popovers', ['lfm']],
                    ['mybutton', ['hello']]
                ],
             buttons: {
                lfm: LFMButton,
                 hello: HelloButton
            },
                popover: {
                     
                image: [
                        ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                link: [
                        ['link', ['linkDialogShow', 'unlink']]
                      ],

                
                
            },          
          

            height: 500,
            fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36', '48' , '64', '82', '150'],
            fontNames: [ 'Poppins', 'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica Neue', 
            'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Segoe UI', 'Roboto', 'Segoe UI Symbol' ],
            fontNamesIgnoreCheck: ['Poppins', 'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica Neue', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Segoe UI', 'Roboto', 'Segoe UI Symbol'],
        

        });
    });

        $.ajaxSetup({
        headers: {            
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')        
        }    
        })

        function loadUrl(newLocation, apitoken)
        {
            
            var token = $(this).data('token');
            //alert(hi);
            $.ajax({
            url: newLocation,
            dataType: 'json',
            type: 'post',
            data: {_method: 'delete', _token :token},

            beforeSend: function(xhr) {
                   xhr.setRequestHeader("Authorization", "Bearer " + apitoken);
                },

            success: function(result) {
            // Do something with the result
            $('.thumbhide').hide();
            //alert("success");
            }
            });
            
        return false;
        }

       


    </script>
   <script src="{{ asset('upup.min.js') }}"></script>
<script src="{{ asset('upup.sw.min.js') }}"></script>
<script>
UpUp.start({
  'content': 'You are Offline. Cannot reach site. Please check your internet connection.',
  'service-worker-url': "{{ asset('upup.sw.min.js') }}"
});

$(document).ready(function() {

if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register("{{ asset('upup.sw.min.js') }}")
      .then(function(reg){
        console.log("Yes, it did.");
      }).catch(function(err) {
        console.log("No it didn't. This happened: ", err)
      });
  }

 

});

</script>
<script>
$(document).ready(function() {
      
  $('.pollingdata').hide();
});
   

$('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    //minTime: '10',
    //maxTime: '12:00pm',
    //defaultTime: '11',
    startTime: '1:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

</script>
<script>

    function show(id) {
    
     if (id == 1) {

        var d = $('#pollingstartedinpt').val();
        
        document.getElementById('pollingstarted').innerHTML = "Polling Started at: "+ d;
        $('.pollingdata').show();
     }
     

     
   }


</script>


    @yield('scripts')
</body>
</html>
