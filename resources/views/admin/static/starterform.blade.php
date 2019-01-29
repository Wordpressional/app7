@extends('admin.layouts.master')

@section('content')
 <h1>Create 5 Pages Static Website (Starter Kit)</h1>


<form action="{{route('admin.static.savestarter')}}" method="POST">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div class="form-group">
  	 
    <label for="hpu">Home Page URL:</label>
    <input type="text" class="form-control" id="hpu" name="hpu" required="required" value="http://example.com/foldername">
  </div>
  <div class="form-group">
  	 <label for="nm1">Page Name 1:</label>
    <input type="text" class="form-control" id="nm1" name="nm1" required="required" value="page1.html">
    <label for="url1">Page URL 1:</label>
    <input type="text" class="form-control" id="url1" name="url1" required="required" value="http://example.com/foldername/page1">
  </div>
  <div class="form-group">
  	 <label for="nm2">Page Name 2:</label>
    <input type="text" class="form-control" id="nm2" name="nm2" required="required" value="page2.html">
    <label for="url2">Page URL 2:</label>
    <input type="text" class="form-control" id="url2" name="url2" required="required" value="http://example.com/foldername/page2">
  </div>

  <div class="form-group">
  	 <label for="nm3">Page Name 3:</label>
    <input type="text" class="form-control" id="nm3" name="nm3" required="required" value="page3.html">
    <label for="url3">Page URL 3:</label>
    <input type="text" class="form-control" id="url3" name="url3" required="required" value="http://example.com/foldername/page3">
  </div>

  <div class="form-group">
  	 <label for="nm4">Page Name 4:</label>
    <input type="text" class="form-control" id="nm4" name="nm4" required="required" value="page4.html">
    <label for="url4">Page URL 4:</label>
    <input type="text" class="form-control" id="url4" name="url4" required="required" value="http://example.com/foldername/page4">
  </div>

  <div class="form-group">
  	 <label for="nm5">Page Name 5:</label>
    <input type="text" class="form-control" id="nm5" name="nm5" required="required" value="page5.html">
    <label for="url5">Page URL 5:</label>
    <input type="text" class="form-control" id="url5" name="url5" required="required" value="http://example.com/foldername/page5">
  </div>

  <div class="form-group">
   <textarea rows="20" cols="100" class="starterjson" name="filej" readonly="readonly">{{ $filedata }}</textarea>
  </div>

 <input type="hidden" id="ttoken" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-default" name="startersubmit" value="Update JSON File">
</form>
<center>
<form action="{{route('admin.static.downloadstarter')}}" method="GET">
	<meta name="csrf-token" content="{{ csrf_token() }}">
 <input type="hidden" id="ttoken" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-success" name="downloadsubmit" value="Download Files">
</form>
<br><br>
</center>
@if($url)
<div style="background:skyblue; padding:15px; text-align: center; text-decoration: underline; font-weight: bold; color: black; font-size: 28px;">
 <a href="{{ $url }}">Download the Files</a>
</div>
@endif

@endsection