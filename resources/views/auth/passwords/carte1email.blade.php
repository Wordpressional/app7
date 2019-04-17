@extends('layoutsecom.front.mythemeapp')

@section('content')
<section class="container content">
        <div class="col-md-12">@include('layoutsecom.errors-and-messages')</div>
        <div class="col-md-4 col-md-offset-4">
        <h1>@lang('auth.reset_password')</h1>
<meta name="csrf-token" content="{{ csrf_token() }}">
        @if (session('status'))
            @component('components.alerts.dismissible', ['type' => 'success'])
                {{ session('status') }}
            @endcomponent
        @endif

        {!! Form::open(['route' => 'cart.e1password.email', 'role' => 'form', 'method' => 'POST']) !!}
        
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

</section>
@endsection
