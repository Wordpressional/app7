<!-- header.blade.php -->

<header class="main-header">
    <a href="" class="logo">
        <!--<span class="logo-mini"><b>Symbol</b></span>-->
        <span class="logo-lg"><b><img src="{{ asset($data['n_companyname']->clogo) }}" alt="logo"></b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        
        <div class="navbar-custom-menu">
            <center> @if($data)<p> {{$data['n_companyname']->cname}} </p>@endif</center>
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img src="{{ asset($data['n_companyname']->defaultprofileimg) }}" class="user-image" alt="User Image" />
                        <span class="hidden-xs">@if($data){{$data['n_loggeduser']}}@endif</span>
                    </a>
                    <ul class="dropdown-menu">
                    <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset($data['n_companyname']->defaultprofileimg) }}" class="img-circle" alt="User Image" />
                            <p>
                               @if($data){{$data['n_loggeduser']}}@endif
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-default">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>