<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connections Admin Portal</title>
</head>
<body>
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
</body>
</html>
