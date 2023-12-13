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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
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



<body>
   <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container">
                        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('all-task') }}">View All Task</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('show-add-task') }}">Add Task</a>
                                </li>
                                <!-- Project Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="projectDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Projects
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="projectDropdown">
                                        @foreach(\App\Models\Project::all() as $project)
                                            <a class="dropdown-item" href="{{ route('tasks-by-project', ['id' => $project->id]) }}">{{ $project->name }}</a>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        <main class="py-2 container ">
           
            @yield('content')
        </main>
    </div>
    <footer style="position: absolute; bottom: 0; width: 100%;">
        <p class="text-center"> &copy; @php echo date('Y')@endphp CoTech | Laravel Test <br> All Rights Reserved.</p>
    </footer>
    
    @yield('scripts')
    <!-- JavaScript Bundle with Popper -->
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
</body>
</html>
