@extends('layouts.app')

@section('content')
    <div class="row">
        <h2 class="text-white">Random Mockup</h2>


        @forelse ($designs as $image)
            <div class="col-md-3">
                <div class="card mb-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#mockup-{{ $image->id }}"><img
                            src="{{ $image->path }}" class="card-img-top" alt="..." loading="lazy"></a>

                    <div class="card-body">
                        {{-- <h5 class="card-title">Card title</h5> --}}
                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p> --}}

                    </div>
                </div>
                <div class="modal fade" id="mockup-{{ $image->id }}" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">MOCKUP</h5>


                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ $image->path }}" class="img-fluid" loading="lazy" />

                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('design.destroy', $image->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h3>Data Kosong</h3>
        @endforelse


    </div>
    {{ $designs->links() }}
@endsection
