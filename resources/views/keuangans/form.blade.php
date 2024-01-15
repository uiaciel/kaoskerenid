<form action="{{ route('keuangan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="date" class="form-control" placeholder=""
            aria-describedby="helpId">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nominal</label>
        <input type="text" name="nominal" id="" class="form-control" placeholder=""
            aria-describedby="helpId">
        <small id="helpId" class="text-muted">Ketik Angka saja</small>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Jenis</label>
        <select class="form-control" name="jenis" id="">
            <option>Pengeluaran</option>
            <option>Pemasukan</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Kategori</label>
        <select class="form-control" name="kategori" id="">
            <option value="Saldo Awal">Saldo Awal</option>
            <option value="orderan">Orderan</option>
            <option value="ongkos cetak">Ongkos Cetak</option>
            <option value="Ongkos Kirim">Ongkos Kirim</option>
            <option value="Makan Cemilan">Makan</option>
            <option value="Hosting Web">Hosting Web</option>
            <option value="Listrik">Listrik</option>
            <option value="Internet">Internet</option>
            <option value="Tagihan Pascabayar">Tagihan Pascabayar</option>
            <option value="Penjualan Konter">Penjualan Konter</option>
            <option value="Belanja Bahan">Belanja Bahan</option>
            <option value="Belanja Sablon">Belanja Sablon</option>
            <option value="Hutang">Hutang</option>
            <option value="Gaji">Gaji</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>
    <input type="text" name="order_id" id="" class="form-control" placeholder=""
            aria-describedby="helpId" hidden>
    <div class="mb-3">
        <label for="" class="form-label">Metode</label>
        <select class="form-control" name="metode" id="">
            <option>Transfer</option>
            <option>Tunai</option>
        </select>
    </div>
    <div class="mb-3">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Detail</label>
            <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
