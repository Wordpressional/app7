 @extends('layouts.frontend')

@section('contentfrontend')
 @include ('layouts/innerpageheadernoslider')
  
      @include ('posts/allconftag')
 
@include ('layouts/innerpagefooter')

@endsection