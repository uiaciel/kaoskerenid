<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaoskerenid</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/img/icon.ico" type="image/x-icon" />
    
    <!-- Fonts and icons -->
    <script src="/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/atlantis2.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/css/demo.css">

    <!-- Bootstrap DatePicker -->

    <link href="{{ asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @laravelPWA

</head>

<body>
    <div id="app">
        <div class="wrapper horizontal-layout-3">

            <div class="main-header no-box-shadow" data-background-color="blue2">
                
                <div class="nav-top">
                    <div class="container d-flex flex-row">
                        <button class="navbar-toggler sidenav-toggler2 ml-auto" type="button" data-toggle="collapse"
                            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="icon-menu"></i>
                            </span>
                        </button>
                        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                        <!-- Logo Header -->
                        <a href="/home" class="logo d-flex align-items-center text-white">
                            <img src="/img/logo.svg" alt="navbar brand" class="navbar-brand">
                           
                        </a>
                        <!-- End Logo Header -->

                        <!-- Navbar Header -->
                        <nav class="navbar navbar-header-left navbar-expand-lg p-0">
                            <ul class="navbar-nav page-navigation pl-md-3">
                                <h3 class="title-menu d-flex d-lg-none"> 
                                    Menu 
                                    <div class="close-menu"> <i class="flaticon-cross"></i></div>
                                </h3>
                                
                                <li class="nav-item active dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        ORDERS
                                    </a>
                                    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/home">TERBARU</a>
                                        <a class="dropdown-item" href="{{route('order.index')}}">SEMUA</a>
                                        
                                        
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('klien.index')}}" role="button"aria-haspopup="true" aria-expanded="false">
                                        KLIEN
                                    </a>
                                    
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('produk.index')}}" role="button"aria-haspopup="true" aria-expanded="false">
                                        PRODUK
                                    </a>
                                    
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        ADMIN
                                    </a>
                                    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('keuangan.index')}}">KEUANGAN</a>
                                        <a class="dropdown-item" href="{{route('stok.index')}}">STOK</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('stok.index')}}">REPORT</a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <nav class="navbar navbar-header navbar-expand-lg p-0">
                            <div class="container-fluid p-0">
                                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                                    <li class="nav-item dropdown hidden-caret">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"
                                            role="button" aria-expanded="false" aria-haspopup="true">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-search animated fadeIn">
                                            <form class="navbar-left navbar-form nav-search">
                                                <div class="input-group">
                                                    <input type="text" placeholder="Search ..." class="form-control">
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown hidden-caret">
                                        <a class="nav-link dropdown-toggle" href="#" id="messageDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                        <ul class="dropdown-menu messages-notif-box animated fadeIn"
                                            aria-labelledby="messageDropdown">
                                            <li>
                                                <div
                                                    class="dropdown-title d-flex justify-content-between align-items-center">
                                                    Messages
                                                    <a href="#" class="small">Mark all as read</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-notif-scroll scrollbar-outer">
                                                    <div class="notif-center">
                                                        <a href="#">
                                                            <div class="notif-img">
                                                                <img src="/img/jm_denis.jpg" alt="Img Profile">
                                                            </div>
                                                            <div class="notif-content">
                                                                <span class="subject">Jimmy Denis</span>
                                                                <span class="block">
                                                                    How are you ?
                                                                </span>
                                                                <span class="time">5 minutes ago</span>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="notif-img">
                                                                <img src="/img/chadengle.jpg" alt="Img Profile">
                                                            </div>
                                                            <div class="notif-content">
                                                                <span class="subject">Chad</span>
                                                                <span class="block">
                                                                    Ok, Thanks !
                                                                </span>
                                                                <span class="time">12 minutes ago</span>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="notif-img">
                                                                <img src="/img/mlane.jpg" alt="Img Profile">
                                                            </div>
                                                            <div class="notif-content">
                                                                <span class="subject">Jhon Doe</span>
                                                                <span class="block">
                                                                    Ready for the meeting today...
                                                                </span>
                                                                <span class="time">12 minutes ago</span>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="notif-img">
                                                                <img src="/img/talha.jpg" alt="Img Profile">
                                                            </div>
                                                            <div class="notif-content">
                                                                <span class="subject">Talha</span>
                                                                <span class="block">
                                                                    Hi, Apa Kabar ?
                                                                </span>
                                                                <span class="time">17 minutes ago</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="see-all" href="javascript:void(0);">See all messages<i
                                                        class="fa fa-angle-right"></i> </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown hidden-caret">
                                        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-bell"></i>
                                            <span class="notification">4</span>
                                        </a>
                                        <ul class="dropdown-menu notif-box animated fadeIn"
                                            aria-labelledby="notifDropdown">
                                            <li>
                                                <div class="dropdown-title">You have 4 new notification</div>
                                            </li>
                                            <li>
                                                <div class="notif-scroll scrollbar-outer">
                                                    <div class="notif-center">
                                                        <a href="#">
                                                            <div class="notif-icon notif-primary"> <i
                                                                    class="fa fa-user-plus"></i> </div>
                                                            <div class="notif-content">
                                                                <span class="block">
                                                                    New user registered
                                                                </span>
                                                                <span class="time">5 minutes ago</span>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="notif-icon notif-success"> <i
                                                                    class="fa fa-comment"></i> </div>
                                                            <div class="notif-content">
                                                                <span class="block">
                                                                    Rahmad commented on Admin
                                                                </span>
                                                                <span class="time">12 minutes ago</span>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="notif-img">
                                                                <img src="/img/profile2.jpg" alt="Img Profile">
                                                            </div>
                                                            <div class="notif-content">
                                                                <span class="block">
                                                                    Reza send messages to you
                                                                </span>
                                                                <span class="time">12 minutes ago</span>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="notif-icon notif-danger"> <i
                                                                    class="fa fa-heart"></i> </div>
                                                            <div class="notif-content">
                                                                <span class="block">
                                                                    Farrah liked Admin
                                                                </span>
                                                                <span class="time">17 minutes ago</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="see-all" href="javascript:void(0);">See all notifications<i
                                                        class="fa fa-angle-right"></i> </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown hidden-caret">
                                        <a class="nav-link" data-toggle="dropdown" href="#"
                                            aria-expanded="false">
                                            <i class="fas fa-layer-group"></i>
                                        </a>
                                        <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                                            <div class="quick-actions-header">
                                                <span class="title mb-1">Quick Actions</span>
                                                <span class="subtitle op-8">Shortcuts</span>
                                            </div>
                                            <div class="quick-actions-scroll scrollbar-outer">
                                                <div class="quick-actions-items">
                                                    <div class="row m-0">
                                                        <a class="col-6 col-md-4 p-0" href="#">
                                                            <div class="quick-actions-item">
                                                                <div class="avatar-item bg-danger rounded-circle">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                </div>
                                                                <span class="text">Calendar</span>
                                                            </div>
                                                        </a>
                                                        <a class="col-6 col-md-4 p-0" href="#">
                                                            <div class="quick-actions-item">
                                                                <div class="avatar-item bg-warning rounded-circle">
                                                                    <i class="fas fa-map"></i>
                                                                </div>
                                                                <span class="text">Maps</span>
                                                            </div>
                                                        </a>
                                                        <a class="col-6 col-md-4 p-0" href="#">
                                                            <div class="quick-actions-item">
                                                                <div class="avatar-item bg-info rounded-circle">
                                                                    <i class="fas fa-file-excel"></i>
                                                                </div>
                                                                <span class="text">Reports</span>
                                                            </div>
                                                        </a>
                                                        <a class="col-6 col-md-4 p-0" href="#">
                                                            <div class="quick-actions-item">
                                                                <div class="avatar-item bg-success rounded-circle">
                                                                    <i class="fas fa-envelope"></i>
                                                                </div>
                                                                <span class="text">Emails</span>
                                                            </div>
                                                        </a>
                                                        <a class="col-6 col-md-4 p-0" href="#">
                                                            <div class="quick-actions-item">
                                                                <div class="avatar-item bg-primary rounded-circle">
                                                                    <i class="fas fa-file-invoice-dollar"></i>
                                                                </div>
                                                                <span class="text">Invoice</span>
                                                            </div>
                                                        </a>
                                                        <a class="col-6 col-md-4 p-0" href="#">
                                                            <div class="quick-actions-item">
                                                                <div class="avatar-item bg-secondary rounded-circle">
                                                                    <i class="fas fa-credit-card"></i>
                                                                </div>
                                                                <span class="text">Payments</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link quick-sidebar-toggler">
                                            <i class="fa fa-th"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown hidden-caret">
                                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                            aria-expanded="false">
                                            <div class="avatar-sm">
                                                <img src="/img/profile.jpg" alt="..."
                                                    class="avatar-img rounded-circle">
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                                            <div class="dropdown-user-scroll scrollbar-outer">
                                                <li>
                                                    <div class="user-box">
                                                        <div class="avatar-lg"><img src="/img/profile.jpg"
                                                                alt="image profile" class="avatar-img rounded"></div>
                                                        <div class="u-text">
                                                            <h4>Hizrian</h4>
                                                            <p class="text-muted">hello@example.com</p><a
                                                                href="profile.html"
                                                                class="btn btn-xs btn-secondary btn-sm">View
                                                                Profile</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">My Profile</a>
                                                    <a class="dropdown-item" href="#">My Balance</a>
                                                    <a class="dropdown-item" href="#">Inbox</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Account Setting</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Logout</a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
            </div>

            <div class="main-panel bg-dark">

                <div class="pt-4 pb-5">
                    @yield('title')
                    
                </div>

                <div class="container mt--5">
                    <div class="page-inner mt--3">

                        @yield('content')
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('order.index') }}">
                                    Order
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('klien.index') }}">
                                    Klien
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('produk.index') }}">
                                    Produk
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('keuangan.index') }}">
                                    Keuangan
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        2022, made with <i class="fa fa-heart heart text-danger"></i> by <a
                            href="http://www.themekita.com">ThemeKita</a>
                    </div>
                </div>
            </footer>
            
        </div>
        <!--   Core JS Files   -->
        <script src="/js/core/jquery.3.2.1.min.js"></script>
        <script src="/js/core/popper.min.js"></script>
        <script src="/js/core/bootstrap.min.js"></script>
        
  

        <!-- jQuery UI -->
        <script src="/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

        <!-- jQuery Scrollbar -->
        <script src="/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script> 

        {{-- <!-- Moment JS -->
        <script src="/js/plugin/moment/moment.min.js"></script>

        <!-- Chart JS -->
        <script src="/js/plugin/chart.js/chart.min.js"></script>

        <!-- jQuery Sparkline -->
        <script src="/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

        <!-- Chart Circle -->
        <script src="/js/plugin/chart-circle/circles.min.js"></script> --}}

        <!-- Datatables -->
        <script src="/js/plugin/datatables/datatables.min.js"></script>

        <!-- Bootstrap Notify -->
        <script src="/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

        

        

        <!-- jQuery Vector Maps -->
        <script src="/js/plugin/jqvmap/jquery.vmap.min.js"></script>
        <script src="/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

        {{-- <!-- Google Maps Plugin -->
        <script src="/js/plugin/gmaps/gmaps.js"></script>

        <!-- Dropzone -->
        <script src="/js/plugin/dropzone/dropzone.min.js"></script>

        <!-- Fullcalendar -->
        <script src="/js/plugin/fullcalendar/fullcalendar.min.js"></script> --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        {{-- <!-- DateTimePicker -->
        <script src="/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

        <!-- Bootstrap Tagsinput -->
        <script src="/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

        <!-- Bootstrap Wizard -->
        <script src="/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

        <!-- jQuery Validation -->
        <script src="/js/plugin/jquery.validate/jquery.validate.min.js"></script>

        <!-- Summernote -->
        <script src="/js/plugin/summernote/summernote-bs4.min.js"></script> --}}

        <!-- Select2 -->
        <script src="/vendor/select2/select2.full.min.js"></script>

        <!-- Sweet Alert -->
        <script src="/js/plugin/sweetalert/sweetalert.min.js"></script>

        <!-- Atlantis JS -->
        <script src="/js/atlantis2.min.js"></script>

        <!-- Bootstrap Toggle -->
        <script src="/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

        <!-- Atlantis DEMO methods, don't include it in your project! -->
        {{-- <script src="/js/demo.js"></script> --}}

        <script>
            $(document).ready(function() {
                $('#data').DataTable();
            });
        </script>

        <script>
            $(document).ready(function() {
                $('.datatable').DataTable();
            });
        </script>
        <script>
            $('#datepicker').datepicker();
            $('#datepicker').on('changeDate', function() {
                $('#my_hidden_input').val(
                    $('#datepicker').datepicker('getFormattedDate')
                );
            });
        </script>
        <script>
            $('#dateorder').datepicker({
                format: 'yyyy-mm-dd',
            });

            $('#dateorder').on('changeDate', function() {
                $('#my_hidden_order').val(
                    $('#dateorder').datepicker('getFormattedDate')
                );
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.select2-single').select2({
                    width: "100%"
                });
                // Select2 Single  with Placeholder
                $('.select2-single-placeholder').select2({
                    placeholder: "Cari Orderan disini",
                    allowClear: true,
                    width: "100%"
                });
                // Select2 Multiple
                $('.select2-multiple').select2();
            });
        </script>
        <script>
            $.ajax({
                url: 'http://localhost:8000/list/produk/all',
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
            $("button").click(function(){
            $("#myCopy").select();
            document.execCommand('copy');
            // alert('Berhasil di copy');
        });

        document.querySelector("button").onclick = function(){
            document.querySelector("textarea").select();
            document.execCommand('copy');
        }
        </script>
        
        <script>
            document.getElementById('date').valueAsDate = new Date();
        </script>

        


        @notifyJs
    </div>
</body>

</html>
