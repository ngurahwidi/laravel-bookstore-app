@extends('layouts.app')

@section('content')
    <h1>Top 10 Most Famous Author</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Author</th>
            <th>Voter</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{ $author->name }}</td>
                <td>{{ $author->voter_count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
