@extends('admin.layouts.master')


@section('content')

     


       <div class="page-header">
      	<h1>@lang('mailconfig.mview'):{{$mailconf->mailfname}}</h1>
      </div>
<div class="panel panel-default">
      <div class="panel-body">
      File contents: <br /> {{ $content }}
      </div>

  </div>

@stop
