<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>OPTIMA</title>
        <link rel="stylesheet" href="{{ '/css/bootstrap.css' }}">
        <link rel="stylesheet" href="{{ 'index.css' }}">
        <link rel="stylesheet" href="{{ '/css/bootstrap.min.css' }}">
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/fontawesme/js/all.js') }}"></script>
        <script src="https://www.gstatic.com/charts/loader.js"></script>
    <body class="sb-nav-fixed bg-light">
        @include('partie.Bars')
        @yield('nav')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @yield('sidenav')
            </div>
            <div id="layoutSidenav_content">
                <main>

                    <div class="container-fluid px-4">

                        @yield('content')

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="justify-content-between small">
                            <div class="text-muted fluid">Copyright &copy; My Optima 2023</div>

                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ 'js/bootstrap.bundle.js' }}"></script>
        <script src="{{ 'chart.js' }}"></script>
        <script src="{{ 'script.js' }}"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script> --}}
        <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
        @yield('name')
        @yield('js1')
        @yield('js2')
        @yield('js3')
    </body>
</html>



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="{{ '/css/bootstrap.css' }}">
    <link rel="stylesheet" href="{{ '/css/bootstrap.min.css' }}">
    <link rel="stylesheet" href="{{ 'index.css' }}">

    <title>Mon Application</title>
</head>
<body>
    @include('partie.navbar')


    @yield('content')

    <script src="{{ 'js/bootstrap.bundle.js' }}"></script>
    <script src="{{ 'script.js' }}"></script>
    <script src="{{ 'chart.js' }}"></script>
    @yield('js')
</body>
</html> --}}
