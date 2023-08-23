@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('klien.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header bg-primary text-white p-2">
            KLIEN BARU
        </div>
        <div class="card-body">

            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="nama" placeholder="Tulis Nama">
                <label for="email2">Nama</label>
            </div>
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="hp" placeholder="08xx">
                <label for="email2">No Whatsapp</label>
            </div>
            <div class="form-floating mb-3">

                <textarea class="form-control" name="alamat" id="comment" style="height: 100px"></textarea>
                <label for="comment">Alamat</label>
            </div>
            <div class="form-check" hidden>
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="order" value="1">
                    <span class="form-check-sign">Langsung buat Orderan</span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
