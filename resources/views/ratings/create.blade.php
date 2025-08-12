@extends('layouts.app')

@section('content')
    <h1>Insert Rating</h1>
    <form method="POST" action="{{ route('ratings.store') }}">
        @csrf
        <div class="mb-3">
            <label for="author_id" class="form-label">Author</label>
            <select name="author_id" id="author_id" class="form-select" required>
                <option value="">-- Choose Author --</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select name="book_id" id="book_id" class="form-select" required>
                <option value="">-- Choose Book --</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select name="rating" id="rating" class="form-select" required>
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection

@push('scripts')
    <script>
        $('#author_id').change(function () {
            var authorId = $(this).val();
            if (authorId) {
                $.get('/api/books/by-author/' + authorId, function (data) {
                    var bookSelect = $('#book_id');
                    bookSelect.empty();
                    bookSelect.append('<option value="">-- Choose Book --</option>');
                    data.forEach(function (book) {
                        bookSelect.append('<option value="' + book.id + '">' + book.title + '</option>');
                    });
                });
            }
        });
    </script>
@endpush
