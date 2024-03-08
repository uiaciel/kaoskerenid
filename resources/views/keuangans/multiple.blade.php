<!-- resources/views/keuangan/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container p-0">
        <div class="card">
            <div class="card-header fw-bold">
                PENGELUARAN
            </div>
            <div class="card-body">


              <form method="post" action="{{ route('keuangans.stores') }}">
                  @csrf
                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>  Simpan</button>

                </div>
                <div class="table-responsive mb-3">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Tanggal</th>
                                <th>Kategori</th>



                                <th>Metode</th>
                                <th>Nominal</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0; $i < 30; $i++) <!-- Sesuaikan dengan jumlah input yang diinginkan -->
                                <tr>
                                    <td><input type="date" name="tanggal[]"></td>
                                    <td>
                                        <select name="kategori[]">
                                          <option value="Belanja Bahan">Belanja Bahan</option>
                                          <option value="Belanja Sablon">Belanja Sablon</option>

                                            <option value="ongkos Cetak">Ongkos Cetak</option>
                                            <option value="Ongkos Kirim">Ongkos Kirim</option>
                                            <option value="Makan">Makan</option>
                                            <option value="Listrik">Listrik</option>
                                            <option value="Internet">Internet</option>
                                            <option value="Refund">Refund</option>
                                            <option value="Tagihan Pascabayar">Tagihan Pascabayar</option>
                                            <option value="Penjualan Konter">Penjualan Konter</option>

                                            <option value="Hosting Web">Hosting Web</option>
                                            <option value="Saldo Awal">Saldo Awal</option>
                                            <option value="orderan">Orderan</option>
                                            <option value="Hutang">Hutang</option>
                                            <option value="Gaji">Gaji</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        <select name="jenis[]" hidden>
                                          <option value="Pengeluaran">Pengeluaran</option>

                                      </select>
                                    </td>

                                    <td>
                                        <select name="metode[]" id="">
                                            <option>Transfer</option>
                                            <option>Tunai</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="nominal[]"></td>
                                    <td><input type="text" name="detail[]"></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
              </form>
          </div>
          </div>

    </div>
@endsection
