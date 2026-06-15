<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

class BookStore
{
    private const PATH = 'books.json';

    public function all(): array
    {
        return $this->read();
    }

    public function find(int $id): ?array
    {
        foreach ($this->read() as $book) {
            if ((int) $book['book_id'] === $id) {
                return $book;
            }
        }

        return null;
    }

    public function create(array $data): array
    {
        $books = $this->read();
        $ids = array_column($books, 'book_id');

        $book = [
            'book_id' => empty($ids) ? 1 : max($ids) + 1,
            'title' => $data['title'] ?? '',
            'author' => $data['author'] ?? '',
            'year' => isset($data['year']) ? (int) $data['year'] : null,
            'genre' => $data['genre'] ?? '',
            'isbn' => $data['isbn'] ?? '',
            'is_active' => isset($data['is_active']) ? (bool) $data['is_active'] : true,
            'condition_note' => $data['condition_note'] ?? '',
        ];

        $books[] = $book;
        $this->write($books);

        return $book;
    }

    public function update(int $id, array $data): ?array
    {
        $books = $this->read();

        foreach ($books as $index => $book) {
            if ((int) $book['book_id'] !== $id) {
                continue;
            }

            $books[$index] = array_merge($book, [
                'title' => $data['title'] ?? $book['title'],
                'author' => $data['author'] ?? $book['author'],
                'year' => array_key_exists('year', $data) ? (int) $data['year'] : $book['year'],
                'genre' => $data['genre'] ?? $book['genre'],
                'isbn' => $data['isbn'] ?? $book['isbn'],
                'is_active' => array_key_exists('is_active', $data) ? (bool) $data['is_active'] : $book['is_active'],
                'condition_note' => $data['condition_note'] ?? $book['condition_note'],
            ]);

            $this->write($books);

            return $books[$index];
        }

        return null;
    }

    public function delete(int $id): bool
    {
        $books = $this->read();
        $filtered = array_values(array_filter($books, fn (array $book) => (int) $book['book_id'] !== $id));

        if (count($books) === count($filtered)) {
            return false;
        }

        $this->write($filtered);

        return true;
    }

    private function read(): array
    {
        if (!Storage::disk('local')->exists(self::PATH)) {
            $this->write($this->defaults());
        }

        $books = json_decode(Storage::disk('local')->get(self::PATH), true);

        return is_array($books) ? $books : $this->defaults();
    }

    private function write(array $books): void
    {
        Storage::disk('local')->put(self::PATH, json_encode($books, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    private function defaults(): array
    {
        return [
            [
                'book_id' => 1,
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'year' => 2008,
                'genre' => 'Programming',
                'isbn' => '9780132350884',
                'is_active' => true,
                'condition_note' => 'Good condition',
            ],
            [
                'book_id' => 2,
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt, David Thomas',
                'year' => 1999,
                'genre' => 'Programming',
                'isbn' => '9780201616224',
                'is_active' => true,
                'condition_note' => 'Available',
            ],
        ];
    }
}
