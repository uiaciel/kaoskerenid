@extends('layouts.app')
@section('title')
    <div class="container text-white py-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div>
                <h2 class="mb-3">{{ $klien->nama }}
                </h2> <small>{{ $klien->hp }}</small>
            </div>
            <div>
                <button type="button" class="btn btn-gray-800 d-inline-flex align-items-center me-2" data-bs-toggle="modal"
                    data-bs-target="#editKlien"><svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg></button> <button class="btn btn-gray-800 d-inline-flex align-items-center dropdown-toggle"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg class="icon icon-xs me-2"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd"></path>
                    </svg> Reports <svg class="icon icon-xs ms-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg></button>
                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                        class="dropdown-item d-flex align-items-center" href="#"><svg
                            class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                            <path fill-rule="evenodd"
                                d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg> Products </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
                            class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                            </path>
                        </svg> Customers </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
                            class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                clip-rule="evenodd"></path>
                        </svg> Orders </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
                            class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z"
                                clip-rule="evenodd"></path>
                        </svg> Console</a>
                    <div role="separator" class="dropdown-divider my-1"></div><a
                        class="dropdown-item d-flex align-items-center" href="#"><svg
                            class="dropdown-icon text-gray-800 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd"></path>
                        </svg> All Reports</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                    <h2 class="fs-5 fw-bold mb-0">History Order</h2>
                    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="klien_id" value="{{ $klien->id }}" hidden>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-cart-plus"></i>
                            Order baru</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Inv</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Status</th>
                                <th scope="col">Pembayaran</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr class="">
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td><a href="/admin/order/{{ $order->inv }}" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom"
                                            title="{{ $order->detail }}">{{ $order->inv }}</a></td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->qty }} pcs</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->pembayaran }}</td>
                                    <td>Rp.{{ $order->total }}</td>
                                    <td>
                                        <form action="{{ route('deleteimages') }}">
                                            @csrf
                                            @method('POST')
                                            <input value="{{ $order->id }}" name="orderid" hidden>
                                            <button type="submit" class="btn btn-danger">Delete Image</button>
                                    </td>
                                    </form>


                                </tr>
                                <tr>
                                    <td colspan="8">
                                        <div class="row">
                                            @foreach ($designs->where('order_id', $order->id) as $slider)
                                                <div class="col-md-2">
                                                    @if ($slider->kategori == 'MOCKUP')
                                                        <img src="{{ $slider->path }}" class="img-fluid" loading="lazy">
                                                    @else
                                                        <img src="/images/eps-logo.png" class="img-fluid" loading="lazy">
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
            {{-- <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Gallery</h5>
                    <div class="row">


                        @foreach ($designs->where('kategori', 'MOCKUP') as $image)
                            <div class="col-md-6 col-lg-3">
                                <div class="custom-control custom-checkbox image-checkbox">
                                    <input type="checkbox" class="custom-control-input" data-id="{{ $image->id }}">
                                    <a href="" data-bs-toggle="modal"
                                        data-bs-target="#mockup-{{ $image->id }}">
                                        View
                                    </a>
                                    <label class="custom-control-label" for="ck{{ $image->id }}">
                                        <img src="{{ $image->path }}" alt="#" class="img-fluid">
                                    </label>

                                </div>
                            </div>
                            <div class="modal fade" id="mockup-{{ $image->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">MOCKUP</h5>


                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $image->path }}" class="img-fluid" loading="lazy" />

                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('design.destroy', $image->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>


                </div>
            </div> --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">File EPS</h5>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            The current link item
                        </a>
                        @foreach ($designs->where('kategori', 'EPS') as $paths)
                            <a href="#"
                                class="list-group-item list-group-item-action">{{ Str::remove('storage/' . $klien->hp . '/', $paths->path) }}</a>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="fs-5 fw-bold mb-1">Data</h2>
                    <p>Jumlah Orderan yang sudah pernah dibuat dan masuk.</p>
                    <div class="d-block">
                        <div class="d-flex align-items-center me-5">
                            <div class="icon-shape icon-sm icon-shape-danger rounded me-3"><svg fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z"
                                        clip-rule="evenodd"></path>
                                </svg></div>
                            <div class="d-block"><label class="mb-0">Order</label>
                                <h4 class="mb-0">{{ $jumlahinv }} INV</h4>
                            </div>
                        </div>
                        <div class="d-flex align-items-center pt-3">
                            <div class="icon-shape icon-sm icon-shape-purple rounded me-3"><svg fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                                    </path>
                                </svg></div>
                            <div class="d-block"><label class="mb-0">Tercetak</label>
                                <h4 class="mb-0">{{ $jumlahqty }} pcs</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editKlien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('klien.update', $klien->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKlien">Edit Klien</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="email2">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $klien->nama }}"
                                placeholder="Tulis Nama">
                        </div>
                        <div class="form-group">
                            <label for="email2">No Whatsapp</label>
                            <input type="text" class="form-control" name="hp" value="{{ $klien->hp }}"
                                placeholder="08xx" readonly>
                        </div>
                        <div class="form-group">
                            <label for="comment">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="5">{{ $klien->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
