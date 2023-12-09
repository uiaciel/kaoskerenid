 <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl      ">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Katalog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                        <div class="row g-3 mb-3">
                            <section style="background-color: #eee;">
                                <div class="container py-5">
                                    @foreach ($paket as $katalog)

                                  <div class="row justify-content-center mb-3">
                                    <div class="col-md-12 col-xl-10">
                                      <div class="card shadow-0 border rounded-3">
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                              <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                                <img src="{{ $katalog->image }}"
                                                  class="w-100" />
                                                <a href="#!">
                                                  <div class="hover-overlay">
                                                    <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                  </div>
                                                </a>
                                              </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                              <h5>{{ $katalog->nama }}</h5>

                                              <div class="mt-1 mb-0 text-muted small">
                                                <span class="fw-bold">Rincian</span>
                                                <ul>

                                                    @foreach ($katalog->katalogproduk as $katalogprod)

                                                    <li>{{ $katalogprod->produk->nama }} - Rp.
                                                        {{ $katalogprod->produk->harga }}</li>
                                                @endforeach



                                        </ul>


                                              </div>

                                            </div>
                                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                              <div class="d-flex flex-row align-items-center mb-1">
                                                <h4 class="mb-1 me-1">{{ $katalog->harga }}</h4>
                                                {{-- <span class="text-danger"><s>$20.99</s></span> --}}
                                              </div>
                                              <h6 class="text-success">{{$katalog->kategori}}</h6>
                                              <form action="{{ route('orderankatalog.store') }}" method="post">
                                                @csrf
                                                <input value="{{ $order->id }}" name="order_id" hidden>
                                                <input value="{{ $katalog->id }}" name="katalog_id" hidden>
                                              <div class="mb-3">
                                                <label for="" class="form-label">QTY</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    name="qty"
                                                    value="1"
                                                />

                                              </div>

                                              <div class="d-flex flex-column mt-4">
                                                <button class="btn btn-primary btn-sm" type="submit">Tambah</button>

                                              </div>
                                            </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                @endforeach

                                </div>
                              </section>



                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </div>
        </div>
    </div>
