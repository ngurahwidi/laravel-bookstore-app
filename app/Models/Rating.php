<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /** @use HasFactory<\Database\Factories\RatingFactory> */
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'rating',
        'review',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
