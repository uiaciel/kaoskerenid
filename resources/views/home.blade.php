@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-3">
        <div class="list-group mb-3">
            <a href="#" class="list-group-item list-group-item-action active">
              BELUM BAYAR
            </a>
            @foreach ($belumbayar as $belumbayar )
            <a href="/order/{{$belumbayar->inv}}" class="list-group-item list-group-item-action">{{$belumbayar->klien->nama}} - #{{$belumbayar->inv}}</a>
            @endforeach
           
          </div>

          <div class="list-group mb-3">
            <a href="#" class="list-group-item list-group-item-action active">
              BERES (Belum diambil)
            </a>
            @foreach ($beresorder as $beresorder )
            <a href="/order/{{$beresorder->inv}}" class="list-group-item list-group-item-action">{{$beresorder->klien->nama}} - #{{$beresorder->inv}}</a>
            @endforeach
            
          </div>

          <div class="list-group mb-3">
            <a href="#" class="list-group-item list-group-item-action active">SELESAI TERBARU
            </a>
            @foreach ($selesaiorder as $selesaiorder )
            <a href="/order/{{$selesaiorder->inv}}" class="list-group-item list-group-item-action">{{$selesaiorder->klien->nama}} - {{$selesaiorder->inv}}</a>
            @endforeach
            
          </div>

        <div class="card">
            <div class="card-header">
                SELESAI TERBARU
            </div>
            <div class="card-body">
                
            </div>
            <div class="card-footer text-muted">
                Footer
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            
            <div class="card-body">
                <select class="form-control select2-single" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" id="exampleFormControlSelect1">
                    <option>== CARI ORDERAN AKTIF ===</option>
                    @foreach ($orders as $aktif )
                    <option value="/order/{{$aktif->inv}}">{{$aktif->klien->nama}} - {{$aktif->inv}}</option>
                    @endforeach
                    
                  </select>
            </div>
        </div>
        @foreach ($aktiforder as $order)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex bd-highlight justify-content-sm-between align-items-lg-center">
                        <div class="p-2 flex-xl-grow-1 bd-highlight text-weight"><a href="/order/{{ $order->inv }}">
                                <h3>{{ $order->klien->nama }}</h3>
                            </a>
                            <h6>{{ $order->klien->hp }}</h6> #{{ $order->inv }} - <strong>{{ $order->qty }}
                                pcs</strong>
                        </div>
                        <div class="p-2 bd-highlight d-none d-sm-block">
                            <span class="badge badge-warning">{{ $order->stok }}</span>
                        </div>
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('order.update', $order->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="p-2 bd-highlight">
                                <div class="input-group">
                                    <select class="custom-select" id="inputGroupSelect04" name="status"
                                        aria-label="Example select with button addon">
                                        <option>{{ $order->status }}</option>
                                        <option value="0">CANCEL</option>
                                        <option value="1">REQUEST DESIGN</option>
                                        <option value="2">KONFRIM</option>
                                        <option value="3">DESIGN OK</option>
                                        <option value="4">PRODUKSI</option>
                                        <option value="5">BERES</option>
                                        <option value="6">SELESAI</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary btn-sm" type="submit"><i
                                                class="fas fa-check"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="p-2">
                            <div class="d-xl-none">
                                <span class="text-muted text-danger">{{ $order->stok }}</span>
                            </div>
                            <h6>{{ $order->judul }}</h6>
                            <p class="text-gray ellipsis mb-2">
                                <h6>{{ $order->detail }}</h6>
                            </p>
                            <small class="mb-0 mr-2 text-muted text-muted"><strong>Tanggal Bayar</strong>
                                <a href="/storage/085219778026/peta-bogor.eps" download=""><i
                                        class="fas fa-check-circle" data-toggle="tooltip" data-placement="bottom"
                                        title=""
                                        data-original-title="/storage/085219778026/peta-bogor.eps"></i></a>
                                </p>
                                <p class="text-muted mb-0">Pembayaran : <span
                                        class="text-primary">{{ $order->pembayaran }}</span>
                                </p>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-lg-3 col-md-6">
        
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('klien.store')}}" method="POST" enctype="multipart/form-data">
@csrf


<div class="card mb-3">
<div class="card-header">
    <div class="card-head-row">
        <div class="card-title"><i class="fas fa-user-plus"></i> Klien Baru</div>
        
    </div>
</div>
<div class="card-body">
    <div class="form-group">
        <label for="email2">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Tulis Nama">
    </div>
    <div class="form-group">
        <label for="email2">No Whatsapp</label>
        <input type="text" class="form-control" name="hp" placeholder="08xx">
    </div>

      <div class="form-group">
        <label for="comment">Alamat</label>
        <textarea class="form-control" name="alamat" rows="5">
        </textarea>
    </div>

    <div class="form-check">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" value="">
            <span class="form-check-sign">Langsung buat Orderan</span>
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>

</form>

<div class="card">
    <div class="card-header">
        Klien Baru
    </div>
    <div class="card-body">
        @foreach ($kliens as $klien )
        <ul>
            <li>{{$klien->nama}} - {{$klien->hp}}</li>
           
        </ul>
        @endforeach
       
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>
    </div>
</div>


@endsection
