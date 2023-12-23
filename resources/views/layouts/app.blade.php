<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salwa | Tender</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">    
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">        
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <style>
        .container {
            max-width: 100% !important;
        }
    </style>
</head>

@guest        
        <section class="mt-4 py-4">
            @yield('content')
        </section>

    @else

        <body class="hold-transition sidebar-mini layout-fixed">    
            <div class="wrapper">        
                @include('components.navbar')
                @include('components.sidebar')
                
                <div class="content-wrapper">            
                    <section class="content-header">
                        @yield('content-header')
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        @yield('content')
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <footer class="main-footer" style="padding:2px 1rem;">
                    @include('components.footer')
                </footer>
                
                {{-- <aside class="control-sidebar control-sidebar-dark">            
                </aside> --}}
                
            </div>

    @endguest
            
        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>    
        <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>            
        <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>                        
    </body>

</html>
