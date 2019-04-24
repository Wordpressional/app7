<div class="ecartnatheme1 cartptheme1 row">
    <div class="col-md-6">
    	 <meta name="csrf-token" content="{{ csrf_token() }}">
        <ul id="thumbnails" class="col-md-4 list-unstyled">
            <li>
                <a href="javascript: void(0)">
                    
                    <img class="img-responsive img-thumbnail"
                         src="{{ asset('https://placehold.it/180x180') }}"
                         alt="Start Up" />
                    
                </a>
            </li>
            
                <li>
                    <a href="javascript: void(0)">
                    <img class="img-responsive img-thumbnail"
                         src="{{ asset('storage/products/p2TmKD2DuxNoSMNTZSuLVHnLpDKxOCpYW4WDp6ay.jpeg') }}"
                         alt="Start Up" />
                    </a>
                </li>
              
        </ul>
        <figure class="text-center product-cover-wrap col-md-8">
            
                <img id="main-image" class="product-cover" src="https://placehold.it/300x300"
                     data-zoom="{{ asset('storage/products/p2TmKD2DuxNoSMNTZSuLVHnLpDKxOCpYW4WDp6ay.jpeg') }}?w=1200" alt="Start Up">
            
        </figure>
    </div>
    <div class="col-md-6">
        <div class="product-description">
        	
            <h1>Start Up
                <small>$ 125</small>
            </h1>

            <button type="submit" class="btn btn-primary cartpre"><i class="fa fa-eye"></i> Preview
            </button>
            <br><br>
            <div class="description">Start Up</div>
            <div class="excerpt">
                <hr>Start Up Description</div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    @include('layoutsecom.errors-and-messages')
                    <form action="{{ route('cart.cartp1store') }}" class="form-inline" method="post">
                        {{ csrf_field() }}
                       
                            <div class="form-group">
                                <label for="productAttribute">Choose Combination</label> <br />
                                <select name="productAttribute" id="productAttribute" class="form-control select2">
                                   
                                        <option value="1">
                                            
                                                Start Up : Start Up
                                           
                                                ( $ 125 )
                                           
                                        </option>
                                   
                                </select>
                            </div><hr>
                       
                        <div class="form-group">
                            <input type="text"
                                   class="form-control"
                                   name="quantity"
                                   id="quantity"
                                   placeholder="Quantity"
                                   value="{{ old('quantity') }}" />
                            <input type="hidden" name="product" value="18" />
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

		
		
    </script>
@endsection