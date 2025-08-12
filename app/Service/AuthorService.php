<?php

namespace App\Service;

use App\Models\Author;

class AuthorService
{
    public function getTopAuthors()
    {
        return Author::withCount(['books as voter_count' => function ($query) {
            $query->join('ratings', 'books.id', '=', 'ratings.book_id')
                ->where('ratings.rating', '>', 5);
        }])
            ->orderByDesc('voter_count')
            ->limit(10)
            ->get();
    }
}
