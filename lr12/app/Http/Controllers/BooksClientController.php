<?php

namespace App\Http\Controllers;

use App\Support\BookStore;
use Illuminate\Http\Request;

class BooksClientController extends Controller
{
    public function __construct(private BookStore $books)
    {
    }

    public function index()
    {
        $books = $this->books->all();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $this->books->create($request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'year' => ['nullable', 'integer'],
            'genre' => ['nullable', 'string', 'max:255'],
            'isbn' => ['nullable', 'string', 'max:255'],
        ]));

        return redirect()->route('client.books.index');
    }

    public function edit($id)
    {
        $book = $this->books->find((int) $id);

        abort_if(!$book, 404);

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'year' => ['nullable', 'integer'],
            'genre' => ['nullable', 'string', 'max:255'],
            'is_active' => ['required', 'boolean'],
            'condition_note' => ['nullable', 'string', 'max:1000'],
        ]);

        abort_if(!$this->books->update((int) $id, $data), 404);

        return redirect()->route('client.books.index');
    }

    public function destroy($id)
    {
        abort_if(!$this->books->delete((int) $id), 404);

        return redirect()->route('client.books.index');
    }
}
