@extends('admin.layouts.cformheader')


@section('content')

     
      @include('admin.includes.errors')



     <div class="page-header">
        <h2>Preview Form:{{ $cform->cformname }}</h2>
        <hr />
      </div>

       <a href="{{route('admin.cforms.index')}}" class="btn btn-primary btn-sm align-self-center"><b>Back</b></a>

<br /><br /> 

  <div id="renderedform"></div>


@endsection
@section('scripts')

 <script type="text/javascript">
  $(function () {
           
     var fbTemplate =  '{!! $cform->htmlelements !!}' ;
     console.log(fbTemplate);
     formRenderOpts = {
      dataType: 'json',
      formData: fbTemplate
    };
     var renderedForm = $('#renderedform');
    renderedForm.formRender(formRenderOpts);

    console.log(renderedForm.html());
    
   });
 
      
    
  
</script>

@endsection