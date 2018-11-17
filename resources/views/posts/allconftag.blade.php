<div id="app">
 <div class="jumbotron jumbotron bg-coverpost">
  <div class="overlay"></div>
  <div class="container">
    <h3></h3>
      <p class="lead hfont"><span>{{ ucfirst(collect(request()->segments())->last()) }}</span></p>
  </div>
</div>       

        <div class="container-fluid postbgcolor">
           
            <div class="row">
                <div class="col-md-12">
                   <div class="bg-light p-3 ">
                  
     			@include ('posts/_listconftag')
                

                </div>
            </div>
        </div>

        
    </div>
	</div>
  
