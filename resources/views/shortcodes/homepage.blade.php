@extends('layouts.keditorheaderhome')


@section('content')


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
