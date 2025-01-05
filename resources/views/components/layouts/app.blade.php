@auth
<html lang="en">
<head>
  @livewireStyles
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Connections Admin Portal</title>
</head>
<body>
    @if(session('success'))
        <div style="background-color: lightgreen;">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div style="background-color: lightpink; color: black; padding: 10px; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <nav>
        <a href='/'><button>Home</button></a>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
    </nav>
    {{ $slot }}
    @livewireScripts
    </body>
</html>
@else
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
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Log in</button>
        </form>
        @livewireScripts
    </body>
    </html>
@endauth
