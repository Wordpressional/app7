@extends('layouts.frontendsite')

@section('contentfrontend')


{!! html_entity_decode($page->content) !!}

	

@endsection
@section('css')

@if($page->ptitlecolor)
<style>

.project_area:before
{
	background: transparent !important;
}
.overlay {
   background: transparent !important;
}

/* Background Page Color */

body.bg-light {
    background: {{ $page->pcontbgcolor }} !important;
}

/* Footer Background Color */

.copy_right_area1 {
    background: {{ $page->pcontbgcolor }} !important;
}

.leads h3 {
	color: {{ $page->ptitlecolor }} !important;
}
</style>
@endif
@endsection
@section('menuscripts')

    {!! Menu::scripts() !!}

     @include('layouts.compscripts.contactcustformscript')
 <script>
 $( document ).ready(function() {

  $(".mycElement").click(function() {
        your_ajax_function(); 
   });
  //alert("hi");
$('#testmail').click(function(){

var mfileconfname = document.getElementsByClassName('mfileconfname');  
var mfileconfname = mfileconfname[0].value;

  var base_path = "{{url('/')}}"; 
  //alert(base_path);
var Path1 = base_path+'/mailconfs/'+mfileconfname;
//alert(Path1);
  
 
 readTextFile(Path1);
 //alert(s);
});
});

 function readTextFile(file){
        var rawFile = new XMLHttpRequest();
        rawFile.open("GET", file, false);
        rawFile.onreadystatechange = function ()
        {
            if(rawFile.readyState === 4)
            {
                if(rawFile.status === 200 || rawFile.status == 0)
                {
                    var allText = rawFile.responseText;
                    //alert(allText);
                    doSomethingWithTheText(allText);
                }
            }
        }
        rawFile.send(null);
    }

 function doSomethingWithTheText(dataf1)
{
  ///alert(data);

  var mfileconfname = document.getElementsByClassName('mfileconfname');  
var mfileconfname = mfileconfname[0].value;

  var queryString = $('.cfs').serialize();
  //alert(queryString);
 var htmle= queryString.split("&");
 var htmle1= htmle.join("<br />");

 
  //alert(htmle1);
  var data = dataf1+'&htmle="'+htmle1+'"';

  //var new_str1 = dataf1.split("&");
  var new_str2 = dataf1.split("&htmle=")[0];
   
  var df = new_str2+'&htmle="'+htmle1+'"';
var df2 = df.split("mfileconfname")[0];
var df2 = df2+'"';
//alert(df2);

var dataf2 = data;

  //var datak = 'dataf="'+data+'"&mfileconfname="'+mfileconfname+'"';
  var datak = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                dataf:String(df2),
                mfileconfname:String(mfileconfname)
                
            });
//alert(datak);
  $.ajax({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  'Content-Type': 'application/json'
                  },

                url: "{{route('mail.updatemailconfig')}}",
            datatype : "application/json",
            contentType: "json",
            
            type: 'post',
            data:  datak,
    
         success: function(data) {
          //alert("File Upadated successfully");
           
        },
       
    });


   
   doSomethingWithTheNewText(df2);
    
 }
 function doSomethingWithTheNewText(dataf2)
{
  
$.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json',

              "accept": "application/json",
              "Access-Control-Allow-Methods": "GET",
              "Access-Control-Allow-Credentials": true,
              "Access-Control-Allow-Origin":"http://localhost:8123/mymail",
              "Access-Control-Allow-Headers": "Content-Type, Authorization"
              },

            url: 'http://localhost:8123/mymail',
            datatype : "application/json",
            contentType: "json",
            crossDomain: true,
            type: 'get',
            data:  dataf2,
    
         success: function(data) {
          alert("Sent email successfully");
           
        },
       
    });



$.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json',

              "accept": "application/json",
              "Access-Control-Allow-Methods": "GET",
              "Access-Control-Allow-Credentials": true,
              "Access-Control-Allow-Origin":"http://139.59.47.15:8123/mymail",
              "Access-Control-Allow-Headers": "Content-Type, Authorization"
              },

            url: 'http://139.59.47.15:8123/mymail',
            datatype : "application/json",
            contentType: "json",
            crossDomain: true,
            type: 'get',
            data:  dataf2,
    
         success: function(data) {
          alert("Sent email successfully");
           
        },
       
    });

$.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json',

              "accept": "application/json",
              "Access-Control-Allow-Methods": "GET",
              "Access-Control-Allow-Credentials": true,
              "Access-Control-Allow-Origin":"http://pyrupay.com/mailapp3/mymail",
              "Access-Control-Allow-Headers": "Content-Type, Authorization"
              },

            url: 'http://pyrupay.com/mailapp3/mymail',
            datatype : "application/json",
            contentType: "json",
            crossDomain: true,
            type: 'get',
            data:  dataf2,
    
         success: function(data) {
          alert("Sent email successfully");
           
        },
       
    });
 
 }


</script>


@endsection
