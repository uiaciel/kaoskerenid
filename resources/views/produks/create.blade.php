@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
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

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
