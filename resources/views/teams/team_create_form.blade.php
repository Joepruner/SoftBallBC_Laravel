<div class='form-group'>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('season', 'Last Season:') !!}
    {!! Form::text('season', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
        {!! Form::label('registered', 'Registered:') !!}
        {!! Form::text('registered', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
        {!! Form::label('club_id', 'Club Id:') !!}
        {!! Form::text('club_id', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
    <button type="button" class="btn btn-lg btn-info form-control"
    data-dismiss="modal">Close</button>
</div>