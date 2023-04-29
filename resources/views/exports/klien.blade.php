@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kliens as $klien)
                        <tr>
                            <td>{{ $klien->nama }}</td>
                            <td>{{ $klien->hp }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
