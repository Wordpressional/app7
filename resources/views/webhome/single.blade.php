@extends('layouts.frontend')

@section('contentfrontend')


{!! html_entity_decode($branding->pagebanner) !!}
 
 
      @include ('posts/showsingle')
      

@include ('layouts/innerpagefooter')

@endsection
@section('css')
<style>
/* Banner Background Color */
.postlead span {
	color: {{ $colorsetting[2]->color }} !important;
}

.postbgcolor
{
	background: {{ $colorsetting[3]->color }} !important;
}
</style>
@endsection