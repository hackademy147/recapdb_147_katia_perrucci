<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {
        $books = Book::orderBy('created_at', 'desc')->take(6)->get();
        return view('homepage', compact('books'));
    }
}
