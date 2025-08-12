<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use App\Service\RatingService;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    protected $ratingService;

    public function __construct(RatingService $ratingService)
    {
        $this->ratingService = $ratingService;
    }

    public function create()
    {
        $authors = Author::orderBy('name')->get();
        return view('ratings.create', compact('authors'));
    }

    public function store(StoreRatingRequest $request)
    {
        $this->ratingService->store($request);
        return redirect()->route('books.index')->with('success', 'Rating successfully saved');
    }
}
