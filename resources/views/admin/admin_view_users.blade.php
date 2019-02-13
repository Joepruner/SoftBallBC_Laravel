@extends('layouts.app')

@section('content')
<h1>View and edit users</h1>
<div>
    {{--  <a href="{{ route('users.create') }}">
        Create User
    </a>  --}}
    @forelse ($users as $user)
        @if($user == Auth::user()){
            @continue
        }
        @endif
    <h2>
            {{ $user->first_name }} {{ $user->last_name }}</br>
            {{ $user->email }}</br>
            Admin level: {{ $user->admin_level }}
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