@extends('layouts.app')
@section('content')

<div class="row mb-3">
    <div class="col-md-12">
        <form action="{{ route('katalog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    Katalog Baru

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

<div class="row mb-5">


    <div class="col-md-12">
        <div class="card">
            <div
                class="table-responsive"
            >
                <table
                    class="table table-bordered"
                >
                    <thead class=" table-dark">
                        <tr>

                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($katalogs as $katalog)

                        <tr class="">

                            <td scope="row" class="fw-bold">{{ $loop->iteration }}</td>
                            <td scope="row" class="fw-bold">{{ $katalog->nama }}</td>
                            <td scope="row" class="fw-bold">{{ $katalog->kategori }}</td>
                            <td>{{ number_format($katalog->katalogproduk->where('katalog_id', $katalog->id)->sum('produk.harga'))
                            }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalId{{ $katalog->id }}">
                                        Add
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $katalog->id }}">
                                        Edit
                                    </button>

                                </div>





                                    {{-- <form action="{{ route('katalog.destroy', $katalog->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form> --}}




                            <div class="modal fade" id="modalEdit{{ $katalog->id }}" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">{{ $katalog->nama }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body row">

                                            <div class="col-md-3">
                                                <img src="{{ $katalog->image }}" alt="">
                                            </div>
                                            <div class="col-md-9">

                                                <p class="d-inline-flex gap-1">
                                                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseform{{ $katalog->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                      Data
                                                    </a>
                                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#list{{ $katalog->id }}" aria-expanded="false" aria-controls="collapseExample">
                                                      Produk
                                                    </button>
                                                  </p>
                                                  <div class="collapse" id="collapseform{{ $katalog->id }}">
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
                                                            <label for="exampleInputText1" class="form-label">Harga</label>
                                                            <input type="text" name="harga"
                                                                value="{{ $katalog->katalogproduk->where('katalog_id', $katalog->id)->sum('produk.harga') }}"
                                                                class="form-control" id="exampleInputText1" aria-describedby="textHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Kategori</label>
                                                            <select class="form-select" name="kategori" aria-label="Default select example">
                                                                <option value="PAKET SABLON">PAKET SABLON</option>
                                                                <option value="SABLON AJA">SABLON AJA</option>
                                                                <option value="CUSTOM">CUSTOM</option>
                                                                <option value="CETAK DIGITAL">CETAK DIGITAL</option>
                                                                <option value="MERCHANDISE">MERCHANDISE</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" value="{{ $katalog->nama }}" id="nama"
                                                                name="nama" aria-describedby="namaHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="detail"
                                                                rows="6">{{ $katalog->detail }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Upload Foto</label>
                                                            <input class="form-control" type="file" name="mockup" id="formFile">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                  </div>
                                                  <div class="collapse" id="list{{ $katalog->id }}">
                                                    <table class="table table-bordered mb-3">
                                                        <tbody>
                                                            @foreach ($katalog->katalogproduk->where('katalog_id', $katalog->id) as $proe)
                                                            <tr class="">
                                                                <td>{{ $proe->produk->kategori }}</td>
                                                                <td>{{ $proe->produk->nama }}</td>
                                                                <td class="fs-4 text-end">{{ $proe->produk->harga }}</td>
                                                                <td>
                                                                    <form action="{{ route('katalogproduk.destroy', $proe->id) }}"
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
                                                    <form action="{{ route('katalogproduk.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input name="katalog_id" value="{{ $katalog->id }}" hidden>
                                                <label for="" class="form-label">Tambah Produk</label>
                                                <div class="mb-3">

                                                    <select multiple class="form-select form-select-lg select2-multiple"
                                                        name="produk_id[]" id="">
                                                        @foreach ($produks as $produk)
                                                        <option value="{{ $produk->id }}">{{ $produk->kategori }} -
                                                            {{ $produk->nama }} - {{ $produk->harga }}
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

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td>
                                <h6>{{ $katalog->status }}</h6>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>





</div>
@endsection
