

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>NOTA</title>
    <style>
        * {
            font-size: 9px;
            font-family: 'Arial';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td.description,
        th.description {
            width: 120px;
            max-width: 120px;
        }

        td.quantity,
        th.quantity {
            width: 20px;
            max-width: 20px;
            word-break: break-all;
            text-align: center;
        }

        td.rp,
        th.rp {
            width: 20px;
            max-width: 20px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 70px;
            max-width: 70px;
            word-break: break-all;
            text-align: right;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 160px;
            max-width: 160px;
        }

        .preview {
            width: 160px;
            max-width: 160px;
            zoom: 200%;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="preview hidden-print">
        <p class="centered">SABLON SATUAN - KAOSKERENID
            <br>Jalan Sancang 22, Bogor
            <br>08811722125
        </p>
        <p class="centered"><strong>Tanggal
                Order</strong><br />{{ \Carbon\Carbon::parse($order->created_at)->isoFormat('dddd, D MMM Y, HH:mm') }}
        </p>
        <p class="centered">Inv : #{{ $order->inv }}
            <br><strong>Klien : {{ $order->klien->nama }}</strong>
        </p>

        <p class="centered">{{ $order->detail }}</p>
        <table>
            <thead>
                <tr>

                    <th class="description">Produk</th>

                    <th class="quantity">Q</th>

                    <th class="price">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orderankatalog as $rinciankatalog )
                <tr>

                    <td class="description">{{ $rinciankatalog->katalog->nama }}<br/><span style="margin-left: 5px; font-size:5pt">- Rp. {{ number_format($rinciankatalog->katalog->harga, 0, ',', '.') }}</span></td>

                    <td class="quantity">{{ $rinciankatalog->qty }}</td>

                    <td class="price">{{ number_format($rinciankatalog->katalog->harga * $rinciankatalog->qty, 0, ',', '.') }}</td>
                </tr>
                @empty
                @foreach ($orderan as $index => $ord)
                <tr>
                    <td class="description">{{ $ord->produk->nama }} - {{ number_format($ord->produk->harga, 0, ',', '.') }}</td>

                    <td class="quantity">{{ $ord->qty }}</td>
                    <td class="price">{{ number_format($ord->produk->harga * $ord->qty, 0, ',', '.') }}</td>
                </tr>

                @endforeach
                @endforelse

            </tbody>
        </table>
        <table>
            <tbody>
                <tr>

                    <td class="description">Jumlah</td>

                    <td class="price">{{ number_format($order->total, 0, ',', '.') }}</td>
                </tr>
                <tr>

                    <td class="description">Ongkir</td>

                    <td class="price">{{ number_format($order->ongkir, 0, ',', '.') }}</td>
                </tr>
                <tr>

                    <td class="description">Total</td>

                    <td class="price">{{ number_format($order->ongkir + $order->total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>

                    <th class="description">Pembayaran</th>

                    <th class="price">Nominal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keuangan as $pem)
                    <tr>

                        <td class="description">{{ $pem->tanggal }} / {{ $pem->metode }}</td>

                        <td class="price">
                            {{ number_format($pem->nominal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td class="description">Kurang Bayar</td>
                    <td class="price">{{ number_format($sisa, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <p class="centered" style="font-size:12pt">
            {{ $order->pembayaran }}
        </p>
        <p class="centered"><strong>Estimasi<br/> Pengambilan :<br /><br/>
            {{ \Carbon\Carbon::parse($order->tanggalambil)->isoFormat('dddd, D MMM Y, HH:mm') }}</strong></p>
        <p class="centered" style="font-size:6pt">Terima kasih sudah Order
            <br>Cetak Banner/Sticker/Spanduk Juga Bisa!
        </p>
    </div>

    <div class="ticket">
        <p class="centered"><img
            src='https://chart.googleapis.com/chart?cht=qr&chl=https%3A%2F%2Fweb.kaoskeren.id%2Fs%2F{{ $order->inv }}&chs=80x80&choe=UTF-8&chld=L|2'
            rel='nofollow' alt='qr code' style="
width: 100px;
"><a
            href='http://web.kaoskeren.id/s/{{ $order->inv }}' border='0' style='cursor:default'
            rel='nofollow'></a></p>
        <p class="centered">SABLON SATUAN - KAOSKERENID
            <br>Jalan Sancang 22, Bogor
            <br>08811722125
        </p>
        <p class="centered"><strong>Tanggal
                Order</strong><br />{{ \Carbon\Carbon::parse($order->created_at)->isoFormat('dddd, D MMM Y, HH:mm') }}
        </p>
        <p class="centered">Inv : #{{ $order->inv }}
            <br><strong>Klien : {{ $order->klien->nama }}</strong>
        </p>

        <p class="centered">{{ $order->detail }}</p>
        <table>
            <thead>
                <tr>

                    <th class="description">Produk</th>

                    <th class="quantity">Q</th>

                    <th class="price">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orderankatalog as $rinciankatalog )
                <tr>

                    <td class="description">{{ $rinciankatalog->katalog->nama }}<br/><span style="margin-left: 5px; font-size:5pt">- Rp. {{ number_format($rinciankatalog->katalog->harga, 0, ',', '.') }}</span></td>

                    <td class="quantity">{{ $rinciankatalog->qty }}</td>

                    <td class="price">{{ number_format($rinciankatalog->katalog->harga * $rinciankatalog->qty, 0, ',', '.') }}</td>
                </tr>
                @empty
                @foreach ($orderan as $index => $ord)
                <tr>
                    <td class="description">{{ $ord->produk->nama }} - {{ number_format($ord->produk->harga, 0, ',', '.') }}</td>

                    <td class="quantity">{{ $ord->qty }}</td>
                    <td class="price">{{ number_format($ord->produk->harga * $ord->qty, 0, ',', '.') }}</td>
                </tr>

                @endforeach
                @endforelse

            </tbody>
        </table>
        <table>
            <tbody>
                <tr>

                    <td class="description">Jumlah</td>

                    <td class="price">{{ number_format($order->total, 0, ',', '.') }}</td>
                </tr>
                <tr>

                    <td class="description">Ongkir</td>

                    <td class="price">{{ number_format($order->ongkir, 0, ',', '.') }}</td>
                </tr>
                <tr>

                    <td class="description">Total</td>

                    <td class="price">{{ number_format($order->ongkir + $order->total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>

                    <th class="description">Pembayaran</th>

                    <th class="price">Nominal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keuangan as $pem)
                    <tr>

                        <td class="description">{{ $pem->tanggal }} / {{ $pem->metode }}</td>

                        <td class="price">
                            {{ number_format($pem->nominal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td class="description">Kurang Bayar</td>
                    <td class="price">{{ number_format($sisa, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <p class="centered" style="font-size:12pt">
            {{ $order->pembayaran }}
        </p>
        <p class="centered"><strong>Estimasi<br/> Pengambilan :<br /><br/>
            {{ \Carbon\Carbon::parse($order->tanggalambil)->isoFormat('dddd, D MMM Y, HH:mm') }}</strong></p>
        <p class="centered" style="font-size:6pt">Terima kasih sudah Order
            <br>Cetak Banner/Sticker/Spanduk Juga Bisa!
        </p>
    </div>

</body>

</html>
