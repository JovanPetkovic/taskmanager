
@extends('components.layout')
@section('content')
{{--    <form method="POST" action="/login">--}}
{{--        @csrf--}}
{{--        <div>--}}
{{--            <label for="email">Email:</label>--}}
{{--            <input type="email" name="email" id="email" required>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for="password">Password:</label>--}}
{{--            <input type="password" name="password" id="password" required>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <input type="submit" value="Login">--}}
{{--        </div>--}}
{{--        <a href="/register">Register</a>--}}
{{--    </form>--}}
    <form method="POST" action="/login" class="needs-validation w-25 mx-auto mt-5 bg-opacity-10 bg-black p-xl-4 rounded-5" novalidate>
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
            <div class="invalid-feedback">Please provide a valid email address.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
            <div class="invalid-feedback">Please provide a password.</div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <a href="/register">Register</a>
    </form>

@endsection
