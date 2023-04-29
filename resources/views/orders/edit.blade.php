@extends('layouts.app')
@section('title')
    <div class="container text-white py-2">
        <div class="d-flex">
            <div class="mr-3 flex-grow-1">
                <h2 class="mb-3"><a href="/klien/{{ $order->klien->id }}">{{ $order->klien->nama }}</a> #{{ $order->inv }}
                </h2>
                <h5 class="op-7 mb-3">{{ Str::replaceFirst('0', '+62', $order->klien->hp) }} - {{ $order->qty }}pcs</h5>
            </div>
            <div>

            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-7 col-sm-12">
            <form action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="bd-highlight d-none d-sm-block">
                                <h5>Status Order</h5>
                            </div>
                            <div class="bd-highlight">

                                <div class="input-group">
                                    <select name="stok" class="form-select">
                                        <option value="{{ $order->stok }}">
                                            {{ $order->stok }}
                                        </option>
                                        <option value="READY">READY</option>
                                        <option value="KOSONG">Kosong</option>
                                        <option value="KURANG">Kurang</option>

                                        <option value="ORDER">ORDER</option>
                                    </select>
                                    <select name="status" class="form-select">
                                        <option value="{{ $order->status }}">
                                            {{ $order->status }}
                                        </option>
                                        <option value="CANCEL">CANCEL</option>
                                        <option value="REQUEST">REQUEST</option>
                                        <option value="KONFRIM">KONFRIM</option>
                                        <option value="DESIGN-OK">DESIGN-OK</option>
                                        <option value="PRODUKSI">PRODUKSI</option>
                                        <option value="BERES">BERES</option>
                                        <option value="SELESAI">SELESAI</option>
                                    </select><select name="pembayaran" class="form-select">
                                        <option value="{{ $order->pembayaran }}">
                                            {{ $order->pembayaran }}
                                        </option>
                                        <option value="BELUM BAYAR">BELUM BAYAR</option>
                                        <option value="LUNAS">LUNAS</option>
                                        <option value="MASUK DP">MASUK DP</option>
                                    </select>
                                    <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-check"></i>
                                        Update</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
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

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control mb-3" name="judul"
                                        placeholder="Contoh : Kaos Ulang Tahun" value="{{ $order->judul }}">

                                    <label>Detail Request</label>
                                    <textarea name="detail" class="form-control" rows="15"
                                        style="
                        font-size: 1em;
                        font-weight: bold;
                        border: 1px solid black;
                        background-color: yellow;">{{ $order->detail }}</textarea>
                                    <!--  <p class="help-block">Contoh : Warna Kaos, Ukuran, Warna Sablon, Designnya, keterangan lainnya,-->
                                    <!--<strong>Request Bahan 30s harus dicatat</strong></p>-->
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">

                                <div class="form-group">
                                    <label>QTY</label>
                                    <div class="input-group mb-3">
                                        <input type="number"
                                            class="form-control @if ($order->qty == null) is-invalid @endif"
                                            name="qty" value="{{ $order->qty }}">
                                        <span class="input-group-text" id="basic-addon2">pcs</span>
                                        @if ($order->qty == null)
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                Masukan Jumlah quantity order
                                            </div>
                                        @endif
                                    </div>

                                    <label>Pengambilan</label>
                                    <div class="input-group mb-3">
                                        {{-- <div id="foo" data-date="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"></div> --}}
                                        <input class="form-control" type="datetime-local"
                                            value="{{ $order->tanggalambil }}" name="tanggalambil">


                                        {{-- <span class="input-group-text"><svg
                                                class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg> </span><input data-datepicker="" class="form-control datepicker-input"
                                            name="pengambilan" type="text"
                                            value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required=""> --}}
                                    </div>





                                </div>
                                <div class="mb-3">
                                    <legend class="h6">Pengiriman</legend>
                                    <div class="form-check"><input class="form-check-input" type="radio" name="pengiriman"
                                            id="exampleRadios1" value="Diambil" checked="checked">
                                        <label class="form-check-label" for="exampleRadios1">AMBIL KE TOKO</label>
                                    </div>
                                    <div class="form-check"><input class="form-check-input" type="radio" name="pengiriman"
                                            id="exampleRadios2" value="kirim"> <label class="form-check-label"
                                            for="exampleRadios2">KIRIM KURIR</label>
                                    </div>
                                    <div class="form-check"><input class="form-check-input" type="radio"
                                            name="pengiriman" id="exampleRadios3" value="cod" disabled="disabled">
                                        <label class="form-check-label" for="exampleRadios3">COD</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">ONGKIR/DISKON</label>
                                    <input type="number" class="form-control" value="{{ $order->ongkir }}"
                                        name="ongkir">
                                    <input type="number" class="form-control" value="{{ $total }}"
                                        name="total" hidden>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <!--<div class="alert alert-danger alert-dismissible fade show" role="alert">-->
                <!--  <strong>Tangal Order: </strong>Jumat, 16 Sep 2022, 21:09:08-->
                <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
                <!--    <span aria-hidden="true">&times;</span>-->
                <!--  </button>-->
                <!--</div>-->
                <!--BAGIAN ALERT-->
                <!---->
                <!--<div class="alert alert-warning">-->
                <!--      <strong>NOTE:</strong> ... <em><a href="" data-toggle="modal"-->
                <!--          data-target="#Notes">edit</a> / <a href="https://web.kaoskeren.id/klien/2176/print"-->
                <!--          target="_blank">Print Alamat</a><br /></em>-->
                <!--    </div>-->
                <!---->
                <!--<div class="alert alert-danger alert-dismissible fade show" role="alert">-->
                <!--  STOK Data belum terupdate ... <a href="https://web.kaoskeren.id/ambil/create/1609-QTv21">Tambahkan..</a>-->
                <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
                <!--    <span aria-hidden="true">&times;</span>-->
                <!--  </button>-->
                <!--</div>-->
                <!---->
                <!---->
                <!--AKHIR ALERT-->
            </form>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-ui-checks-grid"></i> Paket
                            </button>


                            <a href="/tambah/{{ $order->inv }}" class="btn btn-primary"><i class="fas fa-tshirt"></i>
                                <i class="bi bi-ui-checks"></i> Produk</a>

                            {{-- <button type="button" class="btn btn-primary">Right</button> --}}
                        </div>

                        <!-- Button trigger modal -->


                        <form action="{{ route('hapus.semuaproduk', $order->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus Semua</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <form>


                            <table class="table table-bordered table-hover nowrap align-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Item</th>
                                        <th>Harga</th>
                                        <th>QTY</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderan as $orderannya)
                                        <tr>
                                            <th scope="row">
                                                <form action="{{ route('orderan.destroy', $orderannya->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="bi bi-trash3-fill"></i></button>
                                                </form>
                                            </th>
                                            <td>
                                                <small>{{ $orderannya->produk->kategori }}</small>
                                                <p>{{ $orderannya->produk->nama }}</p>
                                            </td>
                                            <td>{{ $orderannya->produk->harga }}</td>
                                            <td>
                                                <form action="{{ route('orderan.update', $orderannya->id) }}"
                                                    method="Post">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    @csrf



                                                    <input name="qty" type="number" value="{{ $orderannya->qty }}"
                                                        style="width: 40px;">

                                                    <input name="harga" value="{{ $orderannya->produk->harga }}"
                                                        style="width: 40px;" hidden>
                                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                                            class="bi bi-check-all"></i></button>
                                                </form>
                                            </td>
                                            <td class="text-end font-weight-bold">{{ $orderannya->harga }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" class="text-end">Total Rp</td>
                                        <td class="text-end font-weight-bold">{{ $total }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">Ongkir Rp</td>
                                        <td class="text-end font-weight-bold">{{ $order->ongkir }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">Grand Total</td>
                                        <td class="text-end font-weight-bold">{{ $grandtotal }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-5 col-sm-12">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center ">
                    <h5>Catatan Pembayaran</h5>
                    <a href="#" class="btn btn-primary btn-round" style="align-items: center"
                        data-bs-toggle="modal" data-bs-target="#PembayaranModal" role="button"><i
                            class="bi bi-wallet"></i></a>
                    <a href="/nota/{{ $order->inv }}" target="_blank" class="btn btn-info btn-round"><i
                            class="bi bi-printer"></i></a>
                    <button onclick="myFunction()" id="bntcopy" class="btn btn-info btn-danger"><i
                            class="bi bi-receipt"></i>
                    </button>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="alert alert-success">
                        <h3>Kurang Bayar : Rp {{ $sisa }}</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped  ">
                            <thead>
                                <tr>
                                    <th>tgl</th>
                                    <th>Metode</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keuangan as $bayar)
                                    <tr>
                                        <td>
                                            <form action="{{ route('keuangan.destroy', $bayar->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                        <td><small>{{ $bayar->metode }}</small>
                                            <p>{{ $bayar->tanggal }}</p>
                                        </td>
                                        <td>Rp. {{ $bayar->nominal }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td><strong>Jumlah</strong></td>
                                    <td><strong>Rp {{ $jumlah }}</strong></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><strong>Tagihan</strong></td>
                                    <td><strong>Rp {{ $grandtotal }}</strong></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><strong>Kurang Bayar</strong></td>
                                    <td><strong>Rp {{ $sisa }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <form action="{{ route('design.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="bd-highlight">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">MOCKUP</label>
                                </div>
                                <div class="input-group">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#gallery">
                                        <i class="bi bi-file-earmark-image"></i>
                                    </button>
                                    <input type="file" class="form-control" name="mockup" multiple="">
                                    <input type="text" name="kategori" value="MOCKUP" hidden>
                                    <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                                    <input type="text" name="klien_id" value="{{ $order->klien->id }}" hidden>
                                    <input type="text" name="klienpath" value="{{ $order->klien->hp }}" hidden>
                                    <button type="submit" class="btn btn-info">Upload</button>

                                </div>
                            </div>



                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    @foreach ($designs as $image)
                        <a href="" data-bs-toggle="modal" data-bs-target="#mockup-{{ $image->id }}">
                            <img src="{{ $image->path }}" width="100px;" loading="lazy" />
                        </a>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="mockup-{{ $image->id }}" tabindex="-1"
                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">MOCKUP</h5>


                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ $image->path }}" class="img-fluid" loading="lazy" />

                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('design.destroy', $image->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Button trigger modal -->

                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <form action="{{ route('design.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center ">

                            <div class="bd-highlight">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">EPS</label>
                                </div>
                                <div class="input-group">
                                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#contentId"
                                        aria-expanded="false" aria-controls="contentId">
                                        <i class="bi bi-vector-pen"></i>
                                    </a>
                                    <input type="file" class="form-control" name="mockup">
                                    <input type="text" name="kategori" value="EPS" hidden>
                                    <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                                    <input type="text" name="klien_id" value="{{ $order->klien->id }}" hidden>
                                    <input type="text" name="klienpath" value="{{ $order->klien->hp }}" hidden>
                                    <button type="submit" class="btn btn-info">Upload</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="card-body">


                    @foreach ($files as $file)
                        <ul>
                            <li><a href="{{ $file->path }}"
                                    download>{{ Str::remove('storage/' . $order->klien->hp . '/', $file->path) }}</a></li>
                        </ul>
                    @endforeach

                    <div class="collapse" id="contentId">
                        <form action="{{ route('design.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @foreach ($alldesign->where('kategori', 'EPS') as $paths)
                                <div class="form-group form-check">
                                    <input name="imagecheck" type="checkbox" value="{{ $paths->path }}"
                                        class="form-check-input">
                                    <label class="form-check-label" for="exampleCheck1"><a href="{{ $paths->path }}"
                                            download>{{ Str::remove('storage/' . $order->klien->hp . '/', $paths->path) }}</a></label>
                                </div>
                                <input type="text" name="kategori" value="EPS" hidden>
                                <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                                <input type="text" name="klien_id" value="{{ $order->klien->id }}" hidden>
                            @endforeach
                            <button type="submit" class="btn btn-primary btn-sm">upload</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="PembayaranModal" tabindex="-1" aria-labelledby="PembayaranModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="PembayaranModalLabel">Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <form action="{{ route('keuangan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <select class="form-select" name="metode" id="inputGroupSelect02">
                                        <option value="Tunai">Tunai</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                    <button type="submit" class="btn btn-md btn-primary">DP
                                        Rp.{{ $sisa / 2 }}</button>

                                </div>
                                <input type="date" class="form-control" name="tanggal"
                                    value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" hidden>
                                <input type="text" name="kategori" value="Order" hidden>
                                <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                                <input type="text" name="jenis" value="Pemasukan" hidden>
                                <input type="text" name="metode" value="Tunai" hidden>
                                <input type="text" name="nominal" value="{{ $sisa / 2 }}" hidden>
                                <input type="text" name="status" value="MASUK DP" hidden>
                                <input type="text" name="detail" value="{{ $order->inv }}" hidden>
                            </form>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <form action="{{ route('keuangan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <select class="form-select" name="metode" id="inputGroupSelect02">
                                        <option value="Transfer">Transfer</option>
                                        <option value="Tunai">Tunai</option>
                                    </select>
                                    <button type="submit" class="btn btn-md btn-info">LUNAS</button>

                                </div>
                                <input type="date" class="form-control" name="tanggal"
                                    value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" hidden>
                                <input type="text" name="kategori" value="Order" hidden>
                                <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                                <input type="text" name="jenis" value="Pemasukan" hidden>
                                <input type="text" name="nominal" value="{{ $sisa }}" hidden>
                                <input type="text" name="status" value="LUNAS" hidden>
                                <input type="text" name="detail" value="{{ $order->inv }}" hidden>
                            </form>
                        </div>
                    </div>
                    <hr />
                    <h3 class="mb-3 text-end">Input Nominal</h3>
                    <form action="{{ route('keuangan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Tanggal</label>
                            <input type="date" id="date" class="form-control" name="tanggal">
                        </div>
                        <input type="text" name="kategori" value="Order" hidden>
                        <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                        <input type="text" name="jenis" value="Pemasukan" id="" hidden>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Metode</label>
                            <select class="form-control" name="metode">
                                <option value="Transfer">Transfer</option>
                                <option value="Tunai">Tunai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" class="form-control" name="nominal" id="nominal"
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Ketik Angka
                                Saja</small>
                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" hidden>{{ $order->inv }}</textarea>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-12 mt-3">
        <div class="card mb-3">
            <div class="card-header">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" onclick="myFunction()" type="button">Copy Invoice</button>

                </div>
            </div>
            <div class="card-body">

                <textarea class="form-control" id="myCopy" rows="2">
𝙏𝙝𝙖𝙣𝙠𝙨 𝙛𝙤𝙧 𝙮𝙤𝙪𝙧 𝙤𝙧𝙙𝙚𝙧
*SABLON SATUAN KAOSKERENID*
=============================
_INV : {{ $order->inv }}_
Atas Nama : {{ $order->klien->nama }}

*Detail Order :*
{{ $order->detail }}

*Rincian :*
@foreach ($orderan as $index => $ord)
{{ $ord->qty }} x {{ $ord->produk->kategori }} - {{ $ord->produk->nama }} Rp {{ number_format($ord->produk->harga, 0, ',', '.') }}
@endforeach

Harga : Rp {{ number_format($total, 0, ',', '.') }}
Ongkos Kirim : Rp {{ number_format($order->ongkir, 0, ',', '.') }}
*TOTAL : Rp {{ number_format($grandtotal, 0, ',', '.') }}*

_Pembayaran Via Transfer :_
- BCA 5035139653 an Suria,
- BNI 0749326737 an Suria,
- MANDIRI 1200007377893 an Suria,
- BRI 118001014130509 an Suria,
- JENIUS 90011534446 $kaoskerenid
atau bisa juga
_Bayar pakai Gopay, Dana, Ovo, QRIS_ ke nomor *08811722125*

Harap mengirimkan foto bukti transfer/pembayaran kepada kami. _Pesanan akan Kami proses setelah melakukan pembayaran_
*Estimasi Pengerjaan 2-3 hari kerja setelah pembayaran sesuai antrian order.*

=============================
Instagram store : kaoskerenid
                                            </textarea>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="{{ route('design.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gallery</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <label class="form-label">Pilih Gambar</label>
                        <div class="row">

                            @foreach ($alldesign->where('kategori', 'MOCKUP') as $alld)
                                <div class="col-12 col-sm-2">
                                    <label class="imagecheck mb-4">
                                        <input name="imagecheck" type="checkbox" value="{{ $alld->path }}"
                                            class="imagecheck-input">
                                        <figure class="imagecheck-figure">
                                            <img src="{{ $alld->path }}" alt="title" class="imagecheck-image"
                                                loading="lazy">
                                        </figure>
                                        <input type="text" name="kategori" value="MOCKUP" hidden>
                                        <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                                        <input type="text" name="klien_id" value="{{ $order->klien->id }}" hidden>

                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog        ">
            <form action="{{ route('tambahpaket') }}" method="post">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label>Pilih Katalog</label>
                        <input value="{{ $order->id }}" name="order_id" hidden>
                        <select class="form-select select2-multiple" aria-label="Default select example" name="paket_id">
                            <option selected>Pilih Paket</option>
                            @foreach ($paket as $katalog)
                                <option value="{{ $katalog->id }}">{{ $katalog->nama }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
            </form>
        </div>
    </div>
    </div>





@endsection
