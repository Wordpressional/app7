@extends('layoutsecom.front.mythemeapp')

@section('og')
    <meta property="og:type" content="product"/>
    <meta property="og:title" content="{{ $product->name }}"/>
    <meta property="og:description" content="{{ strip_tags($product->description) }}"/>
    @if(!is_null($product->cover))
        <meta property="og:image" content="{{ asset("storage/$product->cover") }}"/>
    @endif
@endsection

@section('content')
    <div class="container product cartptheme1">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                   
                    <li class="active">Start Up</li>
                </ol>
            </div>
        </div>
        
        @include('layoutsecom.front.themepackage')
    </div>
@endsection