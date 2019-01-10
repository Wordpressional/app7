@extends('admin.layouts.cformheader')


@section('content')
<div class="page-header">
        <h2>Create  Contact Form </h2>
            <hr>
      </div>

<a href="{{route('admin.cforms.index')}}" class="btn btn-primary btn-sm align-self-center"><b>Back</b></a>
@if( $cform->cstatus  == "Table_Created")
   <a href="#" id="UpdateJSON" class="btn btn-primary btn-sm align-self-center form-builder-save"><b>Update</b></a>

   

   
@endif
  <a href="#" id="setData" class="btn btn-primary btn-sm align-self-center form-builder-save" style="display: none;"><b>Load Form</b></a>

   
   @if( $cform->cstatus  != "Table_Created")
   <a href="#" id="UpdateDB" class="btn btn-primary btn-sm align-self-center form-builder-save"><b>Create Table</b></a> 
   @endif
    
  
   <meta name="csrf-token" content="{{ csrf_token() }}">

 
<br><br>
 <div id="successalert" style="display:none; padding-bottom:35px;" class="alert alert-success  form-control">
 
</div>


    <div class="form-group">
                <label for="tag">Contact Form Name :</label>
                <input type="text" name="cformname" id="cformname" value="{{ $cform->cformname }}" class="form-control">
            </div>

<div id="testcreate">

 
<div id="build-wrap"></div>

<div id="renderedform"></div>

 
    
  </div>   
@endsection
@section('scripts')

 <script type="text/javascript">

  var fbEditor = document.getElementById('build-wrap');
  var fbOptions = {
      showActionButtons: false,
  
  },
    formBuilder = $(fbEditor).formBuilder(fbOptions);

    
  
    $(document).ready(function () {

      
      
     
    $("#setData").click(function (e) {
        e.preventDefault();

        //alert("hi");
        var fbTemplate =  '{!! $cform->htmlelements !!}' ;
        console.log(fbTemplate);
        var cformname = $('#cformname').val();
        formBuilder.actions.setData(fbTemplate);

    });
    $('#setData').trigger('click');


    $(".del-button").click(function(){
        //alert(this.id);

        
         var cformname = $('#cformname').val();
         var cshortcode = '{{ $cform->cshortcode }}' ;
        var colcount = '{{ $cform->colcount }}' ;
      
            delid = this.id;
            //console.log(formBuilder.actions.getData()[countarr-1].name);
            var fieldname = $(this.id).attr("name");
            var delidnew = delid.replace('del_', '');
            //alert(delidnew);
            var check = $('#'+delidnew +' .prev-holder').find("input, select").attr("name");
             //alert(check);
            //alert(check.attr("name"));
            //check = check.attr("name");
            var newStr = check.replace('-preview', '');
            //alert(newStr);
            if(fieldname == "" || fieldname == undefined){
              fieldname = "";
            }
           // $("[name="+formBuilder.actions.getData()[countarr-1].name+"]").addClass(formBuilder.actions.getData()[countarr-1].name);

            var data = JSON.stringify({
                    _token:String($('meta[name="csrf-token"]').attr('content')),
                    fieldname: newStr,
                    cformname: cformname,
                    cshortcode:cshortcode

                });

          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  'Content-Type': 'application/json'
                  },

                url: "{{route('admin.cforms.remcolftable',['id'=>$cform->id])}}",
               
                type: 'post',
                data:  data,
                
              
                success: function(result) {
                  $('#successalert').css("display", "block");

                     $('#successalert').text("Successfully updated");

                     setTimeout(function(){ $('#successalert').css("display", "none"); }, 3000);

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }
                });

           });

if( "{{$cform->cstatus}}"  == "Table_Created")
{
    var trash = document.getElementById('trash');
    trash.onclick = function(){
    formBuilder.actions.clearFields();
  };
}

});

if( "{{$cform->cstatus}}"  == "Table_Created")
{

document.getElementById('UpdateJSON').addEventListener('click', function() {
     //alert(formBuilder.actions.getData('json'));
     console.log(formBuilder.formData);

        data1 = JSON.parse(formBuilder.formData);
        console.log(data1.length);

        var countarr = data1.length;

    //alert(countarr);

     var cformname = $('#cformname').val();
     var fileContent = formBuilder.actions.getData('json');

     var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                cformname:String(cformname),
                htmlelement:fileContent,
                colcount:countarr
            });

      $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: "{{route('admin.cforms.update',['id'=>$cform->id])}}",
           
            type: 'post',
            data:  data,
            
          
            success: function(result) {
              $('#successalert').css("display", "block");

                 $('#successalert').text("Successfully updated the contact form");

                 setTimeout(function(){ $('#successalert').css("display", "none"); }, 3000);

            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.'+errorThrown);
                  }
              }
            });

        
    });
}

      /*document.getElementById('build-wrap').addEventListener('click', function(){
          
      

        console.log(formBuilder.formData);

        data1 = JSON.parse(formBuilder.formData);
        console.log(data1.length);

        var countarr = data1.length;
        var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
              
                colcount:countarr
            });

      $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: "{{route('admin.cforms.ucolcount',['id'=>$cform->id])}}",
           
            type: 'post',
            data:  data,
            
          
            success: function(result) {
              $('#successalert').css("display", "block");

                 $('#successalert').text("Successfully updated");

                 setTimeout(function(){ $('#successalert').css("display", "none"); }, 3000);

            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.'+errorThrown);
                  }
              }
            });

      });*/

      

      if( "{{$cform->cstatus}}"  != "Table_Created")
      {

      document.getElementById('UpdateDB').addEventListener('click', function() {
     //alert(formBuilder.actions.getData('json'));



     console.log(formBuilder.formData);

        data1 = JSON.parse(formBuilder.formData);
        console.log(data1.length);

        var countarr = data1.length;

         var cshortcode = '{{ $cform->cshortcode }}' ;
        var colcount = '{{ $cform->colcount }}' ;
       var diff = countarr - colcount;
         
         /*var arry = [];
            console.log(formBuilder.actions.getData()[countarr-1].name);
            for(var i=0; i<countarr; i++)
             { 
              var fieldname = formBuilder.actions.getData()[i].name;
                arry.push(fieldname);

             }
          
            console.log(arry);*/

          var arry = '{{ $cform->tabfields }}' ;
          var arry = arry.split(",");  

     var cshortcode = '{{ $cform->cshortcode }}' ;
     var colcount = '{{ $cform->colcount }}' ;
     var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
              
                cshortcode: cshortcode,
                colcount: colcount,
                fieldnames: arry


            });

      $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: "{{route('admin.cforms.operate',['id'=>$cform->id])}}",
           
            type: 'post',
            data:  data,
            
          
            success: function(result) {
              $('#successalert').css("display", "block");

                 $('#successalert').text("Successfully created shortcode");

                 setTimeout(function(){ $('#successalert').css("display", "none");


                   var newLocation = "{{ url('/admin/cforms') }}";
                  window.location.href= newLocation;

                  }, 3000);


            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.'+errorThrown);
                  }
              }
            });
        }); 

     } 

     document.addEventListener('fieldAdded', function(){
   
     console.log(formBuilder.formData);

        data1 = JSON.parse(formBuilder.formData);
        console.log(data1.length);

        var countarr = data1.length;

         var cshortcode = '{{ $cform->cshortcode }}' ;
        var colcount = '{{ $cform->colcount }}' ;
       var diff = countarr - colcount;
         
            console.log(formBuilder.actions.getData()[countarr-1].name);
            var fieldname = formBuilder.actions.getData()[countarr-1].name;
            if(fieldname == "" || fieldname == undefined){
              fieldname = "";
            }
           // $("[name="+formBuilder.actions.getData()[countarr-1].name+"]").addClass(formBuilder.actions.getData()[countarr-1].name);

            var data = JSON.stringify({
                    _token:String($('meta[name="csrf-token"]').attr('content')),
                    fieldname: fieldname,
                    colcount:countarr,
                    cshortcode:cshortcode

                });

          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  'Content-Type': 'application/json'
                  },

                url: "{{route('admin.cforms.ucolcount',['id'=>$cform->id])}}",
               
                type: 'post',
                data:  data,
                
              
                success: function(result) {
                  $('#successalert').css("display", "block");

                     $('#successalert').text("Successfully updated");

                     setTimeout(function(){ $('#successalert').css("display", "none"); }, 3000);

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }
                });

     
     });

     

       



        </script>

      

@endsection