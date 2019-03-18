<!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="{{ asset(mix('js/admin.js')) }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script> 
    <script src="{{ asset('js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('js/colorcommon.js') }}"></script>
     <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/dataTables.responsive.js') }}"></script>

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
   
   