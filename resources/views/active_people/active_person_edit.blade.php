<div class="modal fade" id="active_person_edit_modal" tabindex="-1" role="dialog"
    aria-labelledby="active_person_edit_modal_title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="active_person_edit_modal_title">Edit active person</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                {!! Form::model($active_person, ['method' => 'PATCH', 'action' =>
                ['ActivePersonController@update', $active_person->id]]) !!}
                @include('active_people.active_person_edit_form', ['submitButtonText' =>
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