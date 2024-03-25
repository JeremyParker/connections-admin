<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Cateoory</title>
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

  <h1>Edit Category</h1>
  <form action="/category/{{$category->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" placeholder="New Category" value="{{$category->name}}">
    <textarea name="notes" rows="3" placeholder="Add any necessary explanation for other admins here." style="width: 100%;">{{$category->notes}}</textarea>
    <button>Save</button>
  </form>
</body>
</html>
