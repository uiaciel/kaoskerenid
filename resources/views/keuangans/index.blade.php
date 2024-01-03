@extends('layouts.app')

@section('content')
<div class="row mb-3">

    <!-- Modal trigger button -->


    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
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
                    <form action="{{ route('keuangan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="date" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nominal</label>
                            <input type="text" name="nominal" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Ketik Angka saja</small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jenis</label>
                            <select class="form-control" name="jenis" id="">
                                <option>Pengeluaran</option>
                                <option>Pemasukan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kategori</label>
                            <select class="form-control" name="kategori" id="">
                                <option value="Saldo Awal">Saldo Awal</option>
                                <option value="orderan">Orderan</option>
                                <option value="ongkos cetak">Ongkos Cetak</option>
                                <option value="Makan Cemilan">Makan</option>
                                <option value="Listrik">Listrik</option>
                                <option value="Internet">Internet</option>
                                <option value="Belanja Bahan">Belanja Bahan</option>
                                <option value="Belanja Sablon">Belanja Sablon</option>
                            </select>
                        </div>
                        <input type="text" name="order_id" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" hidden>
                        <div class="mb-3">
                            <label for="" class="form-label">Metode</label>
                            <select class="form-control" name="metode" id="">
                                <option>Transfer</option>
                                <option>Tunai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
                            <thead>
                                <tr>
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
                                    <td>{{ \Carbon\Carbon::parse($keuangan->tanggal)->format('d F Y') }}</td>
                                    <td>{{ $keuangan->metode }}</td>
                                    <td>@if ($keuangan->jenis == "Pemasukan")
                                        {{ $keuangan->nominal }}
                                    @endif</td>
                                    <td>
                                        @if ($keuangan->jenis == "Pengeluaran")
                                        {{ $keuangan->nominal }}
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
                                    <td colspan="2"></td>
                                    <td>{{ $debit }}</td>
                                    <td>{{ $kredit }}</td>
                                    <td>{{ $debit - $kredit }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
