@extends('layoutsecom.front.homeapp')



@section('content')
<div id="pyshop" class="container pradeepamains1">
	<div class="row">
		<div class="col-md-12">
<center><h3 class="myblue"><b> SHOP PWA TEMPLATES </b></h3></center>
<br /><br />
</div>
</div>
</div>
<div class="container">
	<div class="row">

<div class="col-md-3">
<ul id="filters" class="clearfix">
	<li><span class="filter active" data-filter=".{{ $cat1->slug }}, .{{ $cat2->slug }}, .{{ $cat3->slug }}, .{{ $cat4->slug }}, .{{ $cat5->slug }}, .{{ $cat6->slug }}, .{{ $cat7->slug }}, .{{ $cat8->slug }}, .{{ $cat9->slug }}">All</span></li>
	<li><span class="filter active" data-filter=".pwa">{{ $cat0->name }}</span></li>
	
	<li><span class="filter" data-filter=".{{ $cat1->slug }}">{{ $cat1->name }}</span></li>
	<li><span class="filter" data-filter=".{{ $cat2->slug }}">{{ $cat2->name }}</span></li>
	<li><span class="filter" data-filter=".{{ $cat3->slug }}">{{ $cat3->name }}</span></li>
	<li><span class="filter" data-filter=".{{ $cat4->slug }}">{{ $cat4->name }}</span></li>
	<li><span class="filter" data-filter=".{{ $cat5->slug }}">{{ $cat5->name }}</span></li>
	<li><span class="filter" data-filter=".{{ $cat6->slug }}">{{ $cat6->name }}</span></li>
	<li><span class="filter" data-filter=".{{ $cat7->slug }}">{{ $cat7->name }}</span></li>
	<li><span class="filter" data-filter=".{{ $cat8->slug }}">{{ $cat8->name }}</span></li>
	<li><span class="filter" data-filter=".{{ $cat9->slug }}">{{ $cat9->name }}</span></li>
</ul>
</div>
<div class="col-md-9">
<div id="portfoliolist">

	 @if($cat0->products->isNotEmpty())
	 @foreach($products0 as $product0)
	<div class="portfolio pwa" data-cat="pwa">
		<div class="portfolio-wrapper">				
			 
            @php $imgt0 = 'storage/'.$product0->cover; @endphp
            
                        @if(isset($product0->cover))
                            <img src="{{ asset($imgt0)}}" alt="{{ $product0->name }}" class="img-bordered img-responsive">
                        @else
                            <img src="{{ asset('themes/screenshots/t1.jpg')}}" alt="{{ $product0->name }}" class="img-bordered img-responsive" />
                        @endif
                 
			<div class="label">
				<div class="label-text">
					<a class="text-title" href="{{ route('front.get.themeproduct', str_slug($product0->slug)) }}">{{ $product0->name }}</a>
					<span class="text-category">{{ $cat0->name }}</span>
				</div>
				@foreach($imarr0 as $simg0)
				@if($simg0->product_id == $product0->id)
				@php $imgmt0 = 'storage/'.$simg0->src; @endphp
				@break;
				@endif	
				@endforeach
				<div class="diys-template-thumb-mobile"><img src="{{ asset($imgmt0)}}" class="mimg"></div>
				
				<div class="label-bg"></div>
			</div>
		</div>
	</div>
	@endforeach	
	@endif			

	 @if($cat1->products->isNotEmpty())
	 @foreach($products1 as $product1)
	<div class="portfolio {{ $cat1->slug }}" data-cat="{{ $cat1->slug }}">
		<div class="portfolio-wrapper">				
			 
            @php $imgt1 = 'storage/'.$product1->cover; @endphp
            
                        @if(isset($product1->cover))
                            <img src="{{ asset($imgt1)}}" alt="{{ $product1->name }}" class="img-bordered img-responsive">
                        @else
                            <img src="{{ asset('themes/screenshots/t1.jpg')}}" alt="{{ $product1->name }}" class="img-bordered img-responsive" />
                        @endif
                 
			<div class="label">
				<div class="label-text">
					<a class="text-title" href="{{ route('front.get.themeproduct', str_slug($product1->slug)) }}">{{ $product1->name }}</a>
					<span class="text-category">{{ $cat1->name }}</span>
				</div>
				@foreach($imarr1 as $simg1)
				@if($simg1->product_id == $product1->id)
				@php $imgmt1 = 'storage/'.$simg1->src; @endphp
				@break;
				@endif	
				@endforeach
				<div class="diys-template-thumb-mobile"><img src="{{ asset($imgmt1)}}" class="mimg"></div>
				
				<div class="label-bg"></div>
			</div>
		</div>
	</div>
	@endforeach	
	@endif			

	@if($cat2->products->isNotEmpty())
	 @foreach($products2 as $product2)
	<div class="portfolio {{ $cat2->slug }}" data-cat="{{ $cat2->slug }}">
		<div class="portfolio-wrapper">				
			 
            @php $imgt2 = 'storage/'.$product2->cover; @endphp
            
                        @if(isset($product2->cover))
                            <img src="{{ asset($imgt2)}}" alt="{{ $product2->name }}" class="img-bordered img-responsive">
                        @else
                            <img src="{{ asset('themes/screenshots/t1.jpg')}}" alt="{{ $product2->name }}" class="img-bordered img-responsive" />
                        @endif
                 
			<div class="label">
				<div class="label-text">
					<a class="text-title" href="{{ route('front.get.themeproduct', str_slug($product2->slug)) }}">{{ $product2->name }}</a>
					<span class="text-category">{{ $cat2->name }}</span>
				</div>
				@foreach($imarr2 as $simg2)
				@if($simg2->product_id == $product2->id)
				@php $imgmt2 = 'storage/'.$simg2->src; @endphp
				@break;
				@endif	
				@endforeach
				<div class="diys-template-thumb-mobile"><img src="{{ asset($imgmt2)}}" class="mimg"></div>
				
				<div class="label-bg"></div>
			</div>
		</div>
	</div>
	@endforeach	
	@endif			


	@if($cat3->products->isNotEmpty())
	 @foreach($products3 as $product3)
	<div class="portfolio {{ $cat3->slug }}" data-cat="{{ $cat3->slug }}">
		<div class="portfolio-wrapper">				
			 
            @php $imgt3 = 'storage/'.$product3->cover; @endphp
            
                        @if(isset($product3->cover))
                            <img src="{{ asset($imgt3)}}" alt="{{ $product3->name }}" class="img-bordered img-responsive">
                        @else
                            <img src="{{ asset('themes/screenshots/t1.jpg')}}" alt="{{ $product3->name }}" class="img-bordered img-responsive" />
                        @endif
                 
			<div class="label">
				<div class="label-text">
					<a class="text-title" href="{{ route('front.get.themeproduct', str_slug($product3->slug)) }}">{{ $product3->name }}</a>
					<span class="text-category">{{ $cat3->name }}</span>
				</div>
				@foreach($imarr3 as $simg3)
				@if($simg3->product_id == $product3->id)
				@php $imgmt3 = 'storage/'.$simg3->src; @endphp
				@break;
				@endif	
				@endforeach
				<div class="diys-template-thumb-mobile"><img src="{{ asset($imgmt3)}}" class="mimg"></div>
				
				<div class="label-bg"></div>
			</div>
		</div>
	</div>
	@endforeach	
	@endif			

		@if($cat4->products->isNotEmpty())
	 @foreach($products4 as $product4)
	<div class="portfolio {{ $cat4->slug }}" data-cat="{{ $cat4->slug }}">
		<div class="portfolio-wrapper">				
			 
            @php $imgt4 = 'storage/'.$product4->cover; @endphp
            
                        @if(isset($product4->cover))
                            <img src="{{ asset($imgt4)}}" alt="{{ $product4->name }}" class="img-bordered img-responsive">
                        @else
                            <img src="{{ asset('themes/screenshots/t1.jpg')}}" alt="{{ $product4->name }}" class="img-bordered img-responsive" />
                        @endif
                 
			<div class="label">
				<div class="label-text">
					<a class="text-title" href="{{ route('front.get.themeproduct', str_slug($product4->slug)) }}">{{ $product4->name }}</a>
					<span class="text-category">{{ $cat4->name }}</span>
				</div>
				@foreach($imarr4 as $simg4)
				@if($simg4->product_id == $product4->id)
				@php $imgmt4 = 'storage/'.$simg4->src; @endphp
				@break;
				@endif	
				@endforeach
				<div class="diys-template-thumb-mobile"><img src="{{ asset($imgmt4)}}" class="mimg"></div>
				
				<div class="label-bg"></div>
			</div>
		</div>
	</div>
	@endforeach	
	@endif			

	@if($cat5->products->isNotEmpty())
	 @foreach($products5 as $product5)
	<div class="portfolio {{ $cat5->slug }}" data-cat="{{ $cat5->slug }}">
		<div class="portfolio-wrapper">				
			 
            @php $imgt5 = 'storage/'.$product5->cover; @endphp
            
                        @if(isset($product5->cover))
                            <img src="{{ asset($imgt5)}}" alt="{{ $product5->name }}" class="img-bordered img-responsive">
                        @else
                            <img src="{{ asset('themes/screenshots/t1.jpg')}}" alt="{{ $product5->name }}" class="img-bordered img-responsive" />
                        @endif
                 
			<div class="label">
				<div class="label-text">
					<a class="text-title" href="{{ route('front.get.themeproduct', str_slug($product5->slug)) }}">{{ $product5->name }}</a>
					<span class="text-category">{{ $cat5->name }}</span>
				</div>
				@foreach($imarr5 as $simg5)
				@if($simg5->product_id == $product5->id)
				@php $imgmt5 = 'storage/'.$simg5->src; @endphp
				@break;
				@endif	
				@endforeach
				<div class="diys-template-thumb-mobile"><img src="{{ asset($imgmt5)}}" class="mimg"></div>
				
				<div class="label-bg"></div>
			</div>
		</div>
	</div>
	@endforeach	
	@endif			


	@if($cat6->products->isNotEmpty())
	 @foreach($products6 as $product6)
	<div class="portfolio {{ $cat6->slug }}" data-cat="{{ $cat6->slug }}">
		<div class="portfolio-wrapper">				
			 
            @php $imgt6 = 'storage/'.$product6->cover; @endphp
            
                        @if(isset($product6->cover))
                            <img src="{{ asset($imgt6)}}" alt="{{ $product6->name }}" class="img-bordered img-responsive">
                        @else
                            <img src="{{ asset('themes/screenshots/t1.jpg')}}" alt="{{ $product6->name }}" class="img-bordered img-responsive" />
                        @endif
                 
			<div class="label">
				<div class="label-text">
					<a class="text-title" href="{{ route('front.get.themeproduct', str_slug($product6->slug)) }}">{{ $product6->name }}</a>
					<span class="text-category">{{ $cat6->name }}</span>
				</div>
				@foreach($imarr6 as $simg6)
				@if($simg6->product_id == $product6->id)
				@php $imgmt6 = 'storage/'.$simg6->src; @endphp
				@break;
				@endif	
				@endforeach
				<div class="diys-template-thumb-mobile"><img src="{{ asset($imgmt6)}}" class="mimg"></div>
				
				<div class="label-bg"></div>
			</div>
		</div>
	</div>
	@endforeach	
	@endif			

	@if($cat7->products->isNotEmpty())
	 @foreach($products7 as $product7)
	<div class="portfolio {{ $cat7->slug }}" data-cat="{{ $cat7->slug }}">
		<div class="portfolio-wrapper">				
			 
            @php $imgt7 = 'storage/'.$product7->cover; @endphp
            
                        @if(isset($product7->cover))
                            <img src="{{ asset($imgt7)}}" alt="{{ $product7->name }}" class="img-bordered img-responsive">
                        @else
                            <img src="{{ asset('themes/screenshots/t1.jpg')}}" alt="{{ $product7->name }}" class="img-bordered img-responsive" />
                        @endif
                 
			<div class="label">
				<div class="label-text">
					<a class="text-title" href="{{ route('front.get.themeproduct', str_slug($product7->slug)) }}">{{ $product7->name }}</a>
					<span class="text-category">{{ $cat7->name }}</span>
				</div>
				@foreach($imarr7 as $simg7)
				@if($simg7->product_id == $product7->id)
				@php $imgmt7 = 'storage/'.$simg7->src; @endphp
				@break;
				@endif	
				@endforeach
				<div class="diys-template-thumb-mobile"><img src="{{ asset($imgmt7)}}" class="mimg"></div>
				
				<div class="label-bg"></div>
			</div>
		</div>
	</div>
	@endforeach	
	@endif			

	@if($cat8->products->isNotEmpty())
	 @foreach($products8 as $product8)
	<div class="portfolio {{ $cat8->slug }}" data-cat="{{ $cat8->slug }}">
		<div class="portfolio-wrapper">				
			 
            @php $imgt8 = 'storage/'.$product8->cover; @endphp
            
                        @if(isset($product8->cover))
                            <img src="{{ asset($imgt8)}}" alt="{{ $product8->name }}" class="img-bordered img-responsive">
                        @else
                            <img src="{{ asset('themes/screenshots/t1.jpg')}}" alt="{{ $product8->name }}" class="img-bordered img-responsive" />
                        @endif
                 
			<div class="label">
				<div class="label-text">
					<a class="text-title" href="{{ route('front.get.themeproduct', str_slug($product8->slug)) }}">{{ $product8->name }}</a>
					<span class="text-category">{{ $cat8->name }}</span>
				</div>
				@foreach($imarr8 as $simg8)
				@if($simg8->product_id == $product8->id)
				@php $imgmt8 = 'storage/'.$simg8->src; @endphp
				@break;
				@endif	
				@endforeach
				<div class="diys-template-thumb-mobile"><img src="{{ asset($imgmt8)}}" class="mimg"></div>
				
				<div class="label-bg"></div>
			</div>
		</div>
	</div>
	@endforeach	
	@endif			

	@if($cat9->products->isNotEmpty())
	 @foreach($products9 as $product9)
	<div class="portfolio {{ $cat9->slug }}" data-cat="{{ $cat9->slug }}">
		<div class="portfolio-wrapper">				
			 
            @php $imgt9 = 'storage/'.$product9->cover; @endphp
            
                        @if(isset($product9->cover))
                            <img src="{{ asset($imgt9)}}" alt="{{ $product9->name }}" class="img-bordered img-responsive">
                        @else
                            <img src="{{ asset('themes/screenshots/t1.jpg')}}" alt="{{ $product9->name }}" class="img-bordered img-responsive" />
                        @endif
                 
			<div class="label">
				<div class="label-text">
					<a class="text-title" href="{{ route('front.get.themeproduct', str_slug($product9->slug)) }}">{{ $product9->name }}</a>
					<span class="text-category">{{ $cat9->name }}</span>
				</div>
				@foreach($imarr9 as $simg9)
				@if($simg9->product_id == $product9->id)
				@php $imgmt9 = 'storage/'.$simg9->src; @endphp
				@break;
				@endif	
				@endforeach
				<div class="diys-template-thumb-mobile"><img src="{{ asset($imgmt9)}}" class="mimg"></div>
				
				<div class="label-bg"></div>
			</div>
		</div>
	</div>
	@endforeach	
	@endif			

	


	</div>		
</div>			
			
										
			
		</div>
		
	</div><!-- container -->
@endsection