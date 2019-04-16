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
    
       

       
        <h1>@lang('auth.reset_password')</h1>
<meta name="csrf-token" content="{{ csrf_token() }}">
        @if (session('status'))
            @component('components.alerts.dismissible', ['type' => 'success'])
                {{ session('status') }}
            @endcomponent
        @endif

        {!! Form::open(['route' => 'emp.password.email', 'role' => 'form', 'method' => 'POST']) !!}
        
            <div class="form-group">
              
                {!! Form::label('email', __('validation.attributes.email'), ['class' => 'control-label']) !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('email'))
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::submit(__('auth.send_password_reset_link'), ['class' => 'btn btn-primary btn-block']) !!}
            </div>

        {!! Form::close() !!}
   


  </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
 
    <script src="{{ asset('js/ecomm/js/admin.min.js') }}"></script>
</body>
</html>
