@extends('layouts.app')
@section('title')
    <div class="container text-white py-2">
        <div class="d-flex justify-content-between align-items-center">
            <div class="mr-3">
                <h2 class="mb-3">Daftar Produk
                </h2>
            </div>
            <div class="ml-auto">
                <a href="{{ route('produk.create') }}" class="btn btn-primary">Buat Baru</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="table-responsive mt-4">
                    <table class="table table-bordered" id="data">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produks as $index => $produk)
                                <tr class="@if ($produk->status == 'Non Aktif') bg-dark text-white @endif">
                                    <td scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->kategori }}</td>
                                    <td>{{ $produk->harga }}</td>
                                    <td class="fw-bold">
                                        {{ $produk->status }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-round btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#pro{{ $produk->id }}">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="pro{{ $produk->id }}" tabindex="-1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">Produk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('produk.update', $produk->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="{{ $produk->status }}">
                                                                {{ $produk->status }}
                                                            </option>
                                                            <option value="Aktif">Aktif</option>
                                                            <option value="Non Aktif">Non Aktif</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email2">Kategori</label>
                                                        <input type="text" class="form-control" name="kategori"
                                                            value="{{ $produk->kategori }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email2">Nama Produk</label>
                                                        <input type="text" class="form-control" name="nama"
                                                            value="{{ $produk->nama }}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="email2">Harga</label>
                                                        <input type="number" class="form-control" name="harga"
                                                            value="{{ $produk->harga }}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
