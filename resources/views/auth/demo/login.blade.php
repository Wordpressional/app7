<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></link>
    <link rel="stylesheet" href="{{ asset('css/ecomm/css/admin.min.css') }}">
</head>
<body class="hold-transition skin-purple login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('admin') }}">{{ config('app.name') }}</a>
        </div>
    <!-- Main content -->
     <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
    
       @include('layoutsecom.errors-and-messages')
       
       
            <h2>Login to your account</h2>
            <form action="{{ route('demologin') }}" method="post" class="form-horizontal">
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
            
       
   
        

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
 
    <script src="{{ asset('js/ecomm/js/admin.min.js') }}"></script>
</body>
</html>