@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
<div class="row">
   <div class="col-md-8">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Metode</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">OrderID</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keuangans as $index => $keuangan)


                    <tr class="">
                        <td scope="row">{{$index+1}}</td>
                        <td>{{$keuangan->created_at}}</td>
                        <td>{{$keuangan->metode}}</td>
                        <td>{{$keuangan->nominal}}</td>
                        <td>{{$keuangan->order_id}}</td>
                        <td>{{$keuangan->kategori}}</td>
                        <td>{{$keuangan->jenis}}</td>
                        <td>{{$keuangan->detail}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
   </div>
   <div class="col-md-4">
    <div class="card">
        <div class="card-body">
         <form action="{{route('keuangan.store')}}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="mb-3">
               <label for="" class="form-label">Tanggal</label>
               <input type="date" name="tanggal" id="date" class="form-control" placeholder="" aria-describedby="helpId">
               <small id="helpId" class="text-muted">Help text</small>
             </div>
             <div class="mb-3">
               <label for="" class="form-label">Nominal</label>
               <input type="text" name="nominal" id="" class="form-control" placeholder="" aria-describedby="helpId">
               <small id="helpId" class="text-muted">Help text</small>
             </div>
             <div class="mb-3">
                 <label for="" class="form-label">Jenis</label>
                 <select class="form-control" name="jenis" id="">
                   <option>Pemasukan</option>
                   <option>Pengeluaran</option>
 
                 </select>
               </div>
 
               <div class="mb-3">
                 <label for="" class="form-label">Kategori</label>
                 <select class="form-control" name="kategori" id="">
                   <option>Orderan</option>
                   <option>Ongkos Cetak</option>
 
                 </select>
               </div>
 
               <div class="mb-3">
                 <label for="" class="form-label">Order_id</label>
                 <input type="text" name="order_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
                 <small id="helpId" class="text-muted">Help text</small>
               </div>
 
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
@endsection
