@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Terakhir Update</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stoks as $index => $stok )
                            <tr class="">
                                <td scope="row">{{$index+1}}</td>
                                <td><a href="{{route('datastok.show', $stok->id)}}">{{$stok->kode}}</a></td>
                                <td>{{$stok->nama}}</td>
                                <td>{{$stok->kategori}}</td>
                                <td>{{$stok->supplier}}</td>
                                <td>{{$stok->qty}}</td>
                                <td>{{$stok->created_at}}</td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$stok->id}}">
                              Input
                            </button></td>
                            </tr>
                           
                            
                            <!-- Modal -->
                            <div class="modal fade" id="{{$stok->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Stok</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <form action="{{route('datastok.store')}}" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="" class="form-label">Tanggal</label>
                <input type="date"
                  class="form-control" name="tanggal" id="date" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Help text</small>
              </div>
            <div class="mb-3">
              <label for="" class="form-label">STOK ID</label>
              <input type="text"
                class="form-control" name="stok_id" value="{{$stok->id}}" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">QTY</label>
                <input type="text"
                  class="form-control" name="qty" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Help text</small>
              </div>
            <div class="mb-3">
              <label for="" class="form-label">Status</label>
              <select class="form-control" name="status" id="">
                <option>Masuk</option>
                <option>Keluar</option>

              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card">
            <div class="card-body">
                <form action="{{route('stok.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                  <label for="" class="form-label">Nama Barang</label>
                  <input type="text"
                    class="form-control" name="nama" id="" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Hitam, </small>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Kategori Barang</label>
                    <input type="text"
                      class="form-control" name="kategori" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Kaos Pendek, Topi Jaring, </small>
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Supplier</label>
                    <input type="text"
                      class="form-control" name="supplier" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Cotton COmbed 30s</small>
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Kode Barang</label>
                    <input type="text"
                      class="form-control" name="kode" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">QTY</label>
                    <input type="text"
                      class="form-control" name="qty" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
    
    
    
</div>
@endsection