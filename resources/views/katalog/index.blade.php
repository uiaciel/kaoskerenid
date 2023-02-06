@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-8">
            @foreach ($katalogs as $katalog)
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ $katalog->nama }}</h4>

                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalId{{ $katalog->id }}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalId{{ $katalog->id }}">
                            Delete
                        </button>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId{{ $katalog->id }}" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('katalogproduk.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">


                                                <label for="" class="form-label">{{ $katalog->nama }}</label>
                                                <input type="text" class="form-control" name="katalog_id" id=""
                                                    aria-describedby="helpId" placeholder="" value="{{ $katalog->id }}">
                                                <small id="helpId" class="form-text text-muted">Help text</small>


                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Produk</label>
                                                <select multiple class="form-select form-select-lg" name="produk_id[]"
                                                    id="">

                                                    @foreach ($produks as $produk)
                                                        <option value="{{ $produk->id }}">{{ $produk->kategori }} -
                                                            {{ $produk->nama }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($katalog->katalogproduk->where('katalog_id', $katalog->id) as $pro)
                                    <tr class="">
                                        <td scope="row">Item</td>
                                        <td>{{ $pro->produk->nama }}</td>
                                        <td>{{ $pro->produk->harga }}</td>
                                        <td><button type="button" class="btn btn-danger">X</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach



        </div>
        <div class="col-md-4">
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
