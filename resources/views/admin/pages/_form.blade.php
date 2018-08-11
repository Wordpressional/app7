@php
    $created_at = old('created_at') ?? (isset($page) ? $page->created_at->format('Y-m-d\TH:i') : null);
@endphp

<div class="form-group">
    {!! Form::label('title', __('pages.attributes.title')) !!}
    {!! Form::text('display_name', null, ['class' => 'form-control' . ($errors->has('display_name') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('display_name'))
        <span class="invalid-feedback">{{ $errors->first('display_name') }}</span>
    @endif
</div>


<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('author_id', __('pages.attributes.author')) !!}
        {!! Form::select('author_id', $users, null, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'required']) !!}

        @if ($errors->has('author_id'))
            <span class="invalid-feedback">{{ $errors->first('author_id') }}</span>
        @endif
    </div>

    
</div>

<div class="form-group">
    {!! Form::label('content', __('pages.attributes.content')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control summernote' . ($errors->has('content') ? ' is-invalid' : ''), 'required' => 'required']) !!}

    @if ($errors->has('content'))
        <span class="invalid-feedback">{{ $errors->first('content') }}</span>
    @endif
</div>
