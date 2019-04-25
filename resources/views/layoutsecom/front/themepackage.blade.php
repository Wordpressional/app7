<div class="ecartnatheme1 cartptheme1 row">
    <div class="col-md-6">
    	 <meta name="csrf-token" content="{{ csrf_token() }}">
        <ul id="thumbnails" class="col-md-4 list-unstyled">
            <li>
                <a href="javascript: void(0)">
                    @if(isset($product->cover))
                    <img class="img-responsive img-thumbnail"
                         src="{{ asset("storage/$product->cover") }}"
                         alt="{{ $product->name }}" />
                    @else
                    <img class="img-responsive img-thumbnail"
                         src="{{ asset('https://placehold.it/180x180') }}"
                         alt="{{ $product->name }}" />
                    @endif
                </a>
            </li>
            @if(isset($images) && !$images->isEmpty())
                @foreach($images as $image)
                <li>
                    <a href="javascript: void(0)">
                    <img class="img-responsive img-thumbnail"
                         src="{{ asset("storage/$image->src") }}"
                         alt="{{ $product->name }}" />
                    </a>
                </li>
                @endforeach
            @endif
        </ul>
        <figure class="text-center product-cover-wrap col-md-8">
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
    <div class="col-md-6">
        <div class="product-description">
        	
            <h1>{{ $product->name }}
                <small>{{ config('cart.currency') }} {{ $product->price }}</small>
            </h1>

            <button type="submit" class="btn btn-primary cartpre"><i class="fa fa-eye"></i> Preview
            </button>
            <br><br>
            <div class="description">{!! $product->description !!}</div>
            <div class="excerpt">
                <hr>{!!  str_limit($product->description, 100, ' ...') !!}</div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    @include('layoutsecom.errors-and-messages')
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
                            <input type="text"
                                   class="form-control"
                                   name="quantity"
                                   id="quantity"
                                   placeholder="Quantity"
                                   value="{{ old('quantity') }}" />
                            <input type="hidden" name="product" value="{{ $product->id }}" />
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart
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

		$(".cartpre").click(function(){

			//alert("{{ $product->name }}");

		  var datak = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                name:String("{{ $product->name }}"),
                
            });
			//alert(datak);
			  $.ajax({
			            headers: {
			                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			                  'Content-Type': 'application/json'
			                  },

			                url: "{{route('previewcartthemep')}}",
			            datatype : "application/json",
			            contentType: "json",
			            
			            type: 'post',
			            data:  datak,
			    
			         success: function(data) {
			          //alert("File Upadated successfully");
			           //alert(data);
			           window.location.href = "{{url('previewcarttheme')}}"+"/"+"{{ $product->name }}/?slug={{$product->slug}}";
			         
			        },
			       
			    });
			});
		
    </script>
@endsection