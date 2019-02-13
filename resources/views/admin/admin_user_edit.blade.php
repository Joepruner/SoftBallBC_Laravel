@extends('layouts.app')

@section('content')

<div class='col-md-6 col-md-offset-3'>
    <h1>
        Update user information
    </h1>

    <hr>

    {!! Form::model($user, ['method' => 'PATCH', 'action' =>
    ['UserController@update', $user->id]]) !!}
    @include('admin.admin_user_form', ['submitButtonText' => 'Update User'])
    {!! Form::close() !!}
</div>
@stop