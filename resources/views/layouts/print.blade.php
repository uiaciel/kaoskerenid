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

<body class="bg-light">

    <div class="container-fluid">
        @yield('content')

    </div>

    <script src="../../vendor/jquery/jquery.3.2.1.min.js"></script>
    <script src="../../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../../assets/js/volt.js"></script>
    <script src="../../assets/js/dt.min.js"></script>
</body>

</html>
