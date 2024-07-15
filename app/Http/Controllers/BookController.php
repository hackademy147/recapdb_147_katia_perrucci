<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    public function create(){
        return view('book.create');
    }

    public function store(BookRequest $request){

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'plot' => $request->plot,

            //! recupero dalla request il file con name cover, lo salvo con il metodo store() nella cartella public e nella sotto-cartella covers con nome una stringa hashata generata da Laravel
            //'cover' => $request->file('cover')->store('public/covers'),

            //! recupero dalla request il file con name cover, lo salvo con il metodo storeAs() nella cartella public e nella sotto-cartella covers con nome il titolo del libro concatenato con un punto e con il metodo getClientOriginalExtension() che mi permette di prendere l'estensione del file originale
            //'cover' => $request->file('cover')->storeAs('public/covers', $request->title . '.' . $request->file('cover')->getClientOriginalExtension()),

            //! recupero dalla request il file con name cover, lo salvo con il metodo storeAs() nella cartella public e nella sotto-cartella covers con nome il nome del file originale che viene caricato tramite il metodo getClientOriginalName()
            'cover' => $request->file('cover')->storeAs('public/covers',  $request->file('cover')->getClientOriginalName()),
        ]);
        return redirect(route('home'))->with('success', 'Libro inserito con successo');
    }

    public function index(){
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    public function show(Book $book){
        return view('book.show', compact('book'));
    }

    public function edit(Book $book){
        return view('book.edit', compact('book'));
    }

    public function update(Book $book, UpdateBookRequest $request){
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'plot' => $request->plot,
            'cover' => $request->file('cover') ? $request->file('cover')->store('public/covers') : $book->cover
        ]);
        return redirect(route('home'))->with('success', 'Libro modificato con successo');
    }

    public function destroy(Book $book){
        $book->delete();
        return redirect(route('home'))->with('success', 'Libro cancellato con successo');
    }
}