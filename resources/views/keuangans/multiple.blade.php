<!-- resources/views/keuangan/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Input Pengeluaran Sekaligus</h5>

              <form method="post" action="{{ route('keuangans.stores') }}">
                  @csrf
                  <div class="row">
                      <div class="col-md-12">
                          <table class="table">
                              <thead>
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
                                                  <option value="Makan Cemilan">Makan</option>
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
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                  </div>
              </form>
          </div>
          </div>

    </div>
@endsection
