@extends('layouts.app')

@section('content')
    <form enctype="multipart/form-data" action="{{ route('updateproduk') }}" method="POST">

        @csrf
        <div class="container text-white py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mr-3">

                    <h2 class="mb-3">List Produk <a href="{{ route('produk.create') }}" class="btn btn-warning"><i
                                class="bi bi-database-fill-add"></i></a>
                    </h2>

                </div>
                <div class="ml-auto">

                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="data">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th scope="col">Pilih</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">data</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr class="@if ($data->status !== 'Aktif') bg-gray-400 @endif">
                                            <td>
                                                <input class="form-check-input" name="id[]" type="checkbox"
                                                    value="{{ $data->id }}" aria-label="Text for screen reader">
                                            </td>
                                            <td scope="row" class="fw-bold">{{ $data->kategori }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td class="fs-4 text-end">
                                                {{ number_format($data->harga, 0, ',', '.') }}

                                            </td>
                                            <td>

                                                <select class="form-select form-select-sm" name="status[]" id="">
                                                    @if ($data->status == 'Aktif')
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Non Aktif">Tidak</option>
                                                    @else
                                                        <option value="Non Aktif">Tidak</option>
                                                        <option value="Aktif">Aktif</option>
                                                    @endif
                                                </select>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection
