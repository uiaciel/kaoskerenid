@extends('layouts.app')
@section('title', 'List Orders')
@section('content')
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="table-responsive mt-4">
                    <table class="table" id="orders-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Inv</th>
                                <th>Status</th>
                                <th>QTY</th>
                                <th>Pembayaran</th>
                            </tr>
                        </thead>

                    </table>
                </div>

            </div>

        </div>

    </div>




@endsection
