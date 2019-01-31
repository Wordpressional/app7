@extends('layouts.frontend')

@section('contentfrontend')


{!! html_entity_decode($branding->pagebanner) !!}
 
 
     @include ('posts/articles')
      

<div class="custom_footer_links">
<div class="container"> 
{!! html_entity_decode($branding->footer) !!}
</div>
</div>

@endsection
@section('css')
@if($colortest)
<style>
/* Post Title Background Color */

.posttitlebg, .bg-coverpost {
	background: {{ $colorsetting[4]->color }} !important;
}
.hfont {
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

.readmorebtn
{
	
	color: {{ $colorsetting[5]->color }} !important;

}
.readmorebtn
{

background: {{ $colorsetting[6]->color }} !important;

}

.card-separator, .card-green
{
	border-top: 2px solid {{ $colorsetting[7]->color }} !important;
}

.link11 a
{
	
	color: {{ $colorsetting[7]->color }} !important;

}
.link11 a:hover
{
     color: {{ $colorsetting[6]->color }} !important;

}
.line11{
		border-top:1px solid {{ $colorsetting[7]->color }};
}
.lead span {
	color: {{ $colorsetting[0]->color }} !important;
}
@endif
</style>
@endsection