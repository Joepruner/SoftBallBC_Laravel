@extends('layouts.app')

@section('content')
<h1>View and edit users</h1>
<div class="container">
    <table class="table table-hover">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Admin Level</th>
                </tr>
            </thead>
    @forelse ($users as $user)
        @if($user == Auth::user()){
            @continue
        }
        @endif

        <tbody>

            <tr>
                <td>
                <a href="{{ route('users.edit', $user->id) }}">
                     Edit user
                </a>
                </td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->admin_level }}</td>
            </tr>
        </tbody>
    <h2>

    </h2>


{{-- <div class='body'>
 <pre>{{ $user }}</pre>
</div> --}}

    @empty
    <p>There are no users to display!</p>
    @endforelse
    </table>
</div>
@stop