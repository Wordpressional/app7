<div id="pysubscribe" class="container pradeepamains1">
    <div class="row">
        <div class="col-md-12">
<center><h3 class="myblue"><b> Subscribe Now </b></h3></center>
<br />
</div>
</div>
</div>

   



<div class="container">

     <div class="box no-border styleerror">
        <div class="box-tools">
            <p class="alert alert-danger s">
               Email field cannot be empty 
                <button type="button" class="close"  aria-label="Close"></button>
            </p>
        </div>
    </div>

    <div class="box no-border styleerror2">
        <div class="box-tools">
            <p class="alert alert-danger s">
               Email Already Exists 
                <button type="button" class="close"  aria-label="Close"></button>
            </p>
        </div>
    </div>


    <div class="box no-border stylesuccess" style="display: none;">
    <div class="box-tools">
        <p class="alert alert-success s">
            {{  __('newsletter.created') }}
            <button type="button" class="close" aria-label="Close"></button>
        </p>
    </div>
</div>

        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="boxnagashwini">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    
                    <div class="float">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <form class="form" action="{{ route('nfestore') }}" method="post" id="subscribenow">
                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            
                            <div class="form-group">
                                <label for="email" class="text-white">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                                
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="subscribe" class="btn btn-info btn-md subscribenow" value="Subscribe Now">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>
     $(function() {
                $('.box.styleerror').hide();
                 $('.box.styleerror2').hide();
                 $('.box.stylesuccess').hide();
          
         
            $('#subscribenow').submit(function(e) {
                 $('.box.styleerror').hide();
                 $('.box.styleerror2').hide();
                 $('.box.stylesuccess').hide();

            
                if($('#email').val() == "")
                {
                   

                    $('.box.styleerror').show();
                    return false;
                }

                $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                
                var url = e.target.action;  // get the target
                var formData = $(this).serialize() // get form data

                 $.post("{{ route('nfecheck') }}", formData, function(response){
                    
                $('.box.styleerror').hide();
                 $('.box.styleerror2').hide();
                 $('.box.stylesuccess').hide();

                 if(response == "present")

                    {
                        
                          $('.box.styleerror2').show();
                           setTimeout(function(){ 
                            console.log("present");
                            $('.box.styleerror2').show();
                            
                         }, 8000);
                        $('.box.styleerror2').show();

                    } 
                    return false;
                    });
                    
                    
                        $.post(url, formData, function (response) { // send; response.data will be what is returned
                             $('.box.styleerror').hide();
                            $('.box.styleerror2').hide();
                             $('.box.stylesuccess').hide();

                        $('.box.styleerror2').hide();
                        $('.box.stylesuccess').show();
                        setTimeout(function(){ 
                        console.log("success");
                        $('.box.stylesuccess').show();

                        }, 8000);
                         $('.box.stylesuccess').show();
                         return false;
                        
                        });
                    
                    
                    
                
                
                return false;
                
                });




            });



       



  </script>