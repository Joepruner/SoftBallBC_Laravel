@extends('layouts.app')

@section('content')
<h1>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}'s account </h1>
<div>
<h2>

</h2>


<a href="{{ route('users.edit', Auth::user()) }}">
    Update account information
</a></br>

<a href="{{ route('users.show', Auth::user()) }}">
    View and edit users
</a>

{{--  <div class='body'>
 <pre>{{ Auth::user() }}</pre>
</div>  --}}

    {{--  @empty
    <p>There are no users to display!</p>  --}}
</div>
@stop