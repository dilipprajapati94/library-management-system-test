<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>

<h2>Books List</h2>
<a href="/my-borrows">My Borrow History</a> | 
<a href="/books/create">Add Book</a> | 
<form method="POST" action="/logout" style="display:inline">@csrf<button>Logout</button></form>

<hr>


@if(session('success'))
<div style="color:green">{{ session('success') }}</div>
@endif

@if($errors->any())
<div style="color:red">
@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
</div>
<hr>
@endif
@foreach($books as $b)
  <div style="border:1px solid #ccc;padding:10px;margin-bottom:10px;">
    <b>{{ $b->title }}</b> by {{ $b->author }} ({{ $b->genre }})  
    <br>ISBN: {{ $b->isbn }}  
    <br>Available: {{ $b->copies_available }} / {{ $b->copies_total }}

    <form method="POST" action="/borrow">@csrf
      <input type="hidden" name="book_id" value="{{ $b->id }}">
      <button>Borrow</button>
    </form>
  </div>
@endforeach

{{ $books->links() }}

</body>
</html>
