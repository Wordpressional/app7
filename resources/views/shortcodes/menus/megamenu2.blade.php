<div class="mbody">
	<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12">
	<div id="mpollogo" class="boxmpoltheme1" style="padding-top:17px;padding-left: 20px;">
<span class="editmpoltheme1">edit</span>
<span class="savempoltheme1">save</span>
<input type='file' id="imageUploadmpoltheme1" accept=".png, .jpg, .jpeg" />
<label class="imageUploadmpoltheme1" for="imageUploadmpoltheme1">&nbsp;</label>
<div class="col-md-7 col-lg-7 col-sm-7" style="float:left;">
<a href="{{ url('/') }}">
<img id="imagePreviewmpoltheme1" src="{{ asset('img/pwalogo.png')}}" alt="" title="" style="padding-bottom:20px;"/>
</a>
</div>

<div  class="col-md-5 col-lg-4 col-sm-12 who"><span style="padding-top:17px;"><a href="/contact" title="1-866-991-2631"><img src="{{ asset('images/svg/ic-phone.svg') }}" alt="" style="height: 20px;">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="padding-top:17px;"><a href="{{ url('/landingsitepage/py-who-we-are') }}"  style="color:white;">Who We Are</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@if(!Auth::guard('checkout')->check())<a href="{{ url('/cart/custe1login') }}"  style="color:white;">Sign In</a>@else<a href="{{ url('/logout') }}"  style="color:white;">Logout</a>@endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><!--<span style="padding-top:17px;"> <a href="{{ route('customere1login') }}" style="color:white;"><i class="fa fa-caret-square-o-right">&nbsp;</i></a></span>--></div>
</div>
<div class="natoggle-button">
<div class="wrapper">
<div class="menu-bar menu-bar-top"></div>
<div class="menu-bar menu-bar-middle"></div>
<div class="menu-bar menu-bar-bottom"></div>
</div>
</div>
 </div>
 </div>
</div>
</div>

