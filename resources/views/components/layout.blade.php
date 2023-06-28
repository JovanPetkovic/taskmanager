<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}"/>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
{{--    @if(auth()->check())--}}
{{--        <p>Welcome, {{auth()->user()->name}}</p>--}}
{{--        <form method="POST" action="/logout">--}}
{{--            @csrf--}}
{{--            <button type="submit">Logout</button>--}}
{{--        </form>--}}
{{--    @endif--}}
    @if(auth()->check())
        <div class="container mt-4">
            <div class="row justify-content-end align-items-center">
                <div class="col-auto">
                    <p class="mb-0">Welcome, {{auth()->user()->name}}</p>
                </div>
                <div class="col-auto">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @yield('content')

</body>
</html>
