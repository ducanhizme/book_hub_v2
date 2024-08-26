<?php

namespace App\Service;

use App\Exceptions\BookException;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookService
{
    /**
     * Create a new book.
     *
     * @param array $data
     * @return Book
     * @throws BookException
     */
    public function create(array $data): Book
    {
        try {
            return Book::create($data);
        } catch (\Exception $e) {
            throw new BookException('Cannot create book right now', 500);
        }
    }

    /**
     * Update an existing book.
     *
     * @param int $id
     * @param array $data
     * @return bool
     * @throws BookException
     */
    public function update(int $id, array $data): bool
    {
        try {
            $book = $this->getBookById($id);
            return $book->update($data);
        } catch (BookException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new BookException('Cannot update book right now', 500);
        }
    }

    /**
     * Delete a book by ID.
     *
     * @param int $id
     * @return bool
     * @throws BookException
     */
    public function delete(int $id): bool
    {
        try {
            $book = $this->getBookById($id);
            return $book->delete();
        } catch (BookException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new BookException('Cannot delete book right now', 500);
        }
    }

    /**
     * Get all books.
     *
     * @return Collection
     * @throws BookException
     */
    public function getAllBooks(): Collection
    {
        try {
            return Book::all();
        } catch (\Exception $e) {
            throw new BookException('Cannot get books right now', 500);
        }
    }

    /**
     * Get a book by ID.
     *
     * @param int $id
     * @return Book
     * @throws BookException
     */
    public function getBookById(int $id): Book
    {
        try {
            return Book::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw new BookException('Book not found', 404);
        } catch (\Exception $e) {
            throw new BookException('Cannot get book right now', 500);
        }
    }
}
