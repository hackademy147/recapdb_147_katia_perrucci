<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use App\Models\Editor;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', only: ['create', 'edit'])
        ];    
    }

    public function create(){
        $editors = Editor::all();
        $categories = Category::all();
        return view('book.create', compact('editors', 'categories'));
    }

    public function store(BookRequest $request){

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'plot' => $request->plot,

            //! recupero dalla request il file con name cover, lo salvo con il metodo store() nella cartella public e nella sotto-cartella covers con nome una stringa hashata generata da Laravel
            //'cover' => $request->file('cover')->store('public/covers'),

            //! recupero dalla request il file con name cover, lo salvo con il metodo storeAs() nella cartella public e nella sotto-cartella covers con nome il titolo del libro concatenato con un punto e con il metodo getClientOriginalExtension() che mi permette di prendere l'estensione del file originale
            //'cover' => $request->file('cover')->storeAs('public/covers', $request->title . '.' . $request->file('cover')->getClientOriginalExtension()),

            //! recupero dalla request il file con name cover, lo salvo con il metodo storeAs() nella cartella public e nella sotto-cartella covers con nome il nome del file originale che viene caricato tramite il metodo getClientOriginalName()
            'cover' => $request->file('cover')->storeAs('public/covers',  $request->file('cover')->getClientOriginalName()),
            'user_id' => Auth::id(),
            'editor_id' => $request->editor_id
        ]);
        $book->categories()->attach($request->categories);
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
        $editors = Editor::all();
        $categories = Category::all();
        return view('book.edit', compact('book', 'editors', 'categories'));
    }

    public function update(Book $book, UpdateBookRequest $request){
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'plot' => $request->plot,
            'cover' => $request->file('cover') ? $request->file('cover')->store('public/covers') : $book->cover,
            'editor_id' => $request->editor_id
        ]);
        /* $book->categories()->detach();
        $book->categories()->attach($request->categories); */

        $book->categories()->sync($request->categories);

        return redirect(route('home'))->with('success', 'Libro modificato con successo');
    }

    public function destroy(Book $book){
        $book->categories()->detach();
        $book->delete();
        return redirect(route('home'))->with('success', 'Libro cancellato con successo');
    }
}