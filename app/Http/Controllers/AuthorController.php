<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Service\AuthorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function getAuthors()
    {
        $authors = $this->authorService->getTopAuthors();
        return view('authors.authors', compact('authors'));
    }
}
