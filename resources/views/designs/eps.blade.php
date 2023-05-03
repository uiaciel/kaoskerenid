@extends('layouts.app')
@section('content')
    <div class="row">
        <h2 class="text-white  mb-3">Data Design</h2>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h5 class="card-title">DATA DESIGN</h5> --}}
                    <div class="table-responsive">
                        <table class="table table-flush" id="eps-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Path</th>

                                    <th>Kategori</th>
                                    <th>action</th>

                                </tr>
                            </thead>
                        </table>
                    </div>
                    {{-- <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Klien</th>
                                <th scope="col">EPS</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designs as $design)
                                <tr>
                                    <th scope="row"></th>
                                    <td>{{ $design->klien->nama ?? '' }}</td>
                                    <td>{{ $design->path }}</td>
                                    <td></td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
