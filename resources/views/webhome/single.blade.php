 @extends('layouts.frontend')

@section('contentfrontend')
 @include ('layouts/innerpageheadernoslider')
 
      @include ('posts/showsingle')
      

@include ('layouts/innerpagefooter')

@endsection
