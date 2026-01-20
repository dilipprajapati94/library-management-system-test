<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $r)
    {
        $books = Book::query()
            ->when($r->title, fn($q) => $q->where('title', 'like', '%' . $r->title . '%'))
            ->when($r->author, fn($q) => $q->where('author', 'like', '%' . $r->author . '%'))
            ->when($r->genre, fn($q) => $q->where('genre', $r->genre))
            ->paginate(15);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $this->authorize('create', Book::class);
        return view('books.create');
    }

    public function store(BookRequest $r)
    {
        $this->authorize('create', Book::class);
        $d = $r->validated();
        $d['copies_available'] = $d['copies_total'];
        // dd($r->all());
        Book::create($d);
        return redirect('/books');
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        return view('books.edit', compact('book'));
    }

    public function update(BookRequest $r, Book $book)
    {
        $this->authorize('update', $book);
        $book->update($r->validated());
        return redirect('/books');
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        $book->delete();
        return back();
    }
}
