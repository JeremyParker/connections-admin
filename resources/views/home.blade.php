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
            <h2>add a word</h2>
            <form action="/create-word" method="POST">
                @csrf
                <input type="text" name="text" placeholder="New Word">
                <label for="isTopical">Is Topical:</label>
                <input type="checkbox" id="isTopical" name="isTopical" checked>
                <button>Save</button>
            </form>
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
        <div style="border: 3px solid black;">
            <h2>All words</h2>
            @foreach ($words as $word)
                <div style="background-color: #CCCCCC; padding: 10px; margin: 10px;">
                    {{$word['text']}}
                    {{-- <form action="/delete-word/{{$word->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form> --}}
                </div>
            @endforeach

        </div>
</body>
</html>
