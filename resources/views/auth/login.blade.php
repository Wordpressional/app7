@extends('layouts.app')

@section('content')

       

<div class="row justify-content-md-center">
    <div class="col-md-6">

        

        {!! Form::open(['route' => 'login', 'role' => 'form', 'method' => 'POST']) !!}

        <h2><span class="entypo-login"><i class="fa fa-sign-in"></i></span> Login</h2>
            <div class="form-group">
                 <span class="entypo-user inputUserIcon">
                <i class="fa fa-user"></i>
                </span>
                {!! Form::label('email', __('validation.attributes.email'), ['class' => 'control-label']) !!}
                {!! Form::email('email', old('email'), ['class' => ' user userinput' . ($errors->has('email') ? ' is-invalid' : ''), 'required', 'autofocus']) !!}

                

                @if ($errors->has('email'))
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <span class="entypo-key inputPassIcon">
                <i class="fa fa-key"></i>
                </span>
                {!! Form::label('password', __('validation.attributes.password'), ['class' => 'control-label']) !!}
                {!! Form::password('password', ['class' => 'pass passinput' . ($errors->has('password') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('password'))
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('remember', null, old('remember')) !!} @lang('auth.remember_me')
                    </label>
                </div>
            </div>

            <div class="form-group">

                {!! Form::submit(__('auth.login'), ['class' => 'btn btn-primary submit btnblk']) !!}
                {{ link_to('/password/reset', __('auth.forgotten_password'), ['class' => 'btn btn-link'])}}
            </div>
        {!! Form::close() !!}

        <hr>

       
    </div>
</div>
@endsection
@section('css')
<style>


body.bg-light {
    background: {{ $colorsetting[12]->color }} !important;
}


</style>
@endsection



