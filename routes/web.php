<?php

use App\Events\TestEvent;
use App\Http\Controllers\BookController;
use App\Livewire\BookList;
use App\Livewire\CreateBook;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Log::info('ion conected');
    return view('frontend.home');
})->name('home');

Route::get('/books', [BookController::class, 'index'])->name('books');

Route::get('test', function () {
    event(new TestEvent());
    return 'done';
});
