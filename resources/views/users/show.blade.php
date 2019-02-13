@extends('layouts.app')

@section('content')
<h1>
    {{ $user->name }}
</h1>

<div class='body'>

    <pre>{{ $user }}</pre>

</div>
@stop