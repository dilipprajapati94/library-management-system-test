<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>

<h2>Add New Book</h2>

<a href="/books">Back</a>

<form method="POST" action="/books">
@csrf

<input name="title" placeholder="Title"><br><br>
<input name="author" placeholder="Author"><br><br>
<input name="genre" placeholder="Genre"><br><br>
<input name="isbn" placeholder="ISBN"><br><br>
<input type="date" name="published_at" value="{{ old('published_at') }}"><br><br>
<input type="number" name="copies_total" placeholder="Total Copies"><br><br>

<button>Add Book</button>
</form>

@if($errors->any())
<div style="color:red;border:1px solid red;padding:10px;margin-bottom:15px; margin-top:15px;" >
  <ul>
    @foreach($errors->all() as $e)
      <li>{{ $e }}</li>
    @endforeach
  </ul>
</div>
@endif


</body>
</html>
