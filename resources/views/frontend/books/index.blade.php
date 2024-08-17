@extends('layouts.app')

@section('content')
    <div class="container my-4 shadow-blue p-3 mb-5 bg-white rounded">
        @livewire('create-book-btn')
        <hr>
        @livewire('book-list')

    </div>
@endsection
