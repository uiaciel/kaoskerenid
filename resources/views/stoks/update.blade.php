@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
<div class="row">
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
@endsection
