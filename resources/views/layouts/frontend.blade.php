<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="KaoskerenID">

    <title>KAOSKERENID - @yield('title', 'Sablon Satuan Kota Bogor')</title>
    <meta name="keywords" content="@yield('meta_keys', 'Sablon Satuan, Sablon Bogor, Sablon Kota Bogor, Kaos kota bogor, kaos polos, bikin kaos satuan, kaos custom bogor, kaos terbaik bogor')">
    <meta name="description" content="@yield('meta_desc')">
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="url" content="{{ url()->current() }}">

    <meta name='og:title' content="@yield('title', 'Sablon Satuan Kota Bogor')">
    <meta name='og:type' content='website'>
    <meta name='og:url' content="{{ url()->current() }}">
    <meta name='og:image' content="@yield('meta_image', 'https://kaoskeren.id/images/toko-sablon-satuan.png')">
    <meta name='og:site_name' content="KAOSKERENID - @yield('title', 'Sablon Satuan Kota Bogor')">
    <meta name='og:description' content="@yield('meta_desc', 'Toko Sablon Satuan beralamat di Jalan Sancang No 22, Bogor Tengah, Kota Bogor melayani Sablon Satuan untuk Kaos, Hoodie, Topi, Sweater dan kebutuhan Cetak Digital.')">

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

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">


    <!-- Sweet Alert -->
    {{-- <link type="text/css" href="../../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet"> --}}

    <!-- Notyf -->
    {{-- <link type="text/css" href="../../vendor/notyf/notyf.min.css" rel="stylesheet"> --}}

    <!-- Volt CSS -->
    <link type="text/css" href="/css/templatemo-festava-live.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>

    <main>

        <header class="site-header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 d-flex flex-wrap">
                        <p class="d-flex me-4 mb-0">
                            <i class="bi bi-geo-alt-fill me-2 text-danger"></i>
                            <strong class="text-dark">SABLON SATUAN KAOSKEREN.ID</strong>
                        </p>
                    </div>

                </div>
            </div>
        </header>


        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container">
                <a class="navbar-brand" href="/">
                    KAOSKEREN.ID
                </a>

                <a href="https://wa.me/628811722125?text=Hai%20Admin%20Web%20Kaoskerenid%20Saya%20Mau%20Tanya-tanya%20Sablon"
                    class="btn custom-btn chat d-lg-none ms-auto me-4"> CHAT WHATSAPP</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/#beranda">Beranda</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/#profile">Tentang</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/#layanan">Jasa Sablon</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/#pelanggan">Pelanggan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/#lokasi">Lokasi Toko</a>
                        </li>



                        <a href="https://wa.me/628811722125?text=Hai%20Admin%20Web%20Kaoskerenid%20Saya%20Mau%20Tanya-tanya%20Sablon"
                            class="btn custom-btn d-lg-block"><i class="bi bi-whatsapp"></i>
                            CHAT</a>
                </div>
            </div>
        </nav>
        <div class="mt-5">
            @yield('content')

        </div>
    </main>


    <footer class="site-footer">
        <div class="site-footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <h2 class="text-white mb-lg-0">SABLON SATUAN</h2>
                    </div>

                    <div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center">
                        <ul class="social-icon d-flex justify-content-lg-end">
                            <li class="social-icon-item">
                                <a href="https://twitter.com/BgrSablon" class="social-icon-link">
                                    <span class="bi-twitter"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://instagram.com/kaoskerenid" class="social-icon-link">
                                    <span class="bi-apple"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://instagram.com/kaoskerenid" class="social-icon-link">
                                    <span class="bi-instagram"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-youtube"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-pinterest"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-4 pb-2">
                    <h5 class="site-footer-title mb-3">Links</h5>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="/#beranda" class="site-footer-link">Beranda</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="/#profile" class="site-footer-link">Tentang Kami</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="https://wa.me/628811722125?text=Hai%20Admin%20Web%20Kaoskerenid%20Saya%20Mau%20Tanya-tanya%20Harga%20Sablon"
                                class="site-footer-link">Harga</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="/#" class="site-footer-link">Cara Pesan</a>
                        </li>


                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <h5 class="site-footer-title mb-3">Tanya langsung</h5>

                    <p class="text-white d-flex mb-0">
                        <a href="https://wa.me/628811722125?text=Hai%20Admin%20Web%20Kaoskerenid%20Saya%20Mau%20Tanya-tanya%20Sablon"
                            class="site-footer-link">
                            0881-17-22-125
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <a href="mailto:order.kaoskerenid@gmail.com" class="site-footer-link">
                            order.kaoskerenid@gmail.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
                    <h5 class="site-footer-title mb-3">Workshop</h5>

                    <p class="text-white d-flex mt-3 mb-2">
                        Jalan Sancang No 22, Bogor Tengah, Jawa Barat</p>

                    <a class="link-fx-1 color-contrast-higher mt-3" href="#">
                        <span>Our Maps</span>
                        <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="16" cy="16" r="15.5"></circle>
                                <line x1="10" y1="18" x2="16" y2="12"></line>
                                <line x1="16" y1="12" x2="22" y2="18"></line>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-12 mt-5">
                        <p class="copyright-text">Copyright © 2023 Kaoskerenid</p>
                        <p class="copyright-text">Distributed by: <a href="https://themewagon.com">ThemeWagon</a></p>
                    </div>

                    <div class="col-lg-9 col-12 mt-lg-5 align-right">
                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Terms &amp; Conditions</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Privacy Policy</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Your Feedback</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--

T e m p l a t e M o

-->

    <!-- JAVASCRIPT FILES -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.sticky.js"></script>
    <script src="/assets/js/click-scroll.js"></script>
    <script src="/assets/js/custom.js"></script>

</body>

</html>
