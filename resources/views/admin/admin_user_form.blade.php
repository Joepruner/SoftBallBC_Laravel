<div class='form-group'>
        {!! Form::label('admin_level', 'Admin level:') !!}
        {!! Form::select('admin_level', array('Edit team only' => 'ETO', 'Edit users' => 'EU'),'ETO', ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('first_name', 'First name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('last_name', 'Last name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
        {!! Form::label('birth_date', 'Birth date:') !!}
        {!! Form::date('birth_date', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
        {!! Form::label('phone', 'Phone:') !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
        {!! Form::label('address_line_1', 'Address 1:') !!}
        {!! Form::text('address_line_1', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
        {!! Form::label('address_line_2', 'Address 2:') !!}
        {!! Form::text('address_line_2', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
        {!! Form::label('city', 'City:') !!}
        {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
        {!! Form::label('province', 'Province:') !!}
        {!! Form::text('province', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
        {!! Form::label('zip_code', 'Zip code:') !!}
        {!! Form::text('zip_code', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
        {!! Form::label('country', 'Country:') !!}
        {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
</div>