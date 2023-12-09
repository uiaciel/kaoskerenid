<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>NOTA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="card" style="width:18rem;">
            <p class="text-center">SABLON SATUAN - KAOSKERENID
                <br>Jalan Sancang 22, Bogor
                <br>08811722125
            </p>
          <div class="card-body">
            <h6 class="card-subtitle mb-2 fw-bold text-center">{{ $order->klien->nama }}</h6>
            <h5 class="card-title text-center">#{{ $order->inv }}</h5>
            <h6 class="card-subtitle mb-4 text-center">{{ \Carbon\Carbon::parse($order->created_at)->isoFormat('dddd, D MMM Y, HH:mm') }}</h6>

            <p class="card-text text-center fst-italic">"{{ $order->detail }}"</p>



          </div>
          <table
                    class="table table-sm table-bordered table-striped"
                >
                    <thead>
                        <tr class="">
                            <th scope="col  fs-6">Produk</th>
                            <th scope="col  fs-6">Harga</th>
                            <th scope="col  fs-6">QTY</th>
                            <th scope="col  fs-6">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orderankatalog as $rinciankatalog )
                <tr>

                    <td class="description">{{ $rinciankatalog->katalog->nama }}</td>
                    <td>{{ number_format($rinciankatalog->katalog->harga, 0, ',', '.') }}</td>
                    <td class="quantity">{{ $rinciankatalog->qty }}</td>

                    <td class="text-end">{{ number_format($rinciankatalog->katalog->harga * $rinciankatalog->qty, 0, ',', '.') }}</td>
                </tr>
                @empty
                @foreach ($orderan as $index => $ord)
                <tr>
                    <td>{{ $ord->produk->nama }}</td>
                    <td>{{ number_format($ord->produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $ord->qty }}</td>
                    <td class="text-end">{{ number_format($ord->produk->harga * $ord->qty, 0, ',', '.') }}</td>
                </tr>

                @endforeach
                @endforelse
                   <tr>
                    <td colspan="3" class="text-end me-2 fst-italic">Jumlah : </td>
                    <td class="text-end">{{ number_format($order->total, 0, ',', '.') }}</td>
                   </tr>
                   <tr>
                    <td colspan="3" class="text-end me-2 fst-italic">Ongkir : </td>
                    <td class="text-end">{{ number_format($order->ongkir, 0, ',', '.') }}</td>
                   </tr>
                   <tr>
                    <td colspan="3" class="text-end me-2 fst-italic fw-bold">Grand Total : </td>
                    <td class="text-end">{{ number_format($order->ongkir + $order->total, 0, ',', '.') }}</td>
                   </tr>
                   <tr>
                    <td colspan="4" class="fw-bold ms-4">Pembayaran</td>
                   </tr>
                   @foreach ($keuangan as $pem)
                        <tr>

                            <td colspan="3">{{ \Carbon\Carbon::parse($pem->tanggal)->isoFormat('D MMM Y') }} / {{ $pem->metode }}</td>
                        <td>
                            <span class="fw-bold">{{ number_format($pem->nominal, 0, ',', '.') }}</span></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-end me-2 fst-italic fw-bold">Kurang Bayar : </td>
                            <td>{{ number_format($sisa, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-body">
                    <h3 class="text-center">{{ $order->pembayaran }}</h3>
            <p class="text-center">

                <br><strong>Estimasi :<br />
                    {{ \Carbon\Carbon::parse($order->tanggalambil)->isoFormat('dddd, D MMM Y, HH:mm') }}</strong>
            </p>
            <p class="text-center">Terima kasih sudah Order
                <br>Cetak Banner/Sticker/Spanduk Juga Bisa!
            </p>










                </div>
        </div>
    </div>

</body>

</html>
