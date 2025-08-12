<?php

namespace App\Service;

use App\Models\Book;

class BookService
{

    public function getBooks($perPage = 10, $search = null)
    {
        $query = Book::with(['author', 'category'])
            ->withAvg('ratings', 'rating')
            ->withCount('ratings');

        if ($search) {
            $query->where('books.title', 'like', "%{$search}%")
                ->orWhereRelation('author', 'name', 'like', "%{$search}%");
        }

        return $query->orderByDesc('ratings_avg_rating')
            ->paginate($perPage)
            ->withQueryString();
    }
}
