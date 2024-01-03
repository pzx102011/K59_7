<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/adminlte.min.css') }}">
    <!-- /.styles -->

    <!-- Scripts -->
    <script src="{{ asset('/adminlte/dist/js/adminlte.min.js') }}" defer></script>
    <!-- /.scripts -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Dodaj zawartość paska nawigacyjnego -->
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Dodaj zawartość bocznego panelu nawigacyjnego (sidebar) -->
    </aside>

    {{--    <!-- Content Wrapper. Contains page content -->--}}
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Dodaj zawartość bocznego panelu sterowania -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- Dodaj zawartość stopki -->
    </footer>
</div>
<!-- ./wrapper -->
</body>
</html>
