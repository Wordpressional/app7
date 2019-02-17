<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
   

    @include('admin.layouts.compscripts.keditorstyle')
    @yield('css')
 

</head>
<body>
    <div data-keditor="html">
    <div class="wrapper">
        <div class="adminltehs">
        @include('admin.shared.header')
        @include('admin.shared.sidebar')
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
@include('admin.layouts.compscripts.generalk')

@include('admin.layouts.compscripts.serviceworker')
<script>
$(document).ready(function(){

$('.thumbnail').removeAttr('data-toggle');

});
</script>
@yield('scripts')

</style>
</body>
</html>
