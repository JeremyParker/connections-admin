<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connections Admin Portal</title>
</head>
<body>
@auth
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
        <h2>Connections Admin</h2>
        <div style="border: 3px solid black;">
            <a href="/words">words</a>
        </div>
        <div style="border: 3px solid black;">
            <a href="/categories">categories</a>
        </div>
@else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Log in</button>
        </form>
@endauth
</body>
</html>
