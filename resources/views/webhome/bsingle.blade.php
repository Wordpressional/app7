@extends('layouts.frontend')

@section('contentfrontend')


{!! html_entity_decode($branding->pagebanner) !!}
 
 
      @include ('posts/showbsingle')
      

<div class="custom_footer_links">
<div class="container"> 
{!! html_entity_decode($branding->footer) !!}
</div>
</div>

@endsection
@section('css')
<style>
/* Post Title Background Color */

.posttitlebg, .bg-coverpost {
	background: {{ $colorsetting[4]->color }} !important;
}

/* Banner Background Color */
.postlead span {
	color: {{ $colorsetting[2]->color }} !important;
}

.postbgcolor
{
	background: {{ $colorsetting[3]->color }} !important;
}

.custom_footer_links
{
	background: {{ $colorsetting[10]->color }} !important;
}
</style>
@endsection
