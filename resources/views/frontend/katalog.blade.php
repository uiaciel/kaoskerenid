@extends('layouts.frontend')
@section('content')
    <section class="artists-section section-padding">
        <div class="container">
            <h3 class="mb-3">Katalog Produk</h3>
            <div class="row">
                @foreach ($katalogs as $katalog)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ $katalog->image }}" class="card-img-top" alt="{{ $katalog->nama }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $katalog->nama }}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                                <a href="#" class="btn btn-primary fw-bold"> Rp
                                    {{ $katalog->katalogproduk->where('katalog_id', $katalog->id)->sum('produk.harga') }}
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
