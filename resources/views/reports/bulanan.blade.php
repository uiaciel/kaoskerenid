@extends('layouts.app')
@section('content')
    <h3 class="text-white">Laporan {{ $id }}</h3>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-dark text-white">
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
                            @foreach ($orders as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td><a href="/order/{{ $order->inv }}">{{ $order->inv }}</a></td>
                                    <td>{{ $order->klien->nama }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>{{ $order->total }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <h3 class="text-white mb-3">Jumlah Per Hari</h3>
    <div class="row">
        @foreach ($periode as $day)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        @foreach ($day as $tanggal => $dayy)
                            {{ $tanggal }} : <strong>{{ $dayy }}</strong><br />
                        @endforeach
                    </div>

                </div>

            </div>
        @endforeach
    </div>
@endsection
