<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Publisher extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable =['publisher_name','publisher_address','publisher_phone'];

    public $casts = [
        'publisher_name' => 'string',
        'publisher_address' => 'string',
        'publisher_phone' => 'string',
    ];

    public function books() : HasMany{
        return $this->hasMany(Book::class);
    }

}
