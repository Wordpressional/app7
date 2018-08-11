@php
    $posted_at = old('posted_at') ?? (isset($post) ? $post->posted_at->format('Y-m-d\TH:i') : null);
@endphp

<div class="form-group">
    {!! Form::label('title', __('posts.attributes.title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('title'))
        <span class="invalid-feedback">{{ $errors->first('title') }}</span>
    @endif
</div>


<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('author_id', __('posts.attributes.author')) !!}
        {!! Form::select('author_id', $users, null, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'required']) !!}

        @if ($errors->has('author_id'))
            <span class="invalid-feedback">{{ $errors->first('author_id') }}</span>
        @endif
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('posted_at', __('posts.attributes.posted_at')) !!}
        <input type="datetime-local" name="posted_at" class="form-control {{ ($errors->has('posted_at') ? ' is-invalid' : '') }}" required value="{{ $posted_at }}">

        @if ($errors->has('posted_at'))
            <span class="invalid-feedback">{{ $errors->first('posted_at') }}</span>
        @endif
    </div>
</div>

    <div class="form-row">
            <div class="form-group col-md-6">
                <label for="category">Select a Category</label>
                <select name="category_id" id="category_id" class="form-control">
                     @foreach($categories as $category)

                      <option value="{{$category->id}}"
                           @if ($posted_at)
                           @if ($post->category_id == $category->id)
                             selected 
                          @endif
                          @endif
                        >{{$category->name}}</option>

                     @endforeach     
                  </select>
            </div>
            <div class="form-group col-md-6">
                <label for="template">Select a template</label>
                <select name="template" id="template" class="form-control">
                    
                      <option value="Full width Template"  
                      @if ($posted_at) @if ($post->template == "Full width Template")
                             selected 
                          @endif
                        @endif
                     >Full width Template</option>
                      <option value="3 Column Template"
                      @if ($posted_at) @if ($post->template == "3 Column Template")
                             selected 
                          @endif
                        @endif
                          >3 Column Template</option>
                      <option value="Title Template"
                      @if ($posted_at) @if ($post->template == "Title Template")
                             selected 
                          @endif
                        @endif
                          >Title Template</option>
 
                  </select>
            </div>

              @if ($posted_at) 
              <div id="first" style="display: none;">
              @if ($post->template == "Full width Template")
                 <p>@lang('posts.link') : {{ link_to_route('posts.articles', route('posts.articles')) }}</p>
               @elseif ($post->template == "3 Column Template")
                
                  <p> @lang('posts.link') : {{ link_to_route('posts.allcat', route('posts.allcat')) }}</p>
               @elseif ($post->template == "Title Template")
                 <p>@lang('posts.link') : {{ link_to_route('posts.links', route('posts.links')) }}</p>
              @endif
              </div>
              <div id="full" style="display: none;">
              
                 <p>@lang('posts.link') : {{ link_to_route('posts.articles', route('posts.articles')) }}</p>
               
              
               </div>

               <div id="three"  style="display: none;">
             
                  
                  <p> @lang('posts.link') : {{ link_to_route('posts.allcat', route('posts.allcat')) }}</p>
            
               </div>
               <div id="titlel"  style="display: none;">
             
                 <p>@lang('posts.link') : {{ link_to_route('posts.links', route('posts.links')) }}</p>
           
             
              </div>
              @endif
            
           
    </div>

    <div class="form-group">
 @if (count($tags))
            <div class="form-group col-md-12">
               <label for="tags">Select Tag</label>
               @foreach($tags as $tag)
                   <div class="checkbox">
                      <label for=""><input name="tags[]" value="{{$tag->id}}" type="checkbox"
                        @if ($posted_at)
                        @foreach ($post->tags as $t)
                            @if ($tag->id == $t->id)
                               checked 
                            @endif
                         @endforeach
                         @endif

                        >&nbsp;&nbsp;{{ $tag->tag }}</label>
                   </div>
               @endforeach    

            </div>
            @endif
    </div>

<div class="form-group thumbhide">
    {!! Form::label('thumbnail', __('posts.attributes.thumbnail')) !!}
    {!! Form::file('thumbnail', ['accept' => 'image/*', 'class' => 'form-control' . ($errors->has('thumbnail') ? ' is-invalid' : '')]) !!}

    @if ($posted_at)
    @if ($post->hasThumbnail())
    {{ Html::image($post->thumbnail()->url, $post->thumbnail()->original_filename, ['class' => 'img-thumbnail', 'width' => '250']) }}
    
    <meta name="_token" content="{{ csrf_token() }}"/>
    <a href="javascript:void" onclick="loadUrl('{{route('posts.thumbnail.destroy', $post->id)}}', '{{ $tuser->api_token }}')" class="deltsubmit" data-token="{{ csrf_token() }}"><span class="btn btn-link text-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Delete this Image</span></a> 
    
    @endif
    @endif
    @if ($errors->has('thumbnail'))
        <span class="invalid-feedback">{{ $errors->first('thumbnail') }}</span>
    @endif
    
</div>

<div class="form-group">
    {!! Form::label('excerpt', __('posts.attributes.excerpt')) !!}
    {!! Form::textarea('excerpt', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('excerpt') ? ' is-invalid' : ''), 'required' => 'required', 'rows'=>5]) !!}

    @if ($errors->has('excerpt'))
        <span class="invalid-feedback">{{ $errors->first('excerpt') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('pubyear', __('posts.attributes.pubyear')) !!}
    {!! Form::text('pubyear', null, ['class' => 'form-control' . ($errors->has('pubyear') ? ' is-invalid' : '')]) !!}

   
</div>

<div class="form-group">
    {!! Form::label('content', __('posts.attributes.content')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control summernote' . ($errors->has('content') ? ' is-invalid' : ''), 'required' => 'required']) !!}

    @if ($errors->has('content'))
        <span class="invalid-feedback">{{ $errors->first('content') }}</span>
    @endif
</div>
