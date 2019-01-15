@php
    $posted_at = old('posted_at') ?? (isset($post) ? $post->posted_at->format('Y-m-d\TH:i') : null);
@endphp
<span style="color:red"> * marked fields are required</span>
<div class="form-group">
    {!! Form::label('title', __('posts.attributes.title')) !!}<span style="color:red"> * </span>
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('title'))
        <span class="invalid-feedback">{{ $errors->first('title') }}</span>
    @endif
</div>


<div class="form-row">
    <div class="form-group col-md-6">
      
      
        {!! Form::label('author_id', __('posts.attributes.author')) !!}<span style="color:red"> * </span>
        {!! Form::select('author_id', $users, null, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'required']) !!}
       
      
        @if ($errors->has('author_id'))
            <span class="invalid-feedback">{{ $errors->first('author_id') }}</span>
        @endif
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('posted_at', __('posts.attributes.posted_at')) !!}<span style="color:red"> * </span>
        <input type="datetime-local" name="posted_at" class="form-control {{ ($errors->has('posted_at') ? ' is-invalid' : '') }}" required value="{{ $posted_at }}">

        @if ($errors->has('posted_at'))
            <span class="invalid-feedback">{{ $errors->first('posted_at') }}</span>
        @endif
    </div>
</div>

    <div class="form-row">
            <div class="form-group col-md-6">
                <label for="category">Select a Category </label><span style="color:red"> * </span>
                <select name="category_id" id="category_id" class="form-control">
                     @foreach($categories as $category)
                     @php  if ($post){
                           if ($post->category_id == $category->id){
                             $selected = "selected";
                           }
                         }
                          
                          
                      @endphp
                      <option value="{{$category->id}}"
                          
                        >{{$category->name}}</option>

                     @endforeach     
                  </select>
            </div>
            <div class="form-group col-md-6">
                <label for="template">Related templates links</label>
                 @php if ($post) {
                 if ($post->template == "Full width Template") {
                  $selected1 = "selected";
               }
             }
             @endphp
              @php if ($post) {
                 if ($post->template == "Title Template") {
                  $selected2 = "selected";
               }
             }
              @endphp
              @php if ($post) {
                 if ($post->template == "Post Template") {
                  $selected3 = "selected";
               }
             }
              @endphp
                <select name="template" id="template" class="form-control">
                    
                      <option value="Full width Template"  
                     
                              
                         
                     >Full width Template</option>
                      <option value="3 Column Template"
                             
                          >3 Column Template</option>
                      <option value="Title Template"
                             
                          >Title Template</option>
                      <option value="Post Template"
                         
                          >Post Template</option>
 
                  </select>
            </div>

              @if ($post) 
              <div id="first" style="display: none;">
              @if ($post->template == "Full width Template")
                 <p>@lang('posts.link') : {{ link_to_route('posts.articles', route('posts.articles')) }}</p>
               @elseif ($post->template == "3 Column Template")
                
                  <p> @lang('posts.link') : {{ link_to_route('posts.allcat', route('posts.allcat')) }}</p>
               @elseif ($post->template == "Post Template")
                
                  <p> @lang('posts.link') : {{ link_to_route('webhome.singlemore', route('webhome.singlemore')) }}</p>

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

              <div id="posttemp"  style="display: none;">
             
                 <p>@lang('posts.link') : {{ link_to_route('webhome.singlemore', route('webhome.singlemore', $post), $post) }}</p>
           
             
              </div>
              @endif
            
           
    </div>

    <div class="form-group">
 @if (count($tags))
            <div class="form-group col-md-12">
               <label for="tags">Select Tag</label><span style="color:red"> * </span>
               @foreach($tags as $tag)
                   <div class="checkbox">
                      <label for=""><input name="tags[]" value="{{$tag->id}}" type="checkbox"
                        @if ($post)
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
    {!! Form::label('thumbnail', __('posts.attributes.thumbnail')) !!}<span style="color:red">* (size: 250 X 250)</span>
    {!! Form::file('thumbnail', ['accept' => 'image/*', 'class' => 'form-control' . ($errors->has('thumbnail') ? ' is-invalid' : '')]) !!}

    @if ($post)
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
    {!! Form::label('excerpt', __('posts.attributes.excerpt')) !!}<span style="color:red"> * </span>
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
    {!! Form::label('content', __('posts.attributes.content')) !!}<span style="color:red"> * </span>
    {!! Form::textarea('content', null, ['class' => 'form-control summernote' . ($errors->has('content') ? ' is-invalid' : ''), 'required' => 'required']) !!}

    @if ($errors->has('content'))
        <span class="invalid-feedback">{{ $errors->first('content') }}</span>
    @endif
</div>
