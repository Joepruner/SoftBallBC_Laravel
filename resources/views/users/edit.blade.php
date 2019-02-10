@extends('layouts.app')

@section('content')

<div class='col-md-6 col-md-offset-3'>
    <h1>
        Edit user
    </h1>

    <hr>

    {!! Form::model($user, ['method' => 'PATCH', 'action' =>
    ['UserController@update', $user->id]]) !!}
    @include('users.form', ['submitButtonText' => 'Edit User'])
    {!! Form::close() !!}
</div>
@stop