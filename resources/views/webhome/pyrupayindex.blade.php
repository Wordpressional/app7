@if($branding)
     {!! html_entity_decode($branding->homepage) !!}
@else
	Welcome
	<a href="{{ route('mylogin') }}">Login to design this page</a>
@endif
    
