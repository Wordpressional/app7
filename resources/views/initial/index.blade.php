 @extends('layouts.baremaster')
 @section('container')
<link href="http://localhost/dynamic/installer/css/style.min.css" rel="stylesheet"/>
<div class="master">
<div class="box">
    <div class="header">
<h1 class="header__title">    Initial Setup</h1>
    </div>
    <ul class="step">
        <li class="step__divider"></li>
        <li class="step__item ">
            <i class="step__icon">D</i>
        </li>
        <li class="step__divider"></li>
        <li class="step__item  active ">
         <i class="step__icon">C</i>
                                </li>

        <li class="step__divider"></li>
    </ul>
    <div class="main">
<p class="text-center">
Easy Configuration generation Wizard.
</p>
<form method="post" action="{{ route('config.generateconfig') }}" class="tabs-wrap">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <select name="environment" id="dropdown_changetwo">
        <option value="">Select Installation Type</option>
        <option value="domain">Domain Installation</option>
        <option value="subfolder">Subfolder Installation</option>
       
    </select>

     <input type="text" name="domain_name" id="domain_name" style="display:none;" placeholder="Domain Name" />
      <input type="text" name="app_name" id="app_name" style="display:none;" placeholder="Folder Name" />
    <p class="text-center">
      <input type="submit" value=" Create server configuration files " class="button"> 
    </p>
     <p class="text-center">
      <a href="createdatabase" class="button">
        Skip this step if it not on ubuntu
       
      </a>
    </p>
</form>
</div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('examples/plugins/jquery-1.11.3/jquery-1.11.3.min.js')}}"></script>
<script type="text/javascript">
    alert("hi");
 $(document).ready(function(){

     $("#dropdown_changetwo").change(function(){
      //alert("Selected value is : " + document.getElementById("dropdown_change").value);
      //var imgsliderw = $('#imgsliderw').html("k");
      var dc = document.getElementById("dropdown_changetwo").value;
      alert(dc);
      if(dc == "domain"){
        $('#domain_name').css("display","inline");
        $('#app_name').css("display","none");
      } 
      else 
      {
         $('#domain_name').css("display","none");
        $('#app_name').css("display","inline");
      }
  });
});
</script>
@endsection