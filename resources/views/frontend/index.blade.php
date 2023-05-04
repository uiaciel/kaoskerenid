@extends('layouts.frontend')
@section('content')
    <section class="hero-section" id="beranda">
        <div class="section-overlay"></div>

        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">

                <div class="col-12 mt-auto mb-5 text-center">
                    <small>KOTA BOGOR</small>

                    <h1 class="text-white mb-5">SABLON SATUAN</h1>

                    <a class="btn custom-btn smoothscroll" href="#section_2">Let's begin</a>
                </div>

                <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                    <div class="date-wrap">
                        <h5 class="text-white">
                            <i class="custom-icon bi-clock me-2"></i>
                            Buka dari 10:00 s/d 21:00
                        </h5>
                    </div>

                    <div class="location-wrap mx-auto py-3 py-lg-0">
                        <h5 class="text-white">
                            <i class="custom-icon bi-geo-alt me-2"></i>
                            Jl Sancang no 22, Bogor tengah
                        </h5>
                    </div>

                    <div class="social-share">
                        <ul class="social-icon d-flex align-items-center justify-content-center">
                            <span class="text-white me-3">Share:</span>

                            <li class="social-icon-item">
                                <a href="https://facebook.com/kaoskerenid" class="social-icon-link">
                                    <span class="bi-facebook"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://twitter.com/BgrSablon" class="social-icon-link">
                                    <span class="bi-twitter"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://instagram.com/kaoskerenid" class="social-icon-link">
                                    <span class="bi-instagram"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="video-wrap">
            <video autoplay="" loop="" muted="" class="custom-video" poster="">
                <source src="video/pexels-2022395.mp4" type="video/mp4">

                Your browser does not support the video tag.
            </video>
        </div>
    </section>


    <section class="about-section section-padding" id="profile">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                    <div class="services-info">
                        <h2 class="text-white mb-4">Tentang KAOSKERENID</h2>

                        <p class="text-white">Kami menawarkan layanan cetak sablon satuan pada berbagai jenis
                            pakaian dan aksesoris, mulai dari kaos, polo shirt, jaket, sweater, seragam, topi, tas,
                            dan sebagainya.
                            Kami menggunakan bahan dan teknologi cetakan terbaru yang memiliki kualitas sangat baik
                            sehingga hasil cetakan yang berkualitas dan tahan lama.
                        </p>
                        <p class="text-white">Tidak hanya itu, kami juga dapat mencetak gambar atau logo kustom
                            yang dapat disesuaikan
                            dengan kebutuhan dan permintaan pelanggan. Dengan begitu, pelanggan dapat memiliki
                            pakaian atau aksesoris yang sesuai dengan kebutuhan atau bahkan dapat digunakan sebagai
                            merchandise atau promosi bisnis.</p>

                        <h6 class="text-white mt-4">Layanan Gratis Design</h6>

                        <p class="text-white">Jangan ragu untuk mempercayakan kebutuhan cetak sablon Anda kepada
                            kami. Dengan pengalaman dan kualitas cetakan yang terbaik, Toko Sablon Satuan
                            Kaoskerenid siap membantu Anda.</p>


                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="about-text-wrap">
                        <img src="/images/toko-sablon-satuan.png" class="about-image img-fluid">

                        <div class="about-text-info d-flex">
                            <div class="d-flex">
                                <i class="about-text-icon bg-black text-white bi bi-moon-stars-fill"></i>

                            </div>


                            <div class="ms-4">
                                <h3>Buka sampai Malam</h3>

                                <p class="mb-0">Cetak Sablon Gratis Design</p>
                            </div>
                        </div>

                    </div>
                    <h6 class="text-white mt-4">Lokasi Workshop</h6>
                    <p class="text-white">Kami berlokasi di jalan Sancang No. 22, Kota Bogor dan buka setiap
                        hari Senin sampai Sabtu dari jam 9 pagi hingga jam 10 malam. Anda juga dapat menghubungi
                        kami melalui nomor telepon 088-11-722-125 atau mengunjungi situs web kami di
                        www.kaoskeren.id untuk mengetahui lebih lanjut tentang layanan yang kami tawarkan.</p>


                </div>

            </div>
        </div>
    </section>


    <section class="artists-section section-padding" id="layanan">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 text-center">
                    <h2 class="mb-4">Layanan & Produk</h1>
                </div>

                <div class="col-lg-5 col-12">
                    <div class="artists-thumb">
                        <div class="artists-image-wrap">
                            <img src="/images/sablon-kaos-printing.png" class="artists-image img-fluid">
                        </div>

                        <div class="artists-hover">
                            <h3 class="text-white">Kaos</h3>
                            <p>
                                <strong>Sablon Kaos bisa satuan, pilihan bahan cotton combed 30s/24s/20s. Design bisa
                                    request atau design sendiri, bisa juga sablon aja kaos atau bahan bawa sendiri.</strong>

                            </p>

                        </div>
                    </div>
                    <div class="artists-thumb">
                        <div class="artists-image-wrap">
                            <img src="https://stikergrosir.files.wordpress.com/2015/08/vinyl-sablon-grosir.jpg
"
                                class="artists-image img-fluid">
                        </div>

                        <div class="artists-hover">
                            <h3 class="text-white">Sticker</h3>
                            <p>
                                <strong>Sticker Lembaran atau meteran, bahan sticker Kromo dan Outdoor</strong>

                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-12">
                    <div class="artists-thumb">
                        <div class="artists-image-wrap">
                            <img src="/images/topi-sablon.png" class="artists-image img-fluid">
                        </div>

                        <div class="artists-hover">
                            <h3 class="text-white">Topi</h3>
                            <p>
                                <strong>Sablon Topi bisa satuan, pilihan Jenis Topi Trucker Jaring, Snapback, atau Topi
                                    Baseball. Design bisa
                                    request atau design sendiri.</strong>

                            </p>
                        </div>
                    </div>

                    <div class="artists-thumb">
                        <img src="/images/hoodie.png" class="artists-image img-fluid">

                        <div class="artists-hover">
                            <h3 class="text-white">Hoodie</h3>
                            <p>
                                <strong>Sablon Hoodie bisa satuan, pilihan Model Hoodie Jumper, Zipper ataupun Sweater
                                    dengan bahan Cotton Fleece gramasi 220g Tebal. Design bisa
                                    request atau design sendiri.</strong>

                            </p>
                        </div>
                    </div>
                    <div class="artists-thumb">
                        <img src="https://image.cermati.com/q_70,w_1200,h_800,c_fit/rjcuajbxdl6vmh7pofpj"
                            class="artists-image img-fluid">

                        <div class="artists-hover">
                            <h3 class="text-white">Cetak Banner</h3>
                            <p>
                                <strong>Gratis design untuk banner Warung, Usaha, Salon, Warteg, Acara, Seminar, Workshop
                                    dan lainnya.</strong>

                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="schedule-section section-padding" id="pelanggan">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white mb-4">Pelanggan Kami</h1>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img src="/images/ardhan.png" class="rounded  img-fluid" alt="Ardhan Sport Center">
                </div>
                <div class="col">
                    <img src="/images/indihome.jpg" class="rounded  img-fluid" alt="Indihome Bogor">
                </div>
                <div class="col">
                    <img src="/images/pp.jpg" class="rounded  img-fluid" alt="Pemuda Pancasila Kota Bogor">
                </div>
                <div class="col">
                    <img src="/images/salamid.png" class="rounded  img-fluid" alt="SalamID">
                </div>
                <div class="col">
                    <img src="/images/cidovillage.png" class="rounded  img-fluid" alt="CidoVillage Bogor">
                </div>
                <div class="col">
                    <img src="/images/extreme.png" class="rounded  img-fluid" alt="Extreme Explore channels">
                </div>
                <div class="col">
                    <img src="/images/cbn.png" class="rounded  img-fluid" alt="CBN">
                </div>

            </div>
        </div>
    </section>
    {{-- <section class="schedule-section section-padding" id="section_4">
        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="text-white mb-4">Jenis Bahan Sablon</h1>

                        <div class="table-responsive">
                            <table class="schedule-table table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>

                                        <th scope="col">PILIHAN BAHAN</th>

                                        <th scope="col">METODE SABLON</th>

                                        <th scope="col">ESTIMASI WAKTU PENGERJAAN</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row" class="table-background-image-wrap pop-background-image">Day 1
                                        </th>

                                        <td>



                                            <ul>
                                                <li class="text-white">Cotton Combed 30s</li>
                                                <li class="text-white">Cotton Combed 24s</li>
                                                <li class="text-white">Cotton Combed 20s</li>
                                                <li class="text-white">Premiun Cotton NSA</li>
                                            </ul>


                                            <div class="section-overlay"></div>
                                        </td>

                                        <td style="background-color: #F3DCD4">
                                            <p>Cutting Sablon</p>
                                            <p>Printing Sablon</p>
                                        </td>

                                        <td class="">
                                            <h3>1-2 Hari</h3>

                                            <p class="mb-2">Setelah pembayaran dan design diterima</p>

                                            <p>By Rihana</p>

                                            <div class="section-overlay"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Day 2</th>

                                        <td style="background-color: #ECC9C7"></td>

                                        <td>
                                            <h3>DJ Night</h3>

                                            <p class="mb-2">6:30 - 9:30 PM</p>

                                            <p>By Rihana</p>
                                        </td>

                                        <td style="background-color: #D9E3DA"></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Day 3</th>

                                        <td class="table-background-image-wrap country-background-image">
                                            <h3>Country Music</h3>

                                            <p class="mb-2">4:30 - 7:30 PM</p>

                                            <p>By Rihana</p>

                                            <div class="section-overlay"></div>
                                        </td>

                                        <td style="background-color: #D1CFC0"></td>

                                        <td>
                                            <h3>Free Styles</h3>

                                            <p class="mb-2">6:00 - 10:00 PM</p>

                                            <p>By Members</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </section>


    <section class="pricing-section section-padding section-bg" id="section_5">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="text-center mb-4">Khusus Member</h2>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="pricing-thumb">
                        <div class="d-flex">
                            <div>
                                <h3><small>Sablon 1 Sisi 1 Warna</small> 65k</h3>

                                <p>Termasuk Kaos:</p>
                            </div>

                            <p class="pricing-tag ms-auto">Save up to <span>50%</span></h2>
                        </div>

                        <ul class="pricing-list mt-3">
                            <li class="pricing-list-item">Cotton combed 30s</li>

                            <li class="pricing-list-item">Sablon 1 Warna / Sisi</li>

                            <li class="pricing-list-item">Jenis Cutting</li>

                            <li class="pricing-list-item">Gratis Design</li>
                        </ul>

                        <a class="link-fx-1 color-contrast-higher mt-4" href="ticket.html">
                            <span>Pesan Sekarang</span>
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

                <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                    <div class="pricing-thumb">
                        <div class="d-flex">
                            <div>
                                <h3><small>Standard</small> $240</h3>

                                <p>What makes a premium festava?</p>
                            </div>
                        </div>

                        <ul class="pricing-list mt-3">
                            <li class="pricing-list-item">platform for potential customers</li>

                            <li class="pricing-list-item">digital experience</li>

                            <li class="pricing-list-item">high-quality sound</li>

                            <li class="pricing-list-item">premium content</li>

                            <li class="pricing-list-item">live chat support</li>
                        </ul>

                        <a class="link-fx-1 color-contrast-higher mt-4" href="ticket.html">
                            <span>Buy Ticket</span>
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
        </div>
    </section> --}}


    <section class="contact-section section-padding" id="lokasi">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="text-center mb-4">Tanya-tanya dulu? Boleh!</h2>

                    <nav class="d-flex justify-content-center">
                        <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                            role="tablist">
                            <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-ContactForm" type="button" role="tab"
                                aria-controls="nav-ContactForm" aria-selected="false">
                                <h5>Chat Sekarang</h5>
                            </button>

                            <button class="nav-link" id="nav-ContactMap-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-ContactMap" type="button" role="tab"
                                aria-controls="nav-ContactMap" aria-selected="false">
                                <h5>Datang Langsung</h5>
                            </button>
                        </div>
                    </nav>

                    <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                            aria-labelledby="nav-ContactForm-tab">
                            <img src="https://halalmui.org/wp-content/uploads/2023/01/2022-01-05-Maintenance-WA-dAN-CEROL-LIVE-CHAT-04-1024x637.png"
                                class="img-fluid">
                            {{-- <form class="custom-form contact-form mb-5 mb-lg-0" action="#" method="post"
                                role="form">
                                <div class="contact-form-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="text" name="contact-name" id="contact-name"
                                                class="form-control" placeholder="Full name" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="email" name="contact-email" id="contact-email"
                                                pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address"
                                                required>
                                        </div>
                                    </div>

                                    <input type="text" name="contact-company" id="contact-company"
                                        class="form-control" placeholder="Company" required>

                                    <textarea name="contact-message" rows="3" class="form-control" id="contact-message" placeholder="Message"></textarea>

                                    <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                        {{-- <button type="submit" class="form-control">Send message</button> --}}

                            {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- </form> --}}
                            <a href="https://wa.me/628811722125?text=Hai%20Admin%20Web%20Kaoskerenid%20Saya%20Mau%20Tanya-tanya%20Sablon"
                                class="form-control btn btn-warning btn-custom">Kirim Chat</a>
                        </div>

                        <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel"
                            aria-labelledby="nav-ContactMap-tab">
                            <iframe class="google-map"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4447849109247!2d106.80576357397602!3d-6.591507764432949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d22f66a9fb%3A0xdfbca985674f4804!2sSABLON%20SATUAN%20KAOSKEREN.ID%20Workshop!5e0!3m2!1sid!2sid!4v1681962437030!5m2!1sid!2sid"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <!-- You can easily copy the embed code from Google Maps -> Share -> Embed a map // -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
