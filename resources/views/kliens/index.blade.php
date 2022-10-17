@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">List Klien</div>
                    <div class="card-tools">
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                            <span class="btn-label">
                                <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a>
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                            <span class="btn-label">
                                <i class="fa fa-print"></i>
                            </span>
                            Print
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="table table-bordered nowrap" id="data">
                    <thead>
                        <tr>
                            <th >No</th>
                            <th >Nama</th>

                            <th >HP</th>
                            
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kliens as $index => $klien  )

                        <tr class="">
                            <td scope="row">{{$index+1}}</td>
                            <td>{{ Str::of($klien->nama)->limit(10)}}</td>

                            <td>{{$klien->hp}}</td>
                            
                            <td>

                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <a href="{{route('klien.edit', $klien->id)}}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-success"><i class="fa fa-print"></i></button>
                                  
                                    <div class="btn-group" role="group">
                                        <form action="{{route('order.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input name="klien_id" value="{{$klien->id}}" hidden>
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-cart-plus"></i> Order</button>
                                        </form>
                                    </div>
                                  </div>

                                  

                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-body">

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{route('klien.store')}}" method="POST" enctype="multipart/form-data">
    @csrf


<div class="card">
    <div class="card-header">
        <div class="card-head-row">
            <div class="card-title">Klien Baru</div>
            
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="email2">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Tulis Nama">
        </div>
        <div class="form-group">
            <label for="email2">No Whatsapp</label>
            <input type="text" class="form-control" name="hp" placeholder="08xx">
        </div>

          <div class="form-group">
            <label for="comment">Alamat</label>
            <textarea class="form-control" name="alamat" rows="5">
            </textarea>
        </div>

        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="">
                <span class="form-check-sign">Langsung buat Orderan</span>
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>
    </div>
</div>
@endsection
