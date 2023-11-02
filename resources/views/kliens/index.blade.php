@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-9 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">List Klien</h2>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="users-table">
                            <thead class="thead-dark text-white">
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
        </div>
        <div class="col-lg-3 mb-7">
            @include('kliens.create')
        </div>
    </div>
@endsection
