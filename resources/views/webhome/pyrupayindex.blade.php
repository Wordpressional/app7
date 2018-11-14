@if($branding)
<div class="bg-mycolor1">
     {!! html_entity_decode($branding->homepage) !!}
</div>
@else
	Welcome to this website
	<a href="{{ route('mylogin') }}">Login to design this page</a>
@endif

<style>

/* Content area Color */
.bg-mycolor1 {
	background: {{ $colorsetting[1]->color }} !important;
}

</style>

    
