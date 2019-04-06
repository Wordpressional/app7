<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   

    @include('cadmin.layouts.compscripts.keditorstyle')
    @yield('css')
 

</head>
<body>
    <div data-keditor="html">
    <div class="wrapper">
        <div class="adminltehs">
        @include('cadmin.shared.header')
        @include('cadmin.shared.sidebar')
        </div>
    <div class="content-wrapper bg-light">
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    @include('shared/alerts')

                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
@include('cadmin.layouts.compscripts.generalk')

@include('cadmin.layouts.compscripts.serviceworker')
<script>
$(document).ready(function(){

$('.thumbnail').removeAttr('data-toggle');

});
</script>
@yield('scripts')

</style>
</body>
</html>
