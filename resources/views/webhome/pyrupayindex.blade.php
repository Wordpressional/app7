@if($branding)

     {!! html_entity_decode($branding->homepage) !!}

@else
	Welcome to this website
	<a href="{{ route('admin.dashboard') }}">Login to design this page</a>
@endif

<style>

/* Content area Color */
.bg-mycolor1 {
	background: {{ $colorsetting[1]->color }} !important;
}

</style>
 @include('layouts.compscripts.contactcustformscript')


    
