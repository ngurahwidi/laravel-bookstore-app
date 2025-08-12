<?php

namespace App\Service;

use App\Models\Rating;

class RatingService
{
    public function store($data)
    {
        return Rating::create([
            'book_id' => $data['book_id'],
            'rating' => $data['rating'],
        ]);
    }
}
