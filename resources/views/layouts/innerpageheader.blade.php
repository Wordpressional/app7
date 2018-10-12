
    

        <!--================Header Menu Area =================-->
        

        <header class="main_menu_area imgpage" style="position:static; ">
            
            <span class="logospan"><img src="{{ asset('webhome/img/logo.png') }}"  alt="" /></span>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ URL::to('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/cattype/books') }}">ICO Services&nbsp;&nbsp;&nbsp;<span class="icon-cogw"><i class="fa fa-angle-down"></i></span></a></li>
                        <!--<li class="nav-item"><a  class="nav-link" href="{{ url('/artpage/online-resources') }}">Exchange&nbsp;&nbsp;&nbsp;<span class="icon-cogw"><i class="fa fa-angle-down"></i></span></a></li>-->
                       
                        <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">What We do <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="{{ url('/thispage/events-conferences-and-projects') }}">Conferences</a></li>                        
                        <li><a href="{{ url('/thispage/events-conferences-and-projects') }}">Events</a></li>                      
                        <li><a href="{{ url('/thispage/events-conferences-and-projects') }}">Projects</a></li>
                        </ul>
                        </li>-->
                        <li class="nav-item"><a class="nav-link" href="{{ url('thispage/events-conferences-and-projects') }}">Promote Your ICO&nbsp;&nbsp;&nbsp;<span class="icon-cogw"><i class="fa fa-angle-down"></i></span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/thispage/contact') }}">About&nbsp;&nbsp;&nbsp;<span class="icon-cogw"><i class="fa fa-angle-down"></i></span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('thispage/events-conferences-and-projects') }}"><span class="icon-cog"><i class="fa fa-user"></i></span>&nbsp;&nbsp;&nbsp;Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/thispage/contact') }}"><span class="icon-cog"><i class="fa fa-edit"></i></span>&nbsp;&nbsp;&nbsp;Register</a></li>
                    </ul>
                   
                </div>
            </nav>
        </header>
        <!--================End Header Menu Area =================-->
  