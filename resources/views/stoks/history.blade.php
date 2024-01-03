@extends('layouts.app')
@section('title')
    <div class="container text-white py-2">
        <div class="d-flex flex-column flex-lg-row align-items-center">
            <div class="mr-3">
                <h2 class="mb-3"><a href=""></a> {{$stok->nama}} {{$stok->kategori}} {{$stok->supplier}}
                </h2>
                <h5 class="op-7 mb-3"></h5>
            </div>
            <div class="ml-auto">
                <a href="/admin/datastok/{{$stok->id}}/edit" class="btn btn-primary btn-round" style="align-items: center" role="button"><i class="fas fa-dollar-sign"></i> Input</a>
                <a href="/admin/stok" class="btn btn-primary btn-round" style="align-items: center" role="button"><i class="fas fa-dollar-sign"></i> Stok</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Modal</th>
                                <th scope="col">Harga Jual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datastok as $index => $datastok )
                            <tr class="">
                                <td scope="row">{{$index+1}}</td>
                                <td>{{ \Carbon\Carbon::parse($datastok->tanggal)->formatLocalized('%A, %d %b %Y') }}</td>
                                <td>{{$datastok->status}}</td>
                                <td>{{$datastok->qty}}</td>
                                <td>{{$datastok->modal}}</td>
                                <td>{{$datastok->hargajual}}</td>
                                <!--<td><a href="{{route('datastok.edit', $stok->id)}}" class="btn btn-sm btn-success p-2">Input Data</a> <a href="" class="btn btn-sm btn-primary">History</a></td>-->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
