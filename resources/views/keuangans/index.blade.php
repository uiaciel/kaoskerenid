@extends('layouts.app')

@section('content')
<div class="row mb-3">

    <form>
        <div class="row">
            <div class="col">
                Tampilkan Data
            </div>
            <div class="col">
              <input type="text" name="bulan" class="form-control" placeholder="Bulan">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="2023" value="Tahun" name="tahun">
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
                        class="btn btn-primary"
                        href="print/"
                        role="button"
                        >Print</a
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
