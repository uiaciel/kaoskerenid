@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-primary mb-3">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">All Projects</h2>
                            </div>
                            <div class="col text-end">
                                {{-- <a href="{{ route('project.create') }}" class="btn btn-sm btn-primary">Create</a> --}}
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#createProject">
                                    Add Project
                                </button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hovered table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Jatuh Tempo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $project->nama }}</td>
                                    <td>{{ $project->kategori }}</td>
                                    <td>{{ $project->jatuhtempo }}</td>
                                    <td>{{ $project->status }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary">View</button>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $project->id }}">
                                                Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="staticBackdrop{{ $project->id }}" data-bs-keyboard="true"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('project.update', $project->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="namaProject" class="form-label">Nama Project</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $project->nama }}" name="nama" id="namaProject"
                                                            aria-describedby="namaProjectHelp">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Klien</label>
                                                        <select
                                                            class="form-select form-select-md"
                                                            name="klien_id">
                                                            <option value="{{ $project->klien->id }}">{{ $project->klien->nama }}</option>
                                                            @foreach ($kliens as $klien)

                                                            <option value="{{ $klien->id }}">{{ $klien->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="mb-3">
                                                        <label for="valueNilai" class="form-label">Nilai Project</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control"
                                                                value="{{ $project->nilai }}" name="nilai" id="valueNilai"
                                                                aria-describedby="valueNilai">
                                                            <span class="input-group-text">Jatuh Tempo</span>
                                                            <input type="date" class="form-control"
                                                                value="{{ $project->jatuhtempo }}" name="jatuhtempo"
                                                                id="jatuhtempo" aria-describedby="jatuhtempohelp">

                                                        </div>

                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Layanan</label>
                                                        <textarea class="form-control" name="" id="" rows="3"></textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Kategori</label>
                                                        <select class="form-select" name="kategori"
                                                            aria-label="Default select example">
                                                            <option value="{{ $project->kategori }}">
                                                                {{ $project->kategori }}</option>
                                                            <option value="Domain">Domain</option>
                                                            <option value="Hosting">Hosting</option>
                                                            <option value="Hosting & Domain">Hosting & Domain</option>
                                                            <option value="Pembuatan Website">Pembuatan Website</option>
                                                            <option value="Redesign">Redesign</option>
                                                            <option value="Landing Page">Landing Page</option>
                                                            <option value="Content Manage">Content Manage</option>
                                                            <option value="Optimize SEO">Optimize SEO</option>
                                                            <option value="Suupport Maintenance">Support Maintanance</option>

                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-select" name="status"
                                                            aria-label="Default select example">
                                                            <option value="{{ $project->status }}">{{ $project->status }}
                                                            </option>
                                                            <option value="Aktif">Aktif</option>
                                                            <option value="Non Aktif">Non Aktif</option>
                                                        </select>
                                                    </div>

                                                    <div class="d-grid gap-2">
                                                        <button
                                                            type="submit"

                                                            class="btn btn-primary"
                                                        >
                                                            Update
                                                        </button>
                                                    </div>


                                                </form>
                                            </div>
                                            <div class="modal-footer">

                                                <form action="{{ route('project.destroy', $project->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="card-body text-primary">

                    </div>
                </div>


            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="createProject" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="namaProject" class="form-label">Nama Project</label>
                                <input type="text" class="form-control" name="nama" id="namaProject"
                                    aria-describedby="namaProjectHelp">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Klien</label>
                                <select
                                    class="form-select form-select-md"
                                    name="klien_id">

                                    @foreach ($kliens as $klien)

                                    <option value="{{ $klien->id }}">{{ $klien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="valueNilai" class="form-label">Nilai Project</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="nilai" id="valueNilai"
                                        aria-describedby="valueNilai">
                                    <span class="input-group-text">Jatuh Tempo</span>
                                    <input type="date" class="form-control" name="jatuhtempo" id="jatuhtempo"
                                        aria-describedby="jatuhtempohelp">

                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" name="kategori" aria-label="Default select example">
                                    <option selected>Pilih Kategori</option>
                                    <option value="Perorangan">Perorangan</option>
                                    <option value="Perusahaan">Perusahaan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
