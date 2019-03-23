@extends('cadmin.layouts.master')


@section('content')


 <div class="page-header">
      <h1>@lang('mailconfig.mcreate')</h1>
    </div>
<div class="panel panel-default">
      <div class="panel-body">
        <form action="{{ route('cadmin.mailconfig.updatemailconfig', $mailconf->id) }}" method="POST">
          
          {{ csrf_field() }}

            <div class="form-group">
              <label for="mailfname">Mail Config Filename</label>
              <input type="text" name="mailfname" value="{{ $mailconf->mailfname }}" class="form-control" readonly="readonly">
            </div>

            <div class="form-group">
                  <label for="authu">Auth Username</label>
                  <input type="text" name="authu" value="{{ $mailconf->authu }}" class="form-control">
            </div>

            <div class="form-group">
                  <label for="authp">Auth Password</label>
                  <input type="text" name="authp" value="{{ $mailconf->authp }}" class="form-control">
            </div>

           

            <div class="form-group">
                  <label for="frome">From Mail Address</label>
                  <input type="text" name="frome" value="{{ $mailconf->frome }}" class="form-control">
            </div>

            <div class="form-group">
                  <label for="toe">To Mail Address</label>
                  <input type="text" name="toe" value="{{ $mailconf->toe }}" class="form-control">
            </div>

             <div class="form-group">
                  <label for="texte">Plain Text Message</label>
                  <textarea name="texte" class="form-control">{{ $mailconf->texte }}</textarea>
            </div>

            <div class="form-group">
                  <label for="sube">Subject</label>
                  <input type="text" name="sube" value="{{ $mailconf->sube }}" class="form-control">
            </div>

            <div class="form-group">
                  <label for="wele">Message Body</label>
                  <textarea name="wele" class="form-control">{{ $mailconf->wele }}</textarea>
            </div>

            <div class="from-group">
               <div class="text-right">
                <button class="btn btn-success" type="submit">Update Mail Config File</button>
                        {{ link_to_route('cadmin.mailconfig.indexmailconfig', __('forms.actions.back'), [], ['class' => 'btn btn-secondary pull-left']) }}
               </div>
            </div>



        </form>
      </div>

 </div> 

@stop