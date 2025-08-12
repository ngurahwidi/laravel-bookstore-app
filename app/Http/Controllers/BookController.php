<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Service\BookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

        $books = $this->bookService->getBooks($perPage, $search);

        return view('books.index', compact('books', 'perPage', 'search'));
    }
}
