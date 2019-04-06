<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('cadmin.layouts.compscripts.headstyle')
    @yield('css')

</head>
<body class="cadmin-body">
    <div class="wrapper">

        <div class="adminltehs">
        @include('cadmin.shared.electionheader')
        @include('cadmin.shared.electionsidebar')
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
    @include('cadmin.layouts.compscripts.general')
    @include('cadmin.layouts.compscripts.serviceworker')
    @yield('scripts')
</body>
</html>
