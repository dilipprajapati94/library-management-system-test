<form method="POST" action="/register">@csrf
    <input name="name" placeholder="Name">
    <input name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password_confirmation" placeholder="Confirm">
    <select name="role">
        <option>user</option>
        <option>librarian</option>
    </select>
    <button>Register</button>
</form>