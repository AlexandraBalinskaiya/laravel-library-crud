<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Support\BookStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(private BookStore $books)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->books->all());
    }

    public function show(int $book): JsonResponse
    {
        $found = $this->books->find($book);

        return $found
            ? response()->json($found)
            : response()->json(['message' => 'Book not found'], 404);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'year' => ['nullable', 'integer'],
            'genre' => ['nullable', 'string', 'max:255'],
            'isbn' => ['nullable', 'string', 'max:255'],
        ]);

        return response()->json($this->books->create($data), 201);
    }

    public function update(Request $request, int $book): JsonResponse
    {
        $data = $request->validate([
            'title' => ['sometimes', 'string', 'max:255'],
            'author' => ['sometimes', 'string', 'max:255'],
            'year' => ['nullable', 'integer'],
            'genre' => ['nullable', 'string', 'max:255'],
            'isbn' => ['nullable', 'string', 'max:255'],
            'is_active' => ['sometimes', 'boolean'],
            'condition_note' => ['nullable', 'string', 'max:1000'],
        ]);

        $updated = $this->books->update($book, $data);

        return $updated
            ? response()->json($updated)
            : response()->json(['message' => 'Book not found'], 404);
    }

    public function destroy(int $book): JsonResponse
    {
        return $this->books->delete($book)
            ? response()->json(null, 204)
            : response()->json(['message' => 'Book not found'], 404);
    }
}
