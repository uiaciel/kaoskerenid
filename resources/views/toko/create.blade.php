@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('toko.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">City</label>
                            <select class="form-control" name="klien_id" id="">
                                @foreach ($kliens as $klien)
                                    <option value="{{ $klien->id }}">{{ $klien->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Invoice</label>
                            <input type="text" class="form-control" name="inv" id=""
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Periode</label>
                            <input type="text" class="form-control" name="periode" id=""
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
