
<div class="modal fade" id="team_create_modal" tabindex="-1" role="dialog"
    aria-labelledby="team_create_modal_title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="team_create_modal_title">Create Team</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                {!! Form::open(['action' => 'TeamController@store']) !!}
                @include('teams.team_create_form', ['submitButtonText' =>
                'Create'])
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

