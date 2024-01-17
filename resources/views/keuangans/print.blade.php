@extends('layouts.print')
@section('content')


<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="text-center">
            <h3>Laporan Keuangan {{ $formatbulantahun }}</h3>
            <h6>Toko Sablon Satuan Kaoskeren.id</h6>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Inv Order</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $saldo = 0;
                    @endphp

                    @foreach ($keuangans as $key => $transaksi)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-M-Y') }}</td>
                            <td>{{ $transaksi->kategori }}</td>
                            <td>#{{ $transaksi->order->inv ?? '-' }} </td>
                            <td>Rp. {{ $transaksi->jenis == 'Pemasukan' ? number_format($transaksi->nominal, 0, ',', '.') : '-' }}</td>
                            <td>Rp. {{ $transaksi->jenis == 'Pengeluaran' ? number_format($transaksi->nominal, 0, ',', '.') : '-' }}</td>
                            @php
                                $saldo += ($transaksi->jenis == 'Pemasukan') ? $transaksi->nominal : -$transaksi->nominal;
                            @endphp
                            <td>Rp. {{ number_format($saldo, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="5"></td>

                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td>Rp. {{  number_format($debit, 0, ',', '.')  }}</td>
                        <td>Rp. {{  number_format($kredit, 0, ',', '.')  }}</td>
                        <td>Rp. {{  number_format($debit - $kredit, 0, ',', '.')  }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


@endsection
