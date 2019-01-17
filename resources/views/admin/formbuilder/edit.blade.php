@extends('admin.layouts.keditorheader')


@section('content')

     
      @include('admin.includes.errors')

    <div class="page-header">
      	<h2>Update Widget Form :{{ $form->formname }}</h2>
            <hr>
      </div>

      <a href="{{route('admin.forms.index')}}" class="btn btn-primary btn-sm align-self-center"><b>Back</b></a>

      <a href="#" onClick="UpdateContent('{{route('admin.forms.update',['id'=>$form->id])}}', {{$form->id}})" class="btn btn-primary btn-sm align-self-center"><b>Update</b></a>

     
     
      <button onclick="copyFunction()">Copy</button>
 
   <meta name="csrf-token" content="{{ csrf_token() }}">


<br><br>
    <div class="form-group">
          <label for="tag">Form Name :</label>
          <input type="text" name="formname" id="formname" placeholder="Enter Form Name" value="{{ $form->formname }}"  class="form-control">
          <textarea id="myInputText" rows="1" cols="22" style="display:none;">{{{ $form->htmlcontent }}} </textarea><br/>
      </div>
@if($form->formname == "Home_Page")

  @if($form->htmlcontent == "")
  

<div class="edittest">
   
    <div id="content-area">
        
        
      <div data-type="container-content">
                 
            
          

            <div id="banner">
             
             <section>
                 <div data-type="container-content">
                 <section data-type="component-photo">
                    <div class="photo-panel">
                         <img src="{{asset('examples/snippets/img/somewhere_bangladesh.jpg')}}" style="display: inline-block;" height="" width="100%">
                     </div>
                    </section>
                  </div>
               </section>
                            
                
              
            </div>
            
        </div>

      </div>
          
            
         
       
   </div>
  
  
  @else
  
   
    <div class="edittest">
      
        {!! $form->htmlcontent !!}  
     
    </div> 
    @endif
    @else
  
 
    <div class="edittest">
      
        {!! $form->htmlcontent !!}  
     
    </div>  
  @endif

  
@endsection
@section('scripts')

 <script type="text/javascript" data-keditor="script">
          $(function () {
           
                $('#content-area').keditor({
                  
                    containerSettingEnabled: true,
                     snippetsUrl: "{{route('admin.forms.snippets')}}",
                    contentAreasSelector: '#banner',
                    containerSettingInitFunction: function (form, keditor) {
                        // Add control for settings form
                        form.append(
                            '<div class="form-horizontal">' +
                            '   <div class="form-group">' +
                            '       <div class="col-sm-12">' +
                            '           <label>Background color</label>' +
                            '           <input type="text" class="form-control txt-bg-color" />' +
                            '       </div>' +
                            '   </div>' +
                            '   <div class="form-group">' +
                            '       <div class="col-sm-12">' +
                            '           <label>Margin</label>' +
                            '           <input type="text" class="form-control txt-margin" />' +
                            '       </div>' +
                            '   </div>' +
                            '<div class="form-group">' +
                            '       <div class="col-sm-12">' +
                            '           <label>Image Padding</label>' +
                            '           <input type="text" class="form-control txt-ipadd" />' +
                            '       </div>' +
                            '   </div>' +
                            '</div>'
                        );
                        
                        // Add event handle for background color textbox
                        form.find('.txt-bg-color').on('change', function () {
                            // Get current setting container
                            var container = keditor.getSettingContainer();
                            // Find '.row' for setting background color
                            // Note: Make sure you have a div for setting background color
                            var row = container.find('.row');
                            var cc = container.find('.keditor-container-content');
                            // Set background color with value of textbox
                            row.css('background-color', this.value);
                            
                        });
                        form.find('.txt-margin').on('change', function () {
                            // Get current setting container
                            var container = keditor.getSettingContainer();
                            // Find '.row' for setting background color
                            // Note: Make sure you have a div for setting background color
                            var row = container.find('.row');
                            
                            // Set background color with value of textbox
                            row.css('background-color', this.value);
                            row.css('margin', this.value);
                            
                        });
                        form.find('.txt-ipadd').on('change', function () {
                            // Get current setting container
                            var container = keditor.getSettingContainer();
                            // Find '.row' for setting background color
                            // Note: Make sure you have a div for setting background color
                            
                            var cc = container.find('.keditor-container-content');
                            // Set background color with value of textbox
                            
                            
                            cc.css('padding', this.value);
                        });
                    },
                    containerSettingShowFunction: function (form, container, keditor) {
                        // Find '.row' div
                        // Note: Make sure you have a div for setting background color
                        var row = container.find('.row');
                        // User "prop()" method to get properties of HTML element
                        var backgroundColor = row.prop('style').backgroundColor || '';
                        var margin = row.prop('style').margin || '';
                        // User 'backgroundColor' for value of background color textbox
                        form.find('.txt-bg-color').val(backgroundColor);
                        form.find('.txt-margin').val(margin);
                        form.find('.txt-ipadd').val(margin);
                    },
                    containerSettingHideFunction: function (form, keditor) {
                        // Clean value of background color textbox when hiding settings form
                        form.find('.txt-bg-color').val('');
                        form.find('.txt-margin').val('');
                        form.find('.txt-ipadd').val('');
                    }
                });
            });



       function UpdateContent(newLocation, id)
        {
            
            var fileContent = $('.edittest').html();
            var formname = $('#formname').val();
            var id = id;
            //var data = "_token="+$('meta[name="csrf-token"]').attr('content')+"&formname='test'&htmlcontent="+fileContent;
           

             var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                formname:String(formname),
                htmlcontent:String(fileContent),
                id: id
            });

            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: newLocation,
           
            type: 'post',
            data:  data,
            
            success: function(result) {
            if(result == "success"){
                var newLocation = "{{ url('/admin/forms') }}";
              window.location.href= newLocation;
            }
           
            //alert(result);
            //window.location.href= url('/');
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.'+errorThrown);
                  }
              }
            });
            
        
        }

function copyFunction() {
  $('#myInputText').css('display','inline');
  var copyText = document.getElementById("myInputText");
  copyText.select();
  document.execCommand("copy");
  alert("copied");
  $('#myInputText').css('display','none');
}


       
        </script>

@endsection