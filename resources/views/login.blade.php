@extends('components.layout')
@section('content')
    <form method="POST" action="/login">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
@endsection
