@extends('layouts.frontend')
@section('content')
    <section class="artists-section section-padding">
        <div class="container">
            <h3 class="mb-3">Katalog Produk & Jasa</h3>
            <div class="row">
                @foreach ($katalogs as $katalog)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <a href="" data-bs-toggle="modal" data-bs-target="#produk{{ $katalog->id }}"><img
                                    src="{{ $katalog->image }}" class="card-img-top" alt="{{ $katalog->nama }}"></a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $katalog->nama }}</h5>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="button">
                                        Rp.
                                        {{ number_format($katalog->katalogproduk->where('katalog_id', $katalog->id)->sum('produk.harga')) }}
                                    </button>
                                    <a href="https://wa.me/628811722125?text=Hai%20Admin%20Web%20Kaoskerenid%20Saya%20Mau%20Tanya-tanya%20Sablon"
                                        class="btn btn-success" type="button">PESAN SEKARANG</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="produk{{ $katalog->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog        ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $katalog->nama }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body row">

                                    <div class="col-md-6">
                                        <img src="{{ $katalog->image }}" class="card-img-top" alt="{{ $katalog->nama }}">
                                    </div>
                                    <div class="col-md-6">
                                        <h6>{{ $katalog->kategori }}</h6>
                                        <h6>Rp.
                                            {{ number_format($katalog->katalogproduk->where('katalog_id', $katalog->id)->sum('produk.harga')) }}
                                        </h6>
                                        <p>{{ $katalog->detail }}</p>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button> --}}
                                    <button type="button" class="btn btn-primary">ORDER</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
