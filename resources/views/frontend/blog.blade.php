@extends('layouts.frontend')
@section('title', $blog->judul)
@php preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $blog->konten, $image); @endphp
@section('meta_image', 'https://kaoskeren.id/' . $image['src'])

    @section('meta_desc', Str::limit(preg_replace('/<img[^>]+\>/i', '(image) ',
            strip_tags(html_entity_decode($blog->konten))), 200))
        @section('content')
            <section class="artists-section section-padding">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-12 mb-5">
                            <h2 class="mb-3">{{ $blog->judul }} <br><small class="fs-5">Oleh : Admin |
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('D, d M Y') }}</small></h2>

                            <article class="text-black p-2">

                                {!! $blog->konten !!}

                                <hr>
                                <p class="mt-5 text-center">Halo Sobat Keren! Untuk kamu yang ingin kaos dengan design
                                    sendiri,
                                    atau design
                                    custom? kamu
                                    bisa langsung chat admin ya di nomor whatsapp 08811722125 Jika kamu belum ada designnya,
                                    jangan khawatir ya karena kami siap membantu buatkan design sesuai dengan design yang
                                    kamu
                                    inginkan. <strong>Chat Sekarang ya</strong>!</p>
                            </article>


                            <div class="social-share">
                                <ul class="social-icon d-flex align-items-center justify-content-center">
                                    <span class="text-dark me-3">Share:</span>

                                    <li class="social-icon-item">
                                        <a href="http://www.facebook.com/sharer.php?u={{ url()->current() }}"
                                            class="social-icon-link">
                                            <span class="bi-facebook"></span>
                                        </a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="https://twitter.com/share?url={{ url()->current() }}&amp;text={{ urlencode($blog->judul) }}"
                                            class="social-icon-link">
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



                        <div class="col-12 mt-3 text-center">
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
                                        <strong>Sablon Kaos bisa satuan, pilihan bahan cotton combed 30s/24s/20s. Design
                                            bisa
                                            request atau design sendiri, bisa juga sablon aja kaos atau bahan bawa
                                            sendiri.</strong>

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
                                        <strong>Sablon Topi bisa satuan, pilihan Jenis Topi Trucker Jaring, Snapback, atau
                                            Topi
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
                                        <strong>Sablon Hoodie bisa satuan, pilihan Model Hoodie Jumper, Zipper ataupun
                                            Sweater
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
                                        <strong>Gratis design untuk banner Warung, Usaha, Salon, Warteg, Acara, Seminar,
                                            Workshop
                                            dan lainnya.</strong>

                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @endsection
