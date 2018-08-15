@extends('layouts.keditorheader')


@section('content')

     
      @include('admin.includes.errors')


<div id="previewtest">
   
      {!! $form->htmlcontent !!}  
   
  </div>   
@endsection
@section('scripts')

 <script type="text/javascript">
          $(function () {
           

            $('#previewtest').find('section').attr('contentEditable',false);

            $( ".keditor-toolbar").hide();
            
            });

</script>
 

@endsection