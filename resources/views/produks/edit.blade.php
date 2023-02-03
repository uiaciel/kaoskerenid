@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">List Produk</div>
                    <div class="card-tools">
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                            <span class="btn-label">
                                <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a>
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                            <span class="btn-label">
                                <i class="fa fa-print"></i>
                            </span>
                            Print
                        </a>
                    </div>
                </div>
            </div>
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
                        @foreach ($produks as $index => $produk  )

                        <tr class="">
                            <td scope="row">{{$index+1}}</td>
                            <td>{{$produk->nama}}</td>
                            <td>{{$produk->kategori}}</td>
                            <td>{{$produk->harga}}</td>
                            <td>{{$produk->status}}</td>
                            <td><a href="{{route('produk.edit', $produk->id)}}" class="btn btn-sm btn-round btn-primary">Edit</a></td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-body">

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <form action="{{route('produk.update', $produk->id)}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Edit Produk</div>
                    <div class="card-tools">
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                            <span class="btn-label">
                                <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a>
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                            <span class="btn-label">
                                <i class="fa fa-print"></i>
                            </span>
                            Print
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email2">Kategori</label>
                    <input type="text" class="form-control" name="kategori" value="{{$produk->kategori}}">
                </div>

                <div class="form-group">
                    <label for="email2">Nama Produk</label>
                    <input type="text" class="form-control" name="nama" value="{{$produk->nama}}">
                </div>
                
                <div class="form-group">
                    <label for="email2">Harga</label>
                    <input type="number" class="form-control" name="harga" value="{{$produk->harga}}">
                </div>

                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status">
                    <option value="{{$produk->status}}">{{$produk->status}}</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Non Aktif">Non Aktif</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

        </form>
    </div>
</div>
@endsection
