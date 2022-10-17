@extends('layouts.app')
@section('title', 'REPORT HARIAN')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">New Order</div>
            
            <ul class="list-group">
                @forelse  ($orders as $order )
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="/order/{{$order->inv}}">#{{$order->inv}} - {{$order->klien->nama}}</a>
                    <span class="badge badge-primary badge-pill">{{$order->qty}} pcs</span>
                </li>
                @empty
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Data Tidak Ada
                </li>
                @endforelse
                
                
              </ul>

        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">New Klien</div>
            
            <ul class="list-group">
                
                @forelse ($kliens as $klien )
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{$klien->inv}}">#{{$klien->nama}}</a>
                    <span class="badge badge-primary badge-pill">WA</span>
                </li>
                @empty
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Data Tidak Ada
                </li>
                @endforelse
                
                
              </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">New Pembayaran</div>
            
            <ul class="list-group">
                
                @forelse ($pemasukans as $pemasukan )
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="/order/{{$pemasukan->order->inv}}">Rp{{$pemasukan->nominal}}</a>
                    <span class="badge badge-primary badge-pill">{{$pemasukan->metode}}</span>
                </li>
                @empty
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Data Tidak Ada
                </li>
                @endforelse
                
                
              </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row"></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection