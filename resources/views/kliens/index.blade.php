@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">List Klien</h2>
                        </div>
                        <div class="col text-end"><a href="#" class="btn btn-sm btn-primary">See all</a></div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Hp</th>

                                <th>Action</th>

                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('klien.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Klien Baru</div>

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" name="nama" placeholder="Tulis Nama">
                            <label for="email2">Nama</label>
                        </div>
                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" name="hp" placeholder="08xx">
                            <label for="email2">No Whatsapp</label>
                        </div>
                        <div class="form-floating mb-3">

                            <textarea class="form-control" name="alamat" rows="5"></textarea>
                            <label for="comment">Alamat</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="order" value="1">
                                <span class="form-check-sign">Langsung buat Orderan</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
