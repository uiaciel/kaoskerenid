@extends('layouts.app')
@section('title', 'REPORT HARIAN')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-white">Pemasukan Hari ini</h3>
            <div class="card p-3 mb-3 mb-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-success mr-3">
                        <i class="fa fa-dollar-sign"></i>
                    </span>
                    <div>
                        <h3 class="mb-1"><b>Rp.
                                {{ number_format($pemasukanharian->where('metode', 'Tunai')->pluck('nominal')->sum() -$pengeluaranharian->where('metode', 'Tunai')->pluck('nominal')->sum(),0,',','.') }}</b>
                        </h3>
                        <small class="text-muted">CASH DI TOKO</small>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12 col-lg-6">
                    <div class="card p-3 mb-3 mb-3">
                        <div class="d-flex align-items-center">
                            <span class="stamp stamp-md bg-secondary mr-3">
                                <i class="fa fa-dollar-sign"></i>
                            </span>
                            <div>
                                <h5 class="mb-1"><b><a href="#">TUNAI</a></b></h5>
                                <small class="text-muted">Rp.
                                    {{ number_format($pemasukanharian->where('metode', 'Tunai')->pluck('nominal')->sum(),0,',','.') }}</small>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="card p-3 mb-3">
                        <div class="d-flex align-items-center">
                            <span class="stamp stamp-md bg-success mr-3">
                                <i class="far fa-credit-card"></i>
                            </span>
                            <div>
                                <h5 class="mb-1"><b><a href="#">TRANSFER</a></b></h5>
                                <small class="text-muted">Rp.
                                    {{ number_format($pemasukanharian->where('metode', 'Transfer')->pluck('nominal')->sum(),0,',','.') }}</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Catatan Pemasukan</h4>
                </div>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Rp. {{ number_format($pemasukanharian->pluck('nominal')->sum(), 0, ',', '.') }}
                    </li>

                    @forelse ($pemasukanharian as $harian)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="/order/{{ $harian->order->inv }}">{{ $harian->metode }}</a>
                            <span class="badge badge-primary badge-pill">Rp
                                {{ number_format($harian->nominal, 0, ',', '.') }}</span>
                        </li>
                    @empty
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Data Tidak Ada
                        </li>
                    @endforelse


                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="text-white">Pengeluaran Hari ini</h3>
            <div class="card p-3 mb-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-danger mr-3">
                        <i class="fa fa-dollar-sign"></i>
                    </span>
                    <div>
                        <h3 class="mb-1"><b>Rp.
                                {{ number_format($pengeluaranharian->pluck('nominal')->sum(), 0, ',', '.') }}</b></h3>
                        <small class="text-muted">Total Pengeluaran</small>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12 col-lg-6">
                    <div class="card p-3 mb-3">
                        <div class="d-flex align-items-center">
                            <span class="stamp stamp-md bg-danger mr-3">
                                <i class="fa fa-dollar-sign"></i>
                            </span>
                            <div>
                                <h5 class="mb-1"><b><a href="#">TUNAI</a></b></h5>
                                <small class="text-muted">Rp.
                                    {{ number_format($pengeluaranharian->where('metode', 'Tunai')->pluck('nominal')->sum(),0,',','.') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="card p-3 mb-3">
                        <div class="d-flex align-items-center">
                            <span class="stamp stamp-md bg-success mr-3">
                                <i class="fa fa-dollar-sign"></i>
                            </span>
                            <div>
                                <h5 class="mb-1"><b><a href="#">TRANSFER</a></b></h5>
                                <small class="text-muted">Rp.
                                    {{ number_format($pengeluaranharian->where('metode', 'Transfer')->pluck('nominal')->sum(),0,',','.') }}</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Catatan Pengluaran</h4>
                </div>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Pengeluaran Harian
                    </li>

                    @forelse ($pengeluaranharian as $hari)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="">Rp {{ number_format($hari->nominal, 0, ',', '.') }}</a>
                            <span class="badge badge-primary badge-pill">{{ $hari->metode }}</span>
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


    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Overall statistics</div>
                    <div class="card-category">Daily information about statistics in system</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1">
                                <div class="circles-wrp" style="position: relative; display: inline-block;"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="90" height="90">
                                        <path fill="transparent" stroke="#f1f1f1" stroke-width="7"
                                            d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z"
                                            class="circles-maxValueStroke"></path>
                                        <path fill="transparent" stroke="#FF9E27" stroke-width="7"
                                            d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 20.644357636259837 78.60137921350231 "
                                            class="circles-valueStroke"></path>
                                    </svg>
                                    <div class="circles-text"
                                        style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;">
                                        {{ $kliens->count() }}</div>
                                </div>
                            </div>
                            <h6 class="fw-bold mt-3 mb-0">New Klien</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2">
                                <div class="circles-wrp" style="position: relative; display: inline-block;"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="90" height="90">
                                        <path fill="transparent" stroke="#f1f1f1" stroke-width="7"
                                            d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z"
                                            class="circles-maxValueStroke"></path>
                                        <path fill="transparent" stroke="#2BB930" stroke-width="7"
                                            d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 5.5495771787290025 57.88076625138973 "
                                            class="circles-valueStroke"></path>
                                    </svg>
                                    <div class="circles-text"
                                        style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;">
                                        {{ $orders->count() }}</div>
                                </div>
                            </div>
                            <h6 class="fw-bold mt-3 mb-0">Orders</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3">
                                <div class="circles-wrp" style="position: relative; display: inline-block;"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="90" height="90">
                                        <path fill="transparent" stroke="#f1f1f1" stroke-width="7"
                                            d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z"
                                            class="circles-maxValueStroke"></path>
                                        <path fill="transparent" stroke="#F25961" stroke-width="7"
                                            d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 0 1 69.44267714510887 78.53812060894248 "
                                            class="circles-valueStroke"></path>
                                    </svg>
                                    <div class="circles-text"
                                        style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;">
                                        {{ $orders->pluck('qty')->sum() }}</div>
                                </div>
                            </div>
                            <h6 class="fw-bold mt-3 mb-0">Qty</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Total Pendapatan</div>
                    <div class="row py-3">
                        <div class="col-md-5 d-flex flex-column justify-content-around">
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Pendapatan</h6>
                                <h3 class="fw-bold">Rp
                                    {{ number_format($pemasukans->pluck('nominal')->sum(), 0, ',', '.') }}</h3>
                            </div>
                            <div>
                                <h6 class="fw-bold text-uppercase text-danger op-8">Pengeluaran</h6>
                                <h3 class="fw-bold">Rp
                                    {{ number_format($pengeluarans->pluck('nominal')->sum(), 0, ',', '.') }}</h3>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div id="chart-container">
                                <div class="chartjs-size-monitor"
                                    style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand"
                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink"
                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div>
                                <canvas id="totalIncomeChart" width="314" height="134"
                                    style="display: block; width: 349px; height: 150px;"
                                    class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">New Order {{ $bt }}</div>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah dari {{ $orders->count() }} order
                        <span class="badge badge-primary badge-pill">{{ $orders->pluck('qty')->sum() }} pcs</span>
                    </li>

                    @forelse  ($orders as $order)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="/order/{{ $order->inv }}">#{{ $order->inv }} - {{ $order->klien->nama }}</a>
                            <span class="badge badge-primary badge-pill">{{ $order->qty }} pcs</span>
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
                            <span class="badge badge-success"><i class="fab fa-whatsapp"></i> <a
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
                        <span class="badge badge-primary badge-pill">Rp
                            {{ number_format($pemasukans->pluck('nominal')->sum(), 0, ',', '.') }}</span>
                    </li>

                    @forelse ($pemasukans as $pemasukan)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="/order/{{ $pemasukan->order->inv }}">{{ $pemasukan->metode }}</a>
                            <span class="badge badge-primary badge-pill">Rp
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Data Orderan Periode {{ $bt }}</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Order</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periode as $index => $periode)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $periode->inv }}</td>
                                        <td>{{ $periode->qty }}</td>
                                        <td>{{ $periode->total }}</td>
                                    </tr>
                                @endforeach
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
