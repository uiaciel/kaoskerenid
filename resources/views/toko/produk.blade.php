@extends('layouts.app')
@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('tambahproduk') }}">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Orderan</div>
                    <div class="card-body">
                        <div class="form-group mb-1">
                            <label>Paste disini</label>
                            <textarea class="form-control" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label>NO INVOICE</label>
                            <input type="number" name="inv" class="form-control" value="{{ $inv->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Pilih Klien</label>
                            <select class="form-control">
                                <option value="{{ $inv->klien->id }}">{{ $inv->klien->nama }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pilih Tipe</label>
                            <select class="form-control" name="tipe">
                                <option value="0">Sablon Plus</option>
                                <option value="1">SABLON AJA</option>
                            </select>
                        </div>

                        {{-- <hr />
                        <button type="submit" class="btn btn-block btn-danger">Buat</button>

                        <hr /> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Buat Invoice</h2>
                            </div>
                            <div class="col text-end"><button type="submit"
                                    class="btn btn-block btn-danger">Simpan</button></div>
                        </div>
                    </div>
                    <div class="table-repsonsive">
                        <span id="error"></span>
                        <table class="table table-sm table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 8px !important;">
                                        <select id="produk" name="produk[] "class="form-control">
                                        </select>
                                    </td>
                                    <td style="padding: 8px !important;"><input type="number" id="harga"
                                            class="form-control" readonly></td>
                                    <td style="padding: 8px !important;"><input type="number" id="qty"
                                            class="form-control" name="qty[]"></td>
                                    <td style="padding: 8px !important;"><input id="total" type="number" name="harga[]"
                                            class="form-control subtotal" readonly></td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px !important;">
                                        <select id="produk1" name="produk[] "class="form-control">
                                        </select>
                                    </td>
                                    <td style="padding: 8px !important;"><input type="number" id="harga1"
                                            class="form-control" readonly></td>
                                    <td style="padding: 8px !important;"><input type="number" id="qty1"
                                            class="form-control" name="qty[]"></td>
                                    <td style="padding: 8px !important;"><input id="total1" type="number" name="harga[]"
                                            class="form-control subtotal" readonly></td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px !important;">
                                        <select id="produk2" name="produk[] "class="form-control">
                                        </select>
                                    </td>
                                    <td style="padding: 8px !important;"><input type="number" id="harga2"
                                            class="form-control" readonly></td>
                                    <td style="padding: 8px !important;"><input type="number" id="qty2"
                                            class="form-control" name="qty[]"></td>
                                    <td style="padding: 8px !important;"><input id="total2" type="number" name="harga[]"
                                            class="form-control subtotal" readonly></td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px !important;">
                                        <select id="produk3" name="produk[] "class="form-control">
                                        </select>
                                    </td>
                                    <td style="padding: 8px !important;"><input type="number" id="harga3"
                                            class="form-control" readonly></td>
                                    <td style="padding: 8px !important;"><input type="number" id="qty3"
                                            class="form-control" name="qty[]"></td>
                                    <td style="padding: 8px !important;"><input id="total3" type="number"
                                            name="harga[]" class="form-control subtotal" readonly></td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px !important;">
                                        <select id="produk4" name="produk[] "class="form-control">
                                        </select>
                                    </td>
                                    <td style="padding: 8px !important;"><input type="number" id="harga4"
                                            class="form-control" readonly></td>
                                    <td style="padding: 8px !important;"><input type="number" id="qty4"
                                            class="form-control" name="qty[]"></td>
                                    <td style="padding: 8px !important;"><input id="total4" type="number"
                                            name="harga[]" class="form-control subtotal" readonly></td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px !important;">
                                        <select id="produk5" name="produk[] "class="form-control">
                                        </select>
                                    </td>
                                    <td style="padding: 8px !important;"><input type="number" id="harga5"
                                            class="form-control" readonly></td>
                                    <td style="padding: 8px !important;"><input type="number" id="qty5"
                                            class="form-control" name="qty[]"></td>
                                    <td style="padding: 8px !important;"><input id="total5" type="number"
                                            name="harga[]" class="form-control subtotal" readonly></td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px !important;">
                                        <select id="produk6" name="produk[] "class="form-control">
                                        </select>
                                    </td>
                                    <td style="padding: 8px !important;"><input type="number" id="harga6"
                                            class="form-control" readonly></td>
                                    <td style="padding: 8px !important;"><input type="number" id="qty6"
                                            class="form-control" name="qty[]"></td>
                                    <td style="padding: 8px !important;"><input id="total6" type="number"
                                            name="harga[]" class="form-control subtotal" readonly></td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px !important;">
                                        <select id="produk7" name="produk[] "class="form-control">
                                        </select>
                                    </td>
                                    <td style="padding: 8px !important;"><input type="number" id="harga7"
                                            class="form-control" readonly></td>
                                    <td style="padding: 8px !important;"><input type="number" id="qty7"
                                            class="form-control" name="qty[]"></td>
                                    <td style="padding: 8px !important;"><input id="total7" type="number"
                                            name="harga[]" class="form-control subtotal" readonly></td>
                                </tr>
                            </tbody>



                        </table>
                    </div>
                    <div class="card-body">
                        @if (session('flash_message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('flash_message') }}
                            </div>
                        @endif

                    </div>
                </div>
                <p></p>
            </div>
        </div>

    </form>
@endsection
