@extends('layouts.app')
@section('title')
<div class="container text-white py-2">
    <div class="d-flex align-items-center">
        <div class="mr-3">
            <h2 class="mb-3"><a href="/klien/{{ $order->klien->id }}">{{$order->klien->nama}}</a> #{{$order->inv}}</h2>
            
                                    
                                
            <h5 class="op-7 mb-3">{{$order->klien->hp}} - {{$order->qty}}pcs</h5>
        </div>
        <div class="ml-auto">
            
            <a href="#" class="btn btn-primary btn-round" style="align-items: center"
                            data-bs-toggle="modal" data-bs-target="#PembayaranModal" role="button">BAYAR</a>
                            
            <a href="/nota/{{ $order->inv }}" target="_blank" class="btn btn-success btn-round">PRINT NOTA</a>
        </div>
    </div>
</div>
@endsection


@section('content')

    <div class="row">
        
    </div>
    
        <div class="row mb-2">

            <div class="col-12">
                
            </div>
        </div>


        <div class="row">
            <div class="col-md-7 col-sm-12">
                <form action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex bd-highlight justify-content-end align-items-lg-center">
                            
                            <div class="p-2 bd-highlight">
                                <div class="input-group">
                                    <select name="stok" class="custom-select">
                                        <option value="{{ $order->stok }}">
                                            {{ $order->stok }}

                                        </option>
                                        <option value="Kosong">Kosong</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Ready">Ready</option>
                                        <option value="Order">Order</option>
                                    </select>
                                    <select name="status" class="custom-select">
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
                                    </select><select name="pembayaran" class="custom-select">
                                        <option value="{{ $order->pembayaran }}">
                                            {{ $order->pembayaran }}
                                        </option>
                                        <option value="BELUM BAYAR">BELUM BAYAR</option>
                                        <option value="LUNAS">LUNAS</option>
                                        <option value="MASUK DP">MASUK DP</option>
                                    </select>

                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-check"></i>
                                            Update</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    @if(Session::has('flash_message'))
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

                    <div class="card-header  d-flex justify-content-between align-items-center ">
                        Tanggal Order : {{ $order->created_at }}
                       

                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="touchSpin1">Judul Order</label>

                            <div class="input-group">

                                <input type="text" class="form-control" name="judul" value="{{ $order->judul }}">

                                <div class="input-group-append">
                                    <span class="input-group-text">QTY</span>
                                    <input type="number" class="form-control" name="qty" value="{{ $order->qty }}">
                                    <span class="input-group-text">PCS</span>
                                </div>
                            </div>



                        </div>


                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
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
                                    <label>Pengambilan</label>
                                    <div id="dateorder" data-date="{{$order->pengambilan}}"></div>
                                    <input type="text" class="form-control" data-date-format="yyyy-mm-dd" id="my_hidden_order"
                                    name="pengambilan" value="{{$order->pengambilan}}" hidden>
                                    
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Pengiriman</legend>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="pengiriman"
                                            class="custom-control-input" value="Diambil" checked="">
                                        <label class="custom-control-label" for="customRadio1">AMBIL KE TOKO</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="pengiriman"
                                            class="custom-control-input" value="kirim">
                                        <label class="custom-control-label" for="customRadio2">KIRIM KURIR</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadioDisabled1" class="custom-control-input"
                                            disabled="">
                                        <label class="custom-control-label" for="customRadioDisabled1">COD</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="">Ongkir</label>
                          <input type="number" class="form-control" value="{{$order->ongkir}}" name="ongkir">
                          <small id="emailHelpId" class="form-text text-muted">Help text</small>
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
                            
                        <a href="/tambah/{{$order->inv}}" class="btn btn-primary">Tambah produk</a> 
                        
 <form action="{{ route('hapus.semuaproduk', $order->id) }}">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Hapus Semua</button>
</form>

</div>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-hover nowrap">
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
                                    @foreach ($orderan as $orderan )
                                    <tr>
                                        <th scope="row">
                                            <form action="{{ route('orderan.destroy',$orderan->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                            
                                                <button type="submit" class="btn btn-danger">X</button>
                                            </form>
                                            
                                        </th>
                                        <td><small>{{$orderan->produk->kategori}}</small><p>{{$orderan->produk->nama}}</p></td>
                                        <td>{{$orderan->produk->harga}}</td>
                                        <td>{{$orderan->qty}}</td>
                                        <td class="text-end font-weight-bold">{{$orderan->harga}}</td>
                                    </tr>
                                    @endforeach
                                
                                    <tr>
                                      
                                        <td colspan="4" class="text-end">Total Rp</td>
                                        <td class="text-end font-weight-bold">{{$total}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">Ongkir Rp</td>
                                        
                                        <td class="text-end font-weight-bold">{{$order->ongkir}}</td>

                                    </tr>
                                    <tr>
                                        
                                        <td colspan="4" class="text-end">Grand Total</td>
                                        
                                        <td class="text-end font-weight-bold">{{$grandtotal}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Footer
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="card mb-3">
                    <div class="card-header  d-flex justify-content-between align-items-center ">
                        <h3>Catatan Pembayaran</h3>

                    </div>
                    <div class="card-body">


                        <!-- Modal -->
                        
                        <div class="alert alert-success">
                            <h3>Kurang Bayar : Rp {{$sisa}}</h3>
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
                                    @foreach ($keuangan as $bayar )
                                    <tr>
                                        <td>
                                            <form action="{{ route('keuangan.destroy', $bayar->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                            
                                                <button type="submit" class="btn btn-danger">X</button>
                                            </form>
                                        </td>
                                        <td><small>{{$bayar->metode}}</small><p>{{$bayar->tanggal}}</p></td>
                                        
                                        <td>Rp. {{$bayar->nominal}}</td>

                                    </tr>
                                    @endforeach
                                    

                                    <tr>
                                        <td></td>
                                        <td><strong>Jumlah</strong></td>
                                        <td><strong>Rp {{$jumlah}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><strong>Tagihan</strong></td>
                                        <td><strong>Rp {{$grandtotal}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><strong>Kurang Bayar</strong></td>
                                        <td><strong>Rp {{$sisa}}</strong></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <form action="{{route('design.store')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf  
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="bd-highlight">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">MOCKUP</label>
                                    <input type="file" class="form-control-file" name="mockup" multiple="">
                                    <input type="text" name="kategori" value="Mockup" hidden>
                                    <input type="text" name="order_id" value="{{$order->id}}" hidden>
                                    <input type="text" name="klien_id" value="{{$order->klien->id}}" hidden>
                                    <input type="text" name="klienpath" value="{{$order->klien->hp}}" hidden>
        
                                </div>
                            </div>
                            
                            <div class="p-2 bd-highlight">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                        
                </form>
                    </div>
                    <div class="card-body">
                        @foreach ($designs as $image )
                            <img src="{{$image->path}}" width="100px;" loading="lazy"/>
                        @endforeach
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <form action="{{route('design.store')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf  
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="bd-highlight">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">FILE EPS</label>
                                    <input type="file" class="form-control-file" name="mockup" multiple="">
                                    <input type="text" name="kategori" value="EPS" hidden>
                                    <input type="text" name="order_id" value="{{$order->id}}" hidden>
                                    <input type="text" name="klien_id" value="{{$order->klien->id}}" hidden>
                                    <input type="text" name="klienpath" value="{{$order->klien->hp}}" hidden>
        
                                </div>
                            </div>
                            
                            <div class="p-2 bd-highlight">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                        
                </form>
                    </div>
                    <div class="card-body">
                        @foreach ($files as $file )
                        <ul>
                            <li><a href="{{$file->path}}" download>{{$file->path}}</a></li>
                        </ul>
                            <img src="" width="100px;" />
                        @endforeach
                    </div>
                </div>


                <div class="card mb-3">
                    <div class="card-body">
                        COPY
                    </div>
                
                </div>
            </div>
        </div>


    <div class="modal fade" id="PembayaranModal" tabindex="-1"
                            aria-labelledby="PembayaranModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="PembayaranModalLabel">Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex flex-row-reverse bd-highlight mb-3">
                                            <div class="p-2 bd-highlight">
                                                <form action="{{ route('keuangan.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <select class="custom-select" name="metode" id="inputGroupSelect02">
                                                    
                                                    <option value="Tunai">Tunai</option>
                                                    <option value="Transfer">Transfer</option>
                                                  
                                                </select>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-md btn-primary">DP Rp.{{$sisa/2}}</button>
                                                </div>
                                              </div>
                                            <input type="date" class="form-control" name="tanggal" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" hidden>
                                            <input type="text" name="kategori" value="Order" hidden>
                                            <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                                            <input type="text" name="jenis" value="Pemasukan" hidden>
                                            <input type="text" name="metode" value="Tunai" hidden>
                                            <input type="text" name="nominal" value="{{$sisa/2}}" hidden>
                                            <input type="text" name="status" value="DP" hidden>
                                            <input type="text" name="detail" value="{{ $order->inv }}" hidden>
                                            
                                        </form>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <form action="{{ route('keuangan.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <select class="custom-select" name="metode" id="inputGroupSelect02">
                                                    <option value="Transfer">Transfer</option>
                                                    <option value="Tunai">Tunai</option>
                                
                                                  
                                                </select>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-md btn-success">LUNAS</button>
                                                </div>
                                              </div>
                                            <input type="date" class="form-control" name="tanggal" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" hidden>
                                            <input type="text" name="kategori" value="Order" hidden>
                                            <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                                            <input type="text" name="jenis" value="Pemasukan" hidden>
                                            
                                            <input type="text" name="nominal" value="{{$sisa}}" hidden>
                                            <input type="text" name="status" value="Lunas" hidden>
                                            <input type="text" name="detail" value="{{ $order->inv }}" hidden>
                                            
                                        </form>
                                            </div>
                                            
                                          </div>
                                        
                                        
                                        <hr/>
                                        <h3 class="mb-3 text-end">Input Nominal</h3>
                                        <form action="{{ route('keuangan.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="nominal" class="form-label">Tanggal</label>
                                                <input type="date" id="date" class="form-control" name="tanggal">
                                            </div>

                                            <input type="text" name="kategori" value="Order" hidden>
                                            <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                                            <input type="text" name="jenis" value="Pemasukan" id=""
                                                hidden>

                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Metode</label>
                                                <select class="form-control" name="metode">
                                                    <option>Transfer</option>
                                                    <option>Tunai</option>

                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="nominal" class="form-label">Nominal</label>
                                                <input type="text" class="form-control" name="nominal" id="nominal"
                                                    aria-describedby="helpId" placeholder="">
                                                <small id="helpId" class="form-text text-muted">Ketik Angka
                                                    Saja</small>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Example
                                                    textarea</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $order->inv }}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
    
    </div>
@endsection
