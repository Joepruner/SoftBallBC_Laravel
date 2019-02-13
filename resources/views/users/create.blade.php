@extends('layouts.app')

@section('content')
<div class='col-md-6 col-md-offset-3'>
    <h1>
        Add New User
    </h1>

    <hr>

    {!! Form::open(['action' => 'UserController@store']) !!}
        @include('users.form', ['submitButtonText' => 'Add User'])
    {!! Form::close() !!}

</div>
@stop