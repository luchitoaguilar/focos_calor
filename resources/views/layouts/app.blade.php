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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilo.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-light navbar-dark bg-dark ">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ asset('ecem_logo.png') }}" width="30" height="30" class="d-inline-block align-top"
                    alt="">
                <span class="menu-collapsed">SMATIFE</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <form class="form-inline my-2 my-lg-0">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary active" role="button"
                                aria-haspopup="true" aria-expanded="false"
                                aria-pressed="true">{{ __('Iniciar Sesion') }}</a>
                        </form>
                    @endguest
                    <!-- This menu is hidden in bigger devices with d-sm-none.
               The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
                    <li class="nav-item dropdown d-sm-block d-md-none">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Quienes Somos?
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('mision') }}">{{ __('Misión') }}</a>
                            <a class="dropdown-item" href="{{ route('vision') }}">{{ __('Visión') }}</a>
                            <a class="dropdown-item" href="{{ route('objetivo') }}">Objetivo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Presentación</a>
                            <a class="dropdown-item" href="#">Objeto</a>
                            <a class="dropdown-item" href="#">Finalidad</a>
                            <a class="dropdown-item" href="#">Importancia</a>
                        </div>
                    </li>
                    @auth
                        <li class="nav-item dropdown d-sm-block d-md-none">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Documentación
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('pon') }}">{{ __('P.O.N.') }}</a>
                                <a class="dropdown-item" href="#">{{ __('NN.VV.AA.') }}</a>
                                <a class="dropdown-item" href="#">{{ __('NN.SS.') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Boletines</a>
                                <a class="dropdown-item" href="#">Formulario EDAN</a>
                            </div>
                        </li>
                    @endauth
                    <li class="nav-item dropdown d-sm-block d-md-none">
                        <a class="nav-link" href="{{ route('outlet_map.index') }}">{{ __('Departamentos') }}</a>
                    </li>

                    <li class="nav-item dropdown d-sm-block d-md-none">
                        <a class="nav-link"
                            href="{{ route('outlet_map.guarniciones') }}">{{ __('Jurisdicciones') }}</a>
                    </li>
                    @auth
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav ml-auto">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <form class="form-inline my-2 my-lg-0">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar Sesion') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('register.create') }}">
                                                {{ __('Registrar usuario') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </ul>
                        </div>
                    @endauth

                </ul>
            </div>
        </nav><!-- NavBar END -->
        <!-- Bootstrap row -->
        <div class="row" id="body-row">
            <!-- Sidebar -->
            <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
                <!-- Bootstrap List Group -->
                <ul class="list-group">
                    <!-- Separator with title -->
                    <li
                        class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                        <small>MENU PRINCIPAL</small>
                    </li>
                    <!-- /END Separator -->
                    <!-- Menu with submenu -->
                    <a href="#submenu1" data-toggle="collapse" aria-expanded="false"
                        class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-question fa-fw mr-3"></span>
                            <span class="menu-collapsed">Quienes Somos?</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>
                    <!-- Submenu content -->
                    <div id='submenu1' class="collapse sidebar-submenu">
                        <a href="{{ route('mision') }}"
                            class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Misión</span>
                        </a>
                        <a href="{{ route('vision') }}"
                            class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Visión</span>
                        </a>
                        <a href="{{ route('objetivo') }}"
                            class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Objetivo</span>
                        </a>
                        <!-- Separator without title -->
                        <li class="list-group-item sidebar-separator menu-collapsed"></li>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Presentación</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Objeto</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Finalidad</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Importancia</span>
                        </a>
                    </div>
                    @auth
                        <a href="#submenu2" data-toggle="collapse" aria-expanded="false"
                            class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-file-text fa-fw mr-3"></span>
                                <span class="menu-collapsed">Documentacion</span>
                                <span class="submenu-icon ml-auto"></span>
                            </div>
                        </a>
                        <!-- Submenu content -->
                        <div id='submenu2' class="collapse sidebar-submenu">
                            <a href="{{ route('pon') }}" class="list-group-item list-group-item-action bg-dark text-white">
                                <span class="menu-collapsed">P.O.N.</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                                <span class="menu-collapsed">NN.VV.AA.</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                                <span class="menu-collapsed">NN.SS.</span>
                            </a>
                        </div>
                    @endauth
                    <a href="{{ route('outlet_map.index') }}" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-home fa-fw mr-3"></span>
                            <span class="menu-collapsed">Departamentos</span>
                        </div>
                    </a>
                    <a href="{{ route('outlet_map.guarniciones') }}" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-institution fa-fw mr-3"></span>
                            <span class="menu-collapsed">Jurisdicciones</span>
                        </div>
                    </a>
                    @auth
                        <!-- Separator with title -->
                        <li
                            class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                            <small>OPCIONES</small>
                        </li>
                        <!-- /END Separator -->
                        <a href="#" class="bg-dark list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-fire fa-fw mr-3"></span>
                                <span class="menu-collapsed">Focos Calor</span>
                            </div>
                        </a>
                        <a href="#" class="bg-dark list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-users fa-fw mr-3"></span>
                                <span class="menu-collapsed">Usuarios</span>
                            </div>
                        </a>
                    @endauth
                    <a href="#top" data-toggle="sidebar-colapse"
                        class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                            <span id="collapse-text" class="menu-collapsed"></span>
                        </div>
                    </a>
                </ul><!-- List Group END-->
            </div><!-- sidebar-container END -->

            <!-- MAIN -->
            <div class="col-lg">
                <hr>
                <main class="container-fluid">
                    @yield('content')
                </main>
            </div>
            <!-- Main Col END -->

            @include('layouts.partials.footer')
        </div>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/stilo.js') }}"></script>
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
