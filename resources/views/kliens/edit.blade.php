@extends('layouts.app')
@section('title', $klien->nama . " - " . $klien->hp)
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="row row-card-no-pd">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-user text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-9 col-stats">
                                    <div class="numbers">
                                        <p class="card-category mb-1">Action</p>
                                        <form action="{{route('order.store')}}" method="POST" enctype="multipart/form-data"">
                                            @csrf
                                            <input type="text" name="klien_id" value="{{$klien->id}}" hidden>
                                            <button class="btn btn-info btn-border btn-sm"><span class="btn-label">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            Order</button>
                                        </form>
                                        <button class="btn btn-success btn-sm">Chat</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-3">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-chart-pie text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-9 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Order</p>
                                        <h4 class="card-title">{{$jumlahinv}} INV</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-3">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-chart-pie text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-9 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Status</p>
                                        <h4 class="card-title">Klien Baru</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-coins text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Tercetak</p>
                                        <h4 class="card-title">{{$jumlahqty}} pcs</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-with-nav">
                <div class="card-header">
                    <div class="row row-nav-line">
                        <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                            <li class="nav-item submenu"> <a class="nav-link" data-toggle="tab" href="#home"
                                    role="tab" aria-selected="false">History</a> </li>
                            <li class="nav-item submenu"> <a class="nav-link" data-toggle="tab" href="#profile"
                                    role="tab" aria-selected="true">File eps</a> </li>
                            <li class="nav-item submenu"> <a class="nav-link" data-toggle="tab" href="#contact"
                                    role="tab" aria-selected="false">Mockup</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Order Detail</th>
                                            <th>Total</th>

                                            <th>Mockup</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $index => $order )
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>
                                                {{$order->created_at}} <h4
                                                    class="text-dark font-weight-semibold mr-2 mb-0 no-wrap"><small><a
                                                            href="/order/{{$order->inv}}">#{{$order->inv}}</a></small></h4>
                                                <p class="mb-0"><span class="badge badge-dark">{{$order->qty}} pcs</span>
                                                    <span class="badge badge-info">Masuk DP</span>

                                                    <span class="badge badge-warning">Belum Ready</span>


                                                    <span class="badge badge-danger">KONFRIM</span>



                                                </p>
                                                <p>{!! $order->detail !!}
                                                </p>
                                                <p> </p>
                                            </td>
                                            <td>Rp.640.000</td>
                                            <td></td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <!--table responsive-->
                        </div>
                        <!--tab-panel-->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h3>Upload File Eps</h3>
                            <form action="https://web.kaoskeren.id/klien/display/upload" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="19xFel2pAkLKK6J4wf3Lu7ymG7ZRNwRmKIU1jXCM">
                                <input type="hidden" class="form-control" name="hp" value="081287843854">
                                <input type="hidden" class="form-control" name="order_id" value="">
                                <input type="hidden" class="form-control" name="klien_id" value="2671">
                                <input type="file" class="form-control-file" name="files[]" multiple="">
                                <button type="submit">Upload</button>
                            </form>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Location</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>


                            </div>

                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <h3>Upload Mockup Klien</h3>
                            <form action="https://web.kaoskeren.id/klien/display/upload" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="19xFel2pAkLKK6J4wf3Lu7ymG7ZRNwRmKIU1jXCM">
                                <input type="hidden" class="form-control" name="hp" value="081287843854">
                                <input type="hidden" class="form-control" name="order_id" value="">
                                <input type="hidden" class="form-control" name="klien_id" value="2671">
                                <input type="file" class="form-control-file" name="images[]" multiple="">
                                <button type="submit">Upload</button>
                            </form>

                            <div class="row image-gallery">


                                <a href="/storage/081287843854/image_2022-08-15_155100475.png" data-toggle="lightbox"
                                    class="col-6 col-md-3 mb-4">
                                    <img src="/storage/081287843854/image_2022-08-15_155100475.png" class="img-fluid">
                                </a>

                            </div>

                        </div>
                    </div>



                </div>
            </div>


        </div>


    </div>
@endsection
