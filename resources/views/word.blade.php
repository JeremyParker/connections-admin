<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Word</title>
</head>
<body>
    @if($errors->any())
        <div style="background-color: lightpink; color: black; padding: 10px; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  <h1>Edit Word</h1>
  <form action="/word/{{$word->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="text" placeholder="New Word" value="{{$word->text}}">
    <label for="isTopical">Is Topical:</label>
    <input type="checkbox" id="isTopical" name="isTopical" {{ $word->isTopical ? "checked" : "" }}>
    <button>Save</button>
  </form>
</body>
</html>
