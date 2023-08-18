<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('ecem_logo.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="{{ route('outlet_map.index') }}">
                <img src="{{ asset('ecem_logo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                ECEME
              </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Mision') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Vision') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Planes') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Normativas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outlet_map.index') }}">{{ __('Departamentos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outlet_map.guarniciones') }}">{{ __('Jurisdicciones') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outlets.index') }}">{{ __('outlet.list') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Auth::check())
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                            @endif
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Mision') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Vision') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Planes') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Normativas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outlet_map.index') }}">{{ __('Departamentos') }}</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outlet_map.guarniciones') }}">{{ __('Jurisdicciones') }}</a>
                        </li>
                    @endguest
                </ul>
                {{-- para que aparezca en boton de logout --}}
                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <form class="form-inline my-2 my-lg-0">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('register') }}" >
                                    {{ __('Registrar usuario') }}
                                </a>
                            </div>
                        </div>
                    </form>
                @endauth
                {{-- para que aparezca el boton login --}}
                @guest
                    <form class="form-inline my-2 my-lg-0">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary active" role="button" aria-haspopup="true" aria-expanded="false" aria-pressed="true">{{ __('Iniciar Sesion') }}</a>
                    </form>
                @endguest
            </div>
        </nav>

        <div class="container" style="margin-top: 70px"></div>

        <div class="container"></div>
        <main class="container-fluid">
            @yield('content')
        </main>
        @include('layouts.partials.footer')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- #region datatables files -->
    <!--Data Table-->
    <script type="text/javascript" src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <!--Export table buttons-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
    <!--Export table button CSS-->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')

    <script type="text/javascript">
        @stack('variables')
    </script>
    @include('sweetalert::alert')
</body>

</html>
