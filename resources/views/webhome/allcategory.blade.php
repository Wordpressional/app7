 @extends('layouts.frontend')

@section('contentfrontend')
 @include ('layouts/innerpageheadernoslider')
  
      @include ('posts/allcategory')
 
@include ('layouts/innerpagefooter')

@endsection