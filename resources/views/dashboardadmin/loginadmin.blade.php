<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <form method="POST" action="{{ url('/loginadmin') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
        @if($errors->any())
            <div>
                <strong>{{ $errors->first() }}</strong>
            </div>
        @endif
    </form>
</body>
</html>
