@extends('layouts.app')
@section('title')
    <div class="container text-white py-2">
        <div class="d-flex justify-content-between align-items-center">
            <div class="mr-3">
                <h2 class="mb-3">Daftar Orderan
                </h2>
                <select class="form-select" name="filter_periode" id="filter_periode">
                    <option value="">Rentang Waktu</option>
                    <option value="1">Kemarin</option>
                    <option value="7">Seminggu lalu</option>
                    <option value="30">Sebulan Lalu</option>
                    <option value="60">2 bulan Lalu</option>
                    <option value="90">3 bulan Lalu</option>
                </select>

            </div>
            <div class="ml-auto">
                {{-- <a href="{{ route('produk.create') }}" class="btn btn-primary">Buat Baru</a> --}}
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">

        <div class="col-lg-12 col-md-12 mb-3">
            <div class="card">
                <div class="table-responsive mt-4">
                    <table class="table" id="orders-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Detail</th>
                                <th>Inv</th>
                                <th>Status</th>
                                <th>QTY</th>
                                <th>Pembayaran</th>
                            </tr>
                        </thead>

                    </table>
                </div>

            </div>

        </div>

    </div>
@endsection
