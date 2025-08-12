<!DOCTYPE html>
<html>
<head>
    <title>Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('books.index') }}">Bookstore</a>
        <div>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Books</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('authors.top') }}">Top Authors</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('ratings.create') }}">Input Rating</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div id="success-alert" class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    setTimeout(() => {
        let alert = document.getElementById('success-alert')
        if (alert) {
            alert.style.display = 'none'
        }
    }, 3000)
</script>
@stack('scripts')
</body>
</html>
