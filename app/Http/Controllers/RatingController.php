<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Models\Author;
use App\Service\RatingService;

class RatingController extends Controller
{
    public function create()
    {
        $authors = Author::orderBy('name')->get();
        return view('ratings.create', compact('authors'));
    }

    public function store(StoreRatingRequest $request)
    {
        $ratingService = new RatingService();
        $ratingService->store($request);
        return redirect()->route('books.index')->with('success', 'Rating successfully saved');
    }
}
