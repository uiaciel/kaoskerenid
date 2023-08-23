<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>INVOICE</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
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
    <div class="row">
        <div class="col-md-12">
            <div class="card card-invoice">
                <div class="card-header">
                    <div class="invoice-header fs-5 text-center">
                        SABLON SATUAN KAOSKERENID

                    </div>
                    <div class="invoice-desc text-center">
                        Jalan Sancang no 22, Bogor Tengah Kota Bogor<br>www.kaoskeren.id
                    </div>
                </div>
                <div class="card-body mb-4 mt-4">
                    <div class="separator-solid"></div>
                    <div class="d-flex justify-content-between">
                        <div class="info-invoice">
                            <h5 class="sub">#{{ $order->inv }}
                            </h5>
                            <p>{{ \Carbon\Carbon::parse($order->created_at)->isoFormat('dddd, D MMM Y, HH:mm') }}</p>
                        </div>

                        <div class="info-invoice">
                            <h5 class="sub">{{ $order->klien->nama }}</h5>
                            <p>
                                {{ Str::substr($order->klien->hp, 0, 4) . '****' . Str::substr($order->klien->hp, 7, 5) }}
                            </p>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="invoice-detail">
                                <div class="invoice-top">
                                    <h3 class="title"><strong>Detail Order</strong></h3>
                                </div>
                                <div class="invoice-item">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <td><strong>No</strong></td>
                                                    <td><strong>Produk</strong></td>
                                                    <td><strong>Qty</strong></td>
                                                    <td class="text-right"><strong>Totals</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderan as $index => $ord)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $ord->produk->kategori }} - {{ $ord->produk->nama }}
                                                        </td>
                                                        <td>{{ $ord->qty }}</td>
                                                        <td class="text-right">Rp
                                                            {{ number_format($ord->produk->harga, 0, ',', '.') }}</td>
                                                        <td class="text-right">Rp
                                                            {{ number_format($ord->produk->harga * $ord->qty, 0, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td class="text-right"><strong>Subtotal</strong></td>
                                                    <td class="text-right">Rp
                                                        {{ number_format($order->total, 0, ',', '.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td class="text-right"><strong>Onkos Kirim</strong></td>
                                                    <td class="text-right">Rp
                                                        {{ number_format($order->ongkir, 0, ',', '.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td class="text-right"><strong>Total</strong></td>
                                                    <td class="text-right">Rp
                                                        {{ number_format($order->total + $order->ongkir, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        Keterangan: {{ $order->detail }} ({{ $order->qty }} pcs)
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="separator-solid  mb-3"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div class="mb-md-0 transfer-to">
                            @if ($order->pembayaran == 'LUNAS')
                            @else
                                <h5 class="sub">Silahkan melakukan pembayaran melalui Bank Transfer</h5>
                                <div class="account-transfer">
                                    <div><span>Atas nama:</span><span> Suria</span></div>
                                    <div><span>No Rekening:</span><span> 5035139653 </span></div>
                                    <div><span>Bank </span><span> BCA</span></div>
                                </div>
                            @endif

                        </div>
                        <div class="transfer-total">
                            <h5 class="sub">Total Keseluruhan</h5>
                            <div class="price mb-5">Rp.
                                {{ number_format($order->total + $order->ongkir, 0, ',', '.') }}
                            </div>
                            @if ($order->pembayaran == 'LUNAS')
                                <h3 class="text-primary fw-bold">LUNAS</h3>
                            @endif
                            <!--<span>Taxes Included</span>-->
                        </div>
                    </div>

                    <div class="separator-solid"></div>
                    <h6 class="text-uppercase mt-4 mb-3 fw-bold">
                        Notes
                    </h6>
                    @if ($order->pembayaran == 'LUNAS')
                        <p class="text-muted mb-0">
                            Terima Kasih, ditunggu orderan selanjutnya. Cetak Banner/Spanduk/Sticker juga Bisa!
                        </p>
                    @else
                        <p class="text-muted mb-0">
                            Harap mengirimkan foto bukti transfer/pembayaran kepada kami. Pesanan akan Kami proses
                            setelah
                            melakukan pembayaran
                        </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="/js/core/jquery.3.2.1.min.js"></script>
    <script src="/js/core/popper.min.js"></script>
    <script src="/js/core/bootstrap.min.js"></script>
    <!-- Atlantis JS -->
    <script src="/js/atlantis2.min.js"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    {{-- <script src="/js/demo.js"></script> --}}
</body>

</html>
