@extends('layouts.app')

@section('content')

<div class='col-md-6 col-md-offset-3'>
    <h1>
        Update your account information
    </h1>

    <hr>

    {!! Form::model($user, ['method' => 'PATCH', 'action' =>
    ['UserController@update', $user->id]]) !!}
    @include('users.user_self_form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}
</div>
@stop