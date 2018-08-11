@extends('admin.layouts.master')

@section('content')
    <p>@lang('posts.show') : {{ link_to_route('webhome.single', route('webhome.single', $post), $post) }}</p>

    <!--@include('admin/posts/_thumbnail')-->

    {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' =>'PUT', 'files' => true]) !!}
        @include('admin/posts/_form')

        <div class="pull-left">
            {{ link_to_route('admin.posts.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    {!! Form::model($post, ['method' => 'DELETE', 'route' => ['admin.posts.destroy', $post], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.posts.delete')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('posts.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endsection
@section('scripts')

<script>
$(document).ready(function(){
     $('#first').css({'display':'block'}); 
       $('#template').change(function(){

           if ($(this).val() == 'Full width Template') {
               $('#full').css({'display':'block'}); 
               $(' #first, #three, #titlel').css({'display':'none'});            
           }
           else if ($(this).val() == '3 Column Template') {
               $('#three').css({'display':'block'}); 
               $('#first, #full,  #titlel').css({'display':'none'});            
           }
           else if ($(this).val() == 'Title Template') {
               $('#titlel').css({'display':'block'}); 
               $('#first, #full, #three').css({'display':'none'});            
           }
           else
           {
               $('#first').css({'display':'none'}); 
           }
        });
  });
</script>

@endsection

