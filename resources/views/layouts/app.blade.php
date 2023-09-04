<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title >@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="/mro/public/img/T.png">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/assets/css/sweetalert.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/assets/icon/feather/css/feather.css">
    <!-- Switch component css -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/bower_components/switchery/dist/switchery.min.css">
    <!-- Tags css -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" />
    <!-- lightbox Fremwork -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/bower_components/lightbox2/dist/css/lightbox.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/assets/icon/themify-icons/themify-icons.css">
    <!-- Font awesome star css -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Font awesome star css -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/bower_components/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/assets/icon/icofont/css/icofont.css">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css"
    href="/mro/public/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/mro/public/files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
    href="/mro/public/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    {{-- personal --}}
    <link rel="stylesheet" type="text/css" href="/mro/public/css/app.css">
    <link rel="stylesheet" href="/mro/public/files/bower_components/select2/dist/css/select2.min.css" />
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" type="text/css" href="/mro/public/files/bower_components/multiselect/css/multi-select.css" />

    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/assets/css/component.css">

    <!-- Style.css deben estar al final-->
    <link rel="stylesheet" type="text/css" href="/mro/public/files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/mro/public/files/assets/css/jquery.mCustomScrollbar.css">
    
    
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="{{ route("home")}}">
                            <img class="img-fluid" src="/mro/public/img/logoT5.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
										<i class="feather icon-x input-group-text"></i>
									</span>
                                        <input type="text" class="form-control" placeholder="search an article">
                                        <span class="input-group-append search-btn">
										<i class="feather icon-search input-group-text"></i>
									</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                            </li>
                        </ul>
                        <ul class="nav-right" >
                            <li class="header-notification" >
                                <div class="dropdown-primary dropdown" >
                                    <div >
                                        <a href="{{route('crearSolicitud')}}"><i class="icofont icofont-ui-cart"></i></a>
                                        <span class="badge bg-c-pink">
                                        @isset($cantidadCarrito)
                                            {{$cantidadCarrito}}
                                        @endisset</span>
                                    </div>
                                </div>
                            </li> 
                            {{-- perfil de usuario --}}
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <span>{{ Auth::user()->username}}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        
                                        <li>
                                            <a href="{{ route('configurar') }}">
                                                <i class="feather icon-settings"></i> Configuracion
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html">
                                                <i class="feather icon-user"></i> Perfil
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> Mensajes
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="feather icon-log-out"></i> Cerrar sesion
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navegacion</div>
                            <ul class="pcoded-item pcoded-left-item">
                                {{-- primer menu y submenu --}}
                                {{-- <li class="pcoded-hasmenu active pcoded-trigger"> --}}
                                    <li class="pcoded-hasmenu {{ request()->routeIs('crearSolicitud') ? 'active pcoded-trigger' : '' }} {{ request()->routeIs('listaSolicitudes') ? 'active pcoded-trigger' : '' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Inicio</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        {{-- <li class="active"> --}}
                                        <li class="{{ request()->routeIs('crearSolicitud') ? 'active' : '' }}">
                                            <a href="{{ route('crearSolicitud') }}">
                                                <span class="pcoded-mtext">Crear solicitud</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs('listaSolicitudes') ? 'active' : '' }}">
                                            <a href="{{ route('listaSolicitudes') }}">
                                                <span class="pcoded-mtext">Visualizar solicitudes</span>
                                            </a>
                                        </li>
                                        {{-- <li class=" ">
                                            <a href="dashboard-analytics.html">
                                                <span class="pcoded-mtext">Analytics</span>
                                                <span class="pcoded-badge label label-info ">NEW</span>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </li>
                                <li class="{{ request()->routeIs('listaArticulos') ? 'active' : '' }}">
                                    <a href="{{ route('listaArticulos') }}">
                                        <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                                        <span class="pcoded-mtext">Articulos</span>
                                    </a>
                                </li>
                                
                                <li class="">
                                    <a href="{{route('configurar') }}">
                                        <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                                        <span class="pcoded-mtext">Configuracion</span>
                                    </a>
                                </li>


                               
                                
                                @can('configuracion')
                                    <li class="pcoded-hasmenu 
                                    {{ request()->routeIs('crearUsuario','listaUsuarios','listaCcs','crearArticulo','listaArticulos','listaDepartamentos','listaEstaciones','listaAsignacion') ? 'active pcoded-trigger' : '' }}">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="icofont icofont-folder-open"></i></span>
                                            <span class="pcoded-mtext">Administracion</span>
                                        </a>
                                        {{-- submenu de usuarios --}}
                                        <ul class="pcoded-submenu">
                                            <li class=" pcoded-hasmenu  {{ request()->routeIs('crearUsuario') ? 'active pcoded-trigger' : '' }} {{ request()->routeIs('listaUsuarios') ? 'active pcoded-trigger' : '' }}">
                                                <a href="javascript:void(0)">
                                                    <span class="pcoded-mtext">Usuarios</span>
                                                </a>
                                                <ul class="pcoded-submenu">
                                                    <li class="{{ request()->routeIs('crearUsuario') ? 'active' : '' }}">
                                                        <a href="{{ route('crearUsuario') }}">
                                                            <span class="pcoded-mtext">Crear usuarios</span>
                                                        </a>
                                                    </li>
                                                    <li class="{{ request()->routeIs('listaUsuarios') ? 'active' : '' }}">
                                                        <a href="{{ route('listaUsuarios') }}">
                                                            <span class="pcoded-mtext">Lista de usuarios</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        {{-- submenu de articulos --}}
                                        <ul class="pcoded-submenu">
                                            <li class=" pcoded-hasmenu  {{ request()->routeIs('crearArticulo') ? 'active pcoded-trigger' : '' }} {{ request()->routeIs('listaArticulos') ? 'active pcoded-trigger' : '' }}">
                                                <a href="javascript:void(0)">
                                                    <span class="pcoded-mtext">Articulos</span>
                                                </a>
                                                <ul class="pcoded-submenu">
                                                    <li class="{{ request()->routeIs('crearArticulo') ? 'active' : '' }}">
                                                        <a href="{{ route('crearArticulo') }}">
                                                            <span class="pcoded-mtext">Crear articulo</span>
                                                        </a>
                                                    </li>
                                                    <li class="{{ request()->routeIs('listaArticulos') ? 'active' : '' }}">
                                                        <a href="{{ route('listaArticulos') }}">
                                                            <span class="pcoded-mtext">Lista de articulos</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="pcoded-submenu">
                                            <li class="{{ request()->routeIs('listaDepartamentos') ? 'active' : '' }}">
                                                <a href="{{ route('listaDepartamentos') }}">
                                                    <i class="fa fa-users"></i> Departamentos
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="pcoded-submenu">
                                            <li class="{{ request()->routeIs('listaCcs') ? 'active' : '' }}">
                                                <a href="{{ route('listaCcs') }}">
                                                    <i class="fa fa-money"></i> CC
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="pcoded-submenu">
                                            <li class="{{ request()->routeIs('listaEstaciones') ? 'active' : '' }}">
                                                <a href="{{ route('listaEstaciones') }}">
                                                    <i class="fa fa-hourglass-start"></i> Estaciones
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="pcoded-submenu">
                                            <li class="{{ request()->routeIs('listaAsignacion') ? 'active' : '' }}">
                                                <a href="{{ route('listaAsignacion') }}">
                                                    <i class="fa fa-barcode"></i> Asignacion de articulos
                                                </a>
                                            </li>
                                        </ul>
                                        

                                    </li>
                                @endcan
                                <li class=" {{ request()->routeIs('aprobaciones') ? 'active' : '' }}">
                                    <a href="{{ route('aprobaciones') }}">
                                        <span class="pcoded-micon"><i class="icofont icofont-tick-boxed"></i></span>
                                        <span class="pcoded-mtext">Aprobaciones</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="pcoded-micon"><i class="feather icon-x"></i></span>
                                        <span class="pcoded-mtext">Cerrar sesion</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    {{-- fin de nav --}}
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    @yield('content')

                                </div>

                                {{-- <div id="styleSelector">

                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="/mro/public/files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="/mro/public/files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="/mro/public/files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="/mro/public/files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="/mro/public/files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="/mro/public/files/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/mro/public/files/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/mro/public/files/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="/mro/public/files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="/mro/public/files/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="/mro/public/files/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="/mro/public/files/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    {{-- lightbox --}}
    <script type="text/javascript" src="/mro/public/files/bower_components/lightbox2/dist/js/lightbox.min.js"></script>
    <!-- Switch component js -->
    <script type="text/javascript" src="/mro/public/files/bower_components/switchery/dist/switchery.min.js"></script>
    <!-- Tags js -->
    <script type="text/javascript"
        src="/mro/public/files/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
    <!-- Max-length js -->
    <script type="text/javascript"
        src="/mro/public/files/bower_components/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>
    <!-- sweet alert js -->
    <script type="text/javascript" src="/mro/public/files/assets/js/sweetalert.js"></script>
    <script type="text/javascript" src="/mro/public/files/assets/js/modal.js"></script> 
    <!-- sweet alert modal.js intialize js -->
    <!-- modalEffects js nifty modal window effects -->
    <script type="text/javascript" src="/mro/public/files/assets/js/modalEffects.js"></script>
    <script type="text/javascript" src="/mro/public/files/assets/js/classie.js"></script>

    <!-- Chart js -->
    <script type="text/javascript" src="/mro/public/files/bower_components/chart.js/dist/Chart.js"></script>
    <!-- amchart js -->
    <script src="/mro/public/files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="/mro/public/files/assets/pages/widget/amchart/serial.js"></script>
    <script src="/mro/public/files/assets/pages/widget/amchart/light.js"></script>
    <script type="text/javascript" src="/mro/public/files/assets/js/SmoothScroll.js"></script>
    <script type="text/javascript" src="/mro/public/files/assets/pages/issue-list/issue-list.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="/mro/public/files/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="/mro/public/files/assets/js/script.min.js"></script>
    <script src="/mro/public/files/assets/pages/data-table/js/data-table-custom.js"></script>
    <script type="text/javascript" src="/mro/public/files/assets/pages/advance-elements/swithces.js"></script>
{{-- tooltips --}}
<script>
    $(document).ready(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    $(document).ready(function () {
        $('[data-bs-toggle="popover"]').popover({
            html: true,
            content: function () {
                return $('#primary-popover-content').html();
            }
        });
    });

    lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })

</script>
        {{-- customs js  --}}
        <script type="text/javascript" src="/mro/public/files/assets/pages/advance-elements/select2-custom.js"></script>
        <script src="/mro/public/files/assets/js/pcoded.min.js"></script>
        <script src="/mro/public/files/assets/js/vartical-layout.min.js"></script>
        <script src="/mro/public/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="/mro/public/files/assets/js/script.js"></script>
        

    <!-- data-table js -->
    <script src="/mro/public/files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/mro/public/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/mro/public/files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="/mro/public/files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="/mro/public/files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="/mro/public/files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/mro/public/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/mro/public/files/assets/pages/data-table/js/dataTables.bootstrap4.min.js"></script>
    <script src="/mro/public/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/mro/public/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="/mro/public/files/assets/pages/sparkline/jquery.sparkline.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="/mro/public/files/bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="/mro/public/files/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="/mro/public/files/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="/mro/public/files/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
    <!-- Select 2 js -->
    <script type="text/javascript" src="/mro/public/files/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- Multiselect js -->
    <script type="text/javascript" src="/mro/public/files/bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"> </script>
    <script type="text/javascript" src="/mro/public/files/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="/mro/public/files/assets/js/jquery.quicksearch.js"></script>


    

    
</body>

</html>
