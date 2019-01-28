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
            <center><p> @if($data['n_companyname']) {{$data['n_companyname']->cname}} @else @endif</p></center>
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if($data)
                        <img src="{{ asset($data['n_companyname']->defaultprofileimg) }}" class="user-image" alt="User Image" />
                        @endif
                        <span class="hidden-xs">@if($data){{$data['n_loggeduser']}}@endif</span>
                    </a>
                    <ul class="dropdown-menu">
                    <!-- User image -->
                        <li class="user-header">
                             @if($data)
                            <img src="{{ asset($data['n_companyname']->defaultprofileimg) }}" class="img-circle" alt="User Image" />@endif
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