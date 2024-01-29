@extends('layouts.app')
@section('content')
    <div class="row">

<form>

        <div class="mb-3">
            <label for="" class="form-label">Tanggal</label>
            <input
                type="date"
                class="form-control"
                name="tanggal"
                id=""
                aria-describedby="helpId"
                placeholder=""
            />
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
<div class="d-grid gap-2">
    <button
        type="submit"
        name=""
        id=""
        class="btn btn-primary"
    >
        submit
    </button>
</div>

    </form>
        <h3 class="text-white">Hari ini </h3>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">

                        <div class="col-12 col-xl-8 px-xl-0">
                            <div class="">
                                <h2 class="h5">Uang Tunai</h2>
                                <h3 class="fw-extrabold mb-1">
                                    Rp.{{ number_format($pemasukanharian->where('metode', 'Tunai')->pluck('nominal')->sum() -$pengeluaranharian->where('metode', 'Tunai')->pluck('nominal')->sum(),0,',','.') }}</b></b>
                                </h3>
                            </div><small class="d-flex align-items-center">

                                <span class="text-success me-2">Uang cash di kotak</span>

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

                        <div class="col-12 col-xl-12 px-xl-0">
                            <div class=" ms-3">
                                <h2 class="h5">Pemasukan</h2>
                                <h3 class="fw-extrabold mb-1">Rp.
                                    {{ number_format($pemasukanharian->pluck('nominal')->sum(), 0, ',', '.') }}</b>
                                </h3>
                            </div><small class="d-flex justify-content-between align-items-center ms-3">

                                <span class="text-success me-2">TF : Rp
                                    {{ number_format($pemasukanharian->where('metode', 'Transfer')->pluck('nominal')->sum(),0,',','.') }}
                                </span>
                                <span class="text-success me-2">Cash : Rp
                                    {{ number_format($pemasukanharian->where('metode', 'Tunai')->pluck('nominal')->sum(),0,',','.') }}
                                </span>

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

                        <div class="col-12 col-xl-12 px-xl-0 ms-3">
                            <div class="">
                                <h2 class="h5">Pengeluaran</h2>
                                <h3 class="fw-extrabold mb-1">Rp.
                                    {{ number_format($pengeluaranharian->pluck('nominal')->sum(), 0, ',', '.') }}</b>
                                </h3>
                            </div><small class="d-flex justify-content-between align-items-center">

                                <span class="text-danger me-2">TF :
                                    Rp
                                    {{ number_format($pengeluaranharian->where('metode', 'Transfer')->pluck('nominal')->sum(),0,',','.') }}
                                </span>
                                <span class="text-danger me-4">CASH :
                                    Rp
                                    {{ number_format($pengeluaranharian->where('metode', 'Tunai')->pluck('nominal')->sum(),0,',','.') }}
                                </span>
                            </small>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mb-3">

        <div class="col-md-8">

            <div class="card border-0">
                <div class="card-header">
                    <h6>Orderan</h6>
                </div>
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
                            @foreach ($orderhariini as $index => $orderhariinis)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $orderhariinis->status }}</td>
                                    <td><a href="/admin/order/{{ $orderhariinis->inv }}">{{ $orderhariinis->inv }}</a>
                                    </td>
                                    <td>{{ $orderhariinis->klien->nama }}</td>
                                    <td>{{ $orderhariinis->qty }}</td>
                                    <td>{{ $orderhariinis->total }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-body">

                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Belanja Hari ini</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5">
@foreach ($orderhariini->where('stok', 'KOSONG') as $belanjahariini)
{{ $belanjahariini->klien->nama }}
{{ $belanjahariini->detail }}
--
@endforeach
                </textarea>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <h3 class="text-white">Keuangan {{ $bt }}</h3>



        <div class="col-md-8">

            <div class="card mb-3 border-0 shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">Transaksi</h2>
                        </div>
                        <div class="col text-end"> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#catatPengeluaran">
                                Catat Keuangan
                            </button></div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-dark text-white">
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
                                    <th class="text-gray-900" scope="row">
                                        {{ $keuanganbulanan->tanggal }}
                                        </a>
                                    </th>
                                    <td class="fw-bolder text-gray-500">
                                        <a
                                            href="/admin/order/{{ $keuanganbulanan->detail }}">{{ $keuanganbulanan->detail }}</a>
                                        - {{ $keuanganbulanan->kategori }} <span
                                            class="badge bg-primary">{{ $keuanganbulanan->metode }} </span>
                                    </td>

                                    <td class="fw-bolder text-gray-500 text-end">
                                        @if ($keuanganbulanan->jenis == 'Pemasukan')
                                            {{ number_format($keuanganbulanan->nominal, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif

                                    </td>

                                    <td class="fw-bolder text-gray-500 text-end">

                                        @if ($keuanganbulanan->jenis == 'Pengeluaran')
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


        </div>
        <div class="col-md-4">

            <div class="card mb-3 full-height">
                <div class="card-body">

                    <div class="row py-3">
                        <div class="col-md-12 d-flex flex-column text-end  justify-content-around">
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Pendapatan Bulan ini</h6>
                                <h3 class="fw-bold">Rp
                                    {{ number_format($pemasukans->pluck('nominal')->sum(), 0, ',', '.') }}</h3>
                            </div>
                            <div class="mb-4">
                                <h6 class="fw-bold text-uppercase text-danger op-8">Pengeluaran Bulan ini</h6>
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






        </div>





    </div>

    <div class="row">
        <h3 class="text-white">Orderan {{ \Carbon\Carbon::now()->monthName }} {{ \Carbon\Carbon::now()->year }}</h3>
        <div class="col-md-8">

            <div class="card mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">Qty <span
                                    class="badge bg-primary bg-pill">{{ $orders->pluck('qty')->sum() }} pcs</span></h2>
                        </div>
                        <div class="col text-end"> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#grafikOrderan">
                                Grafik
                            </button></div>
                    </div>
                </div>

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
                                    <td><a href="/admin/order/{{ $periode->inv }}">{{ $periode->inv }}</a></td>
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
        <div class="col-md-4">
            <div class="card border-0 shadow mb-3">
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

            <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Klien Bulan ini</h5>
                  <ul>
                      @foreach($kliendibulanini as $client)
                      <li> <strong>{{ $client->nama }} - {{ $client->orders_count }}</strong></li>
                      @endforeach
                  </ul>

                </div>
              </div>


        </div>
    </div>





    <!-- Modal -->
    <div class="modal fade" id="grafikOrderan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! $chart->container() !!}
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="catatPengeluaran" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keuangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('keuangans.form')
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

@endsection
