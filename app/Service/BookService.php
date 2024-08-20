<?php

namespace App\Service;
use App\Http\Resources\Collection\BookCollection;
use App\Models\Book;
use Ramsey\Collection\Collection;

class BookService
{
    public function create(array $json) :Book
    {
         return Book::create($json);
    }

    public function update(Book $book, array $json):bool
    {
       return $book->update($json);
    }

    public function delete(Book $book):bool {
        return $book->delete();
    }

    public function getAllBooks() : \Illuminate\Database\Eloquent\Collection
    {
        return Book::all();
    }

    public function getBookById(int $id): Book
    {
        return Book::findOrFail($id);
    }
}
