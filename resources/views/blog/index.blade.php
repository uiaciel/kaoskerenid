@extends('layouts.app')
@section('content')
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#postArtikel" aria-expanded="false"
        aria-controls="postArtikel">
        Posting Artikel
    </button>
    </p>
    <div class="collapse" id="postArtikel">
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('blog.store') }}" method="post">
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="judul" placeholder="judul"
                                    name="judul">
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
                            <div class="mb-3">
                                <label for="konten">Konten</label>
                                <textarea id="tinymce" class="form-control" name="konten" placeholder="Tulis disini ..."></textarea>

                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Posting</button>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
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
                                    <td>{{ $blog->judul }} - {{ $blog->dibaca }}x</td>
                                    <td class="text-capitalize">{{ $blog->kategori }}</td>
                                    <td class="text-capitalize">{{ $blog->status }}</td>

                                    <td class="text-center">

                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group" role="group" aria-label="Button Group">
                                                <a href="{{ route('blog.edit', $blog->id) }}" type="button"
                                                    class="btn btn-success">Edit</a>

                                                <a href="/{{ $blog->slug }}" target="_blank" type="button"
                                                    class="btn btn-primary">View</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>


                                        </form>


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
