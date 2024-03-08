@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card mb-3">

                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">List Orderan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-6 mb-3">
            <div class="list-group mb-3">
                <a href="#" class="list-group-item list-group-item-action active text-white" aria-current="true">
                    <h5>List Belanja</h5>
                </a>
                @forelse ($orders->where('stok', 'KOSONG') as $order)
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <div>
                                <a href="/admin/order/{{ $order->inv }}"
                                    target="_blank">
                               <h5 class="mb-1">{{ $order->klien->nama }} {{ $order->qty }} pcs</h5></a>
                                <p class="mb-1">{{ $order->detail }}</p>
                            </div>

                            <div>
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('order.update', $order->id) }}">
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf


                                    <input name="judul" value="{{ $order->judul }}" hidden>
                                    <input name="detail" value="{{ $order->detail }}" hidden>
                                    <input name="pembayaran" value="{{ $order->pembayaran }}" hidden>
                                    <input name="pengambilan" value="{{ $order->pengambilan }}" hidden>
                                    <input name="qty" value="{{ $order->qty }}" hidden>
                                    <input name="status" value="{{ $order->status }}" hidden>

                                    <div class="input-group">


                                        <select class="form-select form-select-sm" name="stok">

                                            <option value="{{ $order->stok }}">{{ $order->stok }}</option>
                                            <option value="KOSONG">KOSONG</option>
                                            <option value="READY">READY</option>
                                            <option value="ORDER">ORDER</option>
                                            <option value="KURANG">KURANG</option>
                                        </select>
                                        <button class="btn btn-outline-secondary" type="submit" id=""><i
                                                class="bi bi-check-all"></i></button>


                                    </div>

                                </form>
                            </div>
                        </div>


                    </div>

                @empty
                    <h3>Data Kosong</h3>
                @endforelse

            </div>
            <div class="list-group mb-3">
                <a href="#" class="list-group-item list-group-item-action active text-white" aria-current="true">
                    <h5>List Stok Ready</h5>
                </a>
                @forelse ($orders->where('stok', 'READY') as $order)
                    <div class="list-group-item list-group-item-action">

                        <div class="d-flex w-100 justify-content-between">
                            <div class="div">
                                <h5 class="mb-1">{{ $order->klien->nama }} {{ $order->qty }} pcs</h5>
                                <p class="mb-1">{{ $order->detail }}</p>
                            </div>

                            <div>
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('order.update', $order->id) }}">
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf


                                    <input name="judul" value="{{ $order->judul }}" hidden>
                                    <input name="detail" value="{{ $order->detail }}" hidden>
                                    <input name="pembayaran" value="{{ $order->pembayaran }}" hidden>
                                    <input name="pengambilan" value="{{ $order->pengambilan }}" hidden>
                                    <input name="qty" value="{{ $order->qty }}" hidden>
                                    <input name="status" value="{{ $order->status }}" hidden>

                                    <div class="input-group">
                                        <select class="form-select form-select-sm" name="stok">
                                            <option value="{{ $order->stok }}">{{ $order->stok }}</option>
                                            <option value="KOSONG">KOSONG</option>
                                            <option value="READY">READY</option>
                                            <option value="ORDER">ORDER</option>
                                            <option value="KURANG">KURANG</option>
                                        </select>
                                        <button class="btn btn-outline-secondary" type="submit" id=""><i
                                                class="bi bi-check-all"></i></button>

                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>


                @empty
                    <h3>Data Kosong</h3>
                @endforelse

            </div>


        </div>

    </div>
@endsection
