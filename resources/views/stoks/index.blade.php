@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
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
                                <td>{{$stok->kode}}</td>
                                <td>{{$stok->supplier}}</td>
                                <td>{{$stok->qty}}</td>
                                <td>{{$stok->created_at}}</td>
                                <td><a href="{{route('datastok.edit', $stok->id)}}" class="btn btn-sm btn-success p-2">Input Data</a> <a href="" class="btn btn-sm btn-primary">History</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <form action="{{route('stok.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                  <label for="" class="form-label">Nama Barang</label>
                  <input type="text"
                    class="form-control" name="nama" id="" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Hitam, </small>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Kategori Barang</label>
                    <input type="text"
                      class="form-control" name="kategori" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Kaos Pendek, Topi Jaring, </small>
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Supplier</label>
                    <input type="text"
                      class="form-control" name="supplier" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Cotton COmbed 30s</small>
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Kode Barang</label>
                    <input type="text"
                      class="form-control" name="kode" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">QTY</label>
                    <input type="text"
                      class="form-control" name="qty" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection