<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ Config::get('app.meta_keywords') }}" />
    <meta name="author" content="{{ Config::get('app.name') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="0fmJ-LyvPXl-7kr8NK1-vgW-ezwAjhAsW2K2PoYba7Q" />
    <meta name="description" content="{{ Config::get('app.meta_description') }}" />
    <meta property="og:title" content="{{ Config::get('app.meta_title') }}" />
    <meta property="og:description" content="{{ Config::get('app.meta_description') }}" />

    <title> {{ Config::get('app.name') }} | @yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer> </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- bootstrap icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
      .toast-info {
        background-color: #2f96b4;
      }
      .toast-success {
        background-color: #198754;
      }
      .toast-warning {
        background-color: #ffc107;
      }
      .toast-error {
        background-color: #dc3545;
      }
     </style>
    @yield('styles')

</head>



<body class="app-body">
        <main class="py-5 container ">
            @yield('content')
        </main>
    </div>
    <footer style="position: absolute; bottom: 0; width: 100%;">
        <p class="text-center"> &copy; @php echo date('Y')@endphp CoTech | Laravel Test <br> All Rights Reserved.</p>
    </footer>
    
    @yield('scripts')
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
