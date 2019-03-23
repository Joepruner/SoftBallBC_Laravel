<div class='form-group'>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('season', 'Season:') !!}
    {!! Form::select('season', array('spring' => 'Spring', 'summer'=>'Summer','fall'=>'Fall' ),
    null, ['class' => 'form-control', 'placeholder' => 'Select a season']) !!}
</div>

<div class='form-group'>
        {!! Form::label('registered', 'Registered:') !!}
        {!! Form::select('registered', array(0=>'No', 1=>'Yes'),
        null, ['class' => 'form-control']) !!}
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