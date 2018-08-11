<div id="app">
      <div class="jumbotron jumbotron bg-cover">
  <div class="overlay"></div>
  <div class="container">
    <h3></h3>
      <p class="lead"><span>{{ ucfirst(collect(request()->segments())->last()) }}</span></p>
  </div>
</div>          

        <div class="container">
            @include('shared/alerts')

            <div class="row">
                <div class="col-md-12">
                   <div class="bg-light">
     			@include ('posts/_listarticles')

                </div>
            </div>
        </div>

        
    </div>
	</div>
  
