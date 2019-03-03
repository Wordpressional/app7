<!-- HEADER -->
<header class="main_h sticky">
	<div class="themeone">

    <div class="row">
 	
 <nav class="navbar navbar-expand-sm">
		<div  class="boxlogolnndynamic">
        <span class="editlogolnndynamic">edit</span>
        <span class="savelogolnndynamic">save</span>
        <input type='file' id="imageUploadlogonlnndynamic" accept=".png, .jpg, .jpeg" />
        <label class="imageUploadlogonlnndynamic" for="imageUploadlogonlnndynamic">&nbsp;</label>
        
        <span ><a href="{{url('/')}}"><img id="imagePreviewlogolnndynamic" src="{{asset('themes/t1/logo2.png')}}" alt="Logo"></a></span>
        </div>

		 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr-menu"></span>
        </button>

		  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    		<ul class="navbar-nav mr-auto">
              {{ StickyMenuItems($menuList) }}
          </ul>
		  </div> <!-- / row -->
		
	</nav>
	</div>
</div>
</header>