<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;

Route::get('/books/by-author/{author}', function ($authorId) {
    return Book::where('author_id', $authorId)->get(['id', 'title']);
});

