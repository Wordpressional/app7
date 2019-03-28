@extends('layoutsecom.front.app')



@section('content')

<section class="ecartnatheme1">
    <div class="ecartnatheme1 hidden-xs">
        <div class="container">
            <div class="clearfix"></div>
            <div class="pull-right">
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->check())
                        <li><a href="{{ route('accounts', ['tab' => 'profile']) }}"><i class="fa fa-home"></i> My Account</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                    @else
                        <li><a href="{{ route('cart.custlogin') }}"> <i class="fa fa-lock"></i> Login</a></li>
                        <li><a href="{{ route('cart.custreg') }}"> <i class="fa fa-sign-in"></i> Register</a></li>
                    @endif
                    <li id="cart" class="menubar-cart">
                        <a href="{{ route('cart.index') }}" title="View Cart" class="awemenu-icon menu-shopping-cart">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="cart-number">{{ $cartCount }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <header id="header-section">
        <div class="ecartnatheme1">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header col-md-2">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
                </div>
                <div class="col-md-10">
                    @include('layoutsecom.front.header-cart')
                </div>
            </div>
        </nav>
    </div>
    </header>
</section>
@endsection