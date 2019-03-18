
<div class="modal fade" id="person_edit_modal" tabindex="-1" role="dialog"
    aria-labelledby="person_edit_modal_title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="person_edit_modal_title">Edit person</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                {!! Form::model($person, ['method' => 'PATCH', 'action' =>
                ['PersonController@update', $person->id]]) !!}
                @include('people.person_edit_form', ['submitButtonText' =>
                'Update'])
                {!! Form::close() !!}

            </div>
        </div>
        <div class="modal-footer">

            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
    </div>
</div>

