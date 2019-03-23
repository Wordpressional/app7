@php
    $created_at = old('created_at') ?? (isset($page) ? $page->created_at->format('Y-m-d\TH:i') : null);
@endphp

<div class="form-group">
    {!! Form::label('slugp', __('pages.attributes.slugp')) !!}
    {!! Form::text('name1', null, ['class' => 'form-control' . ($errors->has('name1') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('name1'))
        <span class="invalid-feedback">{{ $errors->first('name1') }}</span>
    @endif
</div>

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
    {!! Form::label('pagetitlecolor', __('pages.attributes.pagetitlecolor')) !!}
    {!! Form::text('ptitlecolor', null, ['class' => 'form-control' . ($errors->has('ptitlecolor') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('ptitlecolor'))
        <span class="invalid-feedback">{{ $errors->first('ptitlecolor') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('ptitlebgcolor', __('pages.attributes.ptitlebgcolor')) !!}
    {!! Form::text('ptitlebgcolor', null, ['class' => 'form-control' . ($errors->has('ptitlebgcolor') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('ptitlebgcolor'))
        <span class="invalid-feedback">{{ $errors->first('ptitlebgcolor') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('pcontbgcolor', __('pages.attributes.pcontbgcolor')) !!}
    {!! Form::text('pcontbgcolor', null, ['class' => 'form-control' . ($errors->has('pcontbgcolor') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('pcontbgcolor'))
        <span class="invalid-feedback">{{ $errors->first('pcontbgcolor') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('headercode', __('pages.attributes.headercode')) !!}
    {!! Form::text('headercode', null, ['class' => 'form-control' . ($errors->has('headercode') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('headercode'))
        <span class="invalid-feedback">{{ $errors->first('headercode') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('footercode', __('pages.attributes.footercode')) !!}
    {!! Form::text('footercode', null, ['class' => 'form-control' . ($errors->has('footercode') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('footercode'))
        <span class="invalid-feedback">{{ $errors->first('footercode') }}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('content', __('pages.attributes.content')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control summernote' . ($errors->has('content') ? ' is-invalid' : ''), 'required' => 'required']) !!}

    @if ($errors->has('content'))
        <span class="invalid-feedback">{{ $errors->first('content') }}</span>
    @endif
</div>

<div class="form-group">
<label for="compaddr">Different styles for banner (If needed paste this in your style sheet)</label>
       
<textarea rows="5" cols="70" class="form-control fc" required="required">
///////////////////Style1 ////////////////////////////////
.bakimgs{
  height:200px;
  vertical-align: middle;
 background: url('https://images.all-free-download.com/images/wallpapers_large/best_hd_scenery_8188.jpg') no-repeat;
 background-size: 100%;
 background-position: 50% 50%;
}
.leads{
  margin-top:60px;
  color:white;
  font-weight:bold;
  font-size:30px;
}
//////////////////////////////////////////////////////////
</textarea> 

<br>  
