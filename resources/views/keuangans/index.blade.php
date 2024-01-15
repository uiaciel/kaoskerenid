@extends('layouts.app')
@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h3 class="text-white">Catatan Keuangan</h3>
    </div>
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Catatan Keuangan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('keuangans.form')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header align-items-center d-flex justify-content-xl-between">
                <div class="p-2 flex-xl-grow-1 bd-highlight text-weight">
                    <button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-toggle="modal"
                    data-bs-target="#modalId"
                >
                    Input Baru
                </button>
                <a
                    name=""
                    id=""
                    class="btn btn-primary mb-3"
                    href="/admin/keuangan/inputs"
                    role="button"
                    >Input Banyak</a
                >

                </div>

                <form class="row g-3">
                    <div class="col-4">
                      <label for="staticEmail2" class="visually-hidden">Bulan</label>
                      <input type="text" name="bulan" class="form-control" id="staticEmail2" value="01">
                    </div>
                    <div class="col-4">
                      <label for="inputPassword2" class="visually-hidden">Tahun</label>
                      <input type="text" name="tahun" class="form-control" id="inputPassword2" value="2023">
                    </div>
                    <div class="col-2">
                      <button type="submit" class="btn btn-primary mb-3">Tampilkan</button>
                    </div>
                    <div class="col-2">
                        <a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="/admin/print/keuangan/bulan={{ request()->get('bulan')}}&tahun={{ request()->get('tahun') }}"
                            target="_blank"
                            role="button"
                            ><i class="fa fa-print" aria-hidden="true"></i>Print Data</a
                        >

                    </div>
                  </form>



            </div>
            <div class="card-body">
                <div class="table-responsive">


                    <table class="table table-bordered">
                        <thead class="text-white bg-dark">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Inv Order</th>
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
                                <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-M-Y') }}</td>
                                <td>{{ $transaksi->kategori }}</td>
                                <td>#{{ $transaksi->order->inv ?? '-' }} </td>
                                <td>Rp. {{ $transaksi->jenis == 'Pemasukan' ? number_format($transaksi->nominal, 0, ',',
                                    '.') : '-' }}</td>
                                <td>Rp. {{ $transaksi->jenis == 'Pengeluaran' ? number_format($transaksi->nominal, 0,
                                    ',', '.') : '-' }}</td>
                                @php
                                $saldo += ($transaksi->jenis == 'Pemasukan') ? $transaksi->nominal :
                                -$transaksi->nominal;
                                @endphp
                                <td>Rp. {{ number_format($saldo, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr class="bg-dark text-white">
                                <td colspan="4"></td>
                                <td>Rp. {{ number_format($debit, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($kredit, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($debit - $kredit, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
