<div id="demo"></div>		
<div class="blogarticles">
  
  <div id="ontop">
  	
    @foreach($posts as $post) 
	<ul class="list8">
	<li>
	<a href="{{url('/')}}/postbsingle/{{ $post->slug }}">{{ $post->title }} </a>
	</li>		
    </ul>       
    @endforeach
    </div>
   </div>


  
     

   
  

 


