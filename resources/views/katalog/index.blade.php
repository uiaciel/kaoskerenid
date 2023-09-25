@extends('layouts.app')

@section('content')
    <div class="row">

        @foreach ($katalogs as $katalog)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">

                    <h4>{{ $katalog->nama }}
                        <small class="fs-6"> Rp.
                            {{ number_format($katalog->katalogproduk->where('katalog_id', $katalog->id)->sum('produk.harga')) }}</small>
                    </h4>

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalId{{ $katalog->id }}">
                            Add
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalEdit{{ $katalog->id }}">
                            Edit
                        </button>
                        <form action="{{ route('katalog.destroy', $katalog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                    <div class="modal fade" id="modalEdit{{ $katalog->id }}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">{{ $katalog->nama }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('katalog.update', $katalog->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PUT">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" name="status" aria-label="Default select example">
                                                <option value="AKTIF">AKTIF</option>
                                                <option value="NON AKTIF">NON AKTIF</option>


                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Kategori</label>
                                            <select class="form-select" name="kategori" aria-label="Default select example">
                                                <option value="JASA SABLON">JASA SABLON</option>
                                                <option value="SABLON SATUAN">SABLON SATUAN</option>
                                                <option value="CETAK DIGITAL">CETAK DIGITAL</option>
                                                <option value="MERCHANDISE">MERCHANDISE</option>

                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" value="{{ $katalog->nama }}"
                                                id="nama" name="nama" aria-describedby="namaHelp">

                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="detail" rows="6">{{ $katalog->detail }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload Foto</label>
                                            <input class="form-control" type="file" name="mockup" id="formFile">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="modal fade" id="modalId{{ $katalog->id }}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">{{ $katalog->nama }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('katalogproduk.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input name="katalog_id" value="{{ $katalog->id }}" hidden>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Produk</label>
                                            <select multiple class="form-select form-select-lg select2-multiple"
                                                name="produk_id[]" id="">

                                                @foreach ($produks as $produk)
                                                    <option value="{{ $produk->id }}">{{ $produk->kategori }} -
                                                        {{ $produk->nama }} - {{ $produk->harga}}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-body bg-dark">
                            <img src="{{ $katalog->image }}">
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($katalog->katalogproduk->where('katalog_id', $katalog->id) as $pro)
                                        <tr class="">
                                            <td scope="row">Item</td>
                                            <td>{{ $pro->produk->kategori }}</td>
                                            <td>{{ $pro->produk->nama }}</td>
                                            <td class="fs-4 text-end">{{ $pro->produk->harga }}</td>
                                            <td>
                                                <form action="{{ route('katalogproduk.destroy', $pro->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>




            </div>
        @endforeach


    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('katalog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Katalog Baru</div>

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" name="nama" placeholder="Tulis Nama">
                            <label for="email2">Nama</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
