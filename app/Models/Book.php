<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable =
        [
            'book_name',
            'book_author',
            'book_price',
            'book_description',
            'book_language',
            'book_publisher_date',
            'book_publisher_id',
            'book_image',
            'book_page_count',
            'book_reading_age',
            'book_dimensions',
        ];

    public function publisher():BelongsTo
    {
        return $this->belongsTo(Publisher::class,'book_publisher_id');
    }

    public function categories():BelongsToMany{
        return $this->belongsToMany(Category::class);
    }

}
