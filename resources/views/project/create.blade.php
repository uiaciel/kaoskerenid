@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="namaProject" class="form-label">Nama Project</label>
                            <input type="text" class="form-control" name="nama" id="namaProject"
                                aria-describedby="namaProjectHelp">
                        </div>

                        <div class="mb-3">
                            <label for="valueNilai" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="nilai" id="valueNilai"
                                aria-describedby="valueNilai">
                        </div>
                        <div class="mb-3">
                            <label for="jatuhtempo" class="form-label">Jatuh Tempo</label>
                            <input type="date" class="form-control" name="jatuhtempo" id="jatuhtempo"
                                aria-describedby="jatuhtempohelp">
                        </div>

                        <div class="mb-3">
                            <label for="jatuhtempo" class="form-label">Klien</label>
                            <input type="text" class="form-control" name="klien_id" value="14" id="jatuhtempo"
                                aria-describedby="jatuhtempohelp">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" name="kategori" aria-label="Default select example">
                                <option selected>Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="2">Non Aktif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option selected>Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="2">Non Aktif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
