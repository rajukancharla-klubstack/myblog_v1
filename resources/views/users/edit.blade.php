@extends('layouts.app')

@section('content')
<h1>Edit User</h1>

<form action="{{ route('users.update', $user->id) }}" method="post">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
    <br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
    <br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>

    <button type="submit">Update User</button>
</form>
@endsection