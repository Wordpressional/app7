<div id="mpollogo" class="boxmpoltheme1 aboutnav">
<span class="editmpoltheme1">edit</span>
<span class="savempoltheme1">save</span>
<input type='file' id="imageUploadmpoltheme1" accept=".png, .jpg, .jpeg" />
<label class="imageUploadmpoltheme1" for="imageUploadmpoltheme1">&nbsp;</label>
<a href="main.html">
<img id="imagePreviewmpoltheme1" src="{{ asset('webhome/img/logo.png')}}" alt="" title="" />
</a>
</div>
     <nav id="nav-menu-container" class="pynav" >
        <ul class="nav-menu mr-auto pynavul" >
            {{ AboutMenuItems($menuList) }}            
        </ul>
    </nav>
</nav>