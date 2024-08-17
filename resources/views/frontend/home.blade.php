@extends('layouts.app')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Album example</h1>
                <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the
                    creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.
                </p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </div>
    </section>
    <hr>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach (\App\Models\Book::all() as $book)
                    <div class="col">
                        <div class="card shadow-blue h-100" data-toggle="modal"
                        data-target=".bd-example-modal-xl_{{ $book->id }}">
                            <img src="{{ isset($book->image) ? asset('storage/' . $book->image) : asset('assets/img/default_cover.jpg') }}"
                                alt="{{ $book->title }}" class="card-img-top" style="object-fit: contain; height: 255px;">
                            <div class="card-body">
                                <p class="card-text text-dark">{{ $book->title }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal"
                                            data-target=".bd-example-modal-xl_{{ $book->id }}">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-body-secondary">{{ $book->author }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-xl_{{ $book->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div> <b>Book name:</b> {{ $book->title }} </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <strong>Author:</strong>
                                                <span> {{ $book->author }} </span>
                                            </div>
                                            <div class="mb-3">
                                                <strong>Description:</strong>
                                                <div class="border p-2">{{ $book->description }}</div>
                                            </div>
                                            <div class="mb-3">
                                                <strong>Created At:</strong>
                                                <span>{{ $book->created_at }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <strong>Image:</strong>
                                                <div>
                                                    @if ($book->image)
                                                        <img src="{{ asset('storage/' . $book->image) }}"
                                                            alt="{{ $book->title }}" style="max-width: 200px;">
                                                    @else
                                                        <p>No image available.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <strong>Pages:</strong>
                                                <span>{{ $book->pages }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <strong>Price:</strong>
                                                <span>{{ $book->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
