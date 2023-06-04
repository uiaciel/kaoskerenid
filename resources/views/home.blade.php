@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="list-group mb-3">
                <a href="#" class="list-group-item list-group-item-action active">
                    BELUM BAYAR
                </a>
                @foreach ($belumbayar as $belumbayar)
                    <a href="/order/{{ $belumbayar->inv }}"
                        class="list-group-item list-group-item-action">{{ $belumbayar->klien->nama }} -
                        #{{ $belumbayar->inv }}</a>
                @endforeach

            </div>
            <ul class="list-group mb-3">
                <li class="list-group-item active d-flex justify-content-between align-items-center">
                    BERES
                </li>
                @foreach ($beresorder as $beresorder)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="/order/{{ $beresorder->inv }}" class="text-dark">{{ $beresorder->klien->nama }} -
                            #{{ $beresorder->inv }}</a>
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('order.update', $beresorder->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <input name="stok" value="{{ $beresorder->stok }}" hidden>
                            <input name="judul" value="{{ $beresorder->judul }}" hidden>
                            <input name="detail" value="{{ $beresorder->detail }}" hidden>
                            <input name="pembayaran" value="{{ $beresorder->pembayaran }}" hidden>
                            <input name="pengambilan" value="{{ $beresorder->tanggalambil }}" hidden>
                            <input name="qty" value="{{ $beresorder->qty }}" hidden>
                            <input name="status" value="SELESAI" hidden>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-check-all"></i></button>
                        </form>
                    </li>
                @endforeach

            </ul>

            <div class="list-group mb-3">
                <a href="#" class="list-group-item list-group-item-action active">SELESAI TERBARU
                </a>
                @foreach ($selesaiorder as $selesaiorder)
                    <a href="/order/{{ $selesaiorder->inv }}"
                        class="list-group-item list-group-item-action">{{ $selesaiorder->klien->nama }} -
                        {{ $selesaiorder->inv }}</a>
                @endforeach

            </div>

        </div>
        <div class="col-lg-6 col-md-6">
            {{-- <div class="card mb-3">

                <div class="card-body">
                    <select class="form-control selectklien"
                        onchange="this.options[this.selectedIndex].value && (window.location.href = this.options[this.selectedIndex].value)">
                        <option>== CARI KLIEN ===</option>
                        @foreach ($allkliens as $aktif)
                            <option value="/klien/{{ $aktif->id }}">{{ $aktif->nama }} - {{ $aktif->hp }}</option>
                        @endforeach

                    </select>
                </div>
            </div> --}}
            @if (Session::has('flash_message'))
                <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach ($lunas as $orderx)
                <div class="card mb-3">
                    <div class="card-header border-bottom p-2 align-items-center d-flex justify-content-xl-between">
                        <div class="p-2 flex-xl-grow-1 bd-highlight text-weight">
                            <a href="/order/{{ $orderx->inv }}">
                                <h5 class="mb-0">{{ $orderx->klien->nama }}</h5>
                            </a> <small>#{{ $orderx->inv }}</small>

                        </div>
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('order.update', $orderx->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <input name="stok" value="{{ $orderx->stok }}" hidden>
                            <input name="judul" value="{{ $orderx->judul }}" hidden>
                            <input name="detail" value="{{ $orderx->detail }}" hidden>
                            <input name="pembayaran" value="{{ $orderx->pembayaran }}" hidden>
                            <input name="pengambilan" value="{{ $orderx->tanggalambil }}" hidden>
                            <input name="qty" value="{{ $orderx->qty }}" hidden>
                            <div class="p-2 bd-highlight">

                                <div class="input-group input-group-sm">

                                    <a class="btn btn-success d-block d-sm-none"
                                        href="https://api.whatsapp.com/send?phone={{ Str::replaceFirst('0', '62', $orderx->klien->hp) }}&text=SABLON"
                                        role="button"><span><svg class="icon icon-xs" fill="none" stroke="white"
                                                stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z">
                                                </path>
                                            </svg></span></a>
                                    <select class="form-select w-70" name="status">
                                        <option value="{{ $orderx->status }}">{{ $orderx->status }}</option>
                                        <option value="CANCEL">CANCEL</option>
                                        <option value="REQUEST DESIGN">REQUEST DESIGN</option>
                                        <option value="KONFRIM">KONFRIM</option>
                                        <option value="DESIGN OK">DESIGN OK</option>
                                        <option value="PRODUKSI">PRODUKSI</option>
                                        <option value="BERES">BERES</option>
                                        <option value="SELESAI">SELESAI</option>
                                    </select>
                                    <button class="btn btn-outline-info" type="submit"><span>
                                            <svg class="icon icon-xs" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5"></path>
                                            </svg></span></button>

                                </div>


                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            @if ($designs->where('order_id', $orderx->id)->count() > 1)
                                @foreach ($designs->where('order_id', $orderx->id) as $slider)
                                    <div class="col-md-4">
                                        <img src="{{ $slider->path }}" class="img-fluid" alt="...">
                                    </div>
                                @endforeach
                            @else
                                @foreach ($designs->where('order_id', $orderx->id) as $desii)
                                    <img class="card-img-top" src="{{ $desii->path }}" alt="Card image cap">
                                @endforeach
                            @endif
                        </div>
                        <h5 class="card-title">{{ $orderx->judul }}</h5>
                        <p class="card-text">{{ $orderx->detail }}</p>
                        <hr>
                        <div class="pt-0 pb-0 d-xl-flex justify-content-xl-center">

                            {{-- <a class="btn btn-primary btn-sm "><i class="bi bi-alarm"></i>
                            {{ Carbon::parse($orderx->pengambilan)->diffForHumans() }}</a> --}}

                            {{-- <div>
                            {{ $orderx->status }}/{{ $orderx->pembayaran }}</div> --}}

                            <div class="me-3 fw-bold">
                                {{ $orderx->qty }} Pcs</div>
                            <div class="me-3">
                                {{ $orderx->stok }}/{{ $orderx->pembayaran }}
                            </div>

                            <div class="fw-bold">
                                <i class="bi bi-alarm"></i>

                                {{ Carbon::parse($orderx->tanggalambil)->isoFormat('dddd, D MMM Y, HH:mm') }}
                            </div>



                        </div>
                    </div>




                    {{-- <div class="card-footer">
                        @foreach ($files->where('order_id', $orderx->id) as $file)
                            <ul>
                                <li><a href="{{ $file->path }}"
                                        download>{{ Str::remove('storage/' . $orderx->klien->hp . '/', $file->path) }}</a>
                                </li>
                            </ul>
                        @endforeach
                    </div> --}}

                </div>
            @endforeach
            @foreach ($aktiforder as $order)
                <div class="card mb-3">
                    <div class="card-header border-bottom p-2 align-items-center d-flex justify-content-xl-between">
                        <div class="p-2 flex-xl-grow-1 bd-highlight text-weight"><a href="/order/{{ $order->inv }}">
                                <h5 class="mb-0">{{ $order->klien->nama }}</h5>
                            </a> <small>#{{ $order->inv }}</small>
                        </div>
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('order.update', $order->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <input name="stok" value="{{ $order->stok }}" hidden>
                            <input name="judul" value="{{ $order->judul }}" hidden>
                            <input name="detail" value="{{ $order->detail }}" hidden>
                            <input name="pembayaran" value="{{ $order->pembayaran }}" hidden>
                            <input name="pengambilan" value="{{ $order->tanggalambil }}" hidden>
                            <input name="qty" value="{{ $order->qty }}" hidden>
                            <div class="p-2 bd-highlight">

                                <div class="input-group input-group-sm">
                                    <a class="btn btn-success d-block d-sm-none"
                                        href="https://api.whatsapp.com/send?phone={{ Str::replaceFirst('0', '62', $order->klien->hp) }}&text=SABLON"
                                        role="button"><span><svg class="icon icon-xs" fill="none" stroke="white"
                                                stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z">
                                                </path>
                                            </svg></span></a>
                                    <select class="form-select" name="status">
                                        <option value="{{ $order->status }}">{{ $order->status }}</option>
                                        <option value="CANCEL">CANCEL</option>
                                        <option value="REQUEST DESIGN">REQUEST DESIGN</option>
                                        <option value="KONFRIM">KONFRIM</option>
                                        <option value="DESIGN OK">DESIGN OK</option>
                                        <option value="PRODUKSI">PRODUKSI</option>
                                        <option value="BERES">BERES</option>
                                        <option value="SELESAI">SELESAI</option>
                                    </select>
                                    <button class="btn btn-outline-secondary" type="submit"><span>
                                            <svg class="icon icon-xs" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5"></path>
                                            </svg></span></button>

                                </div>


                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            @if ($designs->where('order_id', $order->id)->count() > 1)
                                @foreach ($designs->where('order_id', $order->id) as $slider)
                                    <div class="col-md-4">
                                        <img src="{{ $slider->path }}" class="rounded mx-auto d-block">
                                    </div>
                                @endforeach
                            @else
                                @foreach ($designs->where('order_id', $order->id) as $desii)
                                    <img class="card-img-top" src="{{ $desii->path }}" alt="Card image cap">
                                @endforeach
                            @endif
                        </div>
                        <h5 class="card-title">{{ $order->judul }}</h5>
                        <p class="card-text">{{ $order->detail }}</p>
                        <hr>
                        <div class="pt-0 pb-0 d-xl-flex justify-content-xl-center">

                            {{-- <a class="btn btn-primary btn-sm "><i class="bi bi-alarm"></i>
                            {{ Carbon::parse($orderx->pengambilan)->diffForHumans() }}</a> --}}

                            {{-- <div>
                            {{ $orderx->status }}/{{ $orderx->pembayaran }}</div> --}}

                            <div class="me-3 fw-bold">
                                {{ $order->qty }} Pcs</div>
                            <div class="me-3 text-danger">
                                {{ $order->stok }}/{{ $order->pembayaran }}
                            </div>

                            <div class="fw-bold">
                                <i class="bi bi-alarm"></i>
                                {{ Carbon::parse($orderx->tanggalambil)->format('D, d M \'y, H:i') }}
                            </div>



                        </div>
                    </div>
                    {{-- <div class="card-footer">
                        @foreach ($files->where('order_id', $order->id) as $file)
                            <ul>
                                <li><a href="{{ $file->path }}"
                                        download>{{ Str::remove('storage/' . $order->klien->hp . '/', $file->path) }}</a>
                                </li>
                            </ul>
                        @endforeach
                    </div> --}}
                </div>
            @endforeach
        </div>
        <div class="col-lg-3 col-md-6">

            <div class="card mb-3 bg-dark">
                <script src="https://cdn.logwork.com/widget/text.js"></script>
                <a href="https://logwork.com/current-time-in-bogor-indonesia-jawa-tengah" class="clock-widget-text"
                    data-timezone="Asia/Jakarta" data-language="en" data-textcolor="#ffffff"
                    data-digitscolor="#ffffff">Bogor, Indonesia</a>
            </div>
            <div class="card mb-3">
                @include('kliens.create')
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('keuangan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="date" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nominal</label>
                            <input type="text" name="nominal" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Ketik Angka saja</small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jenis</label>
                            <select class="form-control" name="jenis" id="">

                                <option>Pengeluaran</option>
                                <option>Pemasukan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kategori</label>
                            <select class="form-control" name="kategori" id="">
                                <option value="orderan">Orderan</option>
                                <option value="ongkos cetak">Ongkos Cetak</option>
                                <option value="Makan Cemilan">Makan</option>
                                <option value="Listrik">Listrik</option>
                                <option value="Internet">Internet</option>
                                <option value="Belanja Bahan">Belanja Bahan</option>
                                <option value="Belanja Sablon">Belanja Sablon</option>
                            </select>
                        </div>
                        <input type="text" name="order_id" id="" class="form-control" placeholder=""
                            aria-describedby="helpId" hidden>

                        <div class="mb-3">
                            <label for="" class="form-label">Metode</label>
                            <select class="form-control" name="metode" id="">
                                <option>Transfer</option>
                                <option>Tunai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="list-group mb-3">
                <a href="#" class="list-group-item list-group-item-action active">
                    KLIEN BARU
                </a>
                @foreach ($kliens as $klien)
                    <a href="https://api.whatsapp.com/send?phone={{ Str::replaceFirst('0', '62', $klien->hp) }}&text=KaosKerenID"
                        class="list-group-item list-group-item-action"><i class="fa-brands fa-whatsapp"></i>
                        {{ $klien->nama }}</a>
                @endforeach

            </div>
        </div>
    </div>
@endsection
