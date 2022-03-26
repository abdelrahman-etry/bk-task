<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@stack('title')</title>
        <!-- CSRF Token -->
        <meta name="_token" content="{{ csrf_token() }}">
        @include('partials.styles')
        @stack('custom-styles')
    </head>

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            @include('partials.pre-loader')
            @include('partials.navbar')
            @include('partials.sidebar')

            <div class="content-wrapper">
                @yield('content')
            </div>
            
            <aside class="control-sidebar control-sidebar-dark"></aside>

            @include('partials.footer')
        </div>

        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('assets/js/adminlte.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/dashboard2.js') }}"></script>

        @stack('custom-scripts')
    </body>
</html>
