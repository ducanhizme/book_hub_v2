<?php

namespace App\Http\Resources\Collection;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CartItemCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'book' => new BookCollection(Book::findOrFail($this->book_id)),
            'quantity' => $this->quantity,
        ];
    }
}
