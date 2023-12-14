@extends('layouts.app')

@section('content')
<h1>Users List</h1>

@if($users->count() > 0)
<ul class="list-group">
    @foreach($users as $user)
    <li class="list-group-item">
        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
    </li>
    @endforeach
</ul>
@else
<div class="alert alert-info" role="alert">
    No users found to show.
</div>
@endif
@endsection