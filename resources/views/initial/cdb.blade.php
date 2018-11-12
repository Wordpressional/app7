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
        <li class="step__item active">
            <i class="step__icon">D</i>
        </li>
        
        <li class="step__divider"></li>
    </ul>
    <div class="main">
<p class="text-center">
Easy Configuration generation Wizard.
</p>
<form method="post" action="{{ route('config.generatedatabase') }}" class="tabs-wrap">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    

     <input type="text" name="domain_name" id="domain_name"  placeholder="Domain Name" />
      <input type="text" name="app_name" id="app_name"  placeholder="Folder Name" />
    <p class="text-center">
      <input type="submit" value=" Create mysql database " class="button"> 
    </p>
     
</form>
</div>
</div>
</div>
@endsection
