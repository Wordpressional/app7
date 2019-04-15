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
        {!! Form::open(['route' => 'demo.password.resetd', 'role' => 'form', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('email', __('validation.attributes.email'), ['class' => 'control-label']) !!}
                {!! Form::email('email', $email or old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('email'))
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('password', __('validation.attributes.password'), ['class' => 'control-label']) !!}
                {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('password'))
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', __('validation.attributes.password_confirmation'), ['class' => 'control-label']) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::submit(__('auth.reset_password'), ['class' => 'btn btn-primary']) !!}
            </div>
            <input type="hidden" name="token" value="{{ $token }}">

        {!! Form::close() !!}
    

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
 
    <script src="{{ asset('js/ecomm/js/admin.min.js') }}"></script>
</body>
</html>