<div class="d-flex justify-content-between">
    <div class="input-group">
        <a href="{{ route('klien.show', $id) }}" role="button" class="btn btn-primary"><i
                class="bi bi-pencil-square"></i></a>
        <button type="button" class="btn btn-success"><i class="bi bi-printer"></i></button>

    </div>
    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <input name="klien_id" value="{{ $id }}" hidden>

        <button type="submit" class="btn btn-danger"><i class="bi bi-bag-check-fill"></i> Order</button>

    </form>
</div>
