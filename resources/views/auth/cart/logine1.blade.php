@extends('layoutsecom.front.mythemeapp')

@section('content')
    <hr>
    <!-- Main content -->
    <section class="container content cartptheme1">
        <div class="col-md-12">@include('layoutsecom.errors-and-messages')</div>
        <div class="col-md-4 col-md-offset-4">
            <h2>Login to your account</h2>
            <form action="{{ route('cart.custe1login') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="" class="form-control" placeholder="xxxxx">
                </div>
                <div class="row">
                    <button class="btn btn-default btn-block" type="submit">Login now</button>
                </div>
            </form>
            <div class="row">
                <hr>
                <a href="{{route('cart.e1password.request')}}">I forgot my password</a><br>
                <a href="{{route('cart.custe1reg')}}" class="text-center">No account? Register here.</a>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
