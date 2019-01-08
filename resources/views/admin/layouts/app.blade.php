<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if($data)
    <link rel="icon" href="{{asset($data['n_companyname']->favicon)}}" type="image/x-icon" />
    @endif
        
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth

    @if($data)
    <title>{{$data['n_companyname']->cname}}</title>
    @else
    <title></title>
    @endif

    <!-- Styles -->

    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link href="{{ asset(mix('css/admin.css')) }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    


    

</head>
<body class="admin-body bg-dark">
    @include('admin/shared/navbar')

    <div class="content-wrapper bg-light">
    <div id="app">
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

    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="{{ asset(mix('js/admin.js')) }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script> 
   
   
    <script type="text/javascript">
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
                    ['misc', ['codeview', 'fullscreen', 'undo', 'redo', 'help']]
                ],

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

    @yield('scripts')
</body>
</html>
