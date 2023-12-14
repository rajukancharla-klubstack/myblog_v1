@extends('layouts.app')

@section('content')
<h1>User Details</h1>

@if($user)
<dl>
    <dt>Name:</dt>
    <dd>{{ $user->name }}</dd>

    <dt>Email:</dt>
    <dd>{{ $user->email }}</dd>

    {{-- Add more details as needed --}}
</dl>
@else
<p>User not found.</p>
@endif
@endsection