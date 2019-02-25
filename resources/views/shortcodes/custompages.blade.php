@extends('layouts.keditorheader')


@section('content')

    

<div id="previewtest">


   @foreach($forms as $f)
      {!! $f->htmlcontent !!}  
   @endforeach
    <input type="hidden" id="ttoken" name="_token" value="{{ csrf_token() }}">
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

