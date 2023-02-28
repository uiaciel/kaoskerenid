@extends('layouts.app')
@section('content')
    <h3 class="text-white">Laporan {{ $id }}</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th>Klien</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periode as $index => $periode)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $periode->status }}</td>
                                    <td><a href="/order/{{ $periode->inv }}">{{ $periode->inv }}</a></td>
                                    <td>{{ $periode->klien->nama }}</td>
                                    <td>{{ $periode->qty }}</td>
                                    <td>{{ $periode->total }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
