<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('admin.layouts.compscripts.headstyle')
    @yield('css')    

</head>
<body class="admin-body bg-dark">
    @include('admin/shared/navbar')

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

   @include('admin.layouts.compscripts.general')
   @include('admin.layouts.compscripts.serviceworker')
   @yield('scripts')
</body>
</html>
