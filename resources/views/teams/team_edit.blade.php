
<div class="modal fade" id="team_edit_modal" tabindex="-1" role="dialog"
    aria-labelledby="team_edit_modal_title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="team_edit_moda_title">Edit Team</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                {!! Form::model($team, ['method' => 'PATCH', 'action' =>
                ['TeamController@update', $team->id]]) !!}
                @include('teams.team_edit_form', ['submitButtonText' =>
                'Update'])
                {!! Form::close() !!}


            </div>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary"
                data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
    </div>
</div>

