@extends('layouts.app')

@section('content')
<h1>Users</h1>
<div>
    <a href="{{  route('users.create') }}">
        Create User
    </a>
    @forelse ($users as $user)
    <h2>
        <a href="{{ url('/users', $user->id ) }}">
            {{ $user->first_name }}
            {{ $user->last_name }}
        </a>
    </h2>
<a href="{{ route('users.edit', $user->id) }}">
    Edit user
</a>

<div class='body'>
 <pre>{{ $user }}</pre>
</div>

    @empty
    <p>There are no users to display!</p>
    @endforelse
</div>
@stop