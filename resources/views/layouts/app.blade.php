<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kaoskerenid') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Web Internal Sablon Satuan - Kaoskerenid">
    <meta name="author" content="Uiaciel">
    <meta name="description" content="Website pencatat pesanan Sablon Satuan Kaoskerenid.">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/icons/ios/120.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/icons/icon-72x72.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/icons/ios/16.png">
    <link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    @vite('resources/sass/app.scss')
    @laravelPWA

    <!-- Sweet Alert -->
    {{-- <link type="text/css" href="../../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet"> --}}

    <!-- Notyf -->
    {{-- <link type="text/css" href="../../vendor/notyf/notyf.min.css" rel="stylesheet"> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Volt CSS -->
    <link type="text/css" href="/css/volt.css" rel="stylesheet">
    <link type="text/css" href="/css/dt.min.css" rel="stylesheet">
    <style>
        .chat-online {
            color: #34ce57
        }

        .chat-offline {
            color: #e4606d
        }

        .chat-messages {
            display: flex;
            flex-direction: column;
            max-height: 800px;
            overflow-y: scroll
        }

        .chat-message-left,
        .chat-message-right {
            display: flex;
            flex-shrink: 0
        }

        .chat-message-left {
            margin-right: auto
        }

        .chat-message-right {
            flex-direction: row-reverse;
            margin-left: auto
        }

        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }

        .flex-grow-0 {
            flex-grow: 0 !important;
        }

        .border-top {
            border-top: 1px solid #dee2e6 !important;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
        }
    </style>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body class="bg-dark">

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark navbar-theme-primary p-3">
        <div class="container-fluid">
            <a class="navbar-brand me-lg-5" href="{{ route('home') }}">
                <img class="navbar-brand-dark" src="../../assets/icons/ios/72.png" alt="Volt logo" /> <img
                    class="navbar-brand-light" src="../../assets/icons/ios/72.png" alt="Volt logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('klien.index') }}">Klien</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Order
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('order.index') }}">Semua Order</a></li>
                            <li><a class="dropdown-item" href="{{ route('home') }}">Orderan Akif</a></li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produk.index') }}">Produk</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('belanja') }}">BELANJA</a></li>
                            <li><a class="dropdown-item" href="{{ route('katalog.index') }}">KATALOG</a></li>
                            <li><a class="dropdown-item" href="{{ route('keuangan.index') }}">KEUANGAN</a></li>
                            <li><a class="dropdown-item" href="{{ route('stok.index') }}">STOK</a></li>
                            <li><a class="dropdown-item" href="/admin/produk/list">PRODUK</a></li>
                            <li><a class="dropdown-item" href="{{ route('design.eps') }}">DESIGN</a></li>
                            <li><a class="dropdown-item" href="{{ route('design.index') }}">MOCKUP</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('report.index') }}">REPORT</a></li>
                            <li><a class="dropdown-item" href="{{ route('project.index') }}">PROJECT</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.index') }}">BLOG</a>
                    </li>



                </ul>

                <ul class="navbar-nav">

                    @guest
                        @if (Route::has('login'))
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/" target="_blank">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark notification-bell unread dropdown-toggle"
                                data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown"
                                data-bs-display="static" aria-expanded="false">
                                <svg class="icon icon-sm text-white" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                    </path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                                <div class="list-group list-group-flush">
                                    <a href="#"
                                        class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a>
                                    <a href="#" class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder"
                                                    src="../../assets/img/team/profile-picture-1.jpg"
                                                    class="avatar-md rounded">
                                            </div>
                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Jose Leos</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small class="text-danger">a few moments ago</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">Added you to an event "Project stand-up"
                                                    tomorrow at 12:30 AM.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder"
                                                    src="../../assets/img/team/profile-picture-2.jpg"
                                                    class="avatar-md rounded">
                                            </div>
                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Neil Sims</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small class="text-danger">2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">You've been assigned a task for "Awesome
                                                    new project".</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder"
                                                    src="../../assets/img/team/profile-picture-3.jpg"
                                                    class="avatar-md rounded">
                                            </div>
                                            <div class="col ps-0 m-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Roberta Casas</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small>5 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">Tagged you in a document called "Financial
                                                    plans",</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder"
                                                    src="../../assets/img/team/profile-picture-4.jpg"
                                                    class="avatar-md rounded">
                                            </div>
                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Joseph Garth</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small>1 d ago</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">New message: "Hey, what's up? All set for
                                                    the presentation?"</p>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#" class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder"
                                                    src="../../assets/img/team/profile-picture-5.jpg"
                                                    class="avatar-md rounded">
                                            </div>
                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Bonnie Green</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small>2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">New message: "We need to improve the UI/UX
                                                    for the landing page."</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item text-center fw-bold rounded-bottom py-3">
                                        <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        View all
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ms-lg-3">

                            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="media d-flex align-items-center">
                                    <img class="avatar rounded-circle" alt="Image placeholder"
                                        src="../../assets/img/team/profile-picture-3.jpg">
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                        <span class="mb-0 font-small fw-bold text-white">{{ Auth::user()->name }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    My Profile
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Settings
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Messages
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Support
                                </a>
                                <div role="separator" class="dropdown-divider my-1"></div>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest


                </ul>
                <div class="d-flex">

                    <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-none bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div
                class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg me-4">
                        <img src="../../assets/img/team/profile-picture-5.jpg"
                            class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                    </div>
                    <div class="d-block">
                        @guest
                        @else
                            <h2 class="h5 mb-3">Hi, {{ Auth::user()->name }}</h2>
                        @endguest




                        <a href="href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                            class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="collapse-close d-md-none">
                    <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                        aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <ul class="nav flex-column pt-3 pt-md-0">

                <li class="nav-item  active ">
                    <a href="{{ route('home') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('klien.index') }}" class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                    </path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Klien</span>
                        </span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('order.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                                <path fill-rule="evenodd"
                                    d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Semua Orderan</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('produk.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between" href="{{ route('blog.index') }}">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">BLOG</span>
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('report.index') }}" class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Report</span>
                        </span>
                        <span>
                            <span class="badge badge-sm bg-secondary ms-1 text-gray-800">Pro</span>
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-components">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                    <path fill-rule="evenodd"
                                        d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Admin</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>
                    <div class="multi-level collapse " role="list" id="submenu-components" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('keuangan.index') }}">
                                    <span class="sidebar-text">Keuangan</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('stok.index') }}">
                                    <span class="sidebar-text">STOK</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </li>
                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Documentation <span
                                class="badge badge-sm bg-secondary ms-1 text-gray-800">v1.4</span></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('order.index') }}"
                        class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro">
                        <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span>Orderan</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="pt-4 pb-4">
        @yield('title')

    </div>
    <main class="container">
        @yield('content')
        <!-- Back to top button -->
        @include('sweetalert::alert')
        <!-- Button trigger modal -->

        <nav
            class="navbar fixed-bottom navbar-expand-lg bg-dark navbar-dark navbar-theme-primary p-3 d-block d-sm-none">
            <div class="d-grid gap-2 d-md-block">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#menumodal">
                    Quick Menu
                </button>

            </div>
        </nav>



        <!-- Modal -->
        <div class="modal fade" id="menumodal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm modal-fullscreen-md-down">
                <div class="modal-content bg-gray-800 text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Quick Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div
                            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar-lg me-4">
                                    <img src="../../assets/img/team/profile-picture-5.jpg"
                                        class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                                </div>
                                <div class="d-block">
                                    @guest
                                    @else
                                        <h2 class="h5 mb-3">Hi, {{ Auth::user()->name }}</h2>
                                    @endguest




                                    <a href="href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                                        <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                        Sign Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <div class="collapse-close d-md-none">
                                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                                    aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <ul class="nav flex-column pt-3 pt-md-0">

                            <li class="nav-item  active ">
                                <a href="{{ route('home') }}" class="nav-link">
                                    <span class="sidebar-icon">
                                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                        </svg>
                                    </span>
                                    <span class="sidebar-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('klien.index') }}" class="nav-link d-flex justify-content-between">
                                    <span>
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">Klien</span>
                                    </span>

                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('order.index') }}" class="nav-link">
                                    <span class="sidebar-icon">
                                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                                            <path fill-rule="evenodd"
                                                d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="sidebar-text">Semua Orderan</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('produk.index') }}" class="nav-link">
                                    <span class="sidebar-icon">
                                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="sidebar-text">Produk</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('design.index') }}" class="nav-link">
                                    <span class="sidebar-icon">
                                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="sidebar-text">MOCKUP</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('design.eps') }}" class="nav-link">
                                    <span class="sidebar-icon">
                                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="sidebar-text">DESIGN</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex justify-content-between" href="{{ route('blog.index') }}">
                                    <span>
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">BLOG</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('report.index') }}"
                                    class="nav-link d-flex justify-content-between">
                                    <span>
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">Report</span>
                                    </span>
                                    <span>
                                        <span class="badge badge-sm bg-secondary ms-1 text-gray-800">Pro</span>
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse" data-bs-target="#submenu-components">
                                    <span>
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                                <path fill-rule="evenodd"
                                                    d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">Admin</span>
                                    </span>
                                    <span class="link-arrow">
                                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </span>
                                <div class="multi-level collapse " role="list" id="submenu-components"
                                    aria-expanded="false">
                                    <ul class="flex-column nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('belanja') }}">
                                                <span class="sidebar-text">BELANJA</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('katalog.index') }}">
                                                <span class="sidebar-text">KATALOG</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/admin/produk/list">
                                                <span class="sidebar-text">PRODUK LIST</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('keuangan.index') }}">
                                                <span class="sidebar-text">KEUANGAN</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('stok.index') }}">
                                                <span class="sidebar-text">STOK</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
                                    <span class="sidebar-icon">
                                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="sidebar-text">Documentation <span
                                            class="badge badge-sm bg-secondary ms-1 text-gray-800">v1.4</span></span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('order.index') }}"
                                    class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro">
                                    <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
                                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span>Orderan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
        <i class="bi bi-arrow-up-square-fill"></i>
    </button>
    <!-- Core -->
    <script src="../../vendor/jquery/jquery.3.2.1.min.js"></script>
    <script src="../../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <script>
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <!-- Vendor JS -->
    {{-- <script src="../../vendor/onscreen/dist/on-screen.umd.min.js"></script> --}}

    <!-- Slider -->
    {{-- <script src="../../vendor/nouislider/distribute/nouislider.min.js"></script> --}}

    <!-- Smooth scroll -->
    {{-- <script src="../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script> --}}

    <!-- Charts -->
    {{-- <script src="../../vendor/chartist/dist/chartist.min.js"></script> --}}
    {{-- <script src="../../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script> --}}

    <!-- Datepicker -->
    <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Sweet Alerts 2 -->
    {{-- <script src="../../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script> --}}

    <!-- Moment JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script> --}}

    <!-- Vanilla JS Datepicker -->
    {{-- <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script> --}}

    <!-- Notyf -->
    {{-- <script src="../../vendor/notyf/notyf.min.js"></script> --}}

    <!-- Simplebar -->
    <script src="../../vendor/simplebar/dist/simplebar.min.js"></script>

    <!-- Datatables -->
    <script src="../../vendor/datatables/datatables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Github buttons -->
    {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}

    <!-- Volt JS -->
    <script src="../../assets/js/volt.js"></script>
    <script src="../../assets/js/dt.min.js"></script>

    <script>
        tinymce.init({
            selector: '#tinymce',

            image_class_list: [{
                    title: 'image-responsive',
                    value: 'img-fluid mb-3'
                }, {
                    title: 'image-left',
                    value: 'image-left'
                },
                {
                    title: 'image-right',
                    value: 'image-right'
                },
                {
                    title: 'image-center',
                    value: 'image-center'
                },
            ],
            height: 500,
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
            },
            plugins: [
                "paste fullscreen advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "code fullscreen | paste | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
            menubar: false,
            image_title: true,
            automatic_uploads: true,

            images_upload_handler: function(blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{ route('upload') }}');
                var token = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            },

            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };
                input.click();
            }
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#data').DataTable({
                paging: false
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.input-daterange').datepicker({
                todayBtn: 'linked',
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            load_data();

            function load_data(from_date = '', to_date = '') {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{!! route('klien.export') !!}',
                        data: {
                            from_date: from_date,
                            to_date: to_date
                        }
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'nama',
                            name: 'nama',

                        },
                        {
                            data: 'hp',
                            name: 'hp'
                        },

                        {
                            data: 'action',
                            name: 'Action',
                            orderable: false,
                            searchable: false
                        },

                    ]
                });
            }

            $('#filter').click(function() {
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if (from_date != '' && to_date != '') {
                    $('#users-table').DataTable().destroy();
                    load_data(from_date, to_date);
                } else {
                    alert('Both Date is required');
                }
            });

            $('#refresh').click(function() {
                $('#from_date').val('');
                $('#to_date').val('');
                $('#users-table').DataTable().destroy();
                load_data();
            });


        });
    </script>

    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('klien.index') !!}', // memanggil route yang menampilkan data json
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        class : 'text-wrap'
                    },
                    {
                        data: 'hp',
                        name: 'hp'
                    },

                    {
                        data: 'action',
                        name: 'Action',
                        orderable: false,
                        searchable: false
                    },

                ]
            });
        });

        $(function() {
            $('#eps-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('design.eps') !!}', // memanggil route yang menampilkan data json
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'klien.nama',
                        name: 'klien.nama',

                    },
                    {
                        data: 'path',
                        name: 'path'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },


                    {
                        data: 'created_at',
                        name: 'created_at'
                    },

                ]
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#orders-table').DataTable({
                // pageLength: 10,
                processing: true,
                serverSide: true,
                searching: true,
                // dom: 'lrt',
                ajax: {
                    "url": "{{ route('order.index') }}",
                    "data": function(d) {
                        d.filter_periode = $('#filter_periode').val();
                    }
                },
                columns: [{ // mengambil & menampilkan kolom sesuai tabel database
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',

                    },
                    {
                        data: 'klien.nama',
                        name: 'klien.nama'
                    },

                    {
                        data: 'detail',
                        name: 'detail'
                    },

                    {
                        data: 'action',
                        name: 'Action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'qty',
                        name: 'qty'
                    },

                    {
                        data: 'pembayaran',
                        name: 'pembayaran',

                    },


                ]

            });

            $('#filter-search').keyup(function() {
                table.search($(this).val()).draw();
            })

            //filter Berdasarkan periode
            $('#filter_periode').change(function() {
                table.draw();
            });

        });
    </script>


    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.select2-multiple').select2({
                width: "100%"
            });
            // Select2 Single  with Placeholder
            $('.selectklien').select2({
                placeholder: "Cari Orderan disini",
                allowClear: true,
                width: "100%"
            });

        });
    </script>
    <script>
        $.ajax({
            url: '{{ route('listproduk', 'all') }}',
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log(data);


                var mydata = data;

                $('[id^="produk"]').append('<option value="">PILIH PRODUK</option>');
                $.each(data, function(key, value) {

                    var id = mydata[key].id;
                    var nama = mydata[key].nama;
                    var kat = mydata[key].kategori;
                    var hrg = mydata[key].harga;

                    $('[id^="produk"]').append('<option data-id="' + hrg + '" data-nama="' + nama +
                        '" value="' + id + '">' + kat + '-' + nama + '</option>');
                });


            }
        });



        $(document).on('click', '.remove', function() {
            $(this).closest('tr').remove();
        });

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

        $('[id="produk"]').change(function() { //jika berubah
            //alert($(this).children('option:selected').data('id'));

            const value = $(this).children('option:selected').data('id');
            /// tambahan untuk semuanya
            $('[id="harga"]').val(value);

            const qty = $('[id="qty"]').val();
            const total = value * qty;
            $('[id="total"]').val(total);
            //tambahan untuk semuanya
            $('[id="qty"]').change(function() {
                const qty = $(this).val();
                const total = value * qty;
                $('[id="total"]').val(total);
            });

        });


        $('[id="produk1"]').change(function() { //jika berubah
            //alert($(this).children('option:selected').data('id'));

            const value = $(this).children('option:selected').data('id');
            /// tambahan untuk semuanya
            $('[id="harga1"]').val(value);

            const qty = $('[id="qty1"]').val();
            const total = value * qty;
            $('[id="total1"]').val(total);
            //tambahan untuk semuanya
            $('[id="qty1"]').change(function() {
                const qty = $(this).val();
                const total = value * qty;
                $('[id="total1"]').val(total);
            });

        });



        $('[id="produk2"]').change(function() { //jika berubah
            //alert($(this).children('option:selected').data('id'));

            const value = $(this).children('option:selected').data('id');
            /// tambahan untuk semuanya
            $('[id="harga2"]').val(value);

            const qty = $('[id="qty2"]').val();
            const total = value * qty;
            $('[id="total2"]').val(total);
            //tambahan untuk semuanya
            $('[id="qty2"]').change(function() {
                const qty = $(this).val();
                const total = value * qty;
                $('[id="total2"]').val(total);
            });

        });


        $('[id="produk3"]').change(function() { //jika berubah
            //alert($(this).children('option:selected').data('id'));

            const value = $(this).children('option:selected').data('id');
            /// tambahan untuk semuanya
            $('[id="harga3"]').val(value);

            const qty = $('[id="qty3"]').val();
            const total = value * qty;
            $('[id="total3"]').val(total);
            //tambahan untuk semuanya
            $('[id="qty3"]').change(function() {
                const qty = $(this).val();
                const total = value * qty;
                $('[id="total3"]').val(total);
            });

        });


        $('[id="produk4"]').change(function() { //jika berubah
            //alert($(this).children('option:selected').data('id'));

            const value = $(this).children('option:selected').data('id');
            /// tambahan untuk semuanya
            $('[id="harga4"]').val(value);

            const qty = $('[id="qty4"]').val();
            const total = value * qty;
            $('[id="total4"]').val(total);
            //tambahan untuk semuanya
            $('[id="qty4"]').change(function() {
                const qty = $(this).val();
                const total = value * qty;
                $('[id="total4"]').val(total);
            });

        });


        $('[id="produk5"]').change(function() { //jika berubah
            //alert($(this).children('option:selected').data('id'));

            const value = $(this).children('option:selected').data('id');
            /// tambahan untuk semuanya
            $('[id="harga5"]').val(value);

            const qty = $('[id="qty5"]').val();
            const total = value * qty;
            $('[id="total5"]').val(total);
            //tambahan untuk semuanya
            $('[id="qty5"]').change(function() {
                const qty = $(this).val();
                const total = value * qty;
                $('[id="total5"]').val(total);
            });

        });


        $('[id="produk6"]').change(function() { //jika berubah
            //alert($(this).children('option:selected').data('id'));

            const value = $(this).children('option:selected').data('id');
            /// tambahan untuk semuanya
            $('[id="harga6"]').val(value);

            const qty = $('[id="qty6"]').val();
            const total = value * qty;
            $('[id="total6"]').val(total);
            //tambahan untuk semuanya
            $('[id="qty6"]').change(function() {
                const qty = $(this).val();
                const total = value * qty;
                $('[id="total6"]').val(total);
            });

        });


        $('[id="produk7"]').change(function() { //jika berubah
            //alert($(this).children('option:selected').data('id'));

            const value = $(this).children('option:selected').data('id');
            /// tambahan untuk semuanya
            $('[id="harga7"]').val(value);

            const qty = $('[id="qty7"]').val();
            const total = value * qty;
            $('[id="total7"]').val(total);
            //tambahan untuk semuanya
            $('[id="qty7"]').change(function() {
                const qty = $(this).val();
                const total = value * qty;
                $('[id="total7"]').val(total);
            });

        });
    </script>
    <script>
        $("input[name='hp']").keyup(function() {

            phone = $(this).val().trim();

            if (phone.startsWith('+62')) {
                phone = '0' + phone.slice(3);
            } else if (phone.startsWith('62')) {
                phone = '0' + phone.slice(2);
            }

            $(this).val(phone.replace(/[- .]/g, ''));
        });
    </script>
    <script>
        function myFunction() {
            alert("berhasil di copy");
        }
    </script>

    <script>
        $(".bntcopy").click(function() {
            $("#myCopy").select();
            document.execCommand('copy');
            // alert('Berhasil di copy');
        });

        document.querySelector("button").onclick = function() {
            document.querySelector("textarea").select();
            document.execCommand('copy');
        }
    </script>

    <script>
        document.getElementById('date').valueAsDate = new Date();
    </script>

    <script>
        jQuery('#datetimepicker').datetimepicker();
    </script>

    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');

        });



        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>


</body>

</html>
<!--

=========================================================
* Volt Free - Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
