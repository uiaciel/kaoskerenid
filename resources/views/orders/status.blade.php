<!doctype html>

<html lang="en">

<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sablon satuan - {{ $order->klien->nama }} - #{{ $order->inv }}</title>

</head>

<body>

    <main class="p-2">

        <div class="text-center">

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @if ($order->pembayaran == 'BELUM BAYAR')
                    <strong>Belum Bayar</strong> - Pesanan Akan diproses setelah
                    pembayaran masuk.</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                @else
                    @if ($order->status == 'KONFRIM')
                        <strong>PRODUKSI</strong> - Orderan kamu sedang dalam proses pengerjaan. <br> Estimasi beres nya
                        Hari
                        <strong>{{ \Carbon\Carbon::parse($order->tanggalambil)->isoFormat('dddd, D MMM Y, HH:mm') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @elseif ($order->status == 'BERES')
                        <strong>SUDAH BERES</strong> - Orderan kamu sudah bisa beres, siap diambil. <br> Untuk
                        pengambilan
                        bisa langsung ke toko di
                        <strong>Hari Senin-Sabtu Jam 10 sampai jam 9 malam ya!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @elseif ($order->status == 'SELESAI')
                        <strong>Terima Kasih</strong> - Orderan kamu sudah bisa Selesai. <br>
                        <strong>Ditunggu orderan selanjutnya ya!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @else
                        <strong>CANCEL</strong> - Orderan kamu dibatalkan. <br>
                        <strong>Jika ingin order kembali, silahkan hubungi admin via Whatsapp</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @endif
                @endif

            </div>

            <h5>Invoice : #{{ $order->inv }}</h5>
            <h5>{{ Str::upper($order->klien->nama) }}</h5>
            <p></p>
            <p>Tanggal order<br>{{ \Carbon\Carbon::parse($order->created_at)->isoFormat('dddd, D MMM Y, HH:mm') }}</p>
            <p class="lead">{{ $order->detail }}</p>

            <div class="d-flex justify-content-center">
                <div class="col-auto">
                    <table class="table table-hovered" style="width: 400px;">
                        <thead>
                            <tr>
                                <th>Q</th>
                                <th>Produk</th>
                                <th></th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderan as $index => $ord)
                                <tr>
                                    <td>{{ $ord->qty }}</td>
                                    <td class="text-start">{{ $ord->produk->nama }}</td>
                                    <td>Rp</td>
                                    <td class="text-end">{{ number_format($ord->produk->harga, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td class="text-end">Jumlah</td>
                                <td>Rp</td>
                                <td class="text-end">{{ number_format($order->total, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-end">Ongkir</td>
                                <td>Rp</td>
                                <td class="text-end">{{ number_format($order->ongkir, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-end">Total</td>
                                <td>Rp</td>
                                <td class="text-end">{{ number_format($order->ongkir + $order->total, 0, ',', '.') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h3>{{ $order->pembayaran }}</h3>

            <div class="alert alert-success">
                <h3>Kurang Bayar : Rp {{ number_format($sisa, 0, ',', '.') }}</h3>
            </div>

            <div class="mt-3 d-flex justify-content-center">
                <div class="col-12">

                    <table class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th class="text-center">Metode</th>
                                <th class="text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keuangan as $bayar)
                                <tr>
                                    <td class="text-start"><small>{{ $bayar->metode }}</small>
                                        <p>{{ $bayar->tanggal }}</p>
                                    </td>
                                    <td class="text-end">Rp. {{ $bayar->nominal }}</td>
                                </tr>
                            @endforeach
                            <tr class="text-end">
                                <td><strong>Jumlah</strong></td>
                                <td><strong>Rp {{ $jumlah }}</strong></td>
                            </tr>
                            <tr class="text-end">
                                <td><strong>Tagihan</strong></td>
                                <td><strong>Rp {{ $grandtotal }}</strong></td>
                            </tr>
                            <tr class="text-end">
                                <td><strong>Kurang Bayar</strong></td>
                                <td><strong>Rp {{ $sisa }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <a class="btn btn-lg btn-primary" href="" role="button">View navbar docs &raquo;</a>

        </div>

    </main>

    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">

        <div class="container-fluid">

            <a class="navbar-brand" href="#">Kaoskerenid</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">

                <ul class="navbar-nav">

                    <li class="nav-item">

                        <a class="nav-link active" aria-current="page" href="/n/{{ $order->inv }}">Cetak Nota</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="/invoice/{{ $order->inv }}">Cetak Invoice</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link disabled">Disabled</a>

                    </li>

                    <li class="nav-item dropup">

                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Dropup</a>

                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="#">Action</a></li>

                            <li><a class="dropdown-item" href="#">Another action</a></li>

                            <li><a class="dropdown-item" href="#">Something else here</a></li>

                        </ul>

                    </li>

                </ul>

            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


</body>

</html>
