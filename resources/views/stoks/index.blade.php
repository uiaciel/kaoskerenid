@extends('layouts.app')
@section('content')




<div class="card mb-3">
    <div class="card-body">
        <h3>Jumlah Stok Tersedia : {{ $stoks->pluck('qty')->sum() }} <small>pcs</small></h3>

        <div
            class="table-responsive"
        >
            <table
                class="table table-bordered"
            >
                <thead>
                    <tr>

                        <th scope="col">Jenis</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kategori</th>

                        <th scope="col">Kode Barang</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('stok.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="number"
                            class="form-control" name="qty" value="0" hidden>
                    <tr class="">

                        <td scope="row">

                  <select
                        class="form-select"
                        name="nama"
                        id=""
                    >
                            @foreach ($namas as $namas )
                                <option value="{{ $kate }}">{{ $kate }}</option>
                            @endforeach

                    </select>

                  <small id="helpId" class="form-text text-muted">Kaos Pendek</small>
                        </td>
                        <td scope="row">
                            <input type="text"
                  class="form-control" name="supplier" id="" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Hitam XL</small>
                        </td>
                        <td scope="row">
                            <select
                            class="form-select"
                            name="kategori"
                            id=""
                        >
                                @foreach ($bahans as $bahan )
                                    <option value="{{ $bahan }}">{{ $bahan }}</option>
                                @endforeach

                        </select>
                  <small id="helpId" class="form-text text-muted">Combed 30s</small>
                        </td>

                        <td scope="row">
                            <input type="text"
                  class="form-control" name="kode" id="" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Kode</small>
                        </td>
                        <td scope="row">
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Tambah
                            </button>

                        </td>
                    </tr>
                    </form>

                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Terakhir Update</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stoks as $index => $stok )
                            <tr class="">
                                <td scope="row">{{$index+1}}</td>
                                <td><a href="{{route('datastok.show', $stok->id)}}">{{$stok->kode}}</a></td>
                                <td>{{$stok->nama}}</td>
                                <td>{{$stok->kategori}}</td>
                                <td>{{$stok->supplier}}</td>
                                <td>{{$stok->qty}}</td>
                                <td>{{$stok->created_at}}</td>
                                <td>
                            <!-- Modal trigger button -->
                            <button
                            type="button"
                            class="btn btn-primary btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modal{{ $stok->id }}"
                        >
                            Launch
                        </button></td>
                            </tr>
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div
                                class="modal fade"
                                id="modal{{ $stok->id }}"
                                tabindex="-1"
                                data-bs-backdrop="static"
                                data-bs-keyboard="false"
                                role="dialog"
                                aria-labelledby="modalTitleId"
                                aria-hidden="true"
                            >
                                <div
                                    class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                    role="document"
                                >
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                {{ $stok->kode }} - {{ $stok->nama }} {{ $stok->kategori }}
                                            </h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('datastok.store')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Tanggal</label>
                                                    <input type="date"
                                                      class="form-control" name="tanggal" id="date" aria-describedby="helpId" placeholder="">

                                                  </div>
                                                  <input type="text"
                                                  class="form-control" name="stok_id" value="{{$stok->id}}" aria-describedby="helpId" hidden>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">QTY</label>
                                                    <input type="text"
                                                      class="form-control" name="qty" id="" aria-describedby="helpId" placeholder="">

                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="" class="form-label">Harga Modal</label>
                                                    <input type="text"
                                                      class="form-control" name="modal" id="" aria-describedby="helpId" placeholder="">

                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="" class="form-label">Harga Jual</label>
                                                    <input type="text"
                                                      class="form-control" name="hargajual" id="" aria-describedby="helpId" placeholder="">

                                                  </div>
                                                <div class="mb-3">
                                                  <label for="" class="form-label">Status</label>
                                                  <select class="form-control" name="status" id="">
                                                    <option>Masuk</option>
                                                    <option>Keluar</option>
                                                  </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal"
                                            >
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-primary">Save</button>
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

</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <form method="POST"  >
                @csrf
              <div class="mb-3">
                <label for="" class="form-label">Input Kode Barang</label>
                <input
                    type="text"
                    class="form-control"
                    name="kode"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
                <input
                    type="text"
                    class="form-control"
                    name="qty"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
                <small id="helpId" class="form-text text-muted">Help text</small>
              </div>
              <button
                type="submit"
                class="btn btn-primary"
              >
                Button
              </button>

            </form>

            </div>
          </div>
    </div>
    <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">CART</h5>

            <h6 class="card-subtitle mb-2 text-muted ">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            b5
          </div>
        </div>
    </div>
</div>

@endsection
