<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}"/>
    <title>Document</title>
</head>
<body>
    @if(auth()->check())
        <p>Welcome, {{auth()->user()->name}}</p>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="/login">Login</a>
    @endif
    @yield('content')

</body>
</html>
