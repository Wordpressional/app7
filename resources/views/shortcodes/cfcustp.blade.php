@extends('layouts.keditorheader')


@section('content')

<div class="col-md-12 col-lg-12">
    	<div id="successalert" style="display:none; padding-bottom:35px;" class="alert alert-success "></div>

    	<form class="my-form" enctype="multipart/form-data" method="POST" onSubmit="your_ajax_function(); return false;">
      {!! $cforms->htmlcontents !!} 

      
      <input type="hidden" id="ttoken" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="table_name" class="table_name" id="{{ $cforms->cshortcode }}" value="{{ $cforms->cshortcode }}" />
      <input type="hidden" name="files" class="files" value="" />
 		 </form>
  	
</div>   
   
@endsection   

@section('scriptscon')

@include('layouts.compscripts.contactformscript')
@endsection