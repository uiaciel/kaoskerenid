@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <div class="row">

        <div class="col-lg-8">

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

        <div class="col-lg-4">

            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card">

                    <div class="card-header">

                        <h4>Produk Baru</h4>

                    </div>

                    <div class="card-body">

                        <div class="form-group">

                            <label for="email2">Kategori</label>

                            <input type="text" class="form-control" name="kategori">

                        </div>



                        <div class="form-group">

                            <label for="email2">Nama Produk</label>

                            <input type="text" class="form-control" name="nama">

                        </div>





                        <div class="form-group">

                            <label for="email2">Harga</label>

                            <input type="number" class="form-control" name="harga">

                        </div>



                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>

                </div>



            </form>

        </div>

    </div>

@endsection
