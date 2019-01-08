   

<script>
alert("hi............");



 
  $(document).ready(function(){
   //alert("hi");
    



           
     var fbTemplate =  '{!! $cforms->htmlelements !!}' ;
     //console.log(fbTemplate);
     formRenderOpts = {
      dataType: 'json',
      formData: fbTemplate
    };
     var renderedForm = $('.rendered-form');
    renderedForm.formRender(formRenderOpts);

    //console.log(renderedForm.html());
    $("button[type=submit]", $(".rendered-form").parents("form")).addClass('{{ $cforms->cshortcode }}');

    

    
    var f = null;
    let i = 0;

    

   
    

     

});
$(document).ready(function(){

const arrayToObject = (array) =>
   array.reduce((obj, item) => {
     obj[item] = item
     return obj
   }, {})
  
  

 your_ajax_function = function(){

  var files = new Array();
  var fname = new Array();
   var files1 = {};
   let file_data = new Array();

   var fobject = {};
    var fobject1 = [{}];
    var str;
    var res;

var elems = document.querySelectorAll("[id^=file]");

elems.forEach(function (elem, index) {
    console.log(index); // index
    console.log(elem); // value
    files.push(elems[index].id);
    console.log($("#"+elems[index].id).val());

    str = $("#"+elems[index].id).val();
    res = str.substr(12);
   fname.push(res);

  });

  files.forEach(function(file) {
        console.log(file);
        file_data.push($("#"+file).prop('files')[0]);
  });

  
  var fn = fname.join(','); 

console.log("fn"+String(fn));

$('.files').val(fn);

console.log("filedata"+file_data);

for(i=0; i<file_data.length; i++)
    {
      //f1 = file_data[1].name;
     //console.log(f1);
      f = file_data;
     console.log(f);
     fobject = arrayToObject(f);
     if(fobject)
     fobject1.push(fobject);
      
    }
    //console.log(fobject1[2]);

    var result = Object.keys(fobject1).map(function(key) {
    return [Number(key), fobject1[key]];
    });

    console.log(result);


 var $form = $('.my-form');


   var data = getFormData($form);
     data = JSON.stringify(data);
     var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                data: data,
                files: files,
                fn: fn
                
            });

     console.log(data);
        alert(data);
   
            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: "{{route('cforms.datacfsave')}}",
           
            type: 'POST',
            data: data,
           contentType: false,
            processData: false, 
            
              
            success: function(result) {
              //alert(result);
              console.log(result);
                  $('#successalert').css("display", "block");

                     $('#successalert').text("Successfully Saved");
                     $('html').scrollTop(0);
                     setTimeout(function(){ 

                      $(".my-form")[0].reset();
                      $('#successalert').css("display", "none"); }, 3000);

            },
             error: function (jqXHR, textStatus, errorThrown) {
              
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.'+errorThrown);
                  }
              }
            }); 

   //});              
   //return false;

 
    files.forEach(function(file) {
        console.log(file);
         //file_data.push($("#"+file).prop('files')[0]);

        if ($("#"+file).val() != '') {
          //img = $("#"+file).prop('files')[0];
          img = $("#"+file)[0].files[0];
          console.log(img);
            upload(img, file);

        }
    
   });
   
 
   
  }

});
  
upload = function(img, filename)
{

  var fobject = {};
    var fobject1 = [{}];

  var token = document.getElementById('ttoken').value;
  //alert("img");
            console.log("imgggg");
            console.log(img);
             //console.log(img.files);
         var file_data = img;
    if(file_data){
    var fileName = file_data.name;
    var fileSize = file_data.size;
    alert("Uploading: "+fileName+" @ "+fileSize+"bytes");
    }
    var table_name = $('.table_name').val();

        var form_data = new FormData();
        form_data.append('filed', file_data);
        form_data.append('fname', filename);
        form_data.append('_token', token);
        form_data.append('filenameorig', fileName);
        form_data.append('table_name', table_name);

       

  console.log(form_data);


let jsonObject = {};

for (const [key, value]  of form_data.entries()) {
    jsonObject[key] = value;
}

console.log('jsonobject', jsonObject);

  var object = {};
  var json123 = {};
  
form_data.forEach(function(value, key){
    object[key] = value;
    if(key == "filed" || key == "_token" )
    {
      json123[key] = value;
    }
    console.log(key, "-",value);

});
var replacer = function(k, v) { if (v === undefined || v === "") { return "0"; } return v; };

var json = json123;
var jsonstring = JSON.stringify(jsonObject, replacer);
console.log('jsonstring', jsonstring);

console.log("json",json);



    $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              
              },

            url: "{{route('cforms.datacfsavemedia')}}",
           
            type: 'POST',
            data: form_data,
           contentType: false,
            processData: false, 
            
           

            success: function(result) {
              //alert(result);

              console.log("result");
              console.log(result);
                  $('#successalert').css("display", "block");

                     $('#successalert').text("Successfully Saved");

                     setTimeout(function(){ 
                      $('html').scrollTop(0);
                      $(".my-form")[0].reset();
                      $('#successalert').css("display", "none"); }, 3000);

            },
             error: function (jqXHR, textStatus, errorThrown) {
              alert("hi++++++");
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.'+errorThrown);
                  }
              }
            }); 
}


  function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

</script>
