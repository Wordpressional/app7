{!! Form::model($user, ['method' => 'PATCH', 'route' => ['cadmin.authors.updatea', $user->id]]) !!}

  <div class="form-row">
    <div class="form-group col-md-6">
      {!! Form::label('name', __('users.attributes.name')) !!}
      {!! Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.name'), 'required']) !!}

      @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
      @endif
    </div>

    <div class="form-group col-md-6">
      {!! Form::label('email', __('users.attributes.email')) !!}
      {!! Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.email'), 'required']) !!}

      @if ($errors->has('email'))
        <span class="invalid-feedback">{{ $errors->first('email') }}</span>
      @endif
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      {!! Form::label('password', __('users.attributes.password')) !!}
      {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.password')]) !!}

      @if ($errors->has('password'))
        <span class="invalid-feedback">{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div class="form-group col-md-6">
      {!! Form::label('password_confirmation', __('users.attributes.password_confirmation')) !!}
      {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.password_confirmation')]) !!}

      @if ($errors->has('password_confirmation'))
        <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('roles', __('users.attributes.roles')) !!}

   

    @foreach($roles as $role)

      <div class="checkbox">
        <label>
          {!! Form::radio("role_id", $role->id, $user->hasRole($role->name)) !!}
          @if (Lang::has('roles.' . $role->name))
            {!! __('roles.' . $role->name) !!}
          @else
            {{ $role->name }}
          @endif
        </label>
      </div>
    @endforeach


  </div>

  {{ link_to_route('cadmin.authors.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
  {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
