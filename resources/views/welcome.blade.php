<!DOCTYPE html>
<html>
<head>
<title>Library Management System</title>
<style>
body{font-family:Arial, sans-serif;}
nav{padding:15px; background:#f5f5f5;}
nav a{margin-right:15px; text-decoration:none;}
.container{padding:40px;}
</style>
</head>
<body>
<nav>
@auth
<a href="/books">Books</a>
<form method="POST" action="/logout" style="display:inline">@csrf<button>Logout</button></form>
@else
<a href="/login">Login</a>
<a href="/register">Register</a>
@endauth
</nav>


<div class="container">
<h1>Welcome to Library Management System</h1>
<p>Please login or register to continue.</p>
</div>
</body>
</html>