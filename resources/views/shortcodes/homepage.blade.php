@extends('layouts.keditorheaderhome')


@section('content')

     
      @include('admin.includes.errors')


<div id="previewtest">
   
   @if($form)

      {!! $form->htmlcontent !!}  
   
   @endif
   
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
