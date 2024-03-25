@auth
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Words</title>
</head>
<body>
    @if(session('success'))
        <div style="background-color: lightgreen;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div style="background-color: lightgreen;">
            {{ session('error') }}
        </div>
    @endif
    <a href='/'><button>Home</button></a>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>
    <div style="border: 3px solid black;">
        <h2>add a word</h2>
        <form action="/words" method="POST">
            @csrf
            <input type="text" name="text" placeholder="New Word">
            <label for="isTopical">Is Topical:</label>
            <input type="checkbox" id="isTopical" name="isTopical" checked>
            <button>Save</button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>All words</h2>
        @foreach ($words as $word)
        <a href="/word/{{$word->id}}" style="text-decoration: none; color: inherit;">
            <div style="background-color: #CCCCCC; padding: 10px; margin: 10px; cursor: pointer;">
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
@else
    <script type="text/javascript">
        window.location = "/";
    </script>
@endauth
