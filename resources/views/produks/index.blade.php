@extends('layouts.app')
@section('title')
    <div class="container text-white py-2">
        <div class="d-flex justify-content-between align-items-center">
            <div class="mr-3">
                <h2 class="mb-3">Daftar Produk
                </h2>
            </div>
            <div class="ml-auto">
                <a href="/" data-bs-toggle="modal"
                data-bs-target="#buatproduk" class="btn btn-primary">Buat Baru</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div
    class="modal fade"
    id="buatproduk"
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
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Produk Baru
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="form-group" hidden>
                    <label for="status">Status</label>
                    <select class="form-control" name="status">

                        <option value="Aktif">Aktif</option>
                        <option value="Non Aktif">Non Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email2">Kategori</label>
                    <input type="text" class="form-control" name="kategori">
                </div>
                <div class="form-group">
                    <label for="email2">Nama Produk</label>
                    <input type="text" class="form-control" name="nama">
                </div>

                <div class="form-group mb-3">
                    <label for="email2">Harga</label>
                    <input type="number" class="form-control" name="harga">
                </div>

            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>
    </div>
</div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h2>Aktif</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($produks->where('status', 'Aktif') as $produk)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="" data-bs-toggle="modal" data-bs-target="#pro{{ $produk->id }}">{{ $produk->kategori }} - {{ $produk->nama }} - {{ $produk->harga }}</a>
                            <form action="{{ route('produk.update', $produk->id) }}" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <select class="form-control" name="status" hidden>


                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                                <input type="text" class="form-control" name="kategori"
                                        value="{{ $produk->kategori }}" hidden>
                                        <input type="text" class="form-control" name="nama"
                                        value="{{ $produk->nama }}" hidden>
                                        <input type="number" class="form-control" name="harga"
                                        value="{{ $produk->harga }}" hidden>


                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash" aria-hidden="true"></i></button>
                            </form>
                        </li>
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

                      </ul>
                </div>

            </div>
        </div>
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header">
                    <h2>Non Aktif</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($produks->where('status', 'Non Aktif') as $index => $produks)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="" data-bs-toggle="modal" data-bs-target="#pros{{ $produks->id }}">{{ $produks->kategori }} - {{ $produks->nama }} - {{ $produks->harga }}</a>

                            <form action="{{ route('produk.update', $produks->id) }}" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <select class="form-control" name="status" hidden>


                                    <option value="Aktif">Aktif</option>
                                </select>
                                <input type="text" class="form-control" name="kategori"
                                        value="{{ $produks->kategori }}" hidden>
                                        <input type="text" class="form-control" name="nama"
                                        value="{{ $produks->nama }}" hidden>
                                        <input type="number" class="form-control" name="harga"
                                        value="{{ $produks->harga }}" hidden>


                                <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle" aria-hidden="true"></i></button>
                            </form>
                        </li>
                        <div class="modal fade" id="pros{{ $produks->id }}" tabindex="-1" data-bs-backdrop="static"
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
                                        <form action="{{ route('produk.update', $produks->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="PUT">
                                            @csrf
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="{{ $produks->status }}">
                                                        {{ $produks->status }}
                                                    </option>
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Non Aktif">Non Aktif</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="email2">Kategori</label>
                                                <input type="text" class="form-control" name="kategori"
                                                    value="{{ $produks->kategori }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email2">Nama Produk</label>
                                                <input type="text" class="form-control" name="nama"
                                                    value="{{ $produks->nama }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="email2">Harga</label>
                                                <input type="number" class="form-control" name="harga"
                                                    value="{{ $produks->harga }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                      </ul>
                </div>

            </div>


        </div>
    </div>
@endsection
