@extends('components.layout')
@section('content')
{{--<form method="POST" action="/register">--}}
{{--    @csrf--}}
{{--    <div>--}}
{{--        <label for="name">Name:</label>--}}
{{--        <input type="text" name="name" id="name" required>--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <label for="email">Email:</label>--}}
{{--        <input type="email" name="email" id="email" required>--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <label for="password">Password:</label>--}}
{{--        <input type="password" name="password" id="password" required>--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <label for="password_confirmation">Confirm Password:</label>--}}
{{--        <input type="password" name="password_confirmation" id="password_confirmation" required>--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <input type="submit" value="Register">--}}
{{--    </div>--}}
{{--</form>--}}
<form method="POST" action="/register" class="w-25 mx-auto mt-5 bg-opacity-10 bg-black p-xl-4 rounded-5">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>
    <div class="mx-auto w-25">
        <input type="submit" value="Register" class="btn btn-primary">
    </div>
</form>

@endsection
