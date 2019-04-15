@extends('layoutsecom.front.app')

@section('content')
 <section class="container content">
        <div class="col-md-12">@include('layoutsecom.errors-and-messages')</div>
        <div class="col-md-4 col-md-offset-4">
        <h1>@lang('auth.reset_password')</h1>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! Form::open(['route' => 'cart.password.resetd', 'role' => 'form', 'method' => 'POST']) !!}
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

</section>
@endsection
