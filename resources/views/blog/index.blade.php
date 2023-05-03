@extends('layouts.app');
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('blog.store') }}" method="post">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="judul" placeholder="judul" name="judul">
                            <label for="judul">Judul</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="Kategori" name="kategori" aria-label="Katagori">

                                <option value="blog">Blog</option>
                                <option value="teknologi">Teknologi</option>
                                <option value="pesanan">Pesanan</option>
                            </select>
                            <label for="Kategori">Pilih Kategori</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="konten" style="height: 400px;" placeholder="Tulis disini ..." id="kontent"></textarea>
                            <label for="konten">Konten</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Posting</button>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($blogs as $blog)
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $blog->judul }}</td>
                                    <td class="text-capitalize">{{ $blog->kategori }}</td>
                                    <td class="text-capitalize">{{ $blog->status }}</td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-success">Edit</button>

                                            <a href="/blog/{{ $blog->slug }}" type="button"
                                                class="btn btn-primary">View</a>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
