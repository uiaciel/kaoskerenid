@extends('layouts.app')
@section('title')
    <div class="container text-white py-2">
        <div class="d-flex justify-content-between align-items-center">
            <div class="mr-3">
                <h2 class="mb-3">Daftar Orderan
                </h2>

            </div>
            <div class="ml-auto">
                {{-- <a href="{{ route('produk.create') }}" class="btn btn-primary">Buat Baru</a> --}}
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="mb-3">
                                <label for="" class="form-label">Periode</label>
                                <select class="form-select" name="filter_periode" id="filter_periode">
                                    <option value="">Pilih</option>
                                    <option value="1">Kemarin</option>
                                    <option value="7">Minggu Lalu</option>
                                    <option value="30">Bulan Lalu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="filter-search" class="form-label">Cari disini</label>
                                <input type="text" class="form-control" name="filter-search" id="filter-search"
                                    aria-describedby="filter-search" placeholder="Ketik disini">

                            </div>
                        </div>





                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="table-responsive mt-4">
                    <table class="table" id="orders-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Judul</th>
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
