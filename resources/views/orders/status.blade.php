<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Sablon satuan - {{ $order->klien->nama }} - #{{ $order->inv }}</title>
</head>
<body>
    <main class="p-2">
        <div class="container mb-5" style="width:400px">
            <nav class="navbar">
                <div class="container">
                  <a class="navbar-brand" href="#">
                    <img src="../../images/icons/icon-384x384.png" alt="Bootstrap" width="50" height="50">


                  </a>
                </div>
              </nav>
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">Tracking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">Invoice</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact"
                                role="tab" aria-controls="pills-contact" aria-selected="false">Values</a>
                        </li> --}}
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent p-3">
                        <!-- 1st card -->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            Invoice
                            <h5>#{{ $order->inv }}</h5>
                            Estimasi Beres
                            <h5><strong>{{ \Carbon\Carbon::parse($order->tanggalambil)->isoFormat('dddd, D MMM Y,
                                    HH:mm') }}</strong></h5>
                            <p class="mt-4">Detail : </p>
                            <div class="card">
                                <div class="card-body">
                                    {{ $order->detail }}
                                </div>
                            </div>
                            @if ($order->pembayaran == 'BELUM BAYAR')
                            <div class="alert alert-dark mt-3 alert-dismissible fade show" role="alert">
                                <i class="bi bi-info-circle" aria-hidden="true"></i>
                                <strong>BELUM BAYAR</strong>
                                <p>Segera lakukan pembayaran agar segera diproses.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @else
                            @if ($order->status == 'KONFRIM')
                            <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                <i class="bi bi-info-circle" aria-hidden="true"></i>
                                <strong>PROGRESS</strong>
                                <p>Orderan kamu sedang dalam proses pengerjaan.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @elseif ($order->status == 'BERES')
                            <div class="alert alert-warning mt-3 alert-dismissible fade show" role="alert">
                                <i class="bi bi-info-circle" aria-hidden="true"></i>
                                <strong>READY TO PICKUP</strong>
                                <p>Hari Senin-Sabtu Jam 11 sampai jam 9 malam ya! - Minggu LIBUR</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @elseif ($order->status == 'SELESAI')
                            <strong>Terima Kasih</strong> - Orderan kamu sudah bisa Selesai. <br>
                            <strong>Ditunggu orderan selanjutnya ya!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            @else
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                                <i class="bi bi-info-circle" aria-hidden="true"></i>
                                <strong>CANCEL</strong>
                                <p>Jika ingin order kembali, silahkan hubungi admin via Whatsapp</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            @endif
                        </div>
                        <!-- 2nd card -->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="text-center">
                                <h5>Invoice : #{{ $order->inv }}</h5>
                                <h5>{{ Str::upper($order->klien->nama) }}</h5>
                                <p></p>
                                <p>Tanggal order<br>{{ \Carbon\Carbon::parse($order->created_at)->isoFormat('dddd, D MMM
                                    Y, HH:mm') }}</p>
                                <p class="lead">{{ $order->detail }}</p>
                                <div class="">
                                    <div class="col-auto">
                                        <table class="table table-hovered">
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
                                                    <td class="text-end">{{ number_format($ord->produk->harga, 0, ',',
                                                        '.') }}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td></td>
                                                    <td class="text-end">Jumlah</td>
                                                    <td>Rp</td>
                                                    <td class="text-end">{{ number_format($order->total, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="text-end">Ongkir</td>
                                                    <td>Rp</td>
                                                    <td class="text-end">{{ number_format($order->ongkir, 0, ',', '.')
                                                        }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="text-end">Total</td>
                                                    <td>Rp</td>
                                                    <td class="text-end">{{ number_format($order->ongkir +
                                                        $order->total, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <h5>{{ $order->pembayaran }}</h5>
                                <div class="mt-3">
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
                            </div>
                        </div>
                        <!-- 3nd card -->
                        <div class="tab-pane fade third" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <div class="form">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Value Type<span>i</span></label>
                                    <select class="form-control round" id="exampleFormControlSelect1">
                                        <option class="">United States Dollar</option>
                                        <option class="amount">Indian Rupees</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>amount</label>
                                    <input class="form-control amount" placeholder="1500" />
                                </div>
                                <button class="btn btn-success">Insert</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
