<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Attendance') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/kit.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/dropify.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @if (Auth::check())
    <script src="{{ asset('js/kit.js') }}" defer></script>
    @endif
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('dist/js/dropify.min.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <div class="wrapper">
          
            <!-- Sidebar -->
            @if (Auth::check())
                @include('layouts.sidebar')
            @endif

            <div class="main">
                
                @if (Auth::check())
                <nav class="navbar navbar-expand navbar-light navbar-bg">
                    <a class="sidebar-toggle d-flex">
                        <i class="hamburger align-self-center"></i>
                    </a>

                    <div class="navbar-collapse collapse">

                        <ul class="navbar-nav ml-auto">
                            @if (Auth::check())
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right mt-3" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                             @endif
                        </ul>

                    </div>
                </nav>
                @endif
                <main class="content">
                    
                    @include('sweetalert::alert')
                    
                    {{-- print error msg message --}}
                    <div class="container-fluid p-0">
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-xxl-6">
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
                                        Please fix the following errors
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    @yield('content')

                </main>

                <!-- Footer -->
                @include('layouts.footer')

            </div>

        </div>
    </div>

    {{-- Shwo or Hide password --}}
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>
</html>
