<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'book_name' => $this->book_name,
            'book_author' => $this->book_author,
            'book_price' => $this->book_price,
            'book_description' => $this->book_description,
            'book_language' => $this->book_language,
            'book_publisher_date' => $this->book_publisher_date,
            'book_publisher' => new PublisherResource($this->publisher),
            'book_image' => $this->book_image,
            'book_page_count'=> $this->book_page_count,
            'book_reading_age'=> $this->book_reading_age,
            'book_dimensions'=> $this->book_dimensions,
        ];
    }
}
