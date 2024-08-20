<?php

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
