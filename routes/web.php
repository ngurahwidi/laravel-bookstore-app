<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\BookController::class, 'index'])->name('books.index');

Route::get('/authors/top', [\App\Http\Controllers\AuthorController::class, 'getAuthors'])->name('authors.top');

Route::get('/ratings/create', [\App\Http\Controllers\RatingController::class, 'create'])->name('ratings.create');
Route::post('/ratings', [\App\Http\Controllers\RatingController::class, 'store'])->name('ratings.store');
