@extends('layouts.app')
@section('title', 'Page Title')
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
                                <tr class="">
                                    <td scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->kategori }}</td>
                                    <td>{{ $produk->harga }}</td>
                                    <td>{{ $produk->status }}</td>
                                    <td><a href="{{ route('produk.edit', $produk->id) }}"
                                            class="btn btn-sm btn-round btn-primary">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
