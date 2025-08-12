@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Book List</h1>

        {{-- Form Search --}}
        <form action="{{ route('books.index') }}" method="GET" class="mb-4 row g-2">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ $search }}" class="form-control"
                       placeholder="Search">
            </div>
            <div class="col-md-2">
                <select name="per_page" class="form-select">
                    @foreach(range(10, 100, 10) as $size)
                        <option value="{{$size}}" {{ $perPage == $size ? 'selected' : '' }}>
                            {{$size}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        {{-- Table --}}
        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Average Voter</th>
                <th>Voter</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name ?? '-' }}</td>
                    <td>{{ $book->category->name ?? '-' }}</td>
                    <td>{{ number_format($book->ratings_avg_rating, 2) ?? '0.00' }}</td>
                    <td>{{ $book->ratings_count ?? 0 }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data buku</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $books->links() }}
        </div>
    </div>
@endsection
