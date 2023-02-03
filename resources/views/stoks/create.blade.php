@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{route('stok.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="" class="form-label">Nama Barang</label>
              <input type="text"
                class="form-control" name="nama" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Kategori Barang</label>
                <input type="text"
                  class="form-control" name="kategori" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Supplier</label>
                <input type="text"
                  class="form-control" name="supplier" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Help text</small>
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
@endsection
