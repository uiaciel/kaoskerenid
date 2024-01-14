@extends('layouts.app')

@section('content')
<div class="row mb-3">

    <form>
        <div class="row">
            <div class="col">
                Tampilkan Data
            </div>
            <div class="col">
              <input type="text" name="bulan" class="form-control" placeholder="02">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="2023" value="2023" name="tahun">
            </div>
            <div class="col-lg-3">

<button
type="submit"
class="btn btn-primary"
>
Submit
</button>
            </div>
          </div>



</form>
    <div
        class="modal fade"
        id="modalId"
        tabindex="-1"
        data-bs-backdrop="static"
        data-bs-keyboard="false"

        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Catatan Keuangan
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
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
                        <h5 class="mb-0">Catatan Keuangan</h5>

                    </div>
                    <a
                        name=""
                        id=""
                        target="_blank"
                        class="btn btn-primary"
                        href="/admin/print/keuangan/bulan={{ request()->get('bulan') }}&tahun={{ request()->get('tahun') }}"
                        role="button"
                        ><i class="fa fa-print" aria-hidden="true"></i> Print</a
                    >

                    <button
        type="button"
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#modalId"
    >
        Tambah Keuangan
    </button>

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
                                <tr class="bg-dark text-white">
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
        </div>

    </div>

@endsection
