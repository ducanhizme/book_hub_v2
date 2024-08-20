<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['category_name'];

    public $casts = [
        'category_name' => 'string',
    ];

    public function books():BelongsToMany{
        return $this->belongsToMany(Book::class);
    }



}
