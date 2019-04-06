@extends('layoutsecom.front.homeapp')



@section('content')
<div class="container">
	<div class="row">
<div class="col-md-3">
<ul id="filters" class="clearfix">
	<li><span class="filter active" data-filter=".app, .card, .icon, .logo, .web">All</span></li>
	<li><span class="filter" data-filter=".app">App</span></li>
	<li><span class="filter" data-filter=".{{ $cat1->name }}">{{ $cat1->name }}</span></li>
	<li><span class="filter" data-filter=".icon">Icon</span></li>
	<li><span class="filter" data-filter=".logo">Logo</span></li>
	<li><span class="filter" data-filter=".web">Web</span></li>
</ul>
</div>
<div class="col-md-9">
<div id="portfoliolist">
	 @if($cat1->products->isNotEmpty())
	 @foreach($products1 as $product1)
	<div class="portfolio {{ $cat1->name }}" data-cat="{{ $cat1->name }}">
		<div class="portfolio-wrapper">				
			 
            @php $imgt = 'storage/'.$product1->cover; @endphp
                        @if(isset($product1->cover))
                            <img src="{{ asset($imgt)}}" alt="{{ $product1->name }}" class="img-bordered img-responsive">
                        @else
                            <img src="{{ asset('themes/screenshots/t1.jpg')}}" alt="{{ $product1->name }}" class="img-bordered img-responsive" />
                        @endif
                 
			<div class="label">
				<div class="label-text">
					<a class="text-title" href="{{ route('front.get.product', str_slug($product1->slug)) }}">{{ $product1->name }}</a>
					<span class="text-category">{{ $cat1->name }}</span>
				</div>
				<div class="label-bg"></div>
			</div>
		</div>
	</div>
	@endforeach	
	@endif			

	<!-- <div class="portfolio app" data-cat="app">
		<div class="portfolio-wrapper">			
			<img src="{{ asset('themes/screenshots/t2.jpg')}}" alt="" />
			<div class="label">
				<div class="label-text">
					<a class="text-title">Visual Infography</a>
					<span class="text-category">APP</span>
				</div>
				<div class="label-bg"></div>
			</div>
		</div>
	</div>

	<div class="portfolio web" data-cat="web">
				<div class="portfolio-wrapper">						
					<img src="{{ asset('themes/screenshots/t3.jpg')}}" alt="" />
					<div class="label">
						<div class="label-text">
							<a class="text-title">Sonor's Design</a>
							<span class="text-category">Web design</span>
						</div>
						<div class="label-bg"></div>
					</div>
				</div>
			</div>				
			
			<div class="portfolio card" data-cat="card">
				<div class="portfolio-wrapper">			
					<img src="{{ asset('themes/screenshots/t4.jpg')}}" alt="" />
					<div class="label">
						<div class="label-text">
							<a class="text-title">Typography Company</a>
							<span class="text-category">Business card</span>
						</div>
						<div class="label-bg"></div>
					</div>
				</div>
			</div>	
						
			<div class="portfolio app" data-cat="app">
				<div class="portfolio-wrapper">
					<img src="{{ asset('themes/screenshots/t5.jpg')}}" alt="" />
					<div class="label">
						<div class="label-text">
							<a class="text-title">Weatherette</a>
							<span class="text-category">APP</span>
						</div>
						<div class="label-bg"></div>
					</div>
				</div>
			</div>			
			
			<div class="portfolio card" data-cat="card">
				<div class="portfolio-wrapper">			
					<img src="{{ asset('themes/screenshots/t6.jpg')}}" alt="" />
					<div class="label">
						<div class="label-text">
							<a class="text-title">BMF</a>
							<span class="text-category">Business card</span>
						</div>
						<div class="label-bg"></div>
					</div>
				</div>
			</div>	
			
			<div class="portfolio card" data-cat="card">
				<div class="portfolio-wrapper">			
					<img src="{{ asset('themes/screenshots/t7.jpg')}}" alt="" />
					<div class="label">
						<div class="label-text">
							<a class="text-title">Techlion</a>
							<span class="text-category">Business card</span>
						</div>
						<div class="label-bg"></div>
					</div>
				</div>
			</div>	 -->
			
				



	</div>		
</div>			
			
										
			
		</div>
		
	</div><!-- container -->
@endsection