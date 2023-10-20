<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use LDAP\Result;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('index', ['books' => $books]);
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        // dd($request);
        $data = $request->validate([
            'title' => 'required',
            'edition' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'publisher' => 'required',
            'description' => 'nullable'
        ]);
        
        $addedBook = Book::create($data);
        
        return redirect(route('book.index'))->with('success', 'Item added successfully');
    }

    public function edit(Book $books) {
        // dd($book);
        $books = DB::table('books')
                ->where('books.title', 'qweq')
                ->get();

        return view('edit', ['books' => $books]);
    }
    
    public function update(Book $book, Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'publisher' => 'required',
            'description' => 'nullable',
            'edition' => 'nullable'
        ]);

        $book->update($data);

        return redirect(route('book.index'))->with('success', 'Update successful');
    }
    
    public function destroy(Book $book) {
        $book->delete();
        return redirect(route('book.index'))->with('success', 'Item removed successfully');
    }
}
