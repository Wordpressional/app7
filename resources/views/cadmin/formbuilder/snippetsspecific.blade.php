<!-------------------------------------------------------------------------------------------------->
<!-- Containers -->
<!-------------------------------------------------------------------------------------------------->
<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_12.png')}}" data-keditor-title="1 column" data-keditor-categories="1 column">
    <div class="row">
        <div class="col-sm-12" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_6_6.png')}}" data-keditor-title="2 columns (50% - 50%)" data-keditor-categories="2 columns">
    <div class="row">
        <div class="col-sm-6" data-type="container-content">
        </div>
        <div class="col-sm-6" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_4_8.png')}}" data-keditor-title="2 columns (33% - 67%)" data-keditor-categories="2 columns">
    <div class="row">
        <div class="col-sm-4" data-type="container-content">
        </div>
        <div class="col-sm-8" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_8_4.png')}}" data-keditor-title="2 columns (67% - 33%)" data-keditor-categories="2 columns">
    <div class="row">
        <div class="col-sm-8" data-type="container-content">
        </div>
        <div class="col-sm-4" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_4_4_4.png')}}" data-keditor-title="3 columns (33% - 33% - 33%)" data-keditor-categories="3 columns">
    <div class="row">
        <div class="col-sm-4" data-type="container-content">
        </div>
        <div class="col-sm-4" data-type="container-content">
        </div>
        <div class="col-sm-4" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_3_6_3.png')}}" data-keditor-title="3 columns (25% - 50% - 35%)" data-keditor-categories="3 columns">
    <div class="row">
        <div class="col-sm-3" data-type="container-content">
        </div>
        <div class="col-sm-6" data-type="container-content">
        </div>
        <div class="col-sm-3" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_3_3_3_3.png')}}" data-keditor-title="4 columns (25% - 25% - 25% - 25%)" data-keditor-categories="4 columns">
    <div class="row">
        <div class="col-sm-3" data-type="container-content">
        </div>
        <div class="col-sm-3" data-type="container-content">
        </div>
        <div class="col-sm-3" data-type="container-content">
        </div>
        <div class="col-sm-3" data-type="container-content">
        </div>
    </div>
</div>

<!-------------------------------------------------------------------------------------------------->
<!-- Components -->
<!-------------------------------------------------------------------------------------------------->
@foreach($snippets as $srow)
{!! $srow->snippetcontent !!}
@endforeach

