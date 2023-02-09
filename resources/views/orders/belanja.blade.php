@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">



            <div class="card">
                <div class="card-header">
                    list
                </div>
                <div class="card-body">
                    @forelse ($orders as $order)
                        {{ $order->klien->nama }} {{ $order->qty }} <br>
                        - {{ $order->detail }}
                        <br>
                    @empty
                        <h3>Data Kosong</h3>
                    @endforelse
                </div>
            </div>



        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">Data Order</label>
                <textarea class="form-control" name="" id="" rows="6"></textarea>
            </div>
        </div>

    </div>
@endsection
