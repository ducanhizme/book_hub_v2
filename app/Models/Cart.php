<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable=['user_id','created_at'];

    public $casts = [
        'user_id' => 'int',
        'created_at' => 'datetime',
    ];

    public function user() :HasOne{
        return $this->hasOne(User::class);
    }

    public function cartItems():HasMany{
        return $this->hasMany(CartItem::class);
    }

    public function book():BelongsTo{
        return $this->belongsTo(Book::class);
    }
}
