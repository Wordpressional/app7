@extends('layouts.keditorheader')


@section('content')

     
    

<div id="previewtest">

   
    
      {!! $forms->htmlcontent !!} 
  
   
   
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