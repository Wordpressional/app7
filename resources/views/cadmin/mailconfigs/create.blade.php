@extends('cadmin.layouts.master')


@section('content')

     
     

 <div class="page-header">
      <h1>@lang('mailconfig.mcreate')</h1>
    </div>
<div class="panel panel-default">
      <div class="panel-body">
      	<form action="{{ route('cadmin.mailconfig.storemailconfig') }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="mailfname">Mail Config Filename</label>
            	<input type="text" name="mailfname"  class="form-control">
            </div>

            <div class="form-group">
                  <label for="authu">Auth Username</label>
                  <input type="text" name="authu"  class="form-control">
            </div>

            <div class="form-group">
                  <label for="authp">Auth Password</label>
                  <input type="text" name="authp"  class="form-control">
            </div>

           

            <div class="form-group">
                  <label for="frome">From Mail Address</label>
                  <input type="text" name="frome"  class="form-control">
            </div>

            <div class="form-group">
                  <label for="toe">To Mail Address</label>
                  <input type="text" name="toe"  class="form-control">
            </div>

             <div class="form-group">
                  <label for="texte">Plain Text Message</label>
                  <textarea name="texte"  class="form-control"></textarea>
            </div>

            <div class="form-group">
                  <label for="sube">Subject</label>
                  <input type="text" name="sube"  class="form-control">
            </div>

            <div class="form-group">
                  <label for="wele">Message Body</label>
                  <textarea name="wele"  class="form-control"></textarea>
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Create Mail Config File</button>
                        {{ link_to_route('cadmin.mailconfig.indexmailconfig', __('forms.actions.back'), [], ['class' => 'btn btn-secondary pull-left']) }}
            	 </div>
            </div>



      	</form>
      </div>

 </div> 

@stop