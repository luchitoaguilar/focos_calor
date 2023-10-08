<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/stilo.css') }}" /> --}}

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
                <img src="{{ asset('ecem-logo.jpeg') }}" width="30" height="30" class="d-inline-block align-top"
                    alt="">
                SMATIFE
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Quienes Somos?
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('mision') }}">{{ __('Misión') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Visión') }}</a>
                                <a class="dropdown-item" href="#">Objetivo</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Aplicación</a>
                                <a class="dropdown-item" href="#">Importancia</a>
                                <a class="dropdown-item" href="#">Aplicación</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Documentación
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('pon') }}">{{ __('P.O.N.') }}</a>
                                <a class="dropdown-item" href="#">{{ __('NN.VV.AA') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Normas de Seguridad') }}</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outlet_map.index') }}">{{ __('Departamentos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('outlet_map.guarniciones') }}">{{ __('Jurisdicciones') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outlets.index') }}">{{ __('outlet.list') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Auth::check() && Auth::user()->rol_id == 1)
                                <a class="nav-link" href="{{ route('register.index') }}">{{ __('Usuarios') }}</a>
                            @endif
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Quienes Somos?
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('mision') }}">{{ __('Misión') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Visión') }}</a>
                                <a class="dropdown-item" href="#">Objetivo</a>
                                <a class="dropdown-item" href="#">Aplicación</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Aplicación</a>
                                <a class="dropdown-item" href="#">Importancia</a>
                                <a class="dropdown-item" href="#">Aplicación</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outlet_map.index') }}">{{ __('Departamentos') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('outlet_map.guarniciones') }}">{{ __('Jurisdicciones') }}</a>
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
                        <a class="dropdown-item" href="{{ route('register.create') }}">
                            {{ __('Registrar usuario') }}
                        </a>
                    </div>
                </div>
            </form>
        @endauth
        {{-- para que aparezca el boton login --}}
        @guest
            <form class="form-inline my-2 my-lg-0">
                <a href="{{ route('login') }}" class="btn btn-outline-primary active" role="button" aria-haspopup="true"
                    aria-expanded="false" aria-pressed="true">{{ __('Iniciar Sesion') }}</a>
            </form>
        @endguest
    </div>
    </nav>

    {{-- <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
          <div class="list-group list-group-flush mx-3 mt-4">
                <a
          class="list-group-item list-group-item-action py-2 ripple"
          aria-current="true"
          data-mdb-toggle="collapse"
          href="#collapseExample1"
          aria-expanded="true"
          aria-controls="collapseExample1"
        >
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Expanded menu</span>
        </a>
        <!-- Collapsed content -->
        <ul id="collapseExample1" class="collapse show list-group list-group-flush">
          <li class="list-group-item py-1">
            <a href="" class="text-reset">Link</a>
          </li>
          <li class="list-group-item py-1">
            <a href="" class="text-reset">Link</a>
          </li>
          <li class="list-group-item py-1">
            <a href="" class="text-reset">Link</a>
          </li>
          <li class="list-group-item py-1">
            <a href="" class="text-reset">Link</a>
          </li>
        </ul>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Menu Principal</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple active">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Quienes Somos?</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-lock fa-fw me-3"></i><span>Password</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-chart-line fa-fw me-3"></i><span>Analytics</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-pie fa-fw me-3"></i><span>SEO</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-globe fa-fw me-3"></i><span>International</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-building fa-fw me-3"></i><span>Partners</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-money-bill fa-fw me-3"></i><span>Sales</span></a>
            </div>
        </div>
    </nav> --}}
    <!-- Sidebar -->

    <!-- Navbar -->
    {{-- <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="25" alt=""
                    loading="lazy" />
            </a>
            <!-- Search form -->
            <form class="d-none d-md-flex input-group w-auto my-auto">
                <input autocomplete="off" type="search" class="form-control rounded"
                    placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px" />
                <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
            </form>

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <!-- Notification dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#"
                        id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Some news</a></li>
                        <li><a class="dropdown-item" href="#">Another news</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>

                <!-- Icon -->
                <li class="nav-item">
                    <a class="nav-link me-3 me-lg-0" href="#">
                        <i class="fas fa-fill-drip"></i>
                    </a>
                </li>
                <!-- Icon -->
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#">
                        <i class="fab fa-github"></i>
                    </a>
                </li>

                <!-- Icon dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdown"
                        role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="united kingdom flag m-0"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#"><i class="united kingdom flag"></i>English
                                <i class="fa fa-check text-success ms-2"></i></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="poland flag"></i>Polski</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="china flag"></i>中文</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="japan flag"></i>日本語</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="germany flag"></i>Deutsch</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="france flag"></i>Français</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="spain flag"></i>Español</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="russia flag"></i>Русский</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="portugal flag"></i>Português</a>
                        </li>
                    </ul>
                </li>

                <!-- Avatar -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                        id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle"
                            height="22" alt="" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">My profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav> --}}
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
