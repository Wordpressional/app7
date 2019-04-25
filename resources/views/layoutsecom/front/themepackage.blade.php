<div class="ecartnatheme1 cartptheme1 row">
    <div class="col-md-8">
    	 <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <figure class="text-center product-cover-wrap col-md-12">
            @if(isset($product->cover))
                <img id="main-image" class="product-cover img-responsive"
                     src="{{ asset("storage/$product->cover") }}?w=400"
                     data-zoom="{{ asset("storage/$product->cover") }}?w=1200">
            @else
                <img id="main-image" class="product-cover" src="https://placehold.it/300x300"
                     data-zoom="{{ asset("storage/$product->cover") }}?w=1200" alt="{{ $product->name }}">
            @endif
        </figure>
    </div>
    <div class="col-md-4">
        <div class="product-description">
        	
            <h1>{{ $product->name }} Package
                <small>{{ config('cart.currency') }} {{ $product->price }}</small>
            
            
            </h1>

            <a href="{{url('/landingsitepage/startupfeatures')}}" class="btn btn-primary cartpre"><i class="fa fa-eye"></i> Features
            </a>
            <br><br>
            <div class="description">{!! $product->description !!}</div>
            <div class="excerpt">
                <hr>{!!  str_limit($product->description, 100, ' ...') !!}</div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    @include('layoutsecom.errors-and-messages')
                    
                    <form action="{{ route('cart.cart1store', ['package'=>'startup']) }}" class="form-inline" method="post">
                    
                    <form action="{{ route('cart.cart1store', ['package'=>'startup']) }}" class="form-inline" method="post">
                        {{ csrf_field() }}
                        @if(isset($productAttributes) && !$productAttributes->isEmpty())
                            <div class="form-group">
                                <label for="productAttribute">Choose Combination</label> <br />
                                <select name="productAttribute" id="productAttribute" class="form-control select2">
                                    @foreach($productAttributes as $productAttribute)
                                        <option value="{{ $productAttribute->id }}">
                                            @foreach($productAttribute->attributesValues as $value)
                                                {{ $value->attribute->name }} : {{ ucwords($value->value) }}
                                            @endforeach
                                            @if(!is_null($productAttribute->price))
                                                ( {{ config('cart.currency_symbol') }} {{ $productAttribute->price }})
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div><hr>
                        @endif
                        <div class="form-group">
                            <input type="hidden"
                                   class="form-control"
                                   name="quantity"
                                   id="quantity"
                                   placeholder="Quantity"
                                   value="1" />
                            <input type="hidden" name="product" value="{{ $product->id }}" />
                        </div>
                        
                        <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Buy this Account
                        </button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var productPane = document.querySelector('.product-cover');
            var paneContainer = document.querySelector('.product-cover-wrap');

            new Drift(productPane, {
                paneContainer: paneContainer,
                inlinePane: false
            });
        });

		
		
    </script>
@endsection