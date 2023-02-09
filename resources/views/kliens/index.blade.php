@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">List Klien</h2>
                        </div>
                        <div class="col text-end"><a href="#" class="btn btn-sm btn-primary">See all</a></div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Hp</th>

                                <th>Action</th>

                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            @include('kliens.create')
        </div>
    </div>
@endsection
