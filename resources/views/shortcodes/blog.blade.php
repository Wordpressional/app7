<div id="demo"></div>		
<div class="container">
  <div class="row">
  <div id="ontop">
  	<br>
  	<h2> Welcome to our Blog </h2>
    @foreach($posts as $post) 
	<ul class="list8">
	<li>
	{{ $post->title }} 
	</li>		
    </ul>       
    @endforeach
    </div>
   </div>
</div>

  
     

   
  

 


