@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
<div class="row">
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
@endsection
