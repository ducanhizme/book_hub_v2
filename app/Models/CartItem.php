<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['cart_id','book_id','quantity'];

    public $casts = [
        'cart_id' => 'int',
        'book_id' => 'int',
        'quantity' => 'int',
    ];

    public function cart() :BelongsTo{
        return $this->belongsTo(Cart::class);
    }

    public function book():BelongsTo{
        return $this->belongsTo(Book::class);
    }


}
