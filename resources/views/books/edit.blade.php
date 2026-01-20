<!DOCTYPE html>
<html>

<body>
    <h2>Edit Book</h2>
    <a href="/books">Back</a>
    <form method="POST" action="/books/{{ $book->id }}">@csrf @method('PUT')
        <input name="title" value="{{ $book->title }}"><br>
        <input name="author" value="{{ $book->author }}"><br>
        <input name="genre" value="{{ $book->genre }}"><br>
        <input name="isbn" value="{{ $book->isbn }}"><br>
        <input type="date" name="published_at" value="{{ $book->published_at }}"><br>
        <input type="number" name="copies_total" value="{{ $book->copies_total }}"><br>
        <button>Update</button>
    </form>
</body>

</html>