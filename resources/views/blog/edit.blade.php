@extends('layouts.app')
@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="judul" placeholder="judul" name="judul"
                                value="{{ $blog->judul }}">
                            <label for="judul">Judul</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="Kategori" name="kategori" aria-label="Katagori">
                                <option value="{{ $blog->kategori }}">{{ Str::Upper($blog->kategori) }}</option>
                                <option value="blog">Blog</option>
                                <option value="teknologi">Teknologi</option>
                                <option value="pesanan">Pesanan</option>
                            </select>
                            <label for="Kategori">Pilih Kategori</label>
                        </div>
                        <div class="mb-3">
                            <label for="konten">Konten</label>
                            <textarea id="tinymce" class="form-control" name="konten" placeholder="Tulis disini ...">{{ $blog->konten }}</textarea>

                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Update</button>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
