@extends('layouts.print')
@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="text-center">
            <h2>Laporan Keuangan Bulan</h2>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Order ID</th>
                        {{-- <th>Detail</th> --}}
                        <th>Debit (Nominal)</th>
                        <th>Kredit (Nominal)</th>
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
                            <td>{{ $transaksi->tanggal }}</td>
                            <td>{{ $transaksi->order->inv ?? '-' }}</td>
                            {{-- <td>{{ $transaksi->detail }}</td> --}}
                            <td>{{ $transaksi->jenis == 'Pemasukan' ? $transaksi->nominal : '-' }}</td>
                            <td>{{ $transaksi->jenis == 'Pengeluaran' ? $transaksi->nominal : '-' }}</td>
                            @php
                                $saldo += ($transaksi->jenis == 'Pemasukan') ? $transaksi->nominal : -$transaksi->nominal;
                            @endphp
                            <td>{{ $saldo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Masuk</th>
                        <th scope="col">Keluar</th>
                        <th scope="col">Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keuangans as $index => $keuangan)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($keuangan->tanggal)->format('d F Y') }}</td>
                        <td>{{ $keuangan->metode }} - {{ $keuangan->detail }}</td>
                        <td>@if ($keuangan->jenis == "Pemasukan")
                            Rp. {{  number_format($keuangan->nominal, 0, ',', '.')  }}
                        @endif</td>
                        <td>
                            @if ($keuangan->jenis == "Pengeluaran")
                            Rp. {{  number_format($keuangan->nominal, 0, ',', '.')  }}
                        @endif
                        </td>
                            <td></td>
                    </tr>
                    @endforeach
                    {{-- @foreach ($pengeluarans as $index => $pengeluaran)
                        <tr class="">
                            <td>{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d F Y') }}</td>
                            <td>{{ $pengeluaran->metode }}</td>
                            <td>{{ $pengeluaran->nominal }}</td>
                            <td>{{ $pengeluaran->kategori }}</td>
                        </tr>
                    @endforeach --}}
                    <tr>
                        <td colspan="5"></td>

                    </tr>
                    <tr>
                        <td colspan="3"></td>
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
