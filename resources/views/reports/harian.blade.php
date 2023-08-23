@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-4 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-3 me-sm-0"><svg class="icon icon-sm"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg></div>
                            <div class="d-sm-none">
                                <h2 class="h5">Uang Tunai</h2>
                                <h3 class="fw-extrabold mb-1">Rp.
                                    {{ number_format($pemasukanharian->where('metode', 'Tunai')->pluck('nominal')->sum(),0,',','.') }}</b>
                                </h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-8 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Uang Tunai</h2>
                                <h3 class="fw-extrabold mb-1">
                                    Rp.{{ number_format($pemasukanharian->where('metode', 'Tunai')->pluck('nominal')->sum() -$pengeluaranharian->where('metode', 'Tunai')->pluck('nominal')->sum(),0,',','.') }}</b></b>
                                </h3>
                            </div><small class="d-flex align-items-center">

                                <span class="text-success me-2">Tunai :</span>


                                Rp
                                {{ number_format($pemasukanharian->where('metode', 'Tunai')->pluck('nominal')->sum(),0,',','.') }}
                            </small>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-4 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-3 me-sm-0"><svg class="icon icon-sm"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg></div>
                            <div class="d-sm-none">
                                <h2 class="h5">Pemasukan</h2>
                                <h3 class="fw-extrabold mb-1">Rp.
                                    {{ number_format($pemasukanharian->pluck('nominal')->sum(), 0, ',', '.') }}</b>
                                </h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-8 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Pemasukan</h2>
                                <h3 class="fw-extrabold mb-1">Rp.
                                    {{ number_format($pemasukanharian->pluck('nominal')->sum(), 0, ',', '.') }}</b>
                                </h3>
                            </div><small class="d-flex align-items-center">

                                <span class="text-success me-2">Transfer :</span>


                                Rp
                                {{ number_format($pemasukanharian->where('metode', 'Transfer')->pluck('nominal')->sum(),0,',','.') }}
                            </small>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-4 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-3 me-sm-0"><svg class="icon icon-sm"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg></div>
                            <div class="d-sm-none">
                                <h2 class="h5">Pengeluaran</h2>
                                <h3 class="fw-extrabold mb-1">Rp.
                                    {{ number_format($pengeluaranharian->pluck('nominal')->sum(), 0, ',', '.') }}</b>
                                </h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-8 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Pengeluaran</h2>
                                <h3 class="fw-extrabold mb-1">Rp.
                                    {{ number_format($pengeluaranharian->pluck('nominal')->sum(), 0, ',', '.') }}</b>
                                </h3>
                            </div><small class="d-flex align-items-center">

                                <span class="text-danger me-2">Transfer :</span>


                                Rp
                                {{ number_format($pengeluaranharian->where('metode', 'Transfer')->pluck('nominal')->sum(),0,',','.') }}
                            </small>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-8">
            <h3 class="text-white">Transaksi</h3>

            <div class="card mb-3 border-0 shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">Bulan Ini</h2>
                        </div>
                        <div class="col text-end"><a href="#" class="btn btn-sm btn-primary">See all</a></div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-bottom" scope="col">Tanggal</th>
                                <th class="border-bottom" scope="col">Transaksi</th>
                                <th class="border-bottom" scope="col">Pemasukan</th>
                                <th class="border-bottom" scope="col">Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($keuanganbulanan as $keuanganbulanan)
                                <tr>
                                    <th class="text-gray-900" scope="row">{{ $keuanganbulanan->metode }} -
                                        {{ $keuanganbulanan->tanggal }}
                                        </a>
                                    </th>
                                    <td class="fw-bolder text-gray-500">
                                        {{ $keuanganbulanan->detail }}
                                    </td>
                                    <td class="fw-bolder text-gray-500">
                                        @if ($keuanganbulanan->jenis == 'Pemasukan')
                                            Rp.
                                            {{ number_format($keuanganbulanan->nominal, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif

                                    </td>
                                    <td class="fw-bolder text-gray-500">

                                        @if ($keuanganbulanan->jenis == 'Pengeluaran')
                                            Rp.
                                            {{ number_format($keuanganbulanan->nominal, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif

                                    </td>

                                </tr>
                            @empty
                                Kosong
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mb-3 full-height">
                <div class="card-body">

                    {!! $chart->container() !!}
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h3>Data Orderan Periode {{ $bt }}</h3>
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
        <div class="col-md-4">
            <h3 class="text-white">Bulan ini</h3>
            <div class="card mb-3 full-height">
                <div class="card-body">

                    <div class="row py-3">
                        <div class="col-md-12 d-flex flex-column text-end  justify-content-around">
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Pendapatan</h6>
                                <h3 class="fw-bold">Rp
                                    {{ number_format($pemasukans->pluck('nominal')->sum(), 0, ',', '.') }}</h3>
                            </div>
                            <div class="mb-4">
                                <h6 class="fw-bold text-uppercase text-danger op-8">Pengeluaran</h6>
                                <h3 class="fw-bold">Rp
                                    {{ number_format($pengeluarans->pluck('nominal')->sum(), 0, ',', '.') }}</h3>
                            </div>
                            <div>
                                <h6 class="fw-bold text-uppercase op-8">Total</h6>
                                <h3 class="fw-bold">Rp
                                    {{ number_format($pemasukans->pluck('nominal')->sum() - $pengeluarans->pluck('nominal')->sum(), 0, ',', '.') }}
                                </h3>
                            </div>
                        </div>

                    </div>
                </div>
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
                            <select class="form-control" name="kategori">
                                <option value="orderan">Orderan</option>
                                <option value="ongkos cetak">Ongkos Cetak</option>
                                <option value="Makan Cemilan">Makan</option>
                                <option value="Listrik">Listrik</option>
                                <option value="Internet">Internet</option>
                                <option value="Belanja Bahan">Belanja Bahan</option>
                                <option value="Belanja Sablon">Belanja Sablon</option>
                                <option value="Perlengkapan">Perlengkapan</option>
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

            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="fs-5 fw-bold mb-1">Data Bulan ini</h2>
                    <p>Jumlah yang masuk di bulan ini.</p>
                    <div class="d-block">
                        <div class="d-flex align-items-center me-5">
                            <div class="icon-shape icon-sm icon-shape-danger rounded me-3"><svg fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z"
                                        clip-rule="evenodd"></path>
                                </svg></div>
                            <div class="d-block"><label class="mb-0">Orderan</label>
                                <h4 class="mb-0">{{ $orders->count() }}</h4>
                                @if ($orders->count() > $orderbulanlalu->count())
                                    <div class="small d-flex mt-1"><svg class="icon icon-xs text-success"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <div><span
                                                class="text-danger fw-bolder me-1">{{ $orderbulanlalu->count() }}</span>
                                            dari bulan lalu</div>
                                    </div>
                                @elseif ($orders->count() < $orderbulanlalu->count())
                                    <div class="small d-flex mt-1"><svg class="icon icon-xs text-danger"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <div><span
                                                class="text-danger fw-bolder me-1">{{ $orderbulanlalu->count() }}</span>
                                            dari bulan lalu</div>
                                    </div>
                                @else
                                @endif

                            </div>
                        </div>
                        <div class="d-flex align-items-center pt-3">
                            <div class="icon-shape icon-sm icon-shape-purple rounded me-3"><svg fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                                    </path>
                                </svg></div>
                            <div class="d-block"><label class="mb-0">Klien baru</label>
                                <h4 class="mb-0">{{ $kliens->count() }}


                                </h4>

                                @if ($kliens->count() > $klienbulanlalu->count())
                                    <div class="small d-flex mt-1"><svg class="icon icon-xs text-success"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <div><span
                                                class="text-danger fw-bolder me-1">{{ $klienbulanlalu->count() }}</span>
                                            dari bulan lalu</div>
                                    </div>
                                @elseif ($kliens->count() < $klienbulanlalu->count())
                                    <div class="small d-flex mt-1"><svg class="icon icon-xs text-danger"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <div><span
                                                class="text-danger fw-bolder me-1">{{ $klienbulanlalu->count() }}</span>
                                            dari bulan lalu</div>
                                    </div>
                                @else
                                @endif
                            </div>
                        </div>
                        <div class="d-flex align-items-center pt-3">
                            <div class="icon-shape icon-sm icon-shape-purple rounded me-3"><svg fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                                    </path>
                                </svg></div>
                            <div class="d-block"><label class="mb-0">Quantity</label>
                                <h4 class="mb-0">{{ $orders->pluck('qty')->sum() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>


    <div class="row mb-3">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">

        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">New Order {{ $bt }}</div>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah dari {{ $orders->count() }} order
                        <span class="badge bg-primary bg-pill">{{ $orders->pluck('qty')->sum() }} pcs</span>
                    </li>

                    @forelse  ($orders as $order)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="/order/{{ $order->inv }}">#{{ $order->inv }} - {{ $order->klien->nama }}</a>
                            <span class="badge bg-primary bg-pill text-white">{{ $order->qty }} pcs</span>
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

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah : {{ $kliens->count() }}

                    </li>


                    @forelse ($kliens as $klien)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $klien->nama }}
                            <span class="badge bg-primary"><i class="fab fa-whatsapp"></i> <a
                                    href="https://api.whatsapp.com/send?phone={{ Str::replaceFirst('0', '62', $klien->hp) }}&text=Hai+Sablon+Satuan"
                                    class="text-white">CHAT</a></span>
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
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Pemasukan
                        <span class="badge bg-primary bg-pill">Rp
                            {{ number_format($pemasukans->pluck('nominal')->sum(), 0, ',', '.') }}</span>
                    </li>

                    @forelse ($pemasukans as $pemasukan)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="/order/{{ $pemasukan->order->inv }}">{{ $pemasukan->metode }}</a>
                            <span class="badge bg-primary bg-pill text-white">Rp
                                {{ number_format($pemasukan->nominal, 0, ',', '.') }}</span>
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
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
@endsection
