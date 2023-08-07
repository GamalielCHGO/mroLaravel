<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title >{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="text-center">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top colorFondo justiify-content-center ">
            <div class="container-fluid">
                <a class="navbar-brand text-white fs-1 navTitle" href="{{ url('/') }} ">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto my-2 my-lg-0  iconos" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link text-white fs-5" data-bs-toggle="tooltip" data-bs-title="Default tooltip" aria-current="page" href="{{ route('home') }}"><i class="bi bi-house-door-fill text-light fs-3"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fs-5" href="{{ route('solicitar') }}"><i class="bi bi-file-earmark-plus-fill text-light fs-3"></i></a>
                        </li>
                        <li class="nav-item fs-5fs-5fs-5 ">
                            <a class="nav-link fs-5" href="{{ route('visualizar') }}"><i class="bi bi-eye-fill fs-3"></i></a>
                        </li>
                        <li class="nav-item fs-5fs-5fs-5 ">
                            <a class="nav-link fs-5" href="{{ route('configurar') }}"><i class="bi bi-gear-fill fs-3"></i></a>
                        </li>
                        
                    </ul>



                    <form class="d-flex" role="search">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 " style="--bs-scroll-height: 100px;">
                            <li class="nav-item dropdown  fs-3">
                                <a class="nav-link dropdown-toggle text-light fs-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->username}}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item fs-5" href="#">Editar usuario</a></li>
                                    <li><a class="dropdown-item fs-5" href="hola.html"><span class="badge rounded-pill text-bg-primary">4</span>Ver notificaciones</a></li>
                                    <li class="">
                                        <a class="dropdown-item fs-5" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Cerrar sesion
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </nav>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>


