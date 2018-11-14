@if($branding)
     {!! html_entity_decode($branding->homepage) !!}
@else
	Welcome to this website
	<a href="{{ route('mylogin') }}">Login to design this page</a>
@endif
    
