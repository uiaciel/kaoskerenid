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

        <p>Tgl Order : {{ \Carbon\Carbon::parse($order->created_at)->formatLocalized('%A, %d %b %Y, %H:%I:%S') }}
            <br>Inv : #{{ $order->inv }}
            <br><strong>Klien : {{ $order->klien->nama }}</strong>
        </p>
        
        <p>Detail :</p>
        <p>{{$order->detail}}</p>


        <table>
            <thead>
                <tr>
                    <th class="quantity">Q</th>
                    <th class="description">Produk</th>
                    <th class="rp"></th>
                    <th class="price">Harga</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($orderan as $index => $ord)
                    <tr>
                        <td class="quantity">{{ $ord->qty }}</td>
                        <td class="description">{{ $ord->produk->nama }}</td>
                        <td class="rp">Rp</td>
                        <td class="price">{{ number_format($ord->produk->harga, 0, ',', '.') }}</td>

                    </tr>
                @endforeach

                <tr>
                    <td class="quantity"></td>
                    <td class="description">Jumlah</td>
                    <td class="rp">Rp</td>
                    <td class="price">{{ number_format($order->total, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="quantity"></td>
                    <td class="description">Ongkir</td>
                    <td class="rp">Rp</td>
                    <td class="price">{{ number_format($order->ongkir, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="quantity"></td>
                    <td class="description">Total</td>
                    <td class="rp">Rp</td>
                    <td class="price">{{ number_format($order->ongkir + $order->total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th class="description">Metode</th>
                    <th class="rp"></th>
                    <th class="price">Nominal</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($keuangan as $pem)
                    <tr>
                        <td style="
    width: 60px;
">{{ $pem->tanggalbayar }}</td>
                        <td style="
    width: 10px;
">{{ $pem->metode }}</td>
                        <td class="rp">Rp</td>
                        <td style="
    width: 50px;text-align: right;
">

                            {{ number_format($pem->nominal, 0, ',', '.') }}</td>

                    </tr>
                @endforeach
                <tr>
                    <td style="
    width: 60px;
"></td>
                    <td style="
    width: 10px;
">Kurang Bayar</td>
                    <td>Rp</td>
                    <td style="
    width: 50px;text-align: right;
">
                        {{ number_format($sisa, 0, ',', '.') }}</td>

                </tr>

            </tbody>
        </table>
        <p class="centered" style="font-size:12pt">
            {{$order->pembayaran}}
            <br><strong>Estimasi :
                {{ \Carbon\Carbon::parse($order->pengambilan)->formatLocalized('%A Sore, %d %b %Y') }}</strong>
        </p>

        <p class="centered">Terima kasih sudah Order

            <br>Kirim Paket JNE, SICEPAT, JNT, NINJA, LionParcel Bisa!
        </p>
    </div>

    <div class="ticket">
        <p class="centered"><img
                src='https://chart.googleapis.com/chart?cht=qr&chl=https%3A%2F%2Fweb.kaoskeren.id%2Fstatus%2F{{ $order->inv }}&chs=100x100&choe=UTF-8&chld=L|2'
                rel='nofollow' alt='qr code' style="
    width: 100px;
"><a
                href='http://web.kaoskeren.id/status/{{ $order->inv }}' border='0' style='cursor:default'
                rel='nofollow'></a></p>

        <p class="centered">SABLON SATUAN - KAOSKERENID
            <br>Jalan Sancang 22, Bogor
            <br>08811722125
        </p>

        <p>Tgl Order : {{ \Carbon\Carbon::parse($order->created_at)->formatLocalized('%A, %d %b %Y, %H:%I:%S') }}
            <br>Inv : #{{ $order->inv }}
            <br><strong>Klien : {{ $order->klien->nama }}</strong>
        </p>
        
        <p>Detail :</p>
        <p>{{$order->detail}}</p>



        <table>
            <thead>
                <tr>
                    <th class="quantity">Q</th>
                    <th class="description">Produk</th>
                    <th class="rp"></th>
                    <th class="price">Harga</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($orderan as $index => $ord)
                    <tr>
                        <td class="quantity">{{ $ord->qty }}</td>
                        <td class="description">{{ $ord->produk->nama }}</td>
                        <td class="rp">Rp</td>
                        <td class="price">{{ number_format($ord->produk->harga, 0, ',', '.') }}</td>

                    </tr>
                @endforeach

                <tr>
                    <td class="quantity"></td>
                    <td class="description">Jumlah</td>
                    <td class="rp">Rp</td>
                    <td class="price">{{ number_format($order->total, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="quantity"></td>
                    <td class="description">Ongkir</td>
                    <td class="rp">Rp</td>
                    <td class="price">{{ number_format($order->ongkir, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="quantity"></td>
                    <td class="description">Total</td>
                    <td class="rp">Rp</td>
                    <td class="price">{{ number_format($order->ongkir + $order->total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th class="description">Metode</th>
                    <th class="rp"></th>
                    <th class="price">Nominal</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($keuangan as $pem)
                    <tr>
                        <td style="
    width: 60px;
">{{ $pem->tanggal }}</td>
                        <td style="
    width: 10px;
">{{ $pem->metode }}</td>
                        <td class="rp">Rp</td>
                        <td style="
    width: 50px;text-align: right;
">

                            {{ number_format($pem->nominal, 0, ',', '.') }}</td>

                    </tr>
                @endforeach
                <tr>
                    <td style="
    width: 60px;
"></td>
                    <td style="
    width: 10px;
">Kurang Bayar</td>
                    <td>Rp</td>
                    <td style="
    width: 50px;text-align: right;
">
                        {{ number_format($sisa, 0, ',', '.') }}</td>

                </tr>

            </tbody>
        </table>
        <p class="centered" style="font-size:12pt">
            {{$order->pembayaran}}
            <br><strong>Estimasi :
                {{ \Carbon\Carbon::parse($order->pengambilan)->formatLocalized('%A Sore, %d %b %Y') }}</strong>
        </p>

        <p class="centered">Terima kasih sudah Order

            <br>Kirim Paket JNE, SICEPAT, JNT, NINJA, LionParcel Bisa!
        </p>
    </div>

</body>

</html>
