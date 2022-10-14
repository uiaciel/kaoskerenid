@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
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
                <table class="table table-bordered" id="data">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">HP</th>
                            
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kliens as $index => $klien  )

                        <tr class="">
                            <td scope="row">{{$index+1}}</td>
                            <td>{{$klien->nama}}</td>
                            <td>{{$klien->alamat}}</td>
                            <td>{{$klien->hp}}</td>
                            
                            <td><a href="{{route('klien.edit', $klien->id)}}" class="btn btn-sm btn-round btn-primary">Edit</a></td>
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

@endsection
