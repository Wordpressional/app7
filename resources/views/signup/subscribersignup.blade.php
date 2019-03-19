@extends('layouts.app')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-6">
         

        {!! Form::open(['route' => 'signup.registration', 'role' => 'form', 'method' => 'POST']) !!}
        <h2><span class="entypo-login"><i class="fa fa-pencil-square-o"></i></span>  @lang('auth.register')</h2>
            <div class="form-group">
                <span class="entypo-user inputUserIcon1">
                <i class="fa fa-user"></i>
                </span>
                {!! Form::label('name', __('validation.attributes.name'), ['class' => 'control-label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'ip1 userinput' . ($errors->has('name') ? ' is-invalid' : ''), 'required', 'autofocus']) !!}

                @if ($errors->has('name'))
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <span class="entypo-user inputEmailIcon">
                <i class="fa fa-envelope"></i>
                </span>
                {!! Form::label('email', __('validation.attributes.email'), ['class' => 'control-label']) !!}
                {!! Form::email('email', old('email'), ['class' => 'ip2 userinput' . ($errors->has('email') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('email'))
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                  <span class="entypo-key inputPassIcon1">
                <i class="fa fa-key"></i>
                </span>
                {!! Form::label('password', __('validation.attributes.password'), ['class' => 'control-label']) !!}
                {!! Form::password('password', ['class' => 'ip3 userinput' . ($errors->has('password') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('password'))
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                  <span class="entypo-key inputPassIcon2">
                <i class="fa fa-key"></i>
                </span>
                {!! Form::label('password_confirmation', __('validation.attributes.password_confirmation'), ['class' => 'control-label']) !!}
                {!! Form::password('password_confirmation', ['class' => 'ip4 userinput' . ($errors->has('password_confirmation') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::submit(__('auth.register'), ['class' => 'btn btn-primary btnblk']) !!}
            </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('css')
<style>

@if($colorsetting=="empty")
body.bg-light {
    background: #ffffff !important;
}
@else
body.bg-light {
    background: {{ $colorsetting[12]->color }} !important;
}
@endif


</style>
@endsection