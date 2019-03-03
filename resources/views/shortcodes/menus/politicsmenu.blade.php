<header id="mpolheader">
		  	
<div class="mpoltheme container main-menu">
	<div class="row align-items-center justify-content-between d-flex">
      <div id="mpollogo" class="boxmpoltheme1">

      	  <span class="editmpoltheme1">edit</span>

           <span class="savempoltheme1">save</span>
           <input type='file' id="imageUploadmpoltheme1" accept=".png, .jpg, .jpeg" />
           <label class="imageUploadmpoltheme1" for="imageUploadmpoltheme1">&nbsp;</label>
        <a href="{{url('/')}}">
        	<img id="imagePreviewmpoltheme1" src="{{ asset('themes/politt5/logo.png')}}" alt="" title="" />
        </a>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
         {{ PoliticsMenuItems($menuList) }}
        </ul>
      </nav><!-- #nav-menu-container -->		    		
	</div>
</div>
</header><!-- #header -->