@extends('layouts.app')
@section('title', 'List Orders')
@section('content')
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <div class="card">
                
                <div class="card-body">
                   <table class="table" id="data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Inv</th>
                            <th>Status</th>
                            <th>QTY</th>
                            <th>Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index => $order )
                        <tr>
                            <td scope="row">{{$index+1}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->klien->nama}}</td>
                            <td><a href="/order/{{$order->inv}}">#{{$order->inv}}</a></td>
                            
                            <td>{{$order->status}}</td>
                            <td>{{$order->qty}}</td>
                            <td>{{$order->pembayaran}}</td>
                        </tr>
                        @endforeach
                       
                        
                    </tbody>
                   </table>
                </div>
            </div>
            
        </div>
        
    </div>



    
@endsection
