<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
       return view('frontend.books.index');
    }
}
