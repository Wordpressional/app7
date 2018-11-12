<!-- header.blade.php -->

<header class="main-header">
    <a href="" class="logo">
        <span class="logo-mini"><b>Symbol</b></span>
        <span class="logo-lg"><b>Logo</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <p> hkhslk fhslkdf s hkhslk fhslkdf s hkhslk fhslkdf s hkhslk fhslkdf s  hkhslk fhslkdf s </p>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('img/user2-160x160.jpg')}}" class="user-image" alt="User Image" />
                        <span class="hidden-xs">User Name</span>
                    </a>
                    <ul class="dropdown-menu">
                    <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                            <p>
                                User Name
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