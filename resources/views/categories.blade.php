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
        <div style="border: 3px solid black;">
            <h2>add a category</h2>
            <form action="/create-category" method="POST">
                @csrf
                <input type="text" name="name" placeholder="New Category">
                <textarea name="notes" rows="3" placeholder="Add any necessary explanation for other admins here." style="width: 100%;"></textarea>
                <button>Save</button>
            </form>
        </div>
@else
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Log in</button>
        </form>
@endauth
        <div style="border: 3px solid black;">
            <h2>All categories</h2>
            @foreach ($categories as $category)
                <div style="background-color: #CCCCCC; padding: 10px; margin: 10px;">
                    <h3>{{$category['name']}}</h3>
                        <div style="font-size: smaller;">{{$category['notes']}}</div>
                </div>
            @endforeach
        </div>
</body>
</html>
