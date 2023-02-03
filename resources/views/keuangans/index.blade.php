@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
<div class="row">
    <h3>Keuangan Harian</h3>
</div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengeluaran Bulan Ini</h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>

                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Metode</th>
                                    <th scope="col">Nominal</th>

                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengeluarans as $index => $pengeluaran)
                                    <tr class="">

                                        <td>{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d F Y') }}</td>
                                        <td>{{ $pengeluaran->metode }}</td>
                                        <td>{{ $pengeluaran->nominal }}</td>



                                        <td>{{ $pengeluaran->kategori }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
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
        </div>

    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Pemasukan Bulan Ini</h4>
          </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="data">
                    <thead>
                        <tr>
                            
                            <th scope="col">Tanggal</th>
                            <th scope="col">Metode</th>
                            <th scope="col">Nominal</th>
                            
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasukans as $index => $pemasukan)
    
    
                        <tr class="">
                            
                            <td>{{ \Carbon\Carbon::parse($pemasukan->tanggal)->format('d F Y')}}</td>
                            <td>{{$pemasukan->metode}}</td>
                            <td>{{$pemasukan->nominal}}</td>
                            
                            
                            
                            <td>{{$pemasukan->detail}}</td>
                        </tr>
                        @endforeach
    
                    </tbody>
                </table>
            </div>
    
            
            </div>
    
        </div>
    
       
       </div>
    </div>



@endsection
